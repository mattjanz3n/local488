import path from 'path';
import fs from 'fs';
import { rm } from 'fs/promises';
import { readConfig } from '@wordpress/env/lib/config/index.js';
import tar from 'tar';
import { execSync } from 'child_process';

import startEnvironment from './start-environment.mjs';
import local488Config from '../local488.config.mjs';
import { forceMove, writeTempFile } from './util.mjs';

/**
 * Synchronize Local 488 development website with local environment.
 */
export default async function syncLocalEnvironment( done ) {
	// workDirectoryPath is path to where wp-env installs WordPress files.
	const { workDirectoryPath } = await readConfig(
		path.resolve( './.wp-env.json' )
	);

	if ( ! fs.existsSync( workDirectoryPath ) ) {
		startEnvironment();
	}

	fixPermalinks( path.join( workDirectoryPath, 'WordPress' ) );

	if ( ! fs.existsSync( path.resolve( './.cache/local488' ) ) ) {
		fs.mkdirSync( path.resolve( './.cache/local488' ), {
			recursive: true,
		} );
	}

	console.log( 'Downloading files from server.' );
	const filePath = await downloadFilesFromServer(
		path.resolve( './.cache/local488' )
	);

	if ( ! fs.existsSync( path.resolve( './.cache/local488/extracted' ) ) ) {
		fs.mkdirSync( path.resolve( './.cache/local488/extracted' ), {
			recursive: true,
		} );
	}

	const wpContentPath = path.join(
		workDirectoryPath,
		'WordPress',
		'wp-content'
	);

	console.log( 'Installing.' );
	await installFilesFromServer(
		path.resolve( './.cache/local488/extracted' ),
		filePath,
		{
			moveSpecification: [
				{
					tarPath: 'plugins',
					destinationDirectory: wpContentPath,
					excludeSubdirs: new Set( [ 'page-blocks' ] ),
				},
				{
					tarPath: 'themes',
					destinationDirectory: wpContentPath,
					excludeSubdirs: new Set( [ 'local-488' ] ),
				},
				{
					tarPath: 'uploads',
					destinationDirectory: wpContentPath,
				},
				{
					tarPath: local488Config.dumpName,
					destinationDirectory: path.join(
						workDirectoryPath,
						'WordPress'
					),
				},
			],
		}
	);

	console.log( 'Importing database.' );
	importDatabase();

	console.log( 'Fixing up database paths.' );
	replacePathsInDatabase();

	console.log( 'Synchronization completed!' );
	console.log(
		'Remember to change $table_prefix in',
		path.join( workDirectoryPath, 'WordPress', 'wp-config.php' )
	);

	if ( typeof done === 'function' ) {
		done();
	}
}

/**
 * Connect to server through SSH, dumps database and compresses it into a
 * tarball alongside plugins, themes, uploads and anything else that is needed,
 * then downloads the tarball to destination.
 *
 * @param {string} destination Destination where to place the downloaded files.
 * @return {string} Path to the downloaded file.
 */
export async function downloadFilesFromServer( destination ) {
	if ( ! fs.statSync( destination ).isDirectory() ) {
		throw new Error( 'Destination is not a directory.' );
	}

	const initTransfer = `\
#!/bin/bash

set -e

cd ${ local488Config.wpPath }/wp-content
wp db export ${ local488Config.dumpName }
echo 'Creating tarball...'
tar -czf local488-files.tar.gz  ${ local488Config.dumpName } plugins themes uploads

`;

	const {
		filePath: initTransferPath,
		dirPath: initTransferDirPath,
	} = writeTempFile( initTransfer );

	const endTransfer = `\
#!/bin/bash

set -e

echo 'Cleaning up...'
cd ${ local488Config.wpPath }/wp-content
rm local488-files.tar.gz  ${ local488Config.dumpName }

`;

	const {
		filePath: endTransferPath,
		dirPath: endTransferDirPath,
	} = writeTempFile( endTransfer );

	try {
		console.log( 'Starting initialization script...' );
		execSync(
			`ssh ${ local488Config.sshConnect } 'bash -s ' < ${ initTransferPath }`,
			{
				stdio: 'inherit',
			}
		);
		console.log( 'Starting download script...' );
		console.log( `Downloading to ${ destination }.` );
		execSync(
			`scp ${ local488Config.sshConnect }:'${ local488Config.wpPath }/wp-content/local488-files.tar.gz' ${ destination }`,
			{ stdio: 'inherit' }
		);
	} finally {
		try {
			console.log( 'Starting cleanup script...' );
			execSync(
				`ssh ${ local488Config.sshConnect } 'bash -s ' < ${ endTransferPath }`,
				{
					stdio: 'inherit',
				}
			);
		} finally {
			await rm( initTransferDirPath, { recursive: true } );
			await rm( endTransferDirPath, { recursive: true } );
		}
	}

	return path.join( destination, 'local488-files.tar.gz' );
}

/**
 * Installs plugins, themes, etc. and imports database.
 *
 * Options takes a property moveSpecification.
 *
 * moveSpecification is an array of objects with the following properties:
 *
 * tarPath: Path to a directory or file in the tarball.
 * destinationDirectory: Where to put tarPath.
 * excludeSubdirs: Optional. Set<string> of subdirectories to exclude from tarPath directory.
 *
 * @param {string} extractDestination Absolute path to destination directory where files should be extracted.
 * @param {string} file Absolute path to tarball file to install.
 * @param {Object} options Options. See description.
 */
export async function installFilesFromServer(
	extractDestination,
	file,
	options
) {
	if ( ! fs.statSync( extractDestination ).isDirectory() ) {
		throw new Error( `ExtractDestination is not a directory.` );
	}

	tar.x( {
		cwd: extractDestination,
		file,
		sync: true,
	} );

	try {
		for ( const move of options.moveSpecification ) {
			const extractedFile = path.join( extractDestination, move.tarPath );
			const fileStat = fs.statSync( extractedFile );

			if ( fileStat.isFile() || ! move.excludeSubdirs ) {
				await forceMove( extractedFile, move.destinationDirectory );
				continue;
			}

			const specialDestination = path.join(
				move.destinationDirectory,
				path.basename( extractedFile )
			);

			if ( ! fs.existsSync( specialDestination ) ) {
				fs.mkdirSync( specialDestination );
			}

			const dirFiles = fs.readdirSync( extractedFile );

			for ( const file of dirFiles ) {
				if ( ! move.excludeSubdirs.has( file ) ) {
					await forceMove(
						path.join( extractedFile, file ),
						specialDestination
					);
				}
			}
		}
	} finally {
		if ( fs.existsSync( extractDestination ) ) {
			await rm( extractDestination, { recursive: true } );
		}
	}
}

function importDatabase() {
	execSync(
		`npx wp-env run cli 'wp db import ${ local488Config.dumpName }'`,
		{ stdio: 'inherit' }
	);
}

/**
 * The database contains some hardcoded paths, like the website URL. This needs
 * to be changed in the local environment.
 */
export function replacePathsInDatabase() {
	for ( const [
		oldPath,
		newPath,
	] of local488Config.transformPaths.entries() ) {
		execSync(
			`npx wp-env run cli 'wp search-replace ${ oldPath } ${ newPath } --all-tables'`,
			{ stdio: 'inherit' }
		);
	}
}

/**
 * Fixes permalinks for WordPress installation in dirPath.
 */
function fixPermalinks( dirPath ) {
	const accessPath = path.join( dirPath, '.htaccess' );
	const directives = `\

# BEGIN WordPress
# The directives (lines) between "BEGIN WordPress" and "END WordPress" are
# dynamically generated, and should only be modified via WordPress filters.
# Any changes to the directives between these markers will be overwritten.
<IfModule mod_rewrite.c>
RewriteEngine On
RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]
RewriteBase /
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
</IfModule>

# END WordPress
`;
	fs.writeFileSync( accessPath, directives, { flag: 'a' } );
	fs.chmodSync( accessPath, 0o777 );
}

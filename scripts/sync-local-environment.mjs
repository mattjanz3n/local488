import path from 'path';
import fs from 'fs';
import { rm } from 'fs/promises';
import { readConfig } from '@wordpress/env/lib/config/index.js';
import tar from 'tar';

import startEnvironment from './start-environment.mjs';
import local488Config from '../local488.config.mjs';
import { forceMove } from './util.mjs';

/**
 * Synchronize Local 488 development website with local environment.
 */
export default async function syncLocalEnvironment( done ) {
	// workDirectoryPath is path to where wp-env installs WordPress files.
	const { workDirectoryPath } = await readConfig(
		path.resolve( '../.wp-env.json' )
	);

	if ( ! fs.existsSync( workDirectoryPath ) ) {
		startEnvironment();
	}

	if ( ! fs.existsSync( path.resolve( '../.cache/local488' ) ) ) {
		fs.mkdirSync( path.resolve( '../.cache/local488' ), {
			recursive: true,
		} );
	}

	console.log( 'Downloading files from server.' );
	const filePath = downloadFilesFromServer(
		path.resolve( '../.cache/local488' )
	);

	if ( ! fs.existsSync( path.resolve( '../.cache/local488/extracted' ) ) ) {
		fs.mkdirSync( path.resolve( '../.cache/local488/extracted' ), {
			recursive: true,
		} );
	}

	console.log( 'Installing.' );
	await installFilesFromServer(
		path.resolve( '../.cache/local488/extracted' ),
		filePath,
		workDirectoryPath
	);

	console.log( 'Fixing up database paths.' );
	replacePathsInDatabase();

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
export function downloadFilesFromServer( destination ) {
	if ( ! fs.statSync( destination ).isDirectory() ) {
		throw new Error( 'Destination is not a directory.' );
	}

	const initTransfer = `\
cd ${ local488Config.wpPath } && \
mysqldump ${ local488Config.dbName } > ${ local488Config.dumpName } && \
tar -czf local488-files.tar.gz  ${ local488Config.dumpName } plugins themes uploads
`;
	const endTransfer = `\
cd ${ local488Config.wpPath } && \
rm local488-files.tar.gz  ${ local488Config.dumpName }
`;

	try {
		execSync( `ssh ${ local488Config.sshConnect } -- ${ initTransfer }`, {
			stdio: 'inherit',
		} );
		execSync(
			`scp ${ local488Config.sshConnect }:'~/local488-files.tar.gz' ${ destination }`
		);
	} finally {
		execSync( `ssh ${ local488Config.sshConnect } -- ${ endTransfer }`, {
			stdio: 'inherit',
		} );
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

/**
 * The database contains some hardcoded paths, like the website URL. This needs
 * to be changed in the local environment.
 */
export function replacePathsInDatabase() {}

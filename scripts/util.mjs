import fs from 'fs';
import { rm } from 'fs/promises';
import path from 'path';
import os from 'os';

/**
 * Moves source file or directory to destination. Destination must be a directory.
 */
export async function forceMove( source, destination ) {
	const stat = fs.statSync( destination );
	const destinationName = path.join( destination, path.basename( source ) );

	if ( ! stat.isDirectory() ) {
		throw new Error( 'Destination must be a directory.' );
	}

	if ( fs.existsSync( destinationName ) ) {
		await rm( destinationName, { recursive: true } );
	}

	fs.renameSync( source, destinationName );
}

/**
 * Creates a temporary file, writes data to it, and returns its path. Caller is
 * responsible for removing the file.
 *
 * @param {string} data Data to write to file.
 * @return {Object} Object with properties filePath and dirPath.
 */
export function writeTempFile( data ) {
	const dirPath = fs.mkdtempSync( `${ os.tmpdir() }${ path.sep }` );
	const filePath = path.join( dirPath, 'file' );
	fs.writeFileSync( filePath, data );
	return { filePath, dirPath };
}

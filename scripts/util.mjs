import fs from 'fs';
import { rm } from 'fs/promises';
import path from 'path';

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

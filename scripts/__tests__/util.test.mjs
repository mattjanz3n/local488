import fs from 'fs';
import { rm } from 'fs/promises';
import os from 'os';
import path from 'path';

import { forceMove, writeTempFile } from '../util.mjs';
import { checkExistence } from './testutils.mjs';

let tempDir = null;
let sourceDir = null;
let destDir = null;

describe( 'forceMove', () => {
	beforeAll( () => {
		tempDir = fs.mkdtempSync( `${ os.tmpdir() }${ path.sep }` );
		sourceDir = path.join( tempDir, 'source' );
		destDir = path.join( tempDir, 'destination' );
	} );

	afterAll( async () => {
		await rm( tempDir, { recursive: true } );
	} );

	beforeEach( () => {
		fs.mkdirSync( sourceDir );
		fs.mkdirSync( path.join( sourceDir, 'dir' ) );
		const fileNames = [ 'file1', 'file2', 'file3', 'file4' ];
		for ( const fileName of fileNames ) {
			fs.writeFileSync( path.join( sourceDir, fileName ), 'hi there' );
		}
		fs.mkdirSync( destDir );
	} );

	afterEach( async () => {
		await rm( sourceDir, { recursive: true } );
		await rm( destDir, { recursive: true } );
	} );

	it( 'Moves regular files correctly.', async () => {
		await forceMove( path.join( sourceDir, 'file1' ), destDir );
		expect( checkExistence( path.join( destDir, 'file1' ) ) ).not.toThrow();
	} );

	it( 'Moves directories without overwriting correctly.', async () => {
		await forceMove( path.join( sourceDir, 'dir' ), destDir );
		expect( checkExistence( path.join( destDir, 'dir' ) ) ).not.toThrow();
	} );

	it( 'Moves directories with overwriting correctly.', async () => {
		fs.mkdirSync( path.join( destDir, 'dir' ) );
		fs.writeFileSync( path.join( sourceDir, 'dir', 'file' ), 'hi' );
		await forceMove( path.join( sourceDir, 'dir' ), destDir );
		expect(
			checkExistence( path.join( destDir, 'dir', 'file' ) )
		).not.toThrow();
	} );
} );

describe( 'writeTempFile', () => {
	it( 'Creates a temporary file.', async () => {
		const { filePath, dirPath } = writeTempFile( 'test' );
		expect( checkExistence( filePath ) ).not.toThrow();
		await rm( dirPath, { recursive: true } );
	} );

	it( 'Writes correct data to file.', async () => {
		const { filePath, dirPath } = writeTempFile( 'test' );
		const fileData = fs.readFileSync( filePath, { encoding: 'utf8' } );

		expect( fileData ).toBe( 'test' );
		await rm( dirPath, { recursive: true } );
	} );
} );

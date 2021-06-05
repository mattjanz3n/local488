import fs from 'fs';
import path from 'path';
import os from 'os';
import { rm } from 'fs/promises';

import syncLocalEnvironment, {
	installFilesFromServer,
} from '../sync-local-environment.mjs';
import { checkExistence } from './testutils.mjs';

let tempDir = null;
let extractPath = null;
let installPath = null;
let archivePath = null;

describe( 'installFilesFromServer', () => {
	beforeAll( () => {
		tempDir = fs.mkdtempSync( `${ os.tmpdir() }${ path.sep }` );
		extractPath = path.join( tempDir, 'extracted' );
		installPath = path.join( tempDir, 'installed' );
		archivePath = path.resolve( './scripts/__tests__/testarchive.tar.gz' );
	} );

	afterAll( async () => {
		await rm( tempDir, { recursive: true } );
	} );

	beforeEach( () => {
		fs.mkdirSync( extractPath );
		fs.mkdirSync( installPath );
	} );

	afterEach( async () => {
		if ( fs.existsSync( extractPath ) ) {
			await rm( extractPath, { recursive: true } );
		}

		if ( fs.existsSync( installPath ) ) {
			await rm( installPath, { recursive: true } );
		}
	} );

	it( 'Moves directories without ignoring anything.', async () => {
		await installFilesFromServer( extractPath, archivePath, {
			moveSpecification: [
				{
					tarPath: 'plugins',
					destinationDirectory: installPath,
				},
				{
					tarPath: 'themes',
					destinationDirectory: installPath,
				},
				{
					tarPath: 'uploads',
					destinationDirectory: installPath,
				},
			],
		} );

		expect(
			checkExistence( path.join( installPath, 'plugins' ) )
		).not.toThrow();
		expect(
			checkExistence( path.join( installPath, 'plugins', 'page-blocks' ) )
		).not.toThrow();
		expect(
			checkExistence( path.join( installPath, 'themes', 'local488' ) )
		).not.toThrow();
		expect(
			checkExistence( path.join( installPath, 'dbdump.txt' ) )
		).toThrow();
	} );

	it( 'Moves files without ignoring anything.', async () => {
		await installFilesFromServer( extractPath, archivePath, {
			moveSpecification: [
				{
					tarPath: 'dbdump.txt',
					destinationDirectory: installPath,
				},
			],
		} );

		expect(
			checkExistence( path.join( installPath, 'dbdump.txt' ) )
		).not.toThrow();
	} );

	it( 'Ignores specified directories while moving others.', async () => {
		await installFilesFromServer( extractPath, archivePath, {
			moveSpecification: [
				{
					tarPath: 'plugins',
					destinationDirectory: installPath,
					excludeSubdirs: new Set( [ 'page-blocks' ] ),
				},
				{
					tarPath: 'themes',
					destinationDirectory: installPath,
				},
				{
					tarPath: 'uploads',
					destinationDirectory: installPath,
				},
			],
		} );

		expect(
			checkExistence( path.join( installPath, 'plugins', 'page-blocks' ) )
		).toThrow();
		expect(
			checkExistence(
				path.join( installPath, 'plugins', 'other-plugin' )
			)
		).not.toThrow();
	} );
} );

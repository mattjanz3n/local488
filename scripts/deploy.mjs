import path from 'path'
import tar from 'tar'
import { execSync } from 'child_process'
import { rm } from 'fs'

import build from './build.mjs'
import local488Config from '../local488Config.mjs'
import { writeTempFile } from './util.mjs'

/**
 * Build, deploy to live website, and install projects. Requires 'scp' command,
 * probably not going to work on Windows unless WSL is used.
 */
export default async function deploy( done ) {
	build()

	const { themes, plugins } = local488Config

	tar.c({
		file: 'local488-deploy.tar.gz',
		sync: true,
		cwd: path.resolve('src'),
		filter: (tarPath) => {
			// Exclude node_modules
			if (tarPath.includes('node_modules')) {
				return false
			}
			return true
		}
	}, [...themes, ...plugins])

	console.log('Transferring tarball...')
	execSync(`scp local488-deploy.tar.gz ${local488Config.sshConnect}:'${local488Config.wpPath}/wp-content'`, {
		cwd: path.resolve('src'),
		stdio: 'inherit'
	})

	const installScript = `\
#!/bin/bash

set -e

cd ${ local488Config.wpPath }/wp-content
if ! [ -d local488-extract ]; then
  mkdir local488-extract
fi
cd local488-extract
mv ../local488-deploy.tar.gz .
tar -xf local488-deploy.tar.gz

echo 'Installing themes...'
cd ../themes
rm -rf ${ themes }
mv -t . ${ themes.map((theme) => '../local488-extract/' + theme ) }

echo 'Installing plugins...'
cd ../plugins
rm -rf ${ plugins }
mv -t . ${ plugins.map((plugin) => '../local488-extract/' + plugin ) }

echo 'Cleaning up...'
cd ..
rm -rf local488-extract

`
	const scriptPath = writeTempFile( installScript )
	try {
		console.log('Installing...')
		execSync(`ssh ${local488Config.sshConnect} 'bash -s ' < ${scriptPath}`, { stdio: 'inherit' })
	} finally {
		await rm( scriptPath, { recursive: true } )
		await rm( path.resolve('src/local488-deploy.tar.gz') )
	}

	done()
}

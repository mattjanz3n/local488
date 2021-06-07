import { execSync } from 'child_process'
import path from 'path'

import local488Config from '../local488.config.mjs'

/**
 * Build projects for production.
 */
export default function build( done ) {
	const projects = [...local488Config.themes, local488Config.plugins]

	for(const project of projects) {
		execSync('npm run build', {
			stdio: 'inherit',
			cwd: path.join('src', project)
		})
	}

	if ( typeof done === 'function' ) {
		done();
	}
}

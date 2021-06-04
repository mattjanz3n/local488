import { execSync } from 'child_process';

export default function startEnvironment( done ) {
	console.log( 'INSIDE START ENVIRONMENT' );
	execSync( 'npx wp-env start', { stdio: 'inherit' } );
	if ( typeof done === 'function' ) {
		done();
	}
}

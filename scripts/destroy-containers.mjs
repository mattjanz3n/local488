import { execSync } from 'child_process';

export default function destroyContainers( done ) {
	execSync( 'npx wp-env destroy', { stdio: 'inherit' } );
	done();
}

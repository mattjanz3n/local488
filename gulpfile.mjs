import gulp from 'gulp';

import syncLocalEnvironment from './scripts/sync-local-environment.mjs';
import startEnvironment from './scripts/start-environment.mjs';
import testDownloadFiles from './scripts/test-download-files.mjs';
import transformPaths from './scripts/transform-paths.mjs';
import destroyContainers from './scripts/destroy-containers.mjs';
import deploy from './scripts/deploy.mjs';
import build from './scripts/build.mjs';

gulp.task( 'env:sync', syncLocalEnvironment );
gulp.task( 'env:start', startEnvironment );
gulp.task( 'env:transform', transformPaths );
gulp.task(
	'env:resync',
	gulp.series( destroyContainers, syncLocalEnvironment )
);
gulp.task( 'deploy', deploy );
gulp.task( 'build', build );

gulp.task( 'test:download', testDownloadFiles );

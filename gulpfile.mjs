import gulp from 'gulp';

import syncLocalEnvironment from './scripts/sync-local-environment.mjs';
import startEnvironment from './scripts/start-environment.mjs';

gulp.task( 'env:sync', syncLocalEnvironment );
gulp.task( 'env:start', startEnvironment );

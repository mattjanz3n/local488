import gulp from 'gulp';

import syncLocalEnvironment from './scripts/sync-local-environment.mjs';
import startEnvironment from './scripts/start-environment.mjs';
import testDownloadFiles from './scripts/test-download-files.mjs';

gulp.task( 'env:sync', syncLocalEnvironment );
gulp.task( 'env:start', startEnvironment );

gulp.task( 'test:download', testDownloadFiles );

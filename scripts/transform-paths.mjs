import { replacePathsInDatabase } from './sync-local-environment.mjs'

/**
 * A wrapper around replacePathsInDatabase, in order to turn the aforementioned
 * function into a gulp task.
 */
export default function transformPaths( done ) {
    replacePathsInDatabase()
    done()
}

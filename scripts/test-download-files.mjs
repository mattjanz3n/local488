import fs from 'fs'
import path from 'path'

import { downloadFilesFromServer } from './sync-local-environment.mjs'

/**
 * Try just downloading the files from the server to make sure it works.
 */
export default async function testDownloadFiles( done ) {
    const dlPath = path.resolve('./.cache/local488')
    if ( ! fs.existsSync(dlPath) ) {
        fs.mkdirSync(dlPath, {recursive: true})
    }

    await downloadFilesFromServer( dlPath )

    if ( typeof done === 'function' ) {
        done()
    }
}

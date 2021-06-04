import fs from 'fs';

// Returns function that throws error if filePath does not exist.
export function checkExistence( filePath ) {
	return () => {
		if ( ! fs.existsSync( filePath ) ) {
			throw new Error();
		}
	};
}

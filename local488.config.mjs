export default {
	// Username & domain to connect through ssh
	sshConnect: 'local488@local488.ssh.wpengine.net',

	// Path to WordPress installation
	wpPath: '/home/wpe-user/sites/local488',

	dbName: 'wp_local488',

	// Has to be just a little funky because it will be in the wp-content/
	// directory of the live server for a second.
	dumpName: 'dbdump-al0303.sql',

	// Paths to transform in the database.
	transformPaths: new Map( [
		[ 'https://local488.wpengine.com', 'http://localhost:8888' ],
		[ 'https://beta.local48.ca', 'http://localhost:8888' ],
		[ '//local488.wpengine.com', '//localhost:8888' ],
		[ '//beta.local488.ca', '//localhost:8888' ],
	] ),

	// Classifying subprojects into themes and plugins.
	themes: [ 'local-488' ],

	plugins: [ 'page-blocks' ]
};

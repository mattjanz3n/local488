export default {
	// Username & domain to connect through ssh
	sshConnect: 'local488@local488.ssh.wpengine.net',

	// Path to WordPress installation
	wpPath: '/home/wpe-user/sites/local488',

	dbName: 'wp_local488',

	// Has to be just a little funky because it will be in the wp-content/
	// directory of the live server for a second.
	dumpName: 'dbdump-al0303.sql',
};

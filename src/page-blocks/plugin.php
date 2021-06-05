<?php
/**
 * Plugin Name: Page Blocks — CGB Gutenberg Block Plugin
 * Description: Page Blocks — is a Gutenberg plugin created via create-guten-block.
 * Author: mrahmadawais, maedahbatool
 * Author URI: https://AhmadAwais.com/
 * Version: 3.0.1
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LOCAL488_PAGE_BLOCKS_DIR', __DIR__ );
define( 'LOCAL488_PAGE_BLOCKS_FILE', __FILE__ );

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';

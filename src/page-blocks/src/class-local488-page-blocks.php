<?php

/**
 * The main class for the Page Blocks plugin.
 */
class Local488_Page_Blocks {

	/** @var string Plugin version. */
	public $version = null;

	public function __construct() {
		$this->version = get_file_data( LOCAL488_PAGE_BLOCKS_FILE, array( 'Version' => 'Version' ) )['Version'];
	}
}

return new Local488_Page_Blocks();

<?php
/** Search form */
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" class="search">
	<label class="search__label" for="s"><?= _e('Search')?></label>
	<div class="search__input-wrap">
		<input type="text" value="<?php echo get_search_query() ?>" placeholder="<?= _e('Search')?>" name="s" id="s" class="search__input"/>
		<button type="submit" id="searchsubmit" value="search" class="search__button"></button>
	</div>
</form>

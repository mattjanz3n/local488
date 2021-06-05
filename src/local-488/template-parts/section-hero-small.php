<?php
/**
 * Hero section: Single and Archive page
 *
 * @package Local_488
 */
?>

<section class="hero hero--small">
	<div class="container">
		<div class="hero__wrap">
			<div class="hero__wrap-title">
				<div class="hero__breadcrumbs">
					<?php if ( function_exists( 'dimox_breadcrumbs' ) ) dimox_breadcrumbs(); ?>
				</div>
				<h1 class="hero__title hero__title--small white-headline">
				<?php
				$blog_id = get_option('page_for_posts', true);
				$blog_page_name = get_post($blog_id) -> post_name;
				if($blog_page_name == $pagename) :
					$post_title = get_the_title( $blog_id);
					echo $post_title;
				elseif(is_page()):
					the_title();
				elseif(is_singular('post')):
					$post_title = get_the_title( $blog_id);
					echo $post_title;
				elseif(is_singular()):
					$post_type = get_post_type_object( get_post_type($post) );
					echo $post_type->label ;
				elseif ( is_post_type_archive() ) :
        			$archive_title = post_type_archive_title( '', false );
        			echo $archive_title;
        		elseif ( is_tax() ) :
        			$single_term_title = single_term_title( '', false );
        			echo $single_term_title;
				elseif ( is_search() ) :
        			echo _e('Search', THEME_TD);
				elseif ( is_404() ) :
        			echo  _e('Page 404', THEME_TD);
				elseif ( is_category() ) :
					 $single_cat_title = single_cat_title();
        			echo  $single_cat_title;
				endif;
				?>
				</h1>
			</div>
		</div>
	</div>
</section>

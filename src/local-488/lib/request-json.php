<?php
  header("Access-Control-Allow-Origin: *");

  /*

    grab with jquery like:
    $.ajax({
      url: 'http://url_to_wp_site.com/?json_request=1&callback=?',
      dataType: 'json',
      success: function(result){

        // do stuff with result
        $('#pm-nav').html(result.main_menu);

      }
    });

  */

  // Set cache expiry
  $expire = 3600;

  // Set up caching
  $portal_cache = wp_cache_get( 'portal_cache' );

  // If cache is not set or has expired
  if ( ! $portal_cache || isset($_GET['flush_cache']) ) {

    $portal_cache = array();

    // Start output buffer
    ob_start();

     get_template_part( 'template-parts/notice-content', '' );
     $portal_cache['notice_feed'] = ob_get_contents();
     ob_clean();

     get_template_part( 'template-parts/footer-content', '' );
     $portal_cache['footer_feed'] = ob_get_contents();
     ob_clean();

    ob_end_clean();

    // json encode array
    $portal_cache = json_encode( $portal_cache );

    // Update the cache
    $cached = wp_cache_set( 'portal_cache', $portal_cache, '', $expire );

  }

  // format for jsonp and display for reading
  echo $_GET['callback'],'(',$portal_cache,')';

?>

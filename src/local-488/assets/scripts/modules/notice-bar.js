// check for 488.username cookie

$( function () {
	function getCookie( name ) {
		var re = new RegExp( name + '=([^;]+)' );
		var value = re.exec( document.cookie );
		return value != null ? unescape( value[ 1 ] ) : null;
	}

	function checkUserCookie() {
		var username_cookie = getCookie( '488.username' );

		if ( ! username_cookie ) {
			// not logged in
		} else {
			var linkElement = document.getElementsByClassName(
				'secondary-item__login'
			)[ 0 ];
			linkElement.innerHTML =
				"<a href='https://staging-portal.local488.ca//Member/Account/Logout'>Log out</a>";
			var linkElement = document.getElementsByClassName(
				'secondary-item__login--mobile'
			)[ 0 ];
			linkElement.innerHTML =
				"<a href='https://staging-portal.local488.ca//Member/Account/Logout'>Log out</a>";
		}
	}

	checkUserCookie();
} );

// footer menu

var request = new XMLHttpRequest();
request.open(
	'GET',
	'https://local488stag.wpengine.com//?json_request=1&flush_cache=1111231237565533423232342342434',
	true
);

request.onreadystatechange = function () {
	if ( this.readyState === 4 ) {
		if ( this.status >= 200 && this.status < 400 ) {
			// Success!
			var result = $.trim( this.responseText );
			result = result.substring( 1, result.length - 1 );

			var resultsArray = JSON.parse( result );

			var footer_content = $( resultsArray.footer_feed );

			var notice_content = $( resultsArray.notice_feed );

			// $('footer.site-footer.json-target').append(footer_content);
			// $('header.site-header').append(notice_content);
		}
	}
};

request.send();
request = null;

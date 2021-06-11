export default function closeNotice() {
	// Taken from:
	// https://gist.github.com/hyamamoto/fd435505d29ebfa3d9716fd2be8d42f0#gistcomment-2775538
	// Great because it hashes a string into a 32-bit integer so it will not be
	// too long, and it is faster than doing this with md5 or some other
	// similar algorithm.
	function hashCode(s) {
		// Modified from let h; to let h = 0 so that '' returns 0
		let h = 0;
		for (let i = 0; i < s.length; i++)
			h = Math.imul(31, h) + s.charCodeAt(i) | 0;

		return h;
	}

	$( window ).load( function () {
		let $noticeHeight = $( '.notice-bar__wrap' ).innerHeight();
		$( '.hero__wrap' ).css( 'margin-top', function () {
			return $noticeHeight + 'px';
		} );

		$( '.hero-section__wrap' ).css( 'margin-top', function () {
			return $noticeHeight + 'px';
		} );

		$( '.notice-bar__close-btn' ).on( 'click', function () {
			let d = new Date();
			//change here how many day this is visible
			const expDays = 7;
			d.setTime( d.getTime() + expDays * 24 * 60 * 60 * 1000 );
			document.cookie = `isClosedNotice_${ hashCode() }=true; expires=${ d.toUTCString() }; path=/;`;

			$( '.hero__wrap' ).css( 'margin-top', function () {
				return 0 + 'px';
			} );
			$( '.hero-section__wrap' ).css( 'margin-top', function () {
				return 0 + 'px';
			} );
			$( '.notice-bar' ).hide( 100 );
		} );
	} );
}

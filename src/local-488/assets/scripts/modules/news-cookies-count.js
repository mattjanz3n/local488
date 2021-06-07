export default function newsCookieCount() {
	function formatDate( date ) {
		var d = new Date( date ),
			month = '' + ( d.getMonth() + 1 ),
			day = '' + d.getDate(),
			year = d.getFullYear();

		if ( month.length < 2 ) month = '0' + month;
		if ( day.length < 2 ) day = '0' + day;

		return { year: year, month: month, day: day };
	}

	$( window ).load( function () {
		if ( localStorage.getItem( 'LastVisitDate' ) === null ) {
			let currDate = new Date();
			localStorage.setItem( 'LastVisitDate', currDate );
		}

		//TODO: remove this. This is for testing. Set a day before last post and all will work, or create new post
		//localStorage.setItem('LastVisitDate' , 'Thu Mar 02 2021 14:20:29 GMT+0200 (Eastern European Standard Time)');

		const newsMenuItem = $( '.news-counter-js' );
		let newCurrDate = localStorage.getItem( 'LastVisitDate' );

		let data = {
			action: 'news_get_new_post',
			lastDate: formatDate( newCurrDate ),
		};

		$.ajax( {
			url: themeVars.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function () {},
			success: function ( data ) {
				let currDate = new Date();
				let newCurrDate = localStorage.getItem( 'LastVisitDate' );
				let formatedCurrDate = formatDate( currDate );
				let formatednewCurrDate = formatDate( newCurrDate );
				const isThisToday =
					formatedCurrDate[ 'day' ] === formatednewCurrDate[ 'day' ];

				if ( data > 0 && ! isThisToday ) {
					newsMenuItem
						.children( '.first-level-item' )
						.append(
							'<span class="news-counter-wrap show">' +
								data +
								'</span>'
						);
				}

				if ( /news-events/.test( window.location.href ) ) {
					localStorage.setItem( 'LastVisitDate', currDate );
					$( '.news-counter-wrap' ).removeClass( 'show' );
				}
			},
		} );
	} );
}

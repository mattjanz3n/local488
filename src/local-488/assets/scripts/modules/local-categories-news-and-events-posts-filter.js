//=================================\\
// Categories posts filter \\
//=================================\\

export default function categoriesNewsAndEventsPostsFilter() {
	function categoriesNewsAndEventsPostsSort( categoryCurrent, paged ) {
		let categoryNewsAndEvents = categoryCurrent;
		let pageNewsAndEvents = paged;
		let postWrapNewsAndEvents = $(
			'.news-and-events-content-section__wrapper'
		);

		let data = {
			action: 'categories_news_and_events_posts_filter',
			category: categoryNewsAndEvents,
			paged: pageNewsAndEvents,
		};

		$.ajax( {
			url: themeVars.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function () {},
			success: function ( data ) {
				postWrapNewsAndEvents.empty();
				postWrapNewsAndEvents.append( data );
				$( `a.pagination[data-paged=${ paged }]` ).addClass( 'active' );
				$( 'html,body' ).animate(
					{
						scrollTop: postWrapNewsAndEvents.offset().top - 120,
					},
					500
				);
			},
		} );
	}

	$( '.news-and-events-content-section__button' ).on(
		'click',
		function ( e ) {
			e.preventDefault();
			$( this ).toggleClass( 'active' );
			const categoryCurrent = $(
				'.news-and-events-content-section__button.active'
			)
				.get()
				.map( ( n ) => n.dataset[ 'slug' ] );
			let paged = 1;
			categoriesNewsAndEventsPostsSort( categoryCurrent, paged );
		}
	);

	$( '.loc-single-post__categories-link' ).on( 'click', function ( e ) {
		e.preventDefault();
		let categoryCurrent = $( '.archive-category-button.active' )
			.get()
			.map( ( n ) => n.dataset[ 'slug' ] );
		let paged = 1;
		categoriesNewsAndEventsPostsSort( categoryCurrent, paged );
	} );

	$( document ).on( 'click', 'a.pagination', function ( e ) {
		e.preventDefault();
		let paged = $( this ).attr( 'data-paged' );
		let categoryCurrent = $( '.archive-category-button.active' )
			.get()
			.map( ( n ) => n.dataset[ 'slug' ] );
		$( '.pagination' ).removeClass( 'active' );
		categoriesNewsAndEventsPostsSort( categoryCurrent, paged );
	} );

	$( document ).on( 'click', 'a.page', function ( e ) {
		e.preventDefault();
		var page = $( this ).attr( 'data-value' );
		if ( page == 'prev' ) {
			$( 'a.pagination.active' )
				.parent()
				.prev()
				.children( 'a.pagination' )
				.trigger( 'click' );
		} else {
			$( 'a.pagination.active' )
				.parent()
				.next()
				.children( 'a.pagination' )
				.trigger( 'click' );
		}
	} );
}

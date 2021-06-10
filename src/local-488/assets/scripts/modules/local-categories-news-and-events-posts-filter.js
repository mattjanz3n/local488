//=================================\\
// Categories posts filter \\
//=================================\\

export default function categoriesNewsAndEventsPostsFilter() {
	function categoriesNewsAndEventsPostsSort(
		categoryCurrent,
		paged,
		includeManagersMessages
	) {
		let categoryNewsAndEvents = categoryCurrent;
		let pageNewsAndEvents = paged;
		let postWrapNewsAndEvents = $(
			'.news-and-events-content-section__wrapper'
		);

		let data = {
			action: 'categories_news_and_events_posts_filter',
			category: categoryNewsAndEvents,
			paged: pageNewsAndEvents,
			...( includeManagersMessages && { managers: 1 } ),
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

	function getActiveFilters() {
		const categoryCurrent = $(
			'.news-and-events-content-section__button.active'
		)
			.get()
			.filter(
				( n ) =>
					! n.dataset.postType ||
					! n.dataset.postType === 'managers-messages'
			)
			.map( ( n ) => n.dataset[ 'slug' ] );
		const includeManagersMessages = document
			.getElementById( 'filter-managers-messages' )
			.classList.contains( 'active' );
		return { categoryCurrent, includeManagersMessages };
	}

	function renderNewPosts( paged ) {
		const { categoryCurrent, includeManagersMessages } = getActiveFilters();
		categoriesNewsAndEventsPostsSort(
			categoryCurrent,
			paged,
			includeManagersMessages
		);
	}

	$( '.news-and-events-content-section__button' ).on(
		'click',
		function ( e ) {
			e.preventDefault();
			$( this ).toggleClass( 'active' );
			renderNewPosts( 1 );
		}
	);

	$( '.loc-single-post__categories-link' ).on( 'click', function ( e ) {
		e.preventDefault();
		renderNewPosts( 1 );
	} );

	$( document ).on( 'click', 'a.pagination', function ( e ) {
		e.preventDefault();
		$( '.pagination' ).removeClass( 'active' );
		const paged = $( this ).attr( 'data-paged' );
		renderNewPosts( paged );
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

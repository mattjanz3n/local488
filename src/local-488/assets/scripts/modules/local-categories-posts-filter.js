// Categories posts filter

export default function categoriesPostsFilter() {
	function categoriesPostsSort( categoryCurrent, paged ) {
		let category = categoryCurrent;
		let page = paged;
		let postWrap = $( '.community-involvment-article-wrapper' );

		let data = {
			action: 'categories_posts_filter',
			category: category,
			paged: page,
		};

		$.ajax( {
			url: themeVars.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function () {},
			success: function ( data ) {
				postWrap.empty();
				postWrap.append( data );
				$( `a.pagination[data-paged=${ paged }]` ).addClass( 'active' );
				$( 'html,body' ).animate(
					{
						scrollTop: postWrap.offset().top - 120,
					},
					500
				);
			},
		} );
	}

	$( '.community-involvement-button' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'active' );
		const categoryCurrent = $( '.archive-category-button.active' )
			.get()
			.map( ( n ) => n.dataset[ 'slug' ] );
		let paged = 1;
		categoriesPostsSort( categoryCurrent, paged );
	} );

	$( document ).on(
		'click',
		'.community-involvment-article__categories-link',
		function ( e ) {
			e.preventDefault();
			let categoryCurrent = $( '.archive-category-button.active' )
				.get()
				.map( ( n ) => n.dataset[ 'slug' ] );
			let paged = 1;
			categoriesPostsSort( categoryCurrent, paged );
		}
	);

	$( document ).on( 'click', 'a.pagination', function ( e ) {
		e.preventDefault();
		let categoryCurrent = $( '.archive-category-button.active' )
			.get()
			.map( ( n ) => n.dataset[ 'slug' ] );
		let paged = $( this ).attr( 'data-paged' );
		$( '.pagination' ).removeClass( 'active' );
		categoriesPostsSort( categoryCurrent, paged );
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

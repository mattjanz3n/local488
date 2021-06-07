import 'slick-carousel';

export default function postsFilter() {
	function slickInitPosts() {
		$( '.posts-list__slider' ).slick( {
			infinite: false,
			slidesToShow: 5,
			slidesToScroll: 5,
			appendArrows: $( '.slick-arrow-custom' ),
			prevArrow: $( '.slick-arrow-prev' ),
			nextArrow: $( '.slick-arrow-next' ),
			arrows: true,
			responsive: [
				{
					breakpoint: 1441,
					settings: {
						slidesToShow: 4,
						slidesToScroll: 4,
						dots: false,
					},
				},
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						dots: false,
					},
				},
			],
		} );
	}

	slickInitPosts();

	$( window ).on( 'load', function () {
		$( '.posts-list__slider' ).slick( 'refresh' );
	} );

	function postsSort( categoryCurrent ) {
		var category = categoryCurrent;
		var postWrap = $( '.single-page-posts-section__wrapper' );

		var data = {
			action: 'posts_filter',
			category: category,
		};

		$.ajax( {
			url: themeVars.ajaxurl,
			data: data,
			type: 'POST',
			beforeSend: function () {},
			success: function ( data ) {
				$( '.posts-list__slider' ).slick( 'unslick' );
				postWrap.empty();
				$( '.single-page-posts-section__wrapper--mobile' ).append(
					data
				);
				postWrap.append( data );
				slickInitPosts();
			},
		} );
	}

	$( '.category-list__button' ).on( 'click', function ( e ) {
		e.preventDefault();
		$( this ).toggleClass( 'active' );
		const categoryCurrent = $( '.category-list__button.active' )
			.get()
			.map( ( n ) => n.dataset[ 'slug' ] );
		postsSort( categoryCurrent );
	} );

	$( document ).on( 'click', '.category-list__category-link', function ( e ) {
		e.preventDefault();
	} );
}

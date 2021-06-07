export default function blockImageSlider() {
	$( '.images__wrap' ).slick( {
		variableWidth: true,
		infinite: false,
		arrows: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
	} );
}

export default function accordionTopScroll () {
	if ($('#accordion').length) {
		$('#accordion .collapse').on('shown.bs.collapse', function() {
			var $card = $(this).closest('.card');
			$('html,body').animate({
				scrollTop: $card.offset().top - 300,
			}, 500);
		});
	}
}

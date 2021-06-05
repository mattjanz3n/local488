export default function anchorBottomScroll () {
	if ($('.hero-section__anchor').length) {
		$('.hero-section__anchor').click(function(){
			$('html, body').animate({
				scrollTop: $($.attr(this, 'href')).offset().top - 64,
			}, 600);
			return false;
		});
	}
}

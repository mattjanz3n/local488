//=================================\\
// Hide Google Maps on mobail \\
//=================================\\
const localArticle = $('.our-offices-article');

export default function hideMap() {
	localArticle.find('.our-offices-article__view-map-link').on('click', function () {

		if (localArticle.length) {

			let currentItem = $(this);
			let currentMap = currentItem.next('.acf-map');


			if ($(this).hasClass('local-opened')) {
				currentMap.slideUp();
				$(this).removeClass('local-opened');
				$(this).find('.our-offices-article__view-map-text').text('View Map');

			} else {
				currentMap.slideDown();
				$(this).addClass('local-opened');
				$(this).find('.our-offices-article__view-map-text').text('Hide Map');
			}
		}
	});
}
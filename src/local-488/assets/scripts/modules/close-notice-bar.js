export default function closeNotice() {
	$(window).load(function(){
		let $noticeHeight = $('.notice-bar__wrap').innerHeight();
		$('.hero__wrap').css('margin-top', function () {
			return $noticeHeight + 'px';
		});

		$('.hero-section__wrap').css('margin-top', function () {
			return $noticeHeight + 'px';
		});

		$('.notice-bar__close-btn').on('click', function () {

			let d = new Date();
			//change here how many day this is visible
			const expDays = 7;
			d.setTime(d.getTime() + (expDays*24*60*60*1000));
			document.cookie = `isClosedNotice=true; expires=${d.toUTCString()}; path=/;`;

			$('.hero__wrap').css('margin-top', function () {
				return 0 + 'px';
			});
			$('.hero-section__wrap').css('margin-top', function () {
				return 0 + 'px';
			});
			$('.notice-bar').hide(100);
		})
	});
}

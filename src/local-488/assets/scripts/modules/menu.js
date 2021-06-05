export default function menu () {
	$(window).scroll(function() {
		var height = $(window).scrollTop();
		if(height > 70){
			$('.header').addClass('scrolled');
			$('.header__nav').addClass('scrolled');
			$('.navbar-nav').addClass('scrolled');
		} else{
			$('.header').removeClass('scrolled');
			$('.header__nav').removeClass('scrolled');
			$('.navbar-nav').removeClass('scrolled');
		}
	});

	function showPageMenu () {
		let $body = $('body'),
			$header = $('.header'),
			$menuItem = $('.menu-item');

			$body.addClass('menu-page-opened');
			$header.addClass('menu-open');
			$menuItem.removeClass('show');
	}

	function hidePageMenu () {
		let $body = $('body'),
			$currentItem = $('.header__current-item'),
			$header = $('.header');

		$body.removeClass('menu-page-opened');
		$header.removeClass('menu-open');
		$currentItem.html('');
	}

	function arrowLevelUpMenu () {
		if ($mobileHeaderMenu.hasClass('level-2')) {
			$mobileHeaderMenu.removeClass('level-2');
			$('.dropdown-firs-level').removeClass('show');
			$searchMobile.removeClass('show');
			$currentMobileItem.html('');
		}
	}

	let $menuItem = $('.dropdown-firs-level'),
		$menuItemLink = $('.first-level-item'),
		$searchIcon = $('.secondary-item__search--desktop'),
		$searchInput = $('.header__search'),
		$secondaryMenuItem = $('.second-level-item'),
		$arrowMenuUp = $('.arrow-menu-up'),
		$currentMobileItem = $('.current-mobile-item'),
		$mobileHeaderMenu = $('.navbar-collapse__mobile-header'),
		$searchIconMobile = $('.secondary-item__search--mobile a'),
		$searchMobile = $('.header__search--mobile');

	$arrowMenuUp.on('click', function (e) {
		e.preventDefault();
		arrowLevelUpMenu();
	})

	$secondaryMenuItem.on('click', function (e) {
		e.preventDefault();
		let $currentMenuItem = $(this),
			$currentMenuItemParent = $currentMenuItem.parent('li');
		$currentMenuItemParent.toggleClass('show');
	})

	$searchIconMobile.on('click', function (e) {
		e.preventDefault();
		let $searchIconMobile = $(this),
			$searchIconMobileTitle = $searchIconMobile.attr("title");
		$currentMobileItem.html($searchIconMobileTitle);
		$mobileHeaderMenu.addClass('level-2');
		$searchMobile.addClass('show');
	})

	$menuItem.hover(function () {
		let $currentMenuItem = $(this),
			$currentItemTitle = $(this).children('.first-level-item').attr("title"),
			$currentItem = $('.header__current-item');
		$('.header__search').removeClass('show');
		$('.secondary-item__search--desktop').removeClass('show');
		if ($currentMenuItem.hasClass('show')) {
			$currentMenuItem.removeClass('show');
			$('.menu-item').removeClass('show');
			hidePageMenu();
		} else {
			$currentItem.html($currentItemTitle);
			showPageMenu();
			$currentMenuItem.addClass('show');
		}
	});

	$searchIcon.on('click', function (e) {
		e.preventDefault();
			let $currentItemTitle = $(this).children('a').attr("title"),
				$currentItem = $('.header__current-item');

			if ($searchIcon.hasClass('show')) {
				$searchIcon.removeClass('show');
				$searchInput.removeClass('show');
				hidePageMenu();
			} else {
				$currentItem.html($currentItemTitle);
				$searchIcon.addClass('show');
				$searchInput.addClass('show');
				showPageMenu();
			}
	})

	$menuItemLink.on('click', function (e) {
		e.preventDefault();
		let $currentMenuItem = $(this),
			$currentItemTitle = $(this).attr("title"),
			$currentMenuItemParent = $currentMenuItem.parent('li');
		$('.dropdown-firs-level').removeClass('show');
		$currentMobileItem.html($currentItemTitle);
		if ($currentMenuItemParent.hasClass('show')) {
			$currentMenuItemParent.removeClass('show');
			$mobileHeaderMenu.removeClass('level-2');
			hidePageMenu();
		} else {
			$currentMenuItemParent.addClass('show');
			$mobileHeaderMenu.addClass('level-2');
		}
	})

	function closeMobileToggler () {
		if ($('#primaryNavBar').hasClass('show')) {
			$('.header').removeClass('is-open').removeClass('menu-open');
			$('.navbar-toggler').removeClass('open');
			$("body").removeClass('overflow');
			$("html").removeClass('overflow');
			$('.menu-item').removeClass('show');
		} else {
			$('body').addClass('overflow');
			$("html").addClass('overflow');
			$('.header').addClass('is-open');
			$('.navbar-toggler').addClass('open');
		}
	}

	$(".navbar-toggler").on("click", function (e) {
		e.preventDefault();
		closeMobileToggler();
		arrowLevelUpMenu();
	});

	if ($(window).width() < 1200) {
		$menuItem.off( "mouseenter mouseleave" );
	}

	$( window ).resize(function() {
		if ($(window).width() < 1199.8) {
			$(".navbar-toggler").removeClass('collapse');
			$searchIconMobile.on('click', function (e) {
				e.preventDefault();
				let $searchIconMobile = $(this),
					$searchIconMobileTitle = $searchIconMobile.attr("title");
				$currentMobileItem.html($searchIconMobileTitle);
				$mobileHeaderMenu.addClass('level-2');
				$searchMobile.addClass('show');
			})

			$menuItemLink.on('click', function (e) {
				e.preventDefault();
				let $currentMenuItem = $(this),
					$currentItemTitle = $(this).attr("title"),
					$currentMenuItemParent = $currentMenuItem.parent('li');
				$('.dropdown-firs-level').removeClass('show');
				$currentMobileItem.html($currentItemTitle);
				if ($currentMenuItemParent.hasClass('show')) {
					$currentMenuItemParent.removeClass('show');
					$mobileHeaderMenu.removeClass('level-2');
					hidePageMenu();
				} else {
					$currentMenuItemParent.addClass('show');
					$mobileHeaderMenu.addClass('level-2');
				}
			})

			$('.navbar-toggler').removeClass('open');
			$('.navbar-collapse').removeClass('show');
			$('.menu-item').removeClass('show');
			$('.dropdown-firs-level').removeClass('show');
			arrowLevelUpMenu();
			hidePageMenu();

		} else {
			$('.menu-item').removeClass('show');
			$('body').removeClass('menu-page-opened').removeClass('overflow');
			$('.header').removeClass('menu-open').removeClass('is-open');
			$('.header__search').removeClass('show');
			$('html').removeClass('overflow');
		}
	});
}

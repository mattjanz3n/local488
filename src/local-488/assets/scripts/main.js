// import external dependencies

import 'jquery';

// Import everything from autoload
import './autoload/**/*';
import menu from './modules/menu';
import shortenTheWord from './modules/local-shorten-the-word';
import changeCertificate from './modules/certificate-change';
import accordionTopScroll from './modules/accordion-scroll-on-top';
import closeNotice from './modules/close-notice-bar';
import postsSort from './modules/posts-filter';
import anchorBottomScroll from './modules/anchor-down';
import blockImageSlider from './modules/block-image-slider';
import googleMaps from './modules/local-google-map';
import hideMap from './modules/local-hide-google-map';
import selectStyle from './modules/local-select-style';
import addColumnClassParent from './modules/add-column-parent-class';
import categoriesPostsSort from './modules/local-categories-posts-filter';
import categoriesNewsAndEventsPostsSort from './modules/local-categories-news-and-events-posts-filter';
import newsCookieCount from './modules/news-cookies-count';

jQuery( document ).ready( () => {
	googleMaps();
	hideMap();
	menu();
	newsCookieCount();
	shortenTheWord();
	changeCertificate();
	accordionTopScroll();
	selectStyle();

	if ( $( '.news-and-events-content-section__button' ).length ) {
		categoriesNewsAndEventsPostsSort();
	}

	if ( $( '.community-involvment' ).length ) {
		categoriesPostsSort();
	}

	if ( $( '.notice-bar__wrap' ).length ) {
		closeNotice();
	}
	if ( $( '#single-page-posts-section__wrapper' ).length ) {
		postsSort();
	}

	if ( $( '.hero-section__anchor' ).length ) {
		anchorBottomScroll();
	}

	if ( $( '.images__wrap' ).length ) {
		blockImageSlider();
	}

	if ( $( '.wp-block-columns' ).length ) {
		addColumnClassParent();
	}
} );

(function($) {

	'use strict';

	// ------------------------------
	// Magnific Popup
	// ------------------------------
	$('a').filter(function(){
		return this.href.toLowerCase().match(/\.(jpg|jpeg|png|gif|svg)$/);
	}).magnificPopup({
		type: 'image'
	});


	// ------------------------------
	// jquery.SmoothScroll
	// ------------------------------

	// Except
	$('[data-toggle^="tab"]').addClass('noscroll');

	$('[href^="#"]:not(".noscroll")').SmoothScroll({
		duration: 700,
		easing: 'swing',
		offset: 0,
		hash: false
	});


	// ------------------------------
	// Flex Video
	// ------------------------------
	$('iframe[src*="youtube.com"], iframe[src*="vimeo.com"]').each(function() {
		if ( $(this).innerWidth() / $(this).innerHeight() > 1.5 ) {
			$(this).wrap("<div class='embed-responsive embed-responsive-16by9'/>");
		} else {
			$(this).wrap("<div class='embed-responsive'/>");
		}
	});



})(jQuery);
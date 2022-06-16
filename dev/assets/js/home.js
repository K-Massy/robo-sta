(function($) {

	'use strict';


	$(document).ready(function(){
		const target_hero = $('.js-hero')
		target_hero.slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		dots: true,
		arrows: false,
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: false,
					slidesToShow: 1,
					arrows: false,
					dots: true,
				}
			}
		]
		});
		target_hero.slick("slickSetOption", "slidesToScroll", 1);
		const target_post = $('.js-list')
		target_post.slick({
		slidesToShow: 4,
		slidesToScroll: 1,
		dots: false,
		infinite: false,
		prevArrow: '<button class="prev arrow">←</button>',
		nextArrow: '<button class="next arrow">→</button>',
		responsive: [
			{
				breakpoint: 768,
				settings: {
					centerMode: false,
					slidesToShow: 1,
					arrows: false,
					dots: true,
				}
			}
		]
		});
		target_post.slick("slickSetOption", "slidesToScroll", 5);
	});





})(jQuery);
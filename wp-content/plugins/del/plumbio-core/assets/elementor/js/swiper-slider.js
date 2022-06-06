

(function ($) { 

    "use strict";


	var swiper_sliderjs = function ($scope, $) {
	/*
		Carusel
	*/
	(function(){
		function initCarusel(searchpoint){
			document.querySelectorAll('#' + searchpoint + ' [data-carousel="swiper"]').forEach(function(objCarusel){
				var slidesXXl = objCarusel.dataset.slidesXxl,
					slidesXl = objCarusel.dataset.slidesXl,
					slidesLg = objCarusel.dataset.slidesLg,
					slidesMd = objCarusel.dataset.slidesMd,
					slidesSm = objCarusel.dataset.slidesSm,
					slidesSm = objCarusel.dataset.slidesSm,
					autoplayDelay = objCarusel.dataset.autoplayDelay,
					spaceBetween = Number(objCarusel.dataset.spaceBetween),
					arrowLeft = objCarusel.getElementsByClassName("swiper-next")[0],
					arrowRight = objCarusel.getElementsByClassName("swiper-prev")[0];
	
	
				var swiper = new Swiper(objCarusel, {
					watchOverflow:true,
					spaceBetween:  spaceBetween  || 15,
					pagination: {
						el: '.swiper-pagination',
						clickable: true,
					},
					navigation: {
						nextEl: arrowLeft,
						prevEl: arrowRight,
						clickable: true
					},
					autoplay:{
						delay:autoplayDelay || 5000,
						stopOnLastSlide: false,
						disableOnInteraction: false
					},
					autoHeight:true,
	
					speed: 1000,
					breakpoints: {
						320: {
							slidesPerView: slidesSm || 2
						},
						576: {
							slidesPerView: slidesMd || 2,
							autoHeight: true,
						},
						768: {
							slidesPerView: slidesLg || 2,
							spaceBetween:  spaceBetween  || 30,
						},
						1025: {
							slidesPerView: slidesXl || 3
						},
						1500: {
							slidesPerView: slidesXXl || 3
						}
					},
					preloadeImages: false
	
				});
				window.addEventListener('resize', function () {
					var timer;
					if (timer) {
						clearTimeout(timer);
					}
					timer = setTimeout(function(){
						swiper.updateAutoHeight();
					}, 200);
				});
				window.addEventListener('DOMContentLoaded', function () {
					var timer;
					if (timer) {
						clearTimeout(timer);
					}
					timer = setTimeout(function(){
						swiper.update();
					}, 200);
				});
			});
		};
		initCarusel('tt-pageContent');
	})();
	}
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_team.default', swiper_sliderjs);
		elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_product_grid.default', swiper_sliderjs);
		elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_testimonial.default', swiper_sliderjs);
		elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_blog.default', swiper_sliderjs);
		elementorFrontend.hooks.addAction('frontend/element_ready/special_offers.default', swiper_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_our_service.default', swiper_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/additional_service_slider.default', swiper_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/certificates.default', swiper_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/service_plans.default', swiper_sliderjs);
	});
	
})(window.jQuery);
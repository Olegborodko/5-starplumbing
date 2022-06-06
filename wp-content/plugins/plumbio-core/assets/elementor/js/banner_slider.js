(function ($) { 

    "use strict";

    var banner_sliderjs = function ($scope, $) {
        
        var interleaveOffset = 0.5,
        mainSlider =  document.getElementById('js-mainslider');
    
        if(mainSlider){
            var swiperOptions = {
                loop: true,
                speed: 1500,
                watchOverflow:true,
                grabCursor: true,
                watchSlidesProgress: true,
                mousewheelControl: true,
                keyboardControl: true,
                loop: true,
                observer: true,
                observeParents: true,
                slidesPerView: 'auto',
                navigation: {
                    nextEl: ".mainslider__button-next",
                    prevEl: ".mainslider__button-prev"
                },
                autoplay: {
                    delay: 9000
                },
                on: {
                    progress: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                        var slideProgress = swiper.slides[i].progress;
                        var innerOffset = swiper.width * interleaveOffset;
                        var innerTranslate = slideProgress * innerOffset;
                        swiper.slides[i].querySelector(".mainslider__imgbg").style.transform =
                            "translate3d(" + innerTranslate + "px, 0, 0)";
                        }
                    },
                    touchStart: function() {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = "";
                        }
                    },
                    setTransition: function(speed) {
                        var swiper = this;
                        for (var i = 0; i < swiper.slides.length; i++) {
                        swiper.slides[i].style.transition = speed + "ms";
                        swiper.slides[i].querySelector(".mainslider__imgbg").style.transition =
                            speed + "ms";
                        }
                    }
                },
                breakpoints: {
                    600: {
                        speed: 1200
                    },
                }
            };
            var swiper = new Swiper(mainSlider, swiperOptions);
        }
	}
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_banner_slider.default', banner_sliderjs);
    });
})(window.jQuery);
(function ($) { 

    "use strict";

    var two_items_sliderjs = function ($scope, $) {
        
        
        var swiper = new Swiper('.two-items-slider', {
            slidesPerView: 2,
            spaceBetween: 30,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });

    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_blog.default', two_items_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/special_offers.default', two_items_sliderjs);
    });
})(window.jQuery);
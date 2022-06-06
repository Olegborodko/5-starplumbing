(function ($) { 

    "use strict";

    var one_item_sliderjs = function ($scope, $) {
        
        
        var swiper = new Swiper('.one-item-slider', {
            slidesPerView: 1,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });

    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_testimonial.default', one_item_sliderjs);
    });
})(window.jQuery);
(function ($) { 

    "use strict";

    var three_items_sliderjs = function ($scope, $) {
        
        
        var swiper = new Swiper('.three-items-slider', {
            slidesPerView: 3,
            spaceBetween: 30,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });

    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_our_service.default', three_items_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/additional_service_slider.default', three_items_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/certificates.default', three_items_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/service_plans.default', three_items_sliderjs);
    });
})(window.jQuery);
(function ($) { 

    "use strict";

    var four_items_sliderjs = function ($scope, $) {
        
        
        var swiper = new Swiper('.four-items-slider', {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
              el: '.swiper-pagination',
              clickable: true,
            },
          });

    }
    $(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_team.default', four_items_sliderjs);
        elementorFrontend.hooks.addAction('frontend/element_ready/plumbio_product_grid.default', four_items_sliderjs);
    });
})(window.jQuery);
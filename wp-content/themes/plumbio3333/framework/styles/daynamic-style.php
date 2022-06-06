<?php
function plumbio_get_custom_styles() {

	global $plumbio_options;
	$redix_opt_prefix = 'plumbio_';

	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'primary_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'primary_color' ] ) ) ) {
		$plumbio_main_color = $plumbio_options[ $redix_opt_prefix . 'primary_color' ];
	}

	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'secondary_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'secondary_color' ] ) ) ) {
		$plumbio_secondary_color = $plumbio_options[ $redix_opt_prefix . 'secondary_color' ];
  }
  
	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'third_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'third_color' ] ) ) ) {
		$plumbio_third_color = $plumbio_options[ $redix_opt_prefix . 'third_color' ];
  }

  

	ob_start();
	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'primary_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'primary_color' ] ) ) ) {
		?>

	/* template-color */
  .tt-header {
	  background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-header-holder {
	  background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .desktopmenu nav > ul > li > a {
	  color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .h-infobox svg {
	  fill: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-btn {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
	border: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-btn:after {
	  background: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .desktopmenu nav > ul > li.has-submenu > a:before {
	  border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .desktopmenu nav > ul ul li a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .desktopmenu nav li.is-active > a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .mainslider__button:before {
	border-bottom: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .mainslider__button:after {
	border-top: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .mainslider__button {
	  color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .mainslider__button:hover {
	  color: <?php echo esc_attr( $plumbio_main_color ); ?>; 
  }

  .blocktitle__title {
	  color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .imgbox-inner__description-large {
	  background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .imgbox-inner__description-small .imgbox-inner__title .tt-icon:before {
	  color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .imgbox-inner__description-small .imgbox-inner__title .tt-title .tt-text-01 {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-popup__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .info-box__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .info-box__img svg {
	fill: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-icon-list a:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-icon-list a:before {
	border-bottom: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-icon-list a:after {
	border-top: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .imgbox-inner__description-small .tt-icon-box {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .swiper-pagination-bullet:before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .imgbox-inner__description-large .tt-external-link {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list__color01 {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-data01__text .tt-text01 {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-label-01 {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tabs__nav-item {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tabs__nav-item.active:before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-data04__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .additional__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .step .step__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-subtitle {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-additional__bg01:after {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-form__group .tt-btn-inner {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-form__control:focus {
	border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-collapse__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-collapse__title:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-testimonials__separator-bg:before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .testimonials-item__caption strong {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .layout05__content .blocktitle:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .swiper__button {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .swiper__button:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .swiper__button:before {
	border-bottom: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .swiper__button:after {
	border-top: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news01__title a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news01__row > * .tt-icon {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news01__row a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news02__title a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news02__data:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news02__data:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news02__extra-link {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-news02__info a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .f-info__icon:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .f-info__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .footer-layout {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-back-to-top:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-base-color {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .personal-02__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .personal-02__slide > * {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
	border: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .personal-02__slide > *:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .personal-03__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .layout03_bg {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .layout03_bg:before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .location__list li a span {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .img-lightbox:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .img-lightbox:before {
	border-bottom: 5px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 5px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .img-lightbox:after {
	border-top: 5px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 5px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-coupon__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-coupon__print {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-coupon__print:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-product__price {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside02__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-menu li a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-menu li a:before {
	border-bottom: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-menu li a:after {
	border-top: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-menu li:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-data03:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .promo01 {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .logo-item:before {
	border-bottom: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .logo-item:after {
	border-top: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }

  .table-price tr td:last-child {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .promo-price__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .promo-price__price .text02 {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post__title a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post__img:before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post .tt-post__row:nth-child(1):before {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside01__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .wp-calendar-table thead th {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-form__group .tt-btn-inner-right {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list02 li a:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list02 li a:before {
	border-bottom: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-left: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list02 li a:after {
	border-top: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
	border-right: 1px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-post__title a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-post__data:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-aside-post__info a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post__subtitle {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  blockquote:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  blockquote:after {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .singlepost__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-comments__btn {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
	border: 2px solid <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-comments__btn:after {
	background: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-product__title a:hover {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce .widget_price_filter .ui-slider .ui-slider-range {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce .widget_price_filter .price_slider_amount .button {
	border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
	color: <?php echo esc_attr( $plumbio_main_color ); ?> !important;
  }
  .product_list_widget span.woocommerce-Price-amount.amount {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-pagination li > span:not(.tt-pagination__btn), .tt-pagination li a:not(.tt-pagination__btn) {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-pagination li > span:not(.tt-pagination__btn):hover, .tt-pagination li a:not(.tt-pagination__btn):hover {
	background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .custom-select select:focus {
	border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .product-single___title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .product-single___price {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .customer-comment .info h4 a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-form__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list04 li strong {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list04 li i {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-dot-info strong {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-dot-info:before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-mobile-menu nav > ul > li a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-mobile-menu .link__open-submenu:before {
	border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  @media (max-width: 767px){
	.layout05:before {
		color: <?php echo esc_attr( $plumbio_main_color ); ?>;
	}
  }
  .tt-filters__toggle {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .custom-select:after {
	border-color: <?php echo esc_attr( $plumbio_main_color ); ?> transparent transparent transparent;
  }
  .woocommerce-message::before {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce-message {
	border-top-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  tbody tr th, thead th {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post__row .tt-icon {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-post__row a {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-modal__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-data02__title {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .tt-list-info li strong {
	color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .logo-popup__text {
    color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .logo-popup__icon {
    fill: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .testimonials02__icon {
    color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .testimonials02__title {
    color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .testimonials02__caption strong {
    color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button {
    background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover {
    color: <?php echo esc_attr( $plumbio_main_color ); ?> !important;
    border-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }
  .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt {
    background-color: <?php echo esc_attr( $plumbio_main_color ); ?>;
  }


		<?php
	}
	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'secondary_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'secondary_color' ] ) ) ) {
		?>
  .tt-popup__toggle {
	  background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .mainslider__wrapper:before {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .blocktitle__subtitle {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-notes:after {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .imgbox-inner__title .tt-icon:before {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-list__color02 li:before {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-list__color02 li:before {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .imgbox-inner__title .tt-title .tt-text-02 {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .imgbox-inner__description-small .imgbox-inner__title .tt-title .tt-text-02 {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .imgbox-inner__description-large .tt-external-link:hover {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-data01__icon:before {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-modal__close {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .fullwidth-promo .tt-icon > * {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .blocktitle__subtitle:before {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-data04__icon > * {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-data02__icon > * {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .additional__icon:before {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-collapse__title:hover {
	color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-btn__video {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-btn__video {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-btn__video:after {
	border-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-btn__video:hover {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .mainslider__layout02 .mainslider__text:before {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .mainslider__layout01 .mainslider__title:before {
	background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-collapse__title:before {
    border-left-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-news02__title a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-news02__info a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-back-to-top {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .desktopmenu nav > ul > li > a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .h-info-list .tt-title {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .h-info-list svg {
    fill: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .h-icon__title {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-popup__close {
    background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-gallery__icon {
    background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-pagetitle:before {
    background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .promo-price__icon i {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .promo-price__price .text01 {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-post__title a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  #today {
    background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-aside-post__title a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .tt-post__imglink .tt-icon > * {
    background-color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  .f-social-icon li a:hover {
    color: <?php echo esc_attr( $plumbio_secondary_color ); ?>;
  }
  <?php
	}
	if ( ( isset( $plumbio_options[ $redix_opt_prefix . 'third_color' ] ) ) && ( ! empty( $plumbio_options[ $redix_opt_prefix . 'third_color' ] ) ) ) {
		?>

    .h-infobox address a {
        color: <?php echo esc_attr( $plumbio_third_color ); ?>;
    }
    .f-info address {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
   }
   .tt-rating {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-btn02 {
    background: <?php echo esc_attr( $plumbio_third_color ); ?>;
    border: 2px solid <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-coupon__subtitle {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-coupon__label {
    background-color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-coupon__label:before {
    background-color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-base-color04 {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-product__img .btn-addtocart {
    background-color: <?php echo esc_attr( $plumbio_third_color ); ?>;
    border: 2px solid <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-product__price ins, .tt-product__price .new-price {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-product__price ins, .tt-product__price .new-price {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-product__img .tt-label-location .tt-label-new {
    background-color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .star-rating {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-btn02:hover {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .tt-tabs-reviews .customer-comment .comment .rating .star-rating {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }
  .woocommerce p.stars a {
    color: <?php echo esc_attr( $plumbio_third_color ); ?>;
  }




		<?php
  }


	$plumbio_custom_css = ob_get_clean();

	return $plumbio_custom_css;
}


<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package plumbio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="format-detection" content="telephone=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php wp_head(); ?>
	<?php $curUrl = 'http'.((isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']!=='off')?'s':'').'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>
	<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Plumber",
		  "name": "5 Star Plumbing",
		  "image": "https://5-starplumbing.com/wp-content/uploads/2021/06/LOGO-WEB-1.png",
		  "@id": "https://schema.org/LocalBusiness",
		  "url": "https://5-starplumbing.com/",
		  "telephone": "(916)796-1233",
		  "address": {
			"@type": "PostalAddress",
			"streetAddress": "Roseville Rd #109",
			"addressLocality": "North Highlands",
			"addressRegion": "CA",
			"postalCode": "95660",
			"addressCountry": "US"
		  },
		  "geo": {
			"@type": "GeoCoordinates",
			"latitude": 38.7020693,
			"longitude": -121.3317341
		  },
		  "openingHoursSpecification": [{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": [
			  "Monday",
			  "Tuesday",
			  "Wednesday",
			  "Thursday",
			  "Friday"
			],
			"opens": "07:00",
			"closes": "18:00"
		  },{
			"@type": "OpeningHoursSpecification",
			"dayOfWeek": [
			  "Saturday",
			  "Sunday"
			],
			"opens": "07:00",
			"closes": "16:00"
		  }],
		  "sameAs": "https://www.facebook.com/5StarPlumbing/" 
		}
	</script>
	<script type="application/ld+json">
	{
	  "@context": "https://schema.org/", 
	  "@type": "Product", 
	  "name": "5 Star Plumbing",
	  "image": "https://5-starplumbing.com/wp-content/uploads/2021/06/LOGO-WEB-1.png",
	  "description": "Certificated, skilled, and trustworthy premier plumbers. We provide quality, sustainability, and value. Contact us to receive a notch-carving service, repair, and adjustment.",
	  "brand": {
		"@type": "Brand",
		"name": "5 Star Plumbing"
	  },
	  "sku": "111",
	  "offers": {
		"@type": "AggregateOffer",
		"url": "<?php echo $curUrl; ?>",
		"priceCurrency": "USD"
	  },
	  "aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "4.9",
		"bestRating": "5",
		"worstRating": "1",
		"ratingCount": "1882"
	  }
	}
	</script>
	<!-- Meta Pixel Code -->

	<script>

	!function(f,b,e,v,n,t,s)

	{if(f.fbq)return;n=f.fbq=function(){n.callMethod?

	n.callMethod.apply(n,arguments):n.queue.push(arguments)};

	if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';

	n.queue=[];t=b.createElement(e);t.async=!0;

	t.src=v;s=b.getElementsByTagName(e)[0];

	s.parentNode.insertBefore(t,s)}(window, document,'script',

	'https://connect.facebook.net/en_US/fbevents.js%27);

	fbq('init', '2040859269445789');

	fbq('track', 'PageView');

	</script>

	<noscript><img height="1" width="1" style="display:none"

	src="https://www.facebook.com/tr?id=2040859269445789&ev=PageView&noscript=1"

	/></noscript>

<!-- End Meta Pixel Code -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PLMFNDZ');</script>
<!-- End Google Tag Manager -->
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PLMFNDZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php wp_body_open(); ?>
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
		get_template_part( 'components/header/header' );
		?>
	<?php } ?>
	<?php do_action( 'plumbio_breadcrumb' ); ?>
	<div id="tt-pageContent">

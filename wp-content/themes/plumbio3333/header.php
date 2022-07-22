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

</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'header' ) ) { ?>
		<?php
		get_template_part( 'components/header/header' );
		?>
	<?php } ?>
	<?php do_action( 'plumbio_breadcrumb' ); ?>
	<div id="tt-pageContent">

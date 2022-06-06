<?php
$header_style = plumbio_get_options( 'header_style' );

if ( ! $header_style ) {
	$header_style = '1';
}
 get_template_part( 'components/header/header-style/header-style', $header_style );

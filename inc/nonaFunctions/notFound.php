<?php

//remove breadcrumb 
function notFoundCss() {

	wp_register_style( 'notFoundCss',  get_template_directory_uri().'/assets/css/nona/not-found.css');
	wp_enqueue_style( 'notFoundCss' );
}

add_action( 'wp_enqueue_scripts', 'notFoundCss');
remove_action( 'homepage', 'storefront_popular_products', 50 );

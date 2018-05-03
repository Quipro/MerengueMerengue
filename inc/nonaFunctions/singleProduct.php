<?php

//remove breadcrumb 
function productCss() {

	wp_register_style( 'productCss',  get_template_directory_uri().'/assets/css/nona/single-product.css');
	wp_enqueue_style( 'productCss' );
}

//remove some tabs data
function woo_remove_product_tabs( $tabs ) {

  //  unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

add_action( 'wp_enqueue_scripts', 'productCss');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action('woocommerce_after_add_to_cart_button','woocommerce_output_product_data_tabs', 10);

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );


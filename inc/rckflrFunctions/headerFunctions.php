<?php
//Agregar barra al header y controlar conte
function wpb_widgets_init() {
 
    register_sidebar( array(
        'name'          => 'Barra superiro',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="mm-widget-top columns-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="mm-title">',
        'after_title'   => '</h2>',
    ) );
 
}
add_action( 'widgets_init', 'wpb_widgets_init' );
remove_action( 'storefront_header', 'storefront_product_search', 40 );
remove_action( 'storefront_header', 'storefront_header_cart',    60 );
add_action( 'storefront_header', 'storefront_header_cart', 40 );

// Register Style
function header_rckflr_styles() {

	wp_register_style( 'rckflrHeader', get_template_directory_uri() .'/assets/css/RCKFLR/header.css', false, false );
	wp_enqueue_style( 'rckflrHeader' );

}
add_action( 'wp_enqueue_scripts', 'header_rckflr_styles' );

?>
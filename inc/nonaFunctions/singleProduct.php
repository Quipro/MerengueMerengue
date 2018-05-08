<?php

//remove breadcrumb 
function productCss() {

	wp_register_style( 'productCss',  get_template_directory_uri().'/assets/css/nona/single-product.css');
	wp_enqueue_style( 'productCss' );
}

/**	 * Remove existing tabs from single product pages.	 
*/	
function remove_woocommerce_product_tabs( $tabs ) {		
	//unset( $tabs['description'] );		
	unset( $tabs['reviews'] );		
	unset( $tabs['additional_information'] );		
	return $tabs;	
}	

add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );		

/**	 * Hook in each tabs callback function after single content.	 */	
add_action( 'woocommerce_after_add_to_cart_button', 'woocommerce_product_description_tab' );	
add_action( 'woocommerce_after_add_to_cart_button', 'woocommerce_product_additional_information_tab' );	
add_action( 'woocommerce_after_single_product', 'comments_template' );


add_action( 'wp_enqueue_scripts', 'productCss');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//add_action('woocommerce_after_add_to_cart_button','woocommerce_output_product_data_tabs', 10);

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
    remove_theme_support( 'wc-product-gallery-lightbox' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );

add_action( 'woocommerce_before_add_to_cart_form', 'custom_action_after_single_product_title', 6 );

//Obtener nombre de repostera
function custom_action_after_single_product_title() { 
    global $product; 
	    $terms = get_the_terms( $post->ID, 'repostera' ); 
	    echo '<table>';
	    	echo '<tr>';
	    		echo '<th style="width: 3.9em; padding-right:0;">';
	    			echo '<img class="reposteraPhoto" srcset="'.get_template_directory_uri().'/assets/images/customizer/notFoundPage/galleta.png">';
	    		echo '</th>';
	    		echo '<th>';
		    		echo '<p>Hecho por: </p>';
		     		echo '<p>'. $term->name .'</p>';
		     		echo '<a href="#">Ver más postres de esta repostera</a>';
	     		echo '</th>';
     		echo '</tr>';
        echo '</table>';
   /* foreach($terms as $term) {	
    }*/
}



//Peut être
/*add_filter( 'woocommerce_output_related_products_args', 'hff_commerce_child_related_products_args', 99, 3 );
 
  function hff_commerce_child_related_products_args( $args ) {
	  
	//  echo("RELATED :::");
    $args = array( 
        'posts_per_page' => 4,  
        'columns' => 4,  
        'orderby' => 'DESC',  
 ); 
 	return $args;
}*/



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
?>
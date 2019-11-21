<?php

require get_stylesheet_directory() . '/lib/shortcodes.php';

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css?' . time(), array( 'fontawesome','mcluhan-style','mcluhan-style' ) );
        wp_enqueue_script( 'mcluhan_child_global', get_stylesheet_directory_uri() . '/assets/js/global.js', array( 'jquery' ), '', true );

    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

// END ENQUEUE PARENT ACTION


add_filter("post_type_link", "mcluhan_post_type_link", 99, 4);
function mcluhan_post_type_link($permalink, $post, $leavename, $sample) {
  if ($post->post_type == "product") {
    global $product;
    return $product->product_url; 
  } else {
    return $permalink;
  }
}

add_filter( 'woocommerce_product_add_to_cart_text', 'wc_archive_custom_cart_button_text' );
function wc_archive_custom_cart_button_text() {
  return __( 'SHOP', 'woocommerce' );
}

add_filter("woocommerce_loop_add_to_cart_link", "mcluhan_woocommerce_loop_add_to_cart_link", 99, 3);
function mcluhan_woocommerce_loop_add_to_cart_link($result, $product, $args) {
  return sprintf( '<a target="_blank" href="%s" data-quantity="%s" class="%s" %s>%s</a>',
		esc_url( $product->add_to_cart_url() ),
		esc_attr( isset( $args['quantity'] ) ? $args['quantity'] : 1 ),
		esc_attr( isset( $args['class'] ) ? $args['class'] : 'button' ),
		isset( $args['attributes'] ) ? wc_implode_html_attributes( $args['attributes'] ) : '',
		esc_html( $product->add_to_cart_text() )
  );
}

function mcluhan_create_table() {
  
} 
add_action( 'wp', 'mcluhan_create_table' );

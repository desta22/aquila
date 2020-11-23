<?php

/**
 * Theme Functions
 * 
 * @package Aquila
 */

// ******************** Crunchify Tips - Clean up WordPress Header START ********************** //
function aquila_remove_version() {
	return '';
}
add_filter('the_generator', 'aquila_remove_version');
 
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);
 
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
 
function aquila_cleanup_query_string( $src ){ 
	$parts = explode( '?', $src ); 
	return $parts[0]; 
} 
add_filter( 'script_loader_src', 'aquila_cleanup_query_string', 15, 1 ); 
add_filter( 'style_loader_src', 'aquila_cleanup_query_string', 15, 1 );
// ******************** Clean up WordPress Header END ********************** //



add_theme_support('title-tag');

function aquila_enqueue_script()
{
    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/src/lib/bootstrap/css/bootstrap.min.css', [], '', 'all');
    wp_register_style('aquila-css', get_stylesheet_uri(), [], '', 'all');

    wp_register_script('aquila-main-js', get_template_directory_uri().'/assets/main.js', ['jquery'], false, true);
    wp_register_script('bootstrap-js', get_template_directory_uri().'/assets/src/lib/bootstrap/js/bootstrap.bundle.min.js', ['jquery'], false, true);

    
    wp_enqueue_style('aquila-css');
    wp_enqueue_style('bootstrap-css');

    wp_enqueue_script('bootstrap-js');
    wp_enqueue_script('aquila-main-js');
}
add_action('wp_enqueue_scripts', 'aquila_enqueue_script');

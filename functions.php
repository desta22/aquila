<?php

use AQUILA_THEME\Inc\AQUILA_THEME;

/**
 * Theme Functions
 * 
 * @package Aquila
 */


// ******************** Crunchify Tips - Clean up WordPress Header START ********************** //
function aquila_remove_version()
{
    return '';
}
add_filter('the_generator', 'aquila_remove_version');

remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('template_redirect', 'rest_output_link_header', 11, 0);

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');

function aquila_cleanup_query_string($src)
{

    $google_font_url = 'fonts.googleapis.com';
    if (strpos($src, $google_font_url) === false) {
        $parts = explode('?', $src);
        return $parts[0];
    }
    return $src;
}
add_filter('script_loader_src', 'aquila_cleanup_query_string', 15, 1);
add_filter('style_loader_src', 'aquila_cleanup_query_string', 15, 1);
// ******************** Clean up WordPress Header END ********************** //



if (!defined('AQUILA_DIR_PATH')) {
    define('AQUILA_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('AQUILA_DIR_URI')) {
    define('AQUILA_DIR_URI', untrailingslashit(get_template_directory_uri()));
}


require_once AQUILA_DIR_PATH . './inc/helpers/autoloader.php';

function aquila_get_theme_instance()
{
    \AQUILA_THEME\Inc\AQUILA_THEME::get_instance();
}

aquila_get_theme_instance();




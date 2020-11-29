<?php

/**
 * Enqueue Theme Assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Clean_Up_Header
{
    use Singleton;

    protected function __construct()
    {
        // Loade class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);

        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'wp_shortlink_wp_head');


        //  Filters
        add_filter('the_generator', [$this, 'aquila_remove_version']);

        add_filter('script_loader_src', [$this, 'aquila_cleanup_query_string'], 15, 1);
        add_filter('style_loader_src', [$this, 'aquila_cleanup_query_string'], 15, 1);
    }

    public function aquila_cleanup_query_string($src)
    {

        $google_font_url = 'fonts.googleapis.com';
        if (strpos($src, $google_font_url) === false) {
            $parts = explode('?', $src);
            return $parts[0];
        }
        return $src;
    }
    public function aquila_remove_version()
    {
        return '';
    }
}

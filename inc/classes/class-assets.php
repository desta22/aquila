<?php

/**
 * Enqueue Theme Assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Assets
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
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);

        //  Filters
    }

    public function register_styles()
    {
        // Register styles
        wp_register_style('google-fonts-css', 'https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600&family=Roboto:wght@300;400;700&display=swap', array(), null);
        wp_register_style('dist-vendor-css', AQUILA_DIR_URI . '/assets/dist/css/vendor.css', [], '', 'all');
        wp_register_style('dist-app-css', AQUILA_DIR_URI . '/assets/dist/css/app.css', [], '', 'all');

        // Enqueue styles
        wp_enqueue_style('google-fonts-css');
        wp_enqueue_style('dist-vendor-css');
        wp_enqueue_style('dist-app-css');
    }

    public function register_scripts()
    {
        // Register scripts
        wp_register_script('dist-app-js', AQUILA_DIR_URI . '/assets/dist/js/main.js', [], false, true);

        // Enqueue scripts
        wp_enqueue_script('dist-app-js');
    }
}

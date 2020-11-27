<?php

/**
 * Bootstraps the Theme.
 *
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class AQUILA_THEME
{
    use Singleton;

    protected function __construct()
    {
        // Loade class
        Assets::get_instance();
        Menus::get_instance();
        Meta_Boxes::get_instance();
        Admin_Assets::get_instance();

        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions
        add_action('after_setup_theme', [$this, 'setup_theme']);

        //  Filters
    }

    public function setup_theme()
    {
        // TODO add support for theme text domain | for translation

        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'height'      => 100,
            'width'       => 400,
            'flex-height' => true,
            'flex-width'  => true,
            'header-text' => ['site-title', 'site-description'],
            'unlink-homepage-logo' => true,
        ]);

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');

        // Register image sizes.
		add_image_size( 'featured-thumbnail', 350, 233, true );
		add_image_size('feature-large', 600, 400, true );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Switch default core markup for search form, comment form, comment-list, gallery, caption, script and style
         * to output valid HTML5.
         */
        add_theme_support('html5', ['comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script']);
  
        add_theme_support( 'wp-block-styles' );

        add_theme_support( 'align-wide' );

  
    }
}

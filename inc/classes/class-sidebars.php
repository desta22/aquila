<?php

/**
 * Registers Theme Sidebars
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Sidebars
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
        add_action(
            'widgets_init',
            [$this, 'aquils_register_sidebars']
        );
        add_action('widgets_init', [$this, 'aquila_register_widgets']);
      



        //  Filters
    }

    public function aquila_register_widgets()
    {
        register_widget('AQUILA_THEME\Inc\Clock_Widget');
        register_widget('AQUILA_THEME\Inc\Post_widget_2');
        
    }
   
    public function aquils_register_sidebars()
    {

        register_sidebar(
            [
                'name'          => __('Main Sidebar', 'aquila'),
                'id'            => 'sidebar-1',
                'description'   => __('Widgets in this area will be shown on all posts and pages.', 'aquila'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            ]
        );

        register_sidebar(
            [
                'name'          => __('Footer Widget Area 1', 'aquila'),
                'id'            => 'footer-widget-area-1',
                'description'   => __('Widgets in this area will be shown on all posts and pages.', 'aquila'),
                'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="footer-widget-title">',
                'after_title'   => '</h3>',
            ]
        );
    }
}

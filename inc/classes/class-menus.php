<?php 
/**
 * Register Menus
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Menus{
    use Singleton;

 protected function __construct()
    {
        // Loade class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions
        add_action('init', [$this, 'register_menues']);
       
    
        //  Filters
    }

    public function register_menues()
    {
        register_nav_menus([
            'aquila-heaer-menu' => esc_html__( 'Header Menu', 'aquila' ),
            'aquila-footer-menu'  => esc_html__( 'Footer Menu', 'aquila' ),
        ]);
    }

   
}
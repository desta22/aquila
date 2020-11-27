<?php

/**
 * Enqueue Theme Assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Admin_Assets
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
        add_action('admin_enqueue_scripts', [$this, 'register_styles']);
        

        //  Filters
    }

    public function register_styles()
    {
        // Register styles
        wp_register_style('admin-styls-css', AQUILA_DIR_URI . '/assets/admin/styles.css', [], '', 'all');
       

        // Enqueue styles
        wp_enqueue_style('admin-styls-css');
  
    }

    public function register_scripts()
    {
        
    }
}

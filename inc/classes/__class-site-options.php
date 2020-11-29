<?php

/**
 * Site Options Page 
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;

class Site_Options
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
        add_action('admin_menu', [$this, 'add_new_menu_items']);

        //  Filters

    }

    public function add_new_menu_items()
    {
        add_menu_page(
            __('Site Options', 'menu-test'),   // $page_title  (string) (Required) The text to be displayed in the title tags of the page when the menu is selected.
            __('Site Options', 'menu-test'),   // $menu_title  (string) (Required) The text to be used for the menu.
            'manage_options',                  // $capability  (string) (Required) The capability required for this menu to be displayed to the user.
            'aquila_site_options',             // $menu_slug   (string) (Required) The slug name
            [$this, 'aquila_settings_page']    // $function    (callable) (Optional) The function to be called to output the content for this page. Default value: ''
        );
    }

    // mt_settings_page() displays the page content for the Test Settings submenu
    public  function aquila_settings_page()
    {
?>
        <div class="wrap">
            <h1>
                <?php _e('Site Options', 'aquila') ?>
            </h1>
            <form method="post" action="options.php">
                <?php settings_fields('header_section_1') ?>
                <?php do_settings_sections('aquila_site_options') ?>

                <?php submit_button() ?>
                <!-- <h2 class="title"><?php _e('Social links' , 'aquila') ?></h2>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="facebook">Facebook</label></th>
                            <td><input name="facebook" type="text" id="facebook" value="" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="instagram">Instagram</label></th>
                            <td><input name="instagram" type="text" id="instagram" value="" class="regular-text"></td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p> -->
            </form>
        </div>

<?php
        register_setting('header_section_1', 'my_option_name', 'intval');
    }
}

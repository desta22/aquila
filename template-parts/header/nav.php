<?php

/**
 * Header Navigation template part
 * 
 * @package Aquila
 */


$menu_class = \AQUILA_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('aquila-heaer-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);


// echo '<pre>';
// print_r($header_menus);
// wp_die();

?>
<nav class="navbar navbar-expand-md navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'thumbnail');
    if (has_custom_logo()) {
      echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
    } else {
      echo '<span>' . get_bloginfo('name') . '</span>';
    }
    ?>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if (!empty($header_menus) && is_array($header_menus)) : ?>
      <ul class="navbar-nav mr-auto">
        <?php
        foreach ($header_menus as $key => $menu_item) {
          if (!$menu_item->menu_item_parent) {
            $child_menu_items = $menu_class->get_child_menu_items($header_menus, $menu_item->ID);
            $has_children = !empty($child_menu_items) && is_array($child_menu_items);
            if (!$has_children) {
        ?>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo esc_url($menu_item->url) ?>">
                  <?php echo esc_html($menu_item->title) ?>
                </a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url) ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo esc_html($menu_item->title) ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php foreach ($child_menu_items as $child_menu_item) {
                  ?>
                    <a class="dropdown-item" href="<?php echo esc_url($child_menu_item->url) ?>">
                      <?php echo esc_html($child_menu_item->title) ?>
                    </a>
                  <?php
                  } ?>
                </div>
              </li>
        <?php
            }
          }
        }
        ?>
      </ul>
    <?php endif;  ?>


    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
    <ul class="navbar-nav ">
      <li class="nav-item">
        <a class=" btn btn-outline-primary ml-5 js__contact_offcanvas_btn" data-trigger="#contact_offcanvas" href="#">Open</a>
      </li>
    </ul>
  </div>
</nav>

<?php
// wp_nav_menu(
//   [
//     'theme_location' => 'aquila-heaer-menu',
//     'container_class' => 'my_extra_menu_class'
//   ]
// );


?>
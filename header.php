<?php

/**
 * Header Template
 * 
 * @package Aquila
 */
?>

<!DOCTYPE html>
<html lang="<?php language_attributes() ?>">

<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<!-- <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;600&family=Roboto:wght@300;400;700&display=swap" rel="stylesheet"> -->
    <?php wp_head() ?>
</head>

<body <?php body_class() ?>>
    <?php if (function_exists('wp_body_open')) {
        wp_body_open();
    } ?>

    <?php get_template_part('template-parts/header/nav'); ?>
    <?php get_template_part('template-parts/header/contact-offcanvas'); ?>
    <header>Header</header>
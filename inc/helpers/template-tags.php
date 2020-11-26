<?php

/**
 * Get Custom Thumbernail with lazy loading
 *
 * @param [type] $post_id
 * @param string $size
 * @param array $additional_atributes
 * @return void
 */
function get_the_post_custom_thumbnail($post_id, $size = 'feature-image', $additional_atributes = [])
{
    $custom_thumbnail = '';
    if (null === $post_id) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_atributes = [
            'loading' => 'lazy'
        ];
    }

    $atributes = array_merge($additional_atributes, $default_atributes);

    $custom_thumbnail = wp_get_attachment_image(
        get_post_thumbnail_id($post_id),
        $size,
        false,
        $atributes
    );

    return $custom_thumbnail;
}

/**
 * Render Custom Thumbernail with lazy loading
 *
 * @param [type] $post_id
 * @param string $size
 * @param array $additional_atributes
 * @return void
 */
function the_post_custom_thumbnail($post_id, $size = 'feature-image', $additional_atributes = []){
    echo get_the_post_thumbnail($post_id, $size, $additional_atributes);
}

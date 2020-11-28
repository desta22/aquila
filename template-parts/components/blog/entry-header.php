<?php

/**
 * Post Entry Heaer Template
 * 
 * @package aquila
 */

$the_post_id            = get_the_ID();
$has_post_thumbnail     = get_the_post_thumbnail($the_post_id);
$hide_title             = get_post_meta($the_post_id, '_hide_page_title', true);
$heading_class          = ! empty($hide_title) && 'yes' === $hide_title ? 'hide' : ''; 
?>

<header class="entry-header">
    <?php if ($has_post_thumbnail) :    ?>
        <div class="entry-image">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_post_custom_thumbnail(
                    $the_post_id,
                    'feature-large',
                    [
                        'sizes' => '(max-width:600px) 600px, 400px',
                        'class' => 'attachment-featured-large size-featred-image'
                    ]
                ) ?>
            </a>
        </div>
    <?php endif; ?>

    <?php if (is_single() || is_page()) {
        printf(
            '<h1 class="page-title %1$s">%2$s</h1>',
            esc_attr($heading_class),
            wp_kses_post(get_the_title())
        );
    } else {
        printf(
            '<h2 class="entry-title %1$s"><a href="%3$s">%2$s</a></h2>',
            esc_attr($heading_class),
            wp_kses_post(get_the_title()),
            esc_url(get_the_permalink())
        );
    }?>
        
       
    
</header>
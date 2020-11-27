<?php

/**
 * Post Entry Heaer Template
 * 
 * @package aquila
 */

$the_post_id = get_the_ID();
$has_post_thumbnail  = get_the_post_thumbnail($the_post_id);
$hide_title = get_post_meta($the_post_id, '_hide_page_title', true);
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

    <?php if ('yes' !== $hide_title) : ?>
        <h3 class="entry-title">
            <a href="<?php echo esc_url(get_permalink()) ?>">
                <?php the_title() ?>
            </a>
            </h3>
    <?php endif; ?>
</header>
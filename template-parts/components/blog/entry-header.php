<?php

/**
 * Post Entry Heaer Template
 * 
 * @package aquila
 */
$the_post_id = get_the_ID();
$has_post_thumbnail  = get_the_post_thumbnail($the_post_id);
?>

<header class="entry-header">
    <?php if ($has_post_thumbnail) :    ?>
        <div class="entry-image">
            <a href="<?php esc_url(get_permalink()) ?>">
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
</header>
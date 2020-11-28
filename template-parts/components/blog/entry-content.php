<?php

/**
 * Post Entry Content Template
 * 
 * @package aquila
 */
?>

<div class="entry-content">
    <?php if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue readeing %s <span class="menta-nav">&rarr;</span>', 'aquila'),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        );
        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'aquila'),
                'after'  => '</div>',
            ]
        );
    } else {
        aquila_the_excerpt(150);
        echo aquila_excerpt_more();
    } 
    
    
    ?>
</div>
<?php

/**
 * NO Content Template
 * 
 * @package aquila
 */
?>

<section class="no-content ">
    <header class="page-header">
        <h1 class="page-title">
            <?php _e('Nothing found.', 'aquila') ?>
        </h1>
    </header>
    <div class="page-content">
        <?php if (is_home() && !current_user_can('publish-post')) : ?>
            <p>
                <?php printf(
                    wp_kses(__('Ready to publish your first post? <a href="%s">Get started here.</a>', 'aquila'), [
                        'a' => [
                            'href' => []
                        ]
                    ]),
                    esc_url(admin_url('post-new.php'))
                ) ?>
            </p>
        <?php elseif (is_search()) : ?>
            <p><?php esc_html_e('Sorry but nothing metched your search. Please try again', 'aquila') ?></p>
            <?php get_search_form() ?>

        <?php else : ?>
            <p><?php esc_html_e('It seams that we cannot find what you are looking for. Perheps search can help.', 'aquila') ?></p>
            <?php get_search_form() ?>
        <?php endif; ?>
    </div>
</section>
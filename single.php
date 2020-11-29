<?php

/**
 * Single Post Template
 * 
 * @package aquila
 */
?>
<?php get_header(); ?>
<div id="primary">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) :  ?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <?php if (is_home() && !is_front_page()) { ?>
                            <header class="mb-5">
                                <h1 class="page-title csreen-reader-text">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                        <?php } ?>

                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content') ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <?php get_sidebar() ?>
                    </div>
                </div>

            </div>
        <?php else :  ?>
            <?php get_template_part('template-parts/content-none') ?>
        <?php endif;  ?>


    </main>
</div>

<?php get_footer(); ?>
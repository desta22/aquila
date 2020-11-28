<?php

/**
 * Main Template File
 */
?>

<?php get_header(); ?>
<p>index.php</p>
<div id="primary">
    <main id="main" class="site-main" role="main">
        <?php if (have_posts()) :  ?>
            <div class="container">
                <?php if (is_home() && !is_front_page()) { ?>
                    <header class="mb-5">
                        <h1 class="page-title csreen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                <?php } ?>
                <div class="row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-lg-4 col-md-2 mb-4">
                            <?php get_template_part('template-parts/content') ?>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php aquila_pagination(); ?>
            </div>
        <?php else :  ?>
            <?php get_template_part('template-parts/content-none') ?>
        <?php endif;  ?>
    </main>
</div>

<?php get_footer(); ?>
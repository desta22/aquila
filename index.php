<?php

/**
 * Main Template File
 */
?>

<?php get_header(); ?>
<h2>Test</h2>
<div class="container">
    <?php 
    if ( have_posts() ) : 
    while ( have_posts() ) : the_post();
    the_title();
        the_content();
    endwhile;
else :
    _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
endif;
    ?>

    <div class="our-product">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
               <?php get_template_part('template-parts/product/card') ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
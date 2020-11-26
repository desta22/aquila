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

    
</div>

<?php get_footer(); ?>
<?php

/**
 * Content Template
 * 
 * @package aquila
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb-3') ?>>
<?php get_template_part('template-parts/components/blog/entry-header') ?>
<?php get_template_part('template-parts/components/blog/entry-meta') ?>
<?php get_template_part('template-parts/components/blog/entry-content') ?>
<?php get_template_part('template-parts/components/blog/entry-footer') ?>
</article>
<!-- <div class="card h-100 ">
    <div class="card-header">
        <h3><?php the_title() ?></h3>
    </div>
    <div class="card-body">
        <div><?php the_excerpt() ?></div>
    </div>
</div> -->
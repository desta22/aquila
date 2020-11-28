<?php

/**
 * Post Entry Footer Template
 * 
 * To be used inside of WordPress Loop
 * 
 * @package aquila
 */
$the_post_id = get_the_ID();
$arficle_terms_cetegories = wp_get_post_terms($the_post_id, ['category']);
$arficle_terms_tags = wp_get_post_terms($the_post_id, [ 'post_tag']);

if ((empty($arficle_terms_cetegories) || !is_array($arficle_terms_cetegories)) && (empty($arficle_terms_tags) || !is_array($arficle_terms_cetegories))) {
    return;
}
?>


<div class="entry-footer">
    <?php foreach ($arficle_terms_cetegories as $key => $article_term) : ?>
        <a href="<?php echo esc_url(get_term_link($article_term)) ?>" class="btn btn-sm btn-primary">
            <?php echo esc_html($article_term -> name)  ?>
        </a>
    <?php endforeach; ?>

    <?php foreach ($arficle_terms_tags as $key => $article_term) : ?>
        <a href="<?php echo esc_url(get_term_link($article_term)) ?>" class="btn btn-sm btn-secondary">
            <?php echo esc_html($article_term -> name)  ?>
        </a>
    <?php endforeach; ?>
</div>
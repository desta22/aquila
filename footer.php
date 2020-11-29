<?php

/**
 * Footer Template
 * 
 * @package Aquila
 */
?>

<footer class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <?php dynamic_sidebar('footer-widget-area-1'); ?>
            </div>
            <div class="col-lg-4 col-md-6">
                <?php
                $site_options_options = get_option('site_options_option_name');
                 ?>
                 <p>
                     <?php echo $site_options_options['facebook_0'] ; ?>
                 </p>
                 <p>
                     <?php echo $site_options_options['inastagram_1'] ; ?>
                 </p>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
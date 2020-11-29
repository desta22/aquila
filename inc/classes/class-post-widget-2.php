<?php

/**
 * Enqueue Theme Assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Post_widget_2 extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'post_widget_2', // Base ID
            'Post With Images', // Name
            ['description' => __('A Recent Post With Images Widget', 'aquila'),] // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance)
    {
        extract($args);

        $title = apply_filters('widget_title', $instance['title']);
        $posts_number =  $instance['posts_number'];

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        } ?>
        <?php // Create and run custom loop
        $custom_posts = new \WP_Query();
        $custom_posts->query("post_type=post&posts_per_page= $posts_number");
        while ($custom_posts->have_posts()) : $custom_posts->the_post();
        ?>
            <li>
               
                <a href="<?php the_permalink(); ?>"><?php the_post_custom_thumbnail(get_the_ID()); ?></a>
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>

    <?php

        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('Recent Post', 'aquila');
        }
        if (isset($instance['posts_number'])) {
            $posts_number = $instance['posts_number'];
        } else {
            $posts_number = __('5', 'aquila');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:', 'aquila'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name('posts_number'); ?>">
                <?php _e('Number of posts:', 'aquila'); ?>
            </label>
            <input class="widefat" id="<?php echo $this->get_field_id('posts_number'); ?>" name="<?php echo $this->get_field_name('posts_number'); ?>" type="number" value="<?php echo esc_attr($posts_number); ?>" />
        </p>
<?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['posts_number'] = (!empty($new_instance['posts_number'])) ? strip_tags($new_instance['posts_number']) : '';

        return $instance;
    }
} // class Foo_Widget

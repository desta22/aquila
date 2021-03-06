<?php

/**
 * Enqueue Theme Assets
 * 
 * @package Aquila
 */

namespace AQUILA_THEME\Inc;

use AQUILA_THEME\Inc\Traits\Singleton;
use WP_Widget;

class Recent_Posts_With_Tthumbnails_Widget extends WP_Widget
{
    use Singleton;

    /**
     * Register widget with WordPress.
     */
    public function __construct()
    {
        parent::__construct(
            'recent_posts_with_tthumbnails_widget', // Base ID
            'Posts With Tthumbnails Widget', // Name
            ['description' => __('A Recent Posts With Tthumbnails Widget', 'aquila'),] // Args
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

        echo $before_widget;
        if (!empty($title)) {
            echo $before_title . $title . $after_title;
        } 
        
        // $args = [

        //     'post_type' => 'post',
        //     'posts_per_page ' => 'post',
        // ]
        ?>
        

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
            $title = __('Clock', 'aquila');
        }
        if (isset($instance['number_of_posts'])) {
            $number_of_posts = $instance['number_of_posts'];
        } else {
            $number_of_posts = __('Clock', 'aquila');
        }
    ?>
        <p>
            <label for="<?php echo $this->get_field_name('title'); ?>"><?php _e('Title:', 'aquila'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <?php /* ?>
        <p>
            <label for="<?php echo $this->get_field_name('number_of_posts'); ?>"><?php _e('Posts to show:', 'aquila'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>" type="number" value="<?php echo esc_attr($number_of_posts); ?>" />
        </p>
        <?php */ ?>
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
        // $instance['number_of_posts'] = (!empty($new_instance['number_of_posts'])) ? strip_tags($new_instance['number_of_posts']) : '';

        return $instance;
    }
} // class Foo_Widget

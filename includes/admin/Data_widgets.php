<?php

class data_Articles_Widget extends WP_Widget {

/**
* Constructs the new widget.
*
* @see WP_Widget::__construct()
*/
function __construct() {
// Instantiate the parent object.
parent::__construct( false, __( 'NY TIMES', 'textdomain' ) );
}

/**
* The widget's HTML output.
*
* @see WP_Widget::widget()
*
* @param array $args     Display arguments including before_title, after_title,
*                        before_widget, and after_widget.
* @param array $instance The settings for the particular instance of the widget.
*/
function widget( $args, $instance ) {

extract($args);
$title = apply_filters('widget_title', $instance['title'] );
$num_articles = $instance['num_articles'];
$display_image = $instance['display_image'];

$options = get_option('data_articles');
$data_results = $options['data_results'];

require ('front-end.php');
}

/**
* The widget update handler.
*
* @see WP_Widget::update()
*
* @param array $new_instance The new instance of the widget.
* @param array $old_instance The old instance of the widget.
* @return array The updated instance of the widget.
*/
function update( $new_instance, $old_instance ) {

$instance = $old_instance;
$instance['title'] = strip_tags($new_instance['title']);
$instance['display_image'] = strip_tags($new_instance['display_image']);
$instance['num_articles'] = strip_tags($new_instance['num_articles']);

return $instance;
}

/**
* Output the admin widget options form HTML.
*
* @param array $instance The current widget settings.
* @return string The HTML markup for the form.
*/
function form( $instance ) {

$title = esc_attr($instance['title']);
$display_image = esc_attr($instance['display_image']);
$num_articles = esc_attr($instance['num_articles']);

$options = get_option('data_articles');
$data_results = $options['data_results'];

require ('widgets-fields.php');

}
}

add_action( 'widgets_init', 'data_articles_register_widgets' );

/**
* Register the new widget.
*
* @see 'widgets_init'
*/
function data_articles_register_widgets() {
register_widget( 'data_Articles_Widget' );
}
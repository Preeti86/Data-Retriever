<?php
/*
 *
 * Plugin Name: Data retriever
 * Description: A plugin which allows users to retrieve data from styles api into wp admin adn display it on front end.
 * Version: 5.1
 * Author: Preeti
 *
 *
 *
 */

if( !function_exists('add_action') ){
    die("Hi there! I'm just a plugin, not much much I can do when called directly." );
}


// Setup
define( 'DATASET_PLUGIN_URL', __FILE__);

$plugin_url = DATASET_PLUGIN_URL.'/wp-styles';

$options = array();


// Includes
include( 'includes/activate.php' );
include( 'includes/init.php' );
include ( 'includes/admin/init.php');
include( 'includes/front/enqueue.php' );
include ( 'includes/admin/settings_menu.php');
include ('includes/admin/ckan_widgets.php');




// Hooks
register_activation_hook( __FILE__, 'p_activate_plugin' );
add_action( 'init','dataset_init' );
add_action( 'admin_init', 'dataset_admin_init' );
//add_action( 'save_post_dataset', 'p_save_post_admin', 10, 3 );
//add_action( 'the_content', 'p_filter_dataset_content');
//add_action( 'wp_enqueue_scripts', 'p_enqueue_scripts', 100 );
add_action( 'wp_ajax_p_rate_dataset', 'p_rate_dataset');
//add_action( 'wp_ajax_nopriv_p_rate_dataset', 'p_rate_dataset');
add_action('admin_menu','datasets_settings_menu');
add_action('register_widget','ckan_data_register_widgets');
//add_action('wp_ajax_ckan_articles_refresh_results', 'ckan_articles_refresh_results');
add_action('wp_head', 'ckan_articles_enable_front_ajax');
add_action('admin_head', 'ckan_articles_backend_styles');
add_action('wp_enqueue_scripts', 'ckan_articles_frontend_styles');


//Shortcode
add_shortcode('ckan_articles', 'ckan_articles_shortcode' );








// Shortcodes
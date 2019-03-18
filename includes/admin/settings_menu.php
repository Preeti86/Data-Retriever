<?php

function datasets_settings_menu(){
    add_options_page(
        'Datasets API',
        'Data retriever',
        'manage_options',
        'styles-post',
        'ckan_post_options_page'

    );
}

function ckan_post_options_page()
{

    if (!current_user_can('manage_options')) {
        wp_die('You do not have enough permission to view this page');
    }

    global $plugin_url;
    global $options;

    if (isset($_POST['ckan_form_submitted'])) {
        $hidden_field = esc_html($_POST['ckan_form_submitted']);

        if ($hidden_field == 'Y') {
            $ckan_search = esc_html($_POST['ckan_search']);
            $ckan_apikey = esc_html($_POST['ckan_apikey']);


            $ckan_results = ckan_dataset_get_results($ckan_search, $ckan_apikey);

            $options['ckan_search'] = $ckan_search;
            $options['ckan_apikey'] = $ckan_apikey;
            $options['last_updated'] = time();

            $options['ckan_results'] = $ckan_results;

            update_option('ckan_articles', $options);

        }

    }

    $options = get_option('ckan_articles');

    if ($options != '') {
        $ckan_search = $options['ckan_search'];
        $ckan_apikey = $options['ckan_apikey'];
        $ckan_results = $options ['ckan_results'];

    }
    require ('options-page-wrapper.php');
}



function ckan_articles_shortcode($atts, $content = null){

    global $post;

    extract(shortcode_atts(array(
        'num_articles' => '5',
        'display_image' => 'on'
    ), $atts ) );

    if ($display_image == 'on') $display_image = 1;
    if ($display_image == 'off') $display_image = 0;

    $options = get_option('ckan_articles');
    $ckan_results = $options['ckan_results'];

    ob_start();

    require ('front-end.php');

    $content = ob_get_clean();

    return $content;

}



function ckan_articles_backend_styles(){

    wp_enqueue_style( 'ckan_articles_backend_css', plugins_url( 'assets/styles/styles.css' ) );

}


function ckan_articles_frontend_styles(){

    wp_enqueue_style( 'ckan_articles_frontend_css', plugins_url( 'assets/styles/styles.css' ) );
    wp_enqueue_script('ckan_articles_frontend_js', plugins_url( 'assets/scripts/ckan-articles.js'), array('jquery'), '', true );

}


function ckan_articles_refresh_results(){
    $options = get_option('ckan_articles');
    $last_updated = $options['last_updated'];

    $current_time = time();
    $update_difference = $current_time - $last_updated;


    if ($update_difference > 86400) {
        $ckan_search = $options['ckan_search'];
        $ckan_apikey = $options['ckan_apikey'];


        $options['ckan_results'] = ckan_articles_refresh_results($ckan_search, $ckan_apikey);
        $options['last_updated'] = time();

        update_option('ckan_articles', $options);

    }

}

function ckan_articles_enable_front_ajax(){
     ?>

    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
    </script>

<?php


}





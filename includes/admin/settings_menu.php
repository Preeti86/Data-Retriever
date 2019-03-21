<?php

function datasets_settings_menu(){
    add_options_page(
        'Datasets API',
        'Data retriever',
        'manage_options',
        'styles-post',
        'data_post_options_page'

    );
}

function data_post_options_page()
{

    if (!current_user_can('manage_options')) {
        wp_die('You do not have enough permission to view this page');
    }

    global $plugin_url;
    global $options;

    if (isset($_POST['data_form_submitted'])) {
        $hidden_field = esc_html($_POST['data_form_submitted']);

        if ($hidden_field == 'Y') {
            $data_search = esc_html($_POST['data_search']);
            $data_apikey = esc_html($_POST['data_apikey']);


            $data_results = dataset_get_results($data_search, $data_apikey);

            $options['data_search'] = $data_search;
            $options['data_apikey'] = $data_apikey;
            $options['last_updated'] = time();

            $options['data_results'] = $data_results;

            update_option('data_articles', $options);

        }

    }

    $options = get_option('data_articles');

    if ($options != '') {
        $data_search = $options['data_search'];
        $data_apikey = $options['data_apikey'];
        $data_results = $options ['data_results'];

    }
    require ('options-page-wrapper.php');
}



function data_articles_shortcode($atts, $content = null){

    global $post;

    extract(shortcode_atts(array(
        'num_articles' => '5',
        'display_image' => 'on'
    ), $atts ) );

    if ($display_image == 'on') $display_image = 1;
    if ($display_image == 'off') $display_image = 0;

    $options = get_option('data_articles');
    $data_results = $options['data_results'];

    ob_start();

    require ('front-end.php');

    $content = ob_get_clean();

    return $content;

}



function data_articles_backend_styles(){

    wp_enqueue_style( 'data_articles_backend_css', plugins_url( 'assets/styles/styles.css' ) );

}


function data_articles_frontend_styles(){

    wp_enqueue_style( 'data_articles_frontend_css', plugins_url( 'assets/styles/styles.css' ) );
    wp_enqueue_script('data_articles_frontend_js', plugins_url( 'assets/scripts/data-articles.js'), array('jquery'), '', true );

}


function data_articles_refresh_results(){
    $options = get_option('data_articles');
    $last_updated = $options['last_updated'];

    $current_time = time();
    $update_difference = $current_time - $last_updated;


    if ($update_difference > 86400) {
        $data_search = $options['data_search'];
        $data_apikey = $options['data_apikey'];


        $options['data_results'] = data_articles_refresh_results($data_search, $data_apikey);
        $options['last_updated'] = time();

        update_option('data_articles', $options);

    }

}

function data_articles_enable_front_ajax(){
     ?>

    <script>
        var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
    </script>

<?php


}





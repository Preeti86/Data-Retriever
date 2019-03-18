<?php

function p_enqueue_scripts(){
    wp_register_style(
        'p_rateit',
        plugins_url( '/assets/rateit/rateit.css', DATASET_PLUGIN_URL )
    );
    wp_enqueue_style( 'p_rateit' );

    wp_register_script(
        'p_rateit',
        plugins_url( '/assets/rateit/jquery.rateit.min.js', DATASET_PLUGIN_URL),
        array('jquery'),
        '1.0.0',
        true
    );
    wp_register_script(
        'p_main',
        plugins_url( '/assets/scripts/main.js', DATASET_PLUGIN_URL ),
        array('jquery'),
        '1.0.0',
        true
    );

    wp_localize_script( 'p_main', 'ckan_obj', array(
        'ajax_url'                  =>  admin_url( 'admin-ajax.php' ),
        'home_url'                  =>  home_url( '/' )
    ));

    wp_enqueue_script( 'p_rateit' );
    wp_enqueue_script( 'p_main' );
}
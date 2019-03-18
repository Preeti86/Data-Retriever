<?php

function dataset_admin_init() {
    //include('create-metaboxes.php');
    include ( 'dataset-options.php' );
    include ( 'enqueue.php');
    include('ckan_api.php');
    //include ('columns.php');


    add_action( 'admin_enqueue_scripts', 'p_admin_enqueue' );
    add_action( 'add_meta_boxes_dataset', 'p_create_metaboxes' );
    add_filter('manage_data_type_posts_columns', 'add_new_data_columns');
    add_filter('manage_post_type_type_custom_column', 'manage_dataset_columns',10,2);



}
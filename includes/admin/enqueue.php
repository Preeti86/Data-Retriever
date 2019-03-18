<?php

function p_admin_enqueue(){
    GLOBAL $typenow;
    if( $typenow != "dataset" ) {
        return;
    }


    wp_register_style(
        'ju_bootstrap',
        plugins_url( '/assets/styles/bootstrap.css',DATASET_PLUGIN_URL )

    );
    wp_enqueue_style( 'ju_bootstrap' );




}
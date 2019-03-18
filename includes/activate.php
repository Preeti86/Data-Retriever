<?php

function p_activate_plugin(){
    // 4.7 < 4.5 = false
    if( version_compare( get_bloginfo( 'version' ), '4.7', '<') ) {
        wp_die(__('You must update WordPress to use this plugin', 'dataset'));


        global $wpdb;


        $createSQL = "
        CREATE TABLE `" . $wpdb->prefix . "wp_datasets` (
        `ID` BIGINT (20) UNSIGNED NOT NULL AUTO INCREMENT,
        `datset_id` BIGINT (20) UNSIGNED NOT NULL,
        `rating` FLOAT (3.2) UNSIGNED NOT NULL,
        `user_id` VARCHAR (32) NOT NULL,
        PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB" . $wpdb->get_charset_collate() . "AUTO INCREMENT=1;";


        require_once ( ABSPATH . '/wp-admin/includes/upgrade.php' );
        dbDelta( $createSQL );
    }



}
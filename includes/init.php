<?php

function dataset_init(){
    $labels = array(
        'name'                          => _x('Datasets', 'post type general name', 'dataset'),
        'singular_name'                 => _x('Datasets', 'post type singular name', 'dataset'),
        'menu_name'                     => _x('Datasets', 'admin menu', 'dataset'),
        'submenu_name'                  => _X('Datasets', 'dataset', 'Settings', 'admin menu', 'dataset'),
        'name_admin_bar'                => _x('Datasets', 'add new on admin bar', 'dataset'),
        'add_new'                       => _x('Add New', 'dataset', 'dataset'),
        'add_new_item'                  => __('Add New Dataset', 'dataset'),
        'new_item'                      => __('New Dataset', 'dataset'),
        'edit_item'                     => __('Edit Datasets', 'dataset'),
        'view_item'                     => __('View Datasets', 'dataset'),
        'all_items'                     => __('All Datasets', 'dataset'),
        'search_items'                  => __('Search Datasets', 'dataset'),
        'parent_item_colon'             => __('Parent Datasets:', 'dataset'),
        'not_found'                     => __('No dataset found.', 'dataset'),
        'not_found_in_trash'            => __('No dataset found in Trash.', 'dataset'),
        'featured_image'                => __('Featured Image', 'dataset'),
        'set_featured_image'            => __('Set featured image', 'dataset'),
        'remove_featured_image'         => __('Remove featured image', 'dataset'),
        'use_featured_image'            => __('Use as featured image', 'dataset'),
        'insert_into_item'              => __('Insert into dataset', 'dataset'),
        'uploaded_to_this_item'         => __('Uploaded to this item', 'dataset'),
        'items_list'                    => __('Items list', 'dataset'),
        'items_list_navigation'         => __('Items list navigation', 'dataset'),
        'filter_items_list'             => __('Filter items list', 'dataset'),
    );

    $args = array(
        'show_in_rest'                  => true, // Enable the REST API
        'post_types'                    => array ('dataset', 'groups', 'organisations'),
        'posts_per_page'                => 10,
        'labels'                        => $labels,
        'description'                   => __('Description.', ' A plugin which allows users to retrieve data from styles api into wp admin adn display it on front end.'),
        'public'                        => true,
        'publicly_queryable'            => true,
        'show_ui'                       => true,
        'show_in_menu'                  => true,
        'show_in_nav_menus'             => true,
        'can_export'                    => true,
        'exclude_from_search'           => true,
        'menu_icon'                     => 'dashicons-media-text', // Set icon
        'query_var'                     => true,
        'rewrite'                       => array('slug' => 'dataset'),
        'capability_type'               => 'post',
        'has_archive'                   => true,
        'hierarchical'                  => false,
        'map_meta_cap'                  => true,
        'menu_position'                 => null,
        'supports'                      => array('title', 'editor', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields','revisions', 'page-attributes', 'comments', 'categories'),
        'taxonomies'                    => array('datasets','organisations','groups','category','url'),

        register_taxonomy(
            'organisations',
            'post',
            array(
                'label' => __( 'Organisations' ),
                'hierarchical' => false,
                //'labels' => $labels,
                'public' => true,
                'show_in_nav_menus' => false,
                'show_tagcloud' => false,
                'show_admin_column' => true,
                'rewrite' => array(
                    'slug' => 'organisations'
                )
            )
        )
    );
    register_taxonomy(
        'groups',
        'post',
        array(
            'label' => __( 'Groups' ),
            'hierarchical' => false,
            //'labels' => $labels,
            'public' => true,
            'show_in_nav_menus' => false,
            'show_tagcloud' => false,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'groups'
            )
        )
    );

    register_post_type('dataset', $args);


}





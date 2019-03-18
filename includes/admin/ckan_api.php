<?php

function ckan_dataset_get_results($ckan_search, $ckan_apikey){

    $json_feed_url = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q=' . $ckan_search . '&api-key=' . $ckan_apikey;


    //$json_feed_url = 'https://demo.ckan.org/api/3/action/datastore_search?resource_id=4a60a8f6-698b-4204-8d4a-a2b19e4399af&limit=5&q=' . $ckan_search . '&api-key=' . $ckan_apikey;


    $json_feed = wp_remote_get($json_feed_url);

    $ckan_results = json_decode($json_feed['body']);

    //var_dump($ckan_results);

    return $ckan_results;
}
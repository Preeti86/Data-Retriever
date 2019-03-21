<?php

function dataset_get_results($data_search, $data_apikey){

    $json_feed_url = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q=' . $data_search . '&api-key=' . $data_apikey;


    $json_feed = wp_remote_get($json_feed_url);

    $data_results = json_decode($json_feed['body']);

    //var_dump($data_results);

    return $data_results;
}
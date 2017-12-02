<?php

require_once "NyTimesQuery.php";

function nyTimesQuery ($phrase)
{

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $query = array(
        "api-key" => "07eb75aec08549dba5be57881986ae90",
        "q" => $phrase,
        "sort" => "newest",
        "fl" => "web_url, snippet, multimedia, headline, pub_date,",
        "page" => 0
    );
    curl_setopt($curl, CURLOPT_URL,
        "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
    );
    $result = json_decode(curl_exec($curl));
    return $result;
}

var_dump(nyTimesQuery("obama"));

//$curl = curl_init();
//curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//$query = array(
//    "api-key" => "07eb75aec08549dba5be57881986ae90",
//    "q" => "obama",
//    "sort" => "newest",
//    "page" => 0
//);
//curl_setopt($curl, CURLOPT_URL,
//    "https://api.nytimes.com/svc/search/v2/articlesearch.json" . "?" . http_build_query($query)
//);
//$result = json_decode(curl_exec($curl));
//echo json_encode($result);



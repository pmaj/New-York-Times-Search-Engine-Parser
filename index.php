<?php

require_once "NyTimesCollection.php";

const MAX_PAGES = 10;


$phrase = $argv[1];
$url = "https://query.nytimes.com/svc/add/v1/sitesearch.json?q=%s&page=%s&facet=true&newest";



$curl = curl_init();

curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

$articlesCollection = new NyTimesCollection();

for ($i = 1; $i <= MAX_PAGES; $i++) {
    curl_setopt($curl, CURLOPT_URL, sprintf($url, $phrase, $i));
    $articles = json_decode(curl_exec($curl));

    for($j = 0; $j <= (MAX_PAGES - 1); $j++) {
        $articlesCollection->addArticle(
            $articles->response->docs[$j]->web_url,
            $articles->response->docs[$j]->headline->main,
            $articles->response->docs[$j]->pub_date,
            $articles->response->docs[$j]->snippet,
            empty($articles->response->docs[$j]->multimedia) ? null : $thumbnailUrl = $articles->response->docs[$j]->multimedia[2]->url);
    }

}

curl_close($curl);

foreach ($articlesCollection->getAll() as $article) {
    echo $article->title . PHP_EOL;
    echo $article->content . PHP_EOL;
    echo $article->pub_date . PHP_EOL;
    echo $article->url . PHP_EOL;
    echo $article->thumbnail_url . PHP_EOL;
}







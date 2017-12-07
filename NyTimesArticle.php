<?php

/**
 * Created by PhpStorm.
 * User: mejdzor
 * Date: 02.12.2017
 * Time: 22:32
 */

require_once "NyTimesMention.php";
require_once "NyTimesCollection.php";

class NyTimesArticle implements NyTimesMention
{

    public $url;
    public $title;
    public $pub_date;
    public $content;
    public $thumbnail_url;


    public function __construct($url, $title, $pub_date, $content, $thumbnail_url)
    {
        $this->url = $url;
        $this->title = $title;
        $this->pub_date = $pub_date;
        $this->content = $content;
        $this->thumbnail_url = $thumbnail_url;
    }

    public function __toString()
    {
       return $this->url . " " . $this->title . " " . $this->pub_date . " " . $this->content . " " . $this->thumbnail_url;
    }

    public function searchArticles()
    {

        $curl = curl_init();
        $phrase = $_POST['phrase'];
        $url = "https://query.nytimes.com/svc/add/v1/sitesearch.json?q=" . $phrase . "&page=2&facet=true";
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($curl, CURLOPT_COOKIEJAR, "cookie.txt");
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        $result = json_decode(curl_exec($curl));

        curl_close($curl);

            $array_with_data = [];
//            for ($i = 0; $i <= 9; $i++) {
//                $array_with_data[$i]['url'] = $result->response->docs[$i]->web_url;
//                $array_with_data[$i]['content'] = $result->response->docs[$i]->snippet;
//                $array_with_data[$i]['pub_date'] = $result->response->docs[$i]->pub_date;
//                $array_with_data[$i]['title'] =  $result->response->docs[$i]->headline->main;
//                if ($result->response->docs[$i]->multimedia != null) {
//                    $array_with_data[$i]['thumbnail_url'] = $result->response->docs[$i]->multimedia;;
//                } else {
//                    $array_with_data[$i]['thumbnail_url'] = "";
//                }
//            }
//            var_dump($array_with_data);
            return $result;
    }

    public function createArticles() {
        $array_with_data = [];
        for($i = 0; $i <= 9; $i++) {

            if ($this->searchArticles()->response->docs[$i]->multimedia != null) {
                $array_with_data[$i]['thumbnail_url'] = $this->searchArticles()->response->docs[$i]->multimedia;
            } else {
                $array_with_data[$i]['thumbnail_url'] = "";
            }

            $new_article = new NyTimesCollection();
            $new_article -> addArticle(new NyTimesArticle(
                $this->searchArticles()->response->docs[$i]->web_url,
                $this->searchArticles()->response->docs[$i]->snippet,
                $this->searchArticles()->response->docs[$i]->pub_date,
                $this->searchArticles()->response->docs[$i]->headline->main,
                $array_with_data[$i]['thumbnail_url']
            ));
            var_dump($new_article);
        }

    }


    public function getUrl()
    {

    }

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
    }

    public function getCreatedAt()
    {
        // TODO: Implement getCreatedAt() method.
    }

    public function getContent()
    {
        // TODO: Implement getContent() method.
    }

    public function getThumbnail()
    {
        // TODO: Implement getThumbnail() method.
    }

}



//$obama = new NyTimesArticle("1", "sada", "sadad", "dasdsad", "sadasd");
//$obama ->searchArticles();
$obama2 = new NyTimesArticle("1", "sada", "sadad", "dasdsad", "sadasd");
$obama2->createArticles();
//var_dump($obama2);






<?php

/**
 * Created by PhpStorm.
 * User: mejdzor
 * Date: 02.12.2017
 * Time: 22:32
 */

require_once "NyTimesMention.php";

class NyTimesQuery implements NyTimesMention
{

    public function search()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $query = array(
            "api-key" => "07eb75aec08549dba5be57881986ae90",
            "q" => $_POST['phrase'],
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

    public function __construct()
    {
        $this->search();
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

$obama = new NyTimesQuery();
$obama->search();
var_dump($obama);





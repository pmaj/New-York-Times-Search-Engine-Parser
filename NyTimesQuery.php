<?php

/**
 * Created by PhpStorm.
 * User: mejdzor
 * Date: 02.12.2017
 * Time: 22:32
 */

function search()
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
    $array = [];

    for ($i = 0; $i <= 9; $i++) {
        $array['web_url'][] = $result->response->docs[$i]->web_url;
        $array['snippet'][] = $result->response->docs[$i]->snippet;
        $array['pub_date'][] = $result->response->docs[$i]->pub_date;
        $array['main'][] =  $result->response->docs[$i]->headline->main;
      if ($result->response->docs[$i]->multimedia != null) {
          $array['thumbnail_url'][] = $result->response->docs[$i]->multimedia[2]->url;;
        } else {
          $array['thumbnail_url'][] = null;
      }
    }
    print_r ($array);
    return $result;

}
$merkel = search();
var_dump($merkel->response);


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

//$obama = new NyTimesQuery();
//$obama->search();
//var_dump($obama);





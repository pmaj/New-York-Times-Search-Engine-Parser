<?php

/**
 * Created by PhpStorm.
 * User: mejdzor
 * Date: 06.12.2017
 * Time: 21:40
 */
require_once "NyTimesArticle.php";

class NyTimesCollection
{
    private $articles = [];

    public function addArticle($url, $title, $pub_date, $content, $thumbnail_url)
    {
        $this->articles[] = new NyTimesArticle($url, $title, $pub_date, $content, $thumbnail_url);
    }

    public function getItem($id)
    {
        return $this->articles[$id];
    }

    public function getAll()
    {
        return $this->articles;
    }
}


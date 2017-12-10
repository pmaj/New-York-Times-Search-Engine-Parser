<?php

require_once "NyTimesMention.php";

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

    public function getUrl()
    {
        return $this->url;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCreatedAt()
    {
        return $this->pub_date;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getThumbnail()
    {
        return $this->thumbnail_url;
    }

}








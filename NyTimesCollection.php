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

    public function addArticle($obj, $key = null)
    {
        if ($key == null) {
            $this->articles[] = $obj;
    }
    else {
            if (isset ($this->articles[$key])) {
                throw new KeyInUseException("Key $key already in use.");
            }
            else {
                $this->articles[$key] = $obj;
            }
        }
    }

    public function deleteItem($key)
    {

    }

    public function getItem($key)
    {

    }

    public function keys() {
        return array_keys($this->articles);
    }

    public function length()
    {
        return count($this->articles);
    }
}


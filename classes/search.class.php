<?php

// Search Class: used to create search objects
class Search {

    private $id, $title, $url, $keywords;

    public function __construct($title, $url, $keywords) {
        $this->title = $title;
        $this->url = $url;
        $this->keywords = $keywords;
    }

    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function setTitle($value) {
        $this->title = $value;
    }
    
    public function getURL() {
        return $this->url;
    }

    public function setURL($value) {
        $this->url = $value;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function setKeywords($value) {
        $this->keywords = $value;
    }
}

?>

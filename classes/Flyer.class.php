<?php

// Flyer Class: used to create Flyer objects
class Flyer {
    private $id, $flyerdate, $page1;
    
    public function __construct($flyerdate, $page1=''){
        $this->flyerdate = $flyerdate;
        $this->page1 = $page1;
    }
    
    public function getID() {
        return $this->id;
    }

    public function getFormattedID($id) {
        return sprintf("%09d", $id);
    }


    public function setID($value) {
        $this->id = $value;
    }
    
    public function getFlyerDate() {
        return $this->flyerdate;
    }

    public function setFlyerDate($value) {
        $this->flyerdate = $value;
    }
    
    public function getPage1() {
        return $this->page1;
    }

    public function setPage1($value) {
        $this->page1 = $value;
    }
}
?>
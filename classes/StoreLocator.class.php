<?php

// Store Locator Class: used to create Store Lcator objects
class StoreLocator {
    private $id, $name, $address, $lat, $lng, $hours, $phone;
    
    public function __construct($name, $address, $lat, $lng, $hours, $phone){
        $this->name = $name;
        $this->address = $address;
        $this->lat = $lat;
        $this->lng = $lng;
        $this->hours = $hours;
        $this->phone = $phone;
    }
    
    public function getID() {
        return $this->id;
    }

    public function setID($value) {
        $this->id = $value;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getLatitude() {
        return $this->lat;
    }

    public function setLatitude($value) {
        $this->lat = $value;
    }
    
    public function getLongitude() {
        return $this->lng;
    }

    public function setLongitude($value) {
        $this->lng = $value;
    }
    
    public function getHours() {
        return $this->hours;
    }

    public function setHours($value) {
        $this->hours = $value;
    }
    
    public function getPhone() {
        return $this->phone;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }
    
       
}
?>

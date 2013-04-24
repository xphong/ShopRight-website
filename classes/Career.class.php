<?php

// Career Class: used to create Career objects
class Career {
    private $id, $jobid, $name, $address, $postalcode, $phone, $email, $resume;
    
    public function __construct($jobid, $name, $address, $postalcode, $phone, $email, $resume){
        $this->jobid = $jobid;
        $this->name = $name;
        $this->address = $address;
        
        $this->postalcode = $postalcode;
        $this->phone = $phone;
        $this->email = $email;
        $this->resume = $resume;
    }
    
    public function getID() {
        return $this->id;
    }

    public function getJobID() {
        return $this->jobid;
    }

    public function getName() {
        return $this->name;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getCity() {
        return $this->city;
    }

    public function getPostalcode() {
        return $this->postalcode;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getResume() {
        return $this->resume;
    }

    public function getFormattedID($id) {
        return sprintf("%09d", $id);
    }


    public function setID($value) {
        $this->id = $value;
    }

    public function setJobID($value) {
        $this->jobid = $value;
    }

    public function setName($value) {
        $this->name = $value;
    }

    public function setAddress($value) {
        $this->address = $value;
    }

    

    public function setPostalcode($value) {
        $this->postalcode = $value;
    }

    public function setPhone($value) {
        $this->phone = $value;
    }

    public function setEmail($value) {
        $this->email = $value;
    }

    public function setResume($value) {
        $this->resume = $value;
    }
}
?>
<?php

// Gift Card Class: used to create gift card objects
class GiftCard {
    private $name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount;
    
    public function __construct($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount){
        $this->name = $name;
        $this->email = $email;
        $this->rname = $rname;
        $this->address = $address;
        $this->postalcode = $postalcode;
        $this->phonenumber = $phonenumber;
        $this->message = $message;
        $this->amount = $amount;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }
    
    public function getRname() {
        return $this->rname;
    }

    public function setRname($value) {
        $this->rname = $value;
    }
    
    public function getAddress() {
        return $this->address;
    }

    public function setAddress($value) {
        $this->address = $value;
    }
    
    public function getPostalcode() {
        return $this->postalcode;
    }

    public function setPostalcode($value) {
        $this->postalcode = $value;
    }
    
    public function getPhone() {
        return $this->phonenumber;
    }

    public function setPhone($value) {
        $this->phonenumber = $value;
    }
    
    public function getMessage() {
        return $this->message;
    }

    public function setMessage($value) {
        $this->message = $value;
    }
    
    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($value) {
        $this->amount = $value;
    }
    
}
?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Event
 *
 * @author Administrator
 */
class Event {

    private $eventid = 0;
    private $eventname, $eventtype, $organizers, $date, $venue, $timings, $guests;

    public function setEventId($param) {
        $this->eventid=$param;
    }
    
    public function getEventId() {
        return $this->eventid;
    }
    
    public function setEventName($param) {
        $this->eventname=$param;
    }
    
    public function getEventName() {
        return $this->eventname;
    }

    public function setEventType($param) {
        $this->eventtype=$param;
    }
    
    public function getEventType() {
        return $this->eventtype;
    }

    public function setOrganizers($param) {
        $this->organizers=$param;
    }
    
    public function getOrganizers() {
        return $this->organizers;
    }

    public function setDate($param) {
        $this->date=$param;
    }
    
    public function getDate() {
        return $this->date;
    }

    public function setVenue($param) {
        $this->venue=$param;
    }
    
    public function getVenue() {
        return $this->venue;
    }

    public function setTimings($param) {
        $this->timings=$param;
    }
    
    public function getTimings() {
        return $this->timings;
    }
    
    public function setGuests($param) {
        $this->guests=$param;
    }
    
    public function getGuests() {
        return $this->guests;
    }
}

?>

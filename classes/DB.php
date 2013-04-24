<?php

require_once 'Event.php';
require_once 'User.php';
require_once 'functions.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DB
 *
 * @author Administrator
 */
class DB {

//    protected $dsn = 'mysql:host=fdb4.freehostingeu.com;dbname=1285575_sr';
//    protected $username = '1285575_sr';
//    protected $password = "ShopRight";
    protected  $dsn = 'mysql:host=localhost;dbname=shopright';
    protected  $username = 'root';
    protected  $password = '';
    protected $connection;

    function __construct() {
        $this->connection = new PDO($this->dsn, $this->username, $this->password);
    }

    public function insertOrUpdateEvent(Event $event) {
        if ($event->getEventId() > 0) {
            $query = "UPDATE events SET event_name=?, event_type=?, organizers=?, event_date=?, venue=?, timings=?, guests=?
                WHERE event_id=?";
        } else {
            $query = "INSERT into events (event_name, event_type, organizers, event_date, venue, timings, guests)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        }
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($event->getEventName()));
        $statement->bindParam(2, sanitize($event->getEventType()));
        $statement->bindParam(3, sanitize($event->getOrganizers()));
        $statement->bindParam(4, sanitize($event->getDate()));
        $statement->bindParam(5, sanitize($event->getVenue()));
        $statement->bindParam(6, sanitize($event->getTimings()));
        $statement->bindParam(7, sanitize($event->getGuests()));

        if ($event->getEventId() > 0)
            $statement->bindParam(8, sanitize($event->getEventId()));

        return $statement->execute();
    }

    public function getEventById($id) {
        $query = "Select * from events WHERE event_id=? LIMIT 1";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($id));
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch()) {
                $event = new Event();
                $event->setEventId($row["event_id"]);
                $event->setEventName($row["event_name"]);
                $event->setEventType($row["event_type"]);
                $event->setDate($row["event_date"]);
                $event->setOrganizers($row["organizers"]);
                $event->setVenue($row["venue"]);
                $event->setTimings($row["timings"]);
                $event->setGuests($row["guests"]);

                return $event;
            }
        }
        else
            return FALSE;
    }

    public function userLogin($username, $password) {
        $query = "Select * from users WHERE username=? AND password=? LIMIT 1";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($username));
        $statement->bindParam(2, sanitize($password));
        $statement->execute();

        return $statement->fetchObject("User");
    }

    public function deleteEvent($id) {
        $query = "DELETE from events WHERE event_id=?";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($id));
        return $statement->execute();
    }

    public function getAllEvents() {
        $query = "Select * from events";
        $statement = $this->connection->prepare($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function eventbooking($user_id, $event_id) {
        if ($user_id > 0) {
            $query = "INSERT into event_booking (user_id, event_id) VALUES(?, ?)";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(1, sanitize($user_id));
            $statement->bindParam(2, sanitize($event_id));

            return $statement->execute();
        }
        else
            return FALSE;
    }

    public function insertUser($user) {
        $query = "INSERT into users (username, password, firstname, lastname) VALUES(?, ?, ?, ?)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($user->username));
        $statement->bindParam(2, sanitize(md5($user->password)));
        $statement->bindParam(3, sanitize($user->firstname));
        $statement->bindParam(4, sanitize($user->lastname));

        return $statement->execute();
    }

    public function isBooked($user_id, $event_id) {

        if ($user_id > 0) {
            $query = "Select * from event_booking WHERE user_id=? AND event_id=? LIMIT 1";
            $statement = $this->connection->prepare($query);
            $statement->bindParam(1, sanitize($user_id));
            $statement->bindParam(2, sanitize($event_id));
            $statement->execute();

            return $statement->rowCount() > 0;
        }
        else
            return FALSE;
    }

    public function getAllSlides() {
        $query = "Select * from image_slider";
        $statement = $this->connection->prepare($query);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function insertSlide($image_name) {
        $query = "INSERT into image_slider (img_name) VALUES(?)";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($image_name));

        return $statement->execute();
    }

    public function deleteSlide($id) {
        $query = "DELETE from image_slider WHERE imgslider_id=?";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($id));
        return $statement->execute();
    }
    public function getSlideById($id) {
        $query = "Select * from image_slider WHERE imgslider_id=? LIMIT 1";
        $statement = $this->connection->prepare($query);
        $statement->bindParam(1, sanitize($id));
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            while ($row = $statement->fetch()) {
                
                return $row['img_name'];
            }
        }
        else
            return FALSE;
    }

    function __destruct() {
        $this->connection = null;
    }

}

?>

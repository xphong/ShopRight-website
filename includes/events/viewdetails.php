<?php

/*
 * Ajax responses to view details and event booking
 */
session_start();
require_once '../classes/DB.php';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;

if (isset($_POST['event_id']) && $_POST['event_id'] > 0) {
    $db = new DB();

    if (isset($_POST['booking'])) {
        if($db->eventbooking($user_id, getValue("event_id")))
                echo 'success';
        else
            echo "Please register or login with the store!";
    } else {
        
        $event = $db->getEventById($_POST['event_id']);

        $result = "<strong>" . $event->getEventName() . "</strong><br />" .
                "Event Type: " . $event->getEventType() . "<br />" .
                "Date: " . date('F  d, Y', strtotime($event->getDate())) . "<br />" .
                "Venue: " . $event->getVenue() . "<br />" .
                "Timings: " . $event->getTimings() . "<br />" .
                "Guest: " . $event->getGuests() . "<br /><br />";

        if (isset($_SESSION['role']) && $_SESSION['role'] == "admin") {
            $result.='<form method="post" action="admin/manageevent.php">'.
                    '<input type="hidden" name="event_id" value="' . $event->getEventId() . '" />'.
                    '<button name="edit" class="btn">Edit Event</button> ' .
                    ' <button name="delete" class="btn" '.
                    "onclick=\"return confirm('Are you sure you want to delete this event?')\">Delete Event</button>" .
                    '<br /><br /><br /></form>';
        } else {
            $result.= $db->isBooked($user_id, getValue("event_id")) ? '<span class="booked">You have booked for this event</span>' : '<button name="book" value="' . $event->getEventId() . '" class="btn">Book for Event</button><br /><br /><br />';
        }

        if (!isset($_SESSION['role']))
            $result.='Not a Registered User?<br /><a href="register.php" class="reg">Click Here</a> To Register with the store.';

        echo $result;
    }
}
?>

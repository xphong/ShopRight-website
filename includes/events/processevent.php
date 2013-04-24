<?php
require_once '../classes/DB.php';
require_once '../classes/functions.php';
$db = new DB();

$event = new Event();

//$dateReg = "'/\d{4}-\d{2}-\d{2}";
//$textReg = "/^[A-Za-z ]+$/";
//$numReg = "/^[0-9]+$/";
$error_message = "";

// Edit event
if(isset($_POST['edit']) && isset ($_POST['event_id'])){
    $event = $db->getEventById($_POST['event_id']);
}

// Delete event
else if(isset($_POST['delete']) && isset ($_POST['event_id'])){
    if($db->deleteEvent($_POST['event_id']))
        redirect("../events.php");
}

 else {    
    $event->setEventId(isset($_POST['event_id']) ? $_POST['event_id'] : 0);
    $event->setEventName(getValue('event_name'));
    $event->setEventType(getValue('eventtype'));
    $event->setOrganizers(getValue('organizers'));
    $event->setDate(getValue('date'));
    $event->setVenue(getValue('venue'));
    $event->setTimings(getValue('timings'));
    $event->setGuests(getValue('guests'));
}

if(isset($_POST['submit'])){
    if(!isValid($event->getEventName()))
        $error_message.="<p>* Event Name is required.</p>";
    
    if(!isValid($event->getEventType()))
        $error_message.="<p>* Select an Event Type.</p>";
    
    if(!isValid($event->getOrganizers()))
        $error_message.="<p>* Organizers is required.</p>";
    
    if(!isValid($event->getDate()))
        $error_message.="<p>* Event Date is required.</p>";
    
    if(!isValid($event->getVenue()))
        $error_message.="<p>* Venue is required.</p>";
    
    if(!isValid($event->getTimings()))
        $error_message.="<p>* Timings is required.</p>";
    
    if(!isValid($event->getGuests()))
        $error_message.="<p>* Guests is required.</p>";
    
    if($error_message=="" && $db->insertOrUpdateEvent($event))
        redirect ("../events.php");
}
?>

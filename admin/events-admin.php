<?php
session_start();
require_once '../classes/functions.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin")
    redirect("../login.php");

require_once '../includes/events/processevent.php';

// page title
$title = "ShopRight Admin - About Slides";

include('../includes/header-admin.php');
include('../includes/nav-admin.php');
?>

<section id="content">
    <div id="single-content">
        <article>
            <div class="heading">
                <h2>Add New Event</h2>
            </div>
        </article>

        <div class="content">
            <div class="error">
                <?php echo $error_message; ?>                        
            </div>
            <form action="" method="post">
                <table>
                    <tr>
                    <input type="hidden" name="event_id" value="<?php echo $event->getEventId(); ?>" />
                    <td><labe>Event Name</label></td>
                        <td><input type="text" name="event_name" value="<?php echo $event->getEventName(); ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Event Type</label></td>
                            <td>
                                <select name="eventtype">
                                    <option value="">Select Type of Event</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Seminar">Seminar</option>
                                    <option value="Dinner">Dinner</option>
                                    <option value="FundRaising">FundRaising</option>
                                    <option value="Trade Show">Trade Show</option>
                                    <option value="Meeting">Meeting</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Organizers</label></td>
                            <td><input type="text" name="organizers" value="<?php echo $event->getOrganizers(); ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Date</label></td>
                            <td><input type="text" id="eventdate" name="date" placeholder="yyyy-mm-dd" value="<?php echo $event->getDate(); ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Venue</label></td>
                            <td><input type="text" name="venue" value="<?php echo $event->getVenue(); ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Timings</label></td>
                            <td><input type="text" name="timings" value="<?php echo $event->getTimings(); ?>" /></td>
                        </tr>
                        <tr>
                            <td><label>Guests</label></td>
                            <td><input type="text" name="guests" value="<?php echo $event->getGuests(); ?>" /></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn" name="submit" value="submit">Save</button>
                                &nbsp; &nbsp; <a href="../events.php" class="reg">Cancel</a>
                            </td>
                        </tr>
                </table>
            </form>
        </div>
    </div>
    <!-- /main-content -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 


<?php include('../includes/footer-admin.php'); ?>
<!-- /footer -->
</body>
</html>
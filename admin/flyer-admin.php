<?php
require('../classes/database.class.php');
require('../classes/Flyer.class.php');
require('../classes/flyer_db.class.php');

// page title
$title = "ShopRight Admin - Flyer";

// track user session
$user = "admin";

ob_start(); //output buffer

include('../includes/header-admin.php');
include('../includes/nav-admin.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_flyer';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list flyer
        if ($action == 'list_flyer') {
            $flyers = FlyerDB::getFlyer();

            // Display the flyer list
            include('../includes/flyer/flyer-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_flyer') {
            // Get the flyer ID
            $flyer_id = $_POST['flyer_id'];

            // Delete the flyer
            FlyerDB::deleteFlyer($flyer_id);
            header("Location: flyer-admin.php?msg=Deleted");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the flyer ID
            $flyer_id = $_POST['flyer_id'];

            // gets flyer info
            $flyer = FlyerDB::getFlyerByID($flyer_id);
            include('../includes/flyer/flyer-update.php');
        } else if ($action == 'update_flyer') {
            // Get the flyer ID
            $flyer_id = $_POST['flyer_id'];
            // retrieve from form
            $date = $_POST["flyerdate"];
//Error Value: 4; No file was uploaded.
            if ($_FILES['page1']['error']!=4){
                $page1 = time()."-".key($_FILES).".".pathinfo($_FILES['page1']['name'], PATHINFO_EXTENSION);
            } else if (!in_array($_POST['page'][0], $_POST['pagedel'])){
               $page1 = $_POST['page'][0];
            }
            else{
                $page1 = "";
            }

            // validation
            if (isset($date) && !empty($date)){
                $flyer = new Flyer($date, $page1);
                // update flyer
                FlyerDB::updateFlyer($flyer, $flyer_id);
                // save image on disks
                FlyerDB::saveImage($flyer, $flyer_id, $_FILES['page1']);
                header("Location: flyer-admin.php?msg=Added");
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />";
                return;
            }
        }
        // Add button: shows add form
        else if ($action == 'show_add_form') {
            include('../includes/flyer/flyer-add.php');
        }
        // Add function: checks for validation and inserts into database
        else if ($action == 'add_flyer') {
            // retrieve from form
            $date = $_POST["flyerdate"];
            
            if ($_FILES['page1']['error']!=4){
                $page1 = time()."-".key($_FILES).".".pathinfo($_FILES['page1']['name'], PATHINFO_EXTENSION);
            } else{
                $page1 = "";
            }

            // validation
            if (isset($date) && !empty($date)){
                $flyer = new Flyer($date, $page1);
                // get inserted id
                $last_insert_id = FlyerDB::addFlyer($flyer);
                // save image on disk
                if ($last_insert_id!=""){
                    FlyerDB::saveImage($flyer, $last_insert_id, $_FILES['page1']);
                }
                header("Location: flyer-admin.php?msg=Added");
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />";
                return;
            }
        }

        ob_end_flush();
        ?>
    </div>
    <!-- /single-content -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 



<?php include('../includes/footer-admin.php'); ?>
<!-- /footer -->

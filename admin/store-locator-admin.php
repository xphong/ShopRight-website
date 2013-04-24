<?php
require('../classes/database.class.php');
require('../classes/StoreLocator.class.php');
require('../classes/storelocator_db.class.php');
//include ('../includes/header-admin.php');
//include ('../includes/nav-admin.php');

// page title
$title = "ShopRight Admin - Store Locator";

// track user session
$user = "admin";

ob_start(); //output buffer

include ('../includes/header-admin.php');
include ('../includes/nav-admin.php');



if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_storelocator';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list store locator table
        if ($action == 'list_storelocator') {
            $storelocators = StoreLocatorDB::getStoreLocator();

            // Display the storel location list
            include('../includes/store-locator/store-locator-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_storelocator') {
            // Get the store locator ID
            $storelocator_id = $_POST['storelocator_id'];

            // Delete the store locator
            StoreLocatorDB::deleteStoreLocator($storelocator_id);
            
            header("Location: store-locator-admin.php?msg=Deleted");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the store locator ID
            $storelocator_id = $_POST['storelocator_id'];

            // gets store locator info
            $storelocator = StoreLocatorDB::getStoreLocatorByID($storelocator_id);
            include('../includes/store-locator/store-locator-update.php');
        } else if ($action == 'update_storelocator') {
            // Get the store locator ID
            $storelocator_id = $_POST['storelocator_id'];
            
            // retrieve from form
            $name = $_POST["name"];
            $address = $_POST["address"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];
            $hours = $_POST["hours"];
            $phone = $_POST["phone"];

            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $lat_pattern = "/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}/";
            $lng_pattern = "/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}/";
            $phone_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((!$name)||(!$address)||(!$lat)||(!$lng)||(!$phone)) {
                $errors[] = "Please fill in all fields";
            }
            
            if (($name)&&(preg_match($number_pattern, $name))){
                $errors[] = "Please enter name without a number";
            }
            if (($lat)&&(!preg_match($lat_pattern, $lat))){
                $errors[] = "Please enter correct lattitude coordinate";
            }
            if (($lng)&&(!preg_match($lng_pattern, $lng))){
                $errors[] = "Please enter correct longitude coordinate";
            }
            if (($phone)&&(!preg_match($phone_pattern, $phone))){
                $errors[] = "Please enter correct phone number";
            }

            // if there are no validation errors, insert into table
            if (!empty($errors)) {
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "</div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
            }
            else{
                $storelocator = new StoreLocator($name, $address, $lat, $lng, $hours, $phone);
                StoreLocatorDB::updateStoreLocator($storelocator, $storelocator_id);
                header("Location: store-locator-admin.php?msg=Updated");
            }
        }
        // Add button: shows add form
        else if ($action == 'show_add_form') {
            include('../includes/store-locator/store-locator-add.php');
        }
        // Add function: checks for validation and inserts into database
        else if ($action == 'add_storelocator') {
            // retrieve from form
            $name = $_POST["name"];
            $address = $_POST["address"];
            $lat = $_POST["lat"];
            $lng = $_POST["lng"];
            $hours = $_POST["hours"];
            $phone = $_POST["phone"];
            

            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $lat_pattern = "/^-?([1-8]?[1-9]|[1-9]0)\.{1}\d{1,6}/";
            $lng_pattern = "/^-?([1]?[1-7][1-9]|[1]?[1-8][0]|[1-9]?[0-9])\.{1}\d{1,6}/";
            $phone_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((!$name)||(!$address)||(!$lat)||(!$lng)||(!$phone)) {
                $errors[] = "Please fill in all fields";
            }
            
            if (($name)&&(preg_match($number_pattern, $name))){
                $errors[] = "Please enter name without a number";
            }
            if (($lat)&&(!preg_match($lat_pattern, $lat))){
                $errors[] = "Please enter correct lattitude coordinate";
            }
            if (($lng)&&(!preg_match($lng_pattern, $lng))){
                $errors[] = "Please enter correct longitude coordinate";
            }
            if (($phone)&&(!preg_match($phone_pattern, $phone))){
                $errors[] = "Please enter correct phone number";
            }

            // if there are no validation errors, insert into table
            if (!empty($errors)) {
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "</div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
            }//inserting th mwe store
            else{
                $storelocator = new StoreLocator($name, $address, $lat, $lng, $hours, $phone);
                StoreLocatorDB::addStoreLocator($storelocator);
                header("Location: store-locator-admin.php?msg=Added");
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

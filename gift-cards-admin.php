<?php
require('functions/database.php');
require('functions/gift-cards/GiftCard.class.php');
require('functions/gift-cards/GiftCardDB.class.php');

// page title
$title = "ShopRight Admin - Gift Cards";

// track user session
$user = "admin";

ob_start(); //output buffer

include('includes/header.php');
include('includes/nav.php');


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_giftcards';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list gift cards table
        if ($action == 'list_giftcards') {
            $giftcards = GiftCardDB::getGiftCards();

            // Display the gift cards list
            include('functions/gift-cards/gift-cards-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_giftcard') {
            // Get the gift card ID
            $giftcard_id = $_POST['giftcard_id'];

            // Delete the gift card
            GiftCardDB::deleteGiftCard($giftcard_id);

            // set output message - DOES NOT WORK
            $outputmessage = "<div class='successbox'>Gift Card Deleted</div>";
            echo $outputmessage;

            header("Location: gift-cards-admin.php");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the gift card ID
            $giftcard_id = $_POST['giftcard_id'];

            // gets gift card info
            $giftcard = GiftCardDB::getGiftCardByID($giftcard_id);
            include('functions/gift-cards/gift-cards-update.php');
        } else if ($action == 'update_giftcard') {
            // Get the gift card ID
            $giftcard_id = $_POST['giftcard_id'];
            
            // retrieve from form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $rname = $_POST["rname"];
            $address = $_POST["address"];
            $postalcode = $_POST["postalcode"];
            $phonenumber = $_POST["phonenumber"];
            $message = $_POST["message"];
            $amount = $_POST["amount"];

            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $email_pattern = "/[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+/";
            $postalcode_pattern = "/[A-Z,a-z][0-9][A-Z,a-z]\ ?[0-9][A-Z,a-z][0-9]$/";
            $phonenumber_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((isset($name) && !empty($name)) && (isset($email) && !empty($email)) && (isset($rname) && !empty($rname))
                    && (isset($address) && !empty($address)) && (isset($postalcode) && !empty($postalcode))
                    && (isset($phonenumber) && !empty($phonenumber))) {

                if (preg_match($number_pattern, $name)) {
                    $errors[] = "Please enter name without a number";
                }

                if (!preg_match($email_pattern, $email)) {
                    $errors[] = "Please enter correct email";
                }

                if (preg_match($number_pattern, $rname)) {
                    $errors[] = "Please enter recipient name without number";
                }

                if (!preg_match($postalcode_pattern, $postalcode)) {
                    $errors[] = "Please enter correct postal code";
                }

                if (!preg_match($phonenumber_pattern, $phonenumber)) {
                    $errors[] = "Please enter correct phone number";
                }
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "
                    </div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
                // if there are no validation errors, insert into table
                if (empty($errors)) {

                    $giftcard = new GiftCard($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount);
                    GiftCardDB::updateGiftCard($giftcard, $giftcard_id);

                    // set output message - DOES NOT WORK
                    $outputmessage = "<div class='successbox'>Gift Card Added</div>";
                    echo $outputmessage;
                    header("Location: gift-cards-admin.php");
                }
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />
                        ";
            }
        }
        // Add button: shows add form
        else if ($action == 'show_add_form') {
            include('functions/gift-cards/gift-cards-add.php');
        }
        // Add function: checks for validation and inserts into database
        else if ($action == 'add_giftcard') {
            // retrieve from form
            $name = $_POST["name"];
            $email = $_POST["email"];
            $rname = $_POST["rname"];
            $address = $_POST["address"];
            $postalcode = $_POST["postalcode"];
            $phonenumber = $_POST["phonenumber"];
            $message = $_POST["message"];
            $amount = $_POST["amount"];

            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $email_pattern = "/[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+/";
            $postalcode_pattern = "/[A-Z,a-z][0-9][A-Z,a-z]\ ?[0-9][A-Z,a-z][0-9]$/";
            $phonenumber_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((isset($name) && !empty($name)) && (isset($email) && !empty($email)) && (isset($rname) && !empty($rname))
                    && (isset($address) && !empty($address)) && (isset($postalcode) && !empty($postalcode))
                    && (isset($phonenumber) && !empty($phonenumber))) {

                if (preg_match($number_pattern, $name)) {
                    $errors[] = "Please enter name without a number";
                }

                if (!preg_match($email_pattern, $email)) {
                    $errors[] = "Please enter correct email";
                }

                if (preg_match($number_pattern, $rname)) {
                    $errors[] = "Please enter recipient name without number";
                }

                if (!preg_match($postalcode_pattern, $postalcode)) {
                    $errors[] = "Please enter correct postal code";
                }

                if (!preg_match($phonenumber_pattern, $phonenumber)) {
                    $errors[] = "Please enter correct phone number";
                }
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "
                    </div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
                // if there are no validation errors, insert into table
                if (empty($errors)) {

                    $giftcard = new GiftCard($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount);
                    GiftCardDB::addGiftCard($giftcard);

                    // set output message - DOES NOT WORK!!
                    $outputmessage = "<div class='successbox'>Gift Card Added</div>";
                    echo $outputmessage;
                    header("Location: gift-cards-admin.php");
                }
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />";
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



<?php include('includes/footer.php'); ?>
<!-- /footer -->

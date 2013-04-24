<?php
require('../classes/database.class.php');
require('../classes/Career.class.php');
require('../classes/career_db.class.php');

// page title
$title = "ShopRight Admin - Career";

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
    $action = 'list_career';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list career
        if ($action == 'list_career') {
            $careers = CareerDB::getCareer();

            // Display the career list
            include('../includes/career/career-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_career') {
            // Get the career ID
            $career_id = $_POST['career_id'];

            // Delete the career
            CareerDB::deleteCareer($career_id);
            header("Location: career-admin.php?msg=Deleted");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the career ID
            $career_id = $_POST['career_id'];

            // gets career info
            $career = CareerDB::getCareerByID($career_id);
            include('../includes/career/career-update.php');
        } else if ($action == 'update_career') {
            // Get the career ID
            $career_id = $_POST['career_id'];

            // retrieve from form
            $jobid = $_POST['jobid'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            
            $postalcode = $_POST['postalcode'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $resumedel = isset($_POST['resumedel']) ? $_POST['resumedel'] : array();//option to delete the file only


            if ($_FILES['resume']['error']!=4){
                $resume = time()."-resume.".pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
            } else if (!in_array($_POST['resume'][0], $resumedel)){
                $resume = $_POST['resume'][0];
            } else {
                $resume = "";
            }

            // validation
            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $email_pattern = "/[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+/";
            $postalcode_pattern = "/[A-Z,a-z][0-9][A-Z,a-z]\ ?[0-9][A-Z,a-z][0-9]$/";
            $phone_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((!$jobid)||(!$name)||(!$address)||(!$postalcode)||(!$phone)||(!$email)) {
                $errors[] = "Please fill in all fields";
            }
            
            if (($name)&&(preg_match($number_pattern, $name))){
                $errors[] = "Please enter name without a number";
            }
            if (($email)&&(!preg_match($email_pattern, $email))){
                $errors[] = "Please enter correct email";
            }
            if (($postalcode)&&(!preg_match($postalcode_pattern, $postalcode))){
                $errors[] = "Please enter correct postal code";
            }
            if (($phone)&&(!preg_match($phone_pattern, $phone))){
                $errors[] = "Please enter correct phone number";
            }

            if ((empty($resume))&&(empty($resumedel))){
                $errors[] = "You have to provide a resume";
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
                $career = new Career($jobid, $name, $address, $postalcode, $phone, $email, $resume);
                // update career
                CareerDB::updateCareer($career, $career_id);
                // save resume on disk
                CareerDB::saveResume($career, $career_id, $_FILES['resume'], "../");
                header("Location: career-admin.php?msg=Updated");
            }
        }
        // Add button: shows add form
        else if ($action == 'show_add_form') {
            include('../includes/career/career-add.php');
        }
        // Add function: checks for validation and inserts into database
        else if ($action == 'add_career') {
            // retrieve from form
            $jobid = $_POST['jobid'];
            $name = $_POST['name'];
            $address = $_POST['address'];
            $postalcode = $_POST['postalcode'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            // regular expression patterns
            $number_pattern = "/[0-9]/";
            $email_pattern = "/[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+/";
            $postalcode_pattern = "/[A-Z,a-z][0-9][A-Z,a-z]\ ?[0-9][A-Z,a-z][0-9]$/";
            $phone_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((!$jobid)||(!$name)||(!$address)||(!$postalcode)||(!$phone)||(!$email)) {
                $errors[] = "Please fill in all fields";
            }
            
            if (($name)&&(preg_match($number_pattern, $name))){
                $errors[] = "Please enter name without a number";
            }
            if (($email)&&(!preg_match($email_pattern, $email))){
                $errors[] = "Please enter correct email";
            }
            if (($postalcode)&&(!preg_match($postalcode_pattern, $postalcode))){
                $errors[] = "Please enter correct postal code";
            }
            if (($phone)&&(!preg_match($phone_pattern, $phone))){
                $errors[] = "Please enter correct phone number";
            }
            
           // validate there is a file to be uploaded
            if ($_FILES['resume']['error']!=4){
                $resume = time()."-resume.".pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
            } else{
                $resume = "";
                $errors[] = "You have to provide a resume";
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
                $career = new Career($jobid, $name, $address, $postalcode, $phone, $email, $resume);
                // get inserted id
                $last_insert_id = CareerDB::addCareer($career);
                // save image on disk
                if ($last_insert_id!=""){
                    CareerDB::saveResume($career, $last_insert_id, $_FILES['resume'], "../");
                }
                //the
                //

                header("Location: career-admin.php?msg=Added");
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
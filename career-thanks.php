<?php
require("includes/header.php");
require("includes/nav.php");

require('classes/database.class.php');
require("classes/Career.class.php");
require("classes/career_db.class.php");
?>

<section id="content">
    <div id="single-content">
<?php
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

        echo "<article>";
        echo "<div class=\"heading\">"; 

        // if there are no validation errors, insert into table
        if (!empty($errors)) {
            echo "<h2>Error!</h2>";
            echo "</div>";
            echo "<div class=\"content\">";
            echo "<div class=\"errorbox\">";
            foreach ($errors As $err) {
                echo "$err<br />";
            }
            echo "</div>";
            echo "</div><br />";
            echo "<input type='button' onclick='history.go(-1);' value='Back to form' />";
        }
        else{
            $career = new Career($jobid, $name, $address, $postalcode, $phone, $email, $resume);
            $last_insert_id = CareerDB::addCareer($career);
            if ($last_insert_id!=""){
                CareerDB::saveResume($career, $last_insert_id, $_FILES['resume']);
            }
            echo "<h2>We have received your application.</h2>";
            echo "</div>";
            echo "<div class=\"content\">";
            echo "<p>Thank you for your interest to work at <a href=\"careers.php\">ShopRight</a>.</p>";
        }
        echo "</div>";
        echo "</article>";
?>
    </div>
    <div class="clear"></div>
</section>

<?php
require("includes/footer.php");
?>
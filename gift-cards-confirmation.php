<!--Phong Huynh 810194340
PHP Project
ShopRight - Gift Cards-->﻿
<?php 
require('functions/Database.php');
require('functions/GiftCard.php');
require('functions/GiftCard_DB.php');
?>


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>

        <!-- Metas -->
        <meta charset="utf-8">
        <title>ShopRight - Gift Cards</title>
        <meta name= "description" content="ShopRight Groceries: lower price deals every week. Flyer. Store Locator. Recipes. Events. About. Contact. Gift Cards. Coupons. Careers"  >
        <meta name= "keywords" content="food, groceries, flyer, location, recipes, events, gift cards, coupons, careers, weekly deals" >

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <!--[if lt IE 8]>
               <div style=' clear: both; text-align:center; position: relative;'>
                 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
                   <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
                </a>
              </div>
            <![endif]-->
        <!--[if lt IE 9]>
                        <script src="js/html5.js"></script>
                <![endif]-->

        <link href='./images/favicon.png' rel='icon' type='image/x-icon'/>
    </head>
    <body>

        <?php include('includes/header.php'); ?>
        <!-- /header -->

        <?php include('includes/nav.php'); ?>
        <!-- /nav -->

        <section id="content">
            <div id="single-content">
                <?php 
                       
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

            foreach ($errors As $err) {
                echo "<br />$err";
            }
            
            // if there are no validatione errors, insert into table
            if (empty($errors)) {
                $giftcard = new GiftCard($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount);
                GiftCardDB::addGiftCard($giftcard);
                echo "Thank you for ordering a gift card. A confirmation email with a receipt will be sent to you shortly.";
                // also display receipt
                // email function here
            }
                }
         else {
            echo "Please fill in all fields.";
        }
                ?>
            </div>
            <!-- /single-content -->

            <div class="clear"></div>
            <!-- /clear --> 
        </section>
        <!-- /content --> 



        <?php include('includes/footer.php'); ?>
        <!-- /footer -->
    </body>
</html>
<?php
require('classes/database.class.php');
require('classes/giftcard.class.php');
require('classes/giftcard_db.class.php');

// page title
$title = "ShopRight - Gift Cards";

// track user session
$user = "guest";

ob_start(); //output buffer

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="main-content">


        <?php
        if ($user == "guest") {
            include('includes/gift-cards/gift-cards-guestform.php');
        } else {
            include('includes/gift-cards/gift-cards-userform.php');
        }
        ob_end_flush();
        ?>

    </div>
    <!-- /main-content -->
    <?php include('includes/sidebar.php'); ?>
    <!-- /sidebar -->
    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 



<?php include('includes/footer.php'); ?>
<!-- /footer -->

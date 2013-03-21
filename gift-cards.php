<?php
require('functions/Database.php');
require('functions/GiftCard.php');
require('functions/GiftCard_DB.php');
// page title
$title = "ShopRight - Gift Cards";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="main-content">


        <?php
        if ($user == "guest") {
            include('includes/gift-cards-guestform.php');
        } else {
            include('includes/gift-cards-userform.php');
        }
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

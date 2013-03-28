<?php
require('functions/Database.php');
require('functions/gift-cards/GiftCard.php');
require('functions/gift-cards/GiftCard_DB.php');
// page title
$title = "ShopRight - Gift Cards";

// track user session
$user = "guest";

ob_start();

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="main-content">


        <?php
        if ($user == "guest") {
            include('functions/gift-cards/gift-cards-guestform.php');
        } else {
            include('functions/gift-cards/gift-cards-userform.php');
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

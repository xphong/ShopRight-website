<?php
// page title
$title = "ShopRight - Gift Cards Confirmation";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="single-content">

        <div class="successbox">Thank you for ordering a gift card. A confirmation email with a receipt will be sent to you shortly.</div>
        <br />
        <?php
        if ($user == "guest") {
            include('functions/gift-cards/gift-cards-guestregister.php');
        }
        ?>

        <input type="button" onclick="window.location.href='gift-cards.php'" value="Back to Gift Cards" />
    </div>
    <!-- /single-content -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 



<?php include('includes/footer.php'); ?>
<!-- /footer -->

<?php
require('functions/database.php');
require('functions/gift-cards/GiftCard.class.php');
require('functions/gift-cards/GiftCardDB.class.php');

// page title
$title = "ShopRight Admin - Gift Cards";

// track user session
$user = "admin";

ob_start();

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
        if ($action == 'list_giftcards') {
            $giftcards = GiftCardDB::getGiftCards();

            // Display the gift cards list
            include('functions/gift-cards/gift-cards-list.php');
        }
        // if user clicks on delete
        else if ($action == 'delete_giftcard') {
            // Get the gift card ID
            $giftcard_id = $_POST['giftcard_id'];

            // Delete the gift card
            GiftCardDB::deleteGiftCard($giftcard_id);
            
            // set output message - DOES NOT WORK
            $outputmessage = "Gift Card Deleted";

            header("Location: gift-cards-admin.php");
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

<?php
require('functions/database.php');
require('functions/gift-cards/GiftCard.php');
require('functions/gift-cards/GiftCard_DB.php');

// page title
$title = "ShopRight Admin - Gift Cards";

// track user session
$user = "admin";


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
?>
    </div>
    <!-- /single-content -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 



<?php include('includes/footer.php'); ?>
<!-- /footer -->

<?php
require('classes/database.class.php');
require('classes/search.class.php');
require('classes/search_db.class.php');

// page title
$title = "ShopRight - Search Results";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');

// check if user searched anything
if (isset($_GET['search'])) {
    $keyword = $_GET['search'];
} 

?>

<section id="content">
    <div id="main-content">
          <?php
                include('includes/search/search-results.php');
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

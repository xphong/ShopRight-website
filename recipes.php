<?php
require('classes/database.class.php');
require('classes/giftcard.class.php');
require('classes/giftcard_db.class.php');

// page title
$title = "ShopRight - Recipes";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="main-content">
        <h2>Recipes</h2>
        <div id="recipes">
            asdasdasdasdasd asdasdasdasdasd asdasdasdasdasd asdasdasdasdasd asdasdasdasdasd
        </div>

    </div>
    <!-- /main-content -->
    <div id="sidebar">
        <section>
            <div class="heading">
                <h2> Members Login </h2>
            </div>
            <div class="content">
                <p> Members Login and New customer registration link </p>
            </div>
        </section>
        <!-- /sidebar section -->
        <section>
            <div class="heading">
                <h2> Top Recipes </h2>
            </div>
            <div class="content"> 
                <ul>
                    <li>Test</li>
                    <li>Test</li>
                    <li>Test</li>
                    <li>Test</li>
                    <li>Test</li>
                </ul>
            </div>
        </section>
        <!-- /sidebar section -->
    </div>
    <!-- /sidebar -->

    <div class="clear"></div>
    <!-- /clear --> 
</section>
<!-- /content --> 







<?php include('includes/footer.php'); ?>
<!-- /footer -->

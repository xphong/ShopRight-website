<?php
// page title
$title = "ShopRight Admin - Home";

//if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin")
//      header('Location: ../login.php');

include('../includes/header-admin.php');
include('../includes/nav-admin.php');
?>


<section id="content">
    <div id="main-content">
        <article>
            <div class="heading">
                <h2>Welcome to the ShopRight CMS</h2>
            </div>
            <div class="content">
                <p>A website CMS or Content Management System is software that resides on a server and replaces web pages as a means of displaying a website. The pages do not exist and instead are created from a database on-the-fly, by the CMS software. The owner can edit content online without recourse to a webmaster. Additional website functions and features are added by means of plugins, so that custom development is not normally required. Page design is based on templates instead of the free-form method used in normal web pages, and this means that content is separated from design, so that each does not affect the other. This means the site owner can change the content without affecting the page layout, and that design issues are resolved more easily and quickly. 
                </p><p>
It is just as easy to create a 1,000-page website as a 10-page site, as the CMS creates the page framework and the content can be pasted in. A new page can be created and go live on the site in under two minutes if the standard page layout is chosen.
</p><p>
A website CMS is therefore the best way to run a large website, or indeed any site where regular edits or changes are made; and where additional functions will be needed at a later date. A large or complex site will be far quicker and cheaper to build with a CMS.
                </p>
            </div>
        </article>
        <!-- /article -->
    </div>
    <!-- /main-content -->

    <div id="sidebar">
        <section>
            <div class="heading">
                <h2>Admin Links</h2>
            </div>
            <div class="content">
                <ul>
                    <li><a href="index.php" title="Flyer">Home</a></li>
                    <li><a href="flyer-admin.php" title="Flyer">Flyer</a></li>
                    <li><a href="store-locator-admin.php" title="Store Locator">Store Locator</a></li>
                    <li><a href="recipes-admin.php" title="Recipes">Recipes</a></li>
                    <li><a href="gift-cards-admin.php" title="Gift Cards">Gift Cards</a></li>
                    <li><a href="career-admin.php" title="Careers">Careers</a></li>
                    <li><a href="search-admin.php" title="Careers">Search</a></li>
                </ul>
            </div>
    </div>
</section>
<!-- /sidebar section -->
</div>
<!-- /sidebar -->

<div class="clear"></div>
<!-- /clear --> 
</section>
<!-- /content --> 

<?php include('../includes/footer-admin.php'); ?>
<!-- /footer -->
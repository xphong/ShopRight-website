<?php
require('classes/database.class.php');
require('classes/recipe.class.php');
require('classes/recipe_db.class.php');

// page title
$title = "ShopRight - Recipes";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');

// check if user searched anything
if (isset($_GET['search'])) {
    $action = "search";
    $search = $_GET['search'];
    $type = $_GET['type'];
} else {
    $action = "none";
}
?>

<section id="content">
    <div id="main-content">
        <h2>Recipes</h2>
        <div id="recipes">
            <div id="search">
                <h3>Search Recipes</h3>
                <form method="get" action="recipes.php">
                    <input name="search" type="Text" placeholder="Search keyword(s)" />
                    <select name="type" >
                        <option value="name">Recipe Name</option>
                        <option value="servings">Servings</option>
                        <option value="calories">Maximum Calories</option>
                    </select>
                    <br />
                    <input type="submit" value="Search" />
                </form><!-- /form -->
                <br />
                <a href="recipes.php">View All Recipes</a>
            </div>
            <!--/search-->

            <?php
            // show recipes tab
            if ($action == "none") {
                include('includes/recipes/recipes-tabs.php');
            }
            else {
                include('includes/recipes/recipes-search.php');
            }
            ?>
        </div>

    </div>
    <!-- /main-content -->
    <div id="sidebar">
        <section>
            <div class="heading">
                <h2>Top Recipes</h2>
            </div>
            <div class="content"> 
                <?php include('includes/recipes/recipes-top.php'); ?>
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

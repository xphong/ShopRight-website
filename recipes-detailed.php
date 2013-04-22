<?php
require('classes/database.class.php');
require('classes/recipe.class.php');
require('classes/recipe_db.class.php');

// page title
$title = "ShopRight - Recipe Page";

// track user session
$user = "guest";

include('includes/header.php');
include('includes/nav.php');
?>

<section id="content">
    <div id="main-content">
        <div id="recipes">
            <?php
            // check if user selected recipe from correct page
            if (isset($_GET['id'])) {
                // set recipe id
                $recipe_id = $_GET['id'];
                // gets recipe info
                $recipe = RecipeDB::getRecipeByID($recipe_id);
                $recipe_name = $recipe->getRecipeName();
                $image = $recipe->getImage();
                $servings = $recipe->getServings();
                $calories = $recipe->getCalories();
                $prep_time = $recipe->getPrepTime();
                $ingredients = $recipe->getIngredients();
                $instructions = $recipe->getInstructions();
                
                // output recipe info
                echo "<h2>$recipe_name</h2>
                      <p>Servings: $servings
                      <br />
                      Calories: $calories calories
                      <br />
                      Preparation Time: $prep_time
                      </p>
                      <hr /><br />
                      <h3>Recipe Ingredients</h3>
                      $ingredients
                      <hr /><br />
                      <h3>Recipe Instructions</h3>
                      $instructions";
            }
            else {
                echo "<h2>Recipe not found</h2>";
            }
            ?>
        </div>
    </div>
    <!-- /main-content -->
    <div id="sidebar">
        <section>
            <div class="content">
                <img src="<?php echo $image ?>"/>
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

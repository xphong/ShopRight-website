<?php
require('classes/database.class.php');
require('classes/recipe.class.php');
require('classes/recipe_db.class.php');

// page title
$title = "ShopRight Admin - Recipes";

// track user session
$user = "admin";

ob_start(); //output buffer

include('includes/header.php');
include('includes/nav.php');



if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'list_recipes';
}

?>

<section id="content">
    <div id="single-content">
        <?php
        // list recipes table
        if ($action == 'list_recipes') {
            $recipes = RecipeDB::getRecipes();

            // Display the recipes list
            include('includes/recipes/recipes-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_recipe') {
            // Get the recipe ID
            $recipe_id = $_POST['recipe_id'];

            // Delete the recipe
            RecipeDB::deleteRecipe($recipe_id);
            
            header("Location: recipes-admin.php?msg=Deleted");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the recipe ID
            $recipe_id = $_POST['recipe_id'];

            // gets recipe info
            $recipe = RecipeDB::getRecipeByID($recipe_id);
            include('includes/recipes/recipes-update.php');
        } else if ($action == 'update_recipe') {
            // Get the recipe ID
            $recipe_id = $_POST['recipe_id'];

            // retrieve from form
            $recipe_name = $_POST["recipe_name"];
            $type = $_POST["type"];
            $ingredients = $_POST["ingredients"];
            $servings = $_POST["servings"];
            $calories = $_POST["calories"];
            $prep_time = $_POST["prep_time"];
            $instructions = $_POST["instructions"];
            $image = $_POST["image"];

            // regular expression patterns
            $number_pattern = "/[0-9]/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((isset($recipe_name) && !empty($recipe_name)) && (isset($type) && !empty($type)) && (isset($ingredients) && !empty($ingredients))
                    && (isset($servings) && !empty($servings)) && (isset($calories) && !empty($calories))
                    && (isset($prep_time) && !empty($prep_time)) && (isset($instructions) && !empty($instructions)) && (isset($image) && !empty($image))) {

                if (preg_match($number_pattern, $recipe_name)) {
                    $errors[] = "Please enter recipe name without a number";
                }

                if (preg_match($number_pattern, $type)) {
                    $errors[] = "Please enter type without a number";
                }
                
                if (!preg_match($number_pattern, $servings)) {
                    $errors[] = "Please enter servings with a number";
                }
                
                if (!preg_match($number_pattern, $calories)) {
                    $errors[] = "Please enter calories with a number";
                }
                
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "
                    </div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
                // if there are no validation errors, insert into table
                if (empty($errors)) {

                    $recipe = new Recipe($recipe_name, $type, $ingredients, $servings, $calories, $prep_time, $instructions, $image);
                    RecipeDB::updateRecipe($recipe, $recipe_id);

                    header("Location: recipes-admin.php?msg=Updated");
                }
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />
                        ";
            }
        }
        // Add button: shows add form
        else if ($action == 'show_add_form') {
            include('includes/recipes/recipes-add.php');
        }
        // Add function: checks for validation and inserts into database
        else if ($action == 'add_recipe') {
            // retrieve from form
            $recipe_name = $_POST["recipe_name"];
            $type = $_POST["type"];
            $ingredients = $_POST["ingredients"];
            $servings = $_POST["servings"];
            $calories = $_POST["calories"];
            $prep_time = $_POST["prep_time"];
            $instructions = $_POST["instructions"];
            $image = $_POST["image"];
            
            // regular expression patterns
            $number_pattern = "/[0-9]/";

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((isset($recipe_name) && !empty($recipe_name)) && (isset($type) && !empty($type)) && (isset($ingredients) && !empty($ingredients))
                    && (isset($servings) && !empty($servings)) && (isset($calories) && !empty($calories))
                    && (isset($prep_time) && !empty($prep_time)) && (isset($instructions) && !empty($instructions)) && (isset($image) && !empty($image))) {

                if (preg_match($number_pattern, $recipe_name)) {
                    $errors[] = "Please enter recipe name without a number";
                }

                if (preg_match($number_pattern, $type)) {
                    $errors[] = "Please enter type without a number";
                }
                
                if (!preg_match($number_pattern, $servings)) {
                    $errors[] = "Please enter servings with a number";
                }
                
                if (!preg_match($number_pattern, $calories)) {
                    $errors[] = "Please enter calories with a number";
                }
                
                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "
                    </div><br /><input type='button' onclick='history.go(-1);' value='Back to form' />";
                // if there are no validation errors, insert into table
                if (empty($errors)) {

                    $recipe = new Recipe($recipe_name, $type, $ingredients, $servings, $calories, $prep_time, $instructions, $image);
                    RecipeDB::addRecipe($recipe);

                    header("Location: recipes-admin.php?msg=Added");
                }
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />
                    <input type='button' onclick='history.go(-1);' value='Back to form' />";
            }
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

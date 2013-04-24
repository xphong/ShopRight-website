<?php
require('../classes/database.class.php');
require('../classes/recipe.class.php');
require('../classes/recipe_db.class.php');

// page title
$title = "ShopRight Admin - Recipes";

// track user session
$user = "admin";

ob_start(); //output buffer

include('../includes/header-admin.php');
include('../includes/nav-admin.php');



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
            include('../includes/recipes/recipes-list.php');
        }
        // Delete button: deletes selected row
        else if ($action == 'delete_recipe') {
            // Get the recipe ID
            $recipe_id = $_POST['recipe_id'];
            // Get recipe image path
            $image = "../" . $_POST['image'];
            
            // Delete the recipe
            RecipeDB::deleteRecipe($recipe_id);
            
            // Delete image
            unlink($image);
            
            header("Location: recipes-admin.php?msg=Deleted");
        }
        // Update button: shows update form
        else if ($action == 'show_update_form') {
            // Get the recipe ID
            $recipe_id = $_POST['recipe_id'];

            // gets recipe info
            $recipe = RecipeDB::getRecipeByID($recipe_id);
            include('../includes/recipes/recipes-update.php');
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
            $image = "placeholder";

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

                
                // path to upload images
                $target_path = "../images/";
                // file restrictions
                $exts = array("image/gif", "image/jpeg", "image/jpg", "image/png");
                
                //get the variable values in superglobles $_FILES array
                //path of the file in temp directory
                $file_temp = $_FILES['image']['tmp_name']; 
                //original path and file name of the uploaded file
                $file_name = $_FILES['image']['name']; 
                //type of file
                $file_type = $_FILES['image']['type'];
                //error number
                $file_error = $_FILES['image']['error']; 
                
                // check for general errors
                if ($file_error > 0) 
                {
                    switch ($file_error)
                    {
                        case 1: 
                        $errors[] =  "File exceeded upload_max_filesize."; 
                        break; 
                        case 2: 
                        $errors[] =  "File exceeded max_file_size"; 
                        break; 
                        case 3: 
                        $errors[] =  "File only partially uploaded."; 
                        break; 
                        case 4: 
                        $errors[] =  "No file uploaded."; 
                        break; 
                    }
                }
                else {   
                    // check if file is an image
                    if (in_array($file_type, $exts))
                    {
                        // check if file currently exists
                        if (file_exists($target_path . $file_name)) {
                            $errors[] = $file_name . " already exists.";
                        } 
                        else {
                            // Get old image path
                            $oldimage = "../" . $_POST['oldimage'];
                            // delete old image
                            unlink($oldimage);
                            
                            // upload the file
                            move_uploaded_file($file_temp, $target_path . $file_name);

                            $image = "images/" . $_FILES["image"]["name"];
                        }
                    }
                    else {
                        $errors[] = "Wrong file type. Must be an image (jpg, gif, png)";
                    }
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
            include('../includes/recipes/recipes-add.php');
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
            $image = "placeholder";

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
                
                // path to upload images
                $target_path = "../images/";
                // file restrictions
                $exts = array("image/gif", "image/jpeg", "image/jpg", "image/png");
                
                //get the variable values in superglobles $_FILES array
                //path of the file in temp directory
                $file_temp = $_FILES['image']['tmp_name']; 
                //original path and file name of the uploaded file
                $file_name = $_FILES['image']['name']; 
                //type of file
                $file_type = $_FILES['image']['type'];
                //error number
                $file_error = $_FILES['image']['error']; 
                
                // check for general errors
                if ($file_error > 0) 
                {
                    switch ($file_error)
                    {
                        case 1: 
                        $errors[] =  "File exceeded upload_max_filesize."; 
                        break; 
                        case 2: 
                        $errors[] =  "File exceeded max_file_size"; 
                        break; 
                        case 3: 
                        $errors[] =  "File only partially uploaded."; 
                        break; 
                        case 4: 
                        $errors[] =  "No file uploaded."; 
                        break; 
                    }
                }
                else {   
                    // check if file is an image
                    if (in_array($file_type, $exts))
                    {
                        // check if file currently exists
                        if (file_exists($target_path . $file_name)) {
                            $errors[] = $file_name . " already exists.";
                        } 
                        else {
                            // upload the file
                            move_uploaded_file($file_temp, $target_path . $file_name);

                            $image = "images/" . $_FILES["image"]["name"];
                        }
                    }
                    else {
                        $errors[] = "Wrong file type. Must be an image (jpg, gif, png)";
                    }
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



<?php include('../includes/footer-admin.php'); ?>
<!-- /footer -->

<?php

// Recipe DB Class: contains all database related functions for recipes pages
class RecipeDB {

    // Get list of all recipes
    public static function getRecipes() {
        $db = Database::getDB();
        $query = "SELECT * FROM recipes";
        $result = $db->query($query);
        $recipes = array();
        foreach ($result as $row) {
            $recipe = new Recipe($row['recipe_name'],
                            $row['type'],
                            $row['ingredients'],
                            $row['servings'],
                            $row['calories'],
                            $row['prep_time'],
                            $row['instructions'],
                            $row['image']);
            $recipe->setId($row['id']);
            $recipes[] = $recipe;
        }
        return $recipes;
    }
    
    // Get list of top recipes
    public static function getTopRecipes() {
        $db = Database::getDB();
        $query = "SELECT * FROM recipes Limit 0,5";
        $result = $db->query($query);
        $recipes = array();
        foreach ($result as $row) {
            $recipe = new Recipe($row['recipe_name'],
                            $row['type'],
                            $row['ingredients'],
                            $row['servings'],
                            $row['calories'],
                            $row['prep_time'],
                            $row['instructions'],
                            $row['image']);
            $recipe->setId($row['id']);
            $recipes[] = $recipe;
        }
        return $recipes;
    }
    
    // Get recipe by ID
    public static function getRecipeByID($recipe_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM recipes WHERE id = '$recipe_id'";
        $result = $db->query($query);
        $row = $result->fetch();
            $recipe = new Recipe($row['recipe_name'],
                            $row['type'],
                            $row['ingredients'],
                            $row['servings'],
                            $row['calories'],
                            $row['prep_time'],
                            $row['instructions'],
                            $row['image']);
            $recipe->setId($row['id']);
        return $recipe;
    }
    
    // Get recipes by type
    public static function getRecipesByType($type) {
        $db = Database::getDB();
        $query = "SELECT * FROM recipes WHERE type = '$type'";
        $result = $db->query($query);
        $recipes = array();
        foreach ($result as $row) {
            $recipe = new Recipe($row['recipe_name'],
                            $row['type'],
                            $row['ingredients'],
                            $row['servings'],
                            $row['calories'],
                            $row['prep_time'],
                            $row['instructions'],
                            $row['image']);
            $recipe->setId($row['id']);
            $recipes[] = $recipe;
        }
        return $recipes;
    }

    // Insert recipe into the database table
    public static function addRecipe($recipe) {
        // get database connection using database class
        $db = Database::getDB();

        $recipe_name = $recipe->getRecipeName();
        $type = $recipe->getType();
        $ingredients = $recipe->getIngredients();
        $servings = $recipe->getServings();
        $calories = $recipe->getCalories();
        $prep_time = $recipe->getPrepTime();
        $instructions = $recipe->getInstructions();
        $image = $recipe->getImage();

        // insert
        if ($stmt = $db->prepare("INSERT INTO recipes
                 (recipe_name, type, ingredients, servings, calories, prep_time, instructions, image)
             VALUES
                (:recipe_name, :type, :ingredients, :servings, :calories , :prep_time, :instructions, :image)")) {
            $stmt->bindParam(":recipe_name", $recipe_name, PDO::PARAM_STR);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":ingredients", $ingredients, PDO::PARAM_STR);
            $stmt->bindParam(":servings", $servings, PDO::PARAM_INT);
            $stmt->bindParam(":calories", $calories, PDO::PARAM_INT);
            $stmt->bindParam(":prep_time", $prep_time, PDO::PARAM_STR);
            $stmt->bindParam(":instructions", $instructions, PDO::PARAM_STR);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

    // Delete recipe
    public static function deleteRecipe($recipe_id) {
        $db = Database::getDB();

        // delete
        if ($stmt = $db->prepare("DELETE FROM recipes WHERE id = :id")) {
            $stmt->bindParam(":id", $recipe_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
   
        
    }

    // Update recipe
    public static function updateRecipe($recipe, $recipe_id) {
        // get database connection using database class
        $db = Database::getDB();

        $recipe_name = $recipe->getRecipeName();
        $type = $recipe->getType();
        $ingredients = $recipe->getIngredients();
        $servings = $recipe->getServings();
        $calories = $recipe->getCalories();
        $prep_time = $recipe->getPrepTime();
        $instructions = $recipe->getInstructions();
        $image = $recipe->getImage();
        
        // update
        if ($stmt = $db->prepare("UPDATE recipes
                 SET recipe_name = :recipe_name, type = :type, ingredients = :ingredients, servings = :servings, calories = :calories, prep_time = :prep_time, instructions = :instructions, image = :image
                 WHERE id = :id")) {
            $stmt->bindParam(":recipe_name", $recipe_name, PDO::PARAM_STR);
            $stmt->bindParam(":type", $type, PDO::PARAM_STR);
            $stmt->bindParam(":ingredients", $ingredients, PDO::PARAM_STR);
            $stmt->bindParam(":servings", $servings, PDO::PARAM_INT);
            $stmt->bindParam(":calories", $calories, PDO::PARAM_INT);
            $stmt->bindParam(":prep_time", $prep_time, PDO::PARAM_STR);
            $stmt->bindParam(":instructions", $instructions, PDO::PARAM_STR);
            $stmt->bindParam(":image", $image, PDO::PARAM_STR);
            $stmt->bindParam(":id", $recipe_id, PDO::PARAM_INT);
            $stmt->execute();
        } else {
            echo "Database Error: could not prepare SQL statement.";
        }
    }

}

?>

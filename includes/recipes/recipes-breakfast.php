<!---------------Recipes - Breakfast --------------->
<h2>Breakfast Recipes</h2>

<?php
$recipes = RecipeDB::getRecipesByType("Breakfast");

// get only breakfast recipes

echo "<ul>";

foreach ($recipes as $recipe) {
    $id = $recipe->getID();
    $recipe_name = $recipe->getRecipeName();
    $image = $recipe->getImage();
    $servings = $recipe->getServings();
    $calories = $recipe->getCalories();
    $prep_time = $recipe->getPrepTime();
    
    // output recipe details
    echo "
    <li>
    <a href='recipes-detailed.php?id=$id'><img src='$image' /></a>
    <p>
    <h4><a href='recipes-detailed.php?id=$id'>$recipe_name</a></h4>
    <br />
    Servings: $servings
    <br />
    Calories: $calories calories
    <br />
    Preparation Time: $prep_time
    </p>
    <hr />
    </li>
    ";
}

echo "</ul>";

?>
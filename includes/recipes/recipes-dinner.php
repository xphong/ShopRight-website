<!---------------Recipes - Dinner --------------->
<h2>Dinner Recipes</h2>

<?php
$recipes = RecipeDB::getRecipesByType("Dinner");

// get only dinner recipes

echo "<ul>";

foreach ($recipes as $recipe) {
    $id = $recipe->getID();
    $recipe_name = $recipe->getRecipeName();
    $image = $recipe->getImage();
    $servings = $recipe->getServings();
    $calories = $recipe->getCalories();
    $prep_time = $recipe->getPrepTime();

    $results = "
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
    
    // output recipe details
    echo $results;
}

echo "</ul>";
?>
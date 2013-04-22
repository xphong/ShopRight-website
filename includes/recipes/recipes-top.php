<?php
// get top recipes
$recipes = RecipeDB::getTopRecipes();

echo "<ul>";
foreach ($recipes as $recipe) {
    $id = $recipe->getID();
    $recipe_name = $recipe->getRecipeName();
    
    // output recipe name
    echo "
    <li>
    <h4><a href='recipes-detailed.php?id=$id'>$recipe_name</a></h4>
    </li>
    ";
}
echo "</ul>";

?>
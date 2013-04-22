<!---------------Recipes - Search --------------->
<h3>Results</h3>
<div id="recipes-search">
    <?php
    $results = "";
            
    echo "<ul>";
    // search for type only
    if (empty($search)) {
        $recipes = RecipeDB::getRecipes();

        foreach ($recipes as $recipe) {
            $id = $recipe->getID();
            $recipe_name = $recipe->getRecipeName();
            $image = $recipe->getImage();
            $servings = $recipe->getServings();
            $calories = $recipe->getCalories();
            $prep_time = $recipe->getPrepTime();

            $results .= "
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
        // check if any results found
        if (!empty($recipe)) {
            // output recipes
            echo $results;
        } else {
            echo "No results found.";
        }
    }
    // search keyword + type
    else {
        // search by recipe name
        if ($type == "name") {
            $recipes = RecipeDB::getRecipesByName($search);
            

            foreach ($recipes as $recipe) {
                $id = $recipe->getID();
                $recipe_name = $recipe->getRecipeName();
                $image = $recipe->getImage();
                $servings = $recipe->getServings();
                $calories = $recipe->getCalories();
                $prep_time = $recipe->getPrepTime();

                $results .= "
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
                // check if any results found
                if (!empty($recipe)){             
                    // output recipes
                    echo $results;
                }
                else {
                    echo "No results found.";
                }
        }
        // get recipes by servings
        if ($type == "servings") {
                        $recipes = RecipeDB::getRecipesByServings($search);

            foreach ($recipes as $recipe) {
                $id = $recipe->getID();
                $recipe_name = $recipe->getRecipeName();
                $image = $recipe->getImage();
                $servings = $recipe->getServings();
                $calories = $recipe->getCalories();
                $prep_time = $recipe->getPrepTime();

                $results .= "
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
            // check if any results found
            if (!empty($recipe)) {
                // output recipes
                echo $results;
            } else {
                echo "No results found.";
            }
        }
        // get recipes by maximum calories
        if ($type == "calories") {
                        $recipes = RecipeDB::getRecipesByCalories($search);

            foreach ($recipes as $recipe) {
                $id = $recipe->getID();
                $recipe_name = $recipe->getRecipeName();
                $image = $recipe->getImage();
                $servings = $recipe->getServings();
                $calories = $recipe->getCalories();
                $prep_time = $recipe->getPrepTime();

                $results .= "
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
            // check if any results found
            if (!empty($recipe)) {
                // output recipes
                echo $results;
            } else {
                echo "No results found.";
            }
        }
    }
    echo "</ul>";
    ?>
</div>
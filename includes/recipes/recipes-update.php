<!---------------Update Recipe--------------->
<h2>Update Recipe</h2>
<div id="recipes">
     <form action="recipes-admin.php" method="post" id="update_recipe_form">
        <input type="hidden" name="action" value="update_recipe" />
        <input type="hidden" name="recipe_id" value="<?php echo $recipe->getID(); ?>" />
        <label>Recipe Name:</label>
        <input name="recipe_name" type="Text" placeholder="Name of Recipe" value="<?php echo $recipe->getRecipeName(); ?>" />
        <label>Type:</label>
        <input name="type" type="Text" placeholder="Breakfast/Lunch/Dinner" value="<?php echo $recipe->getType(); ?>" />
        <label>Ingredients:</label>
        <textarea name="ingredients" cols="50" rows="6" placeholder="List of Ingredients"><?php echo $recipe->getIngredients(); ?></textarea>
        <label>Servings:</label>
        <input name="servings" type="Text" placeholder="# of Servings" value="<?php echo $recipe->getServings(); ?>" />
        <label>Calories:</label>
        <input name="calories" type="Text" placeholder="# of Calories" value="<?php echo $recipe->getCalories(); ?>" />
        <label>Preparation Time:</label>
        <input name="prep_time" type="Text" placeholder="Preparation time" value="<?php echo $recipe->getPrepTime(); ?>" />
        <label>Instructions:</label>
        <textarea name="instructions" cols="50" rows="6" placeholder="Instructions"><?php echo $recipe->getInstructions(); ?></textarea>
        <br /><label>Image:</label>
        <input name="image" type="Text" placeholder="Image URL" value="<?php echo $recipe->getImage(); ?>" />
        <input type="submit" value="Update" />
    </form><!-- /form -->
    <input type="button" onclick="window.location.href='recipes-admin.php'" value="Cancel" />
</div>


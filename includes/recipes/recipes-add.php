<!---------------Add Recipe--------------->
<h2>Add Recipe</h2>
<div id="recipes">
     <form action="recipes-admin.php" method="post" id="add_recipe_form">
        <input type="hidden" name="action" value="add_recipe" />
        <!--isset is used to hold values after validation errors-->
        <label>Recipe Name:</label>
        <input name="recipe_name" type="Text" placeholder="Name of Recipe" value="<?php echo isset($_POST['recipe_name']) ? $_POST['recipe_name'] : ''; ?>" />
        <label>Type:</label>
        <input name="type" type="Text" placeholder="Breakfast/Lunch/Dinner" value="<?php echo isset($_POST['type']) ? $_POST['type'] : ''; ?>" />
        <label>Ingredients:</label>
        <textarea name="ingredients" cols="50" rows="6" placeholder="List of Ingredients"><?php echo isset($_POST['ingredients']) ? $_POST['ingredients'] : ''; ?></textarea>
        <label>Servings:</label>
        <input name="servings" type="Text" placeholder="# of Servings" value="<?php echo isset($_POST['servings']) ? $_POST['servings'] : ''; ?>" />
        <label>Calories:</label>
        <input name="calories" type="Text" placeholder="# of Calories" value="<?php echo isset($_POST['calories']) ? $_POST['calories'] : ''; ?>" />
        <label>Preparation Time:</label>
        <input name="prep_time" type="Text" placeholder="Preparation time" value="<?php echo isset($_POST['prep_time']) ? $_POST['prep_time'] : ''; ?>" />
        <label>Instructions:</label>
        <textarea name="instructions" cols="50" rows="6" placeholder="Instructions"><?php echo isset($_POST['instructions']) ? $_POST['instructions'] : ''; ?></textarea>
        <br /><label>Image:</label>
        <input name="image" type="Text" placeholder="Image URL" value="<?php echo isset($_POST['image']) ? $_POST['image'] : ''; ?>" />
        <input type="submit" value="Add" />
    </form><!-- /form -->
    <input type="button" onclick="window.location.href='recipes-admin.php'" value="Cancel" />
</div>
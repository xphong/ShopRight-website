<!---------------Recipes List--------------->
<h2>Recipes Table</h2>
<br />
<p>Instructions, and ingredients are excluded from view because of length.</p>
<br />
<p>  <input type="button" onclick="window.location.href='?action=show_add_form'" value="Add Recipe" />&nbsp;<a href="../recipes.php" target="_blank">View Page</a>
</p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
            $outputmessage = "<div class='successbox'>Recipe $message</div>";
            echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>Recipe Name</th>
        <th>Type</th>
        <th>Servings</th>
        <th>Calories</th>
        <th>Prep Time</th>
        <th>Image</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($recipes as $recipe) : ?>
        <tr>
            <td><?php echo $recipe->getID(); ?></td>
            <td><?php echo $recipe->getRecipeName(); ?></td>
            <td><?php echo $recipe->getType(); ?></td>
            <td><?php echo $recipe->getServings(); ?></td>
            <td><?php echo $recipe->getCalories(); ?></td>
            <td><?php echo $recipe->getPrepTime(); ?></td>
            <td><?php echo $recipe->getImage(); ?></td>
            <td><form action="recipes-admin.php?action=show_update_form" method="post"
                      id="update_giftcard_form" >
                    <input type="hidden" name="recipe_id"
                           value="<?php echo $recipe->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
            <td><form action="recipes-admin.php" method="post"
                      id="delete_recipe_form" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="action"
                           value="delete_recipe" />
                    <input type="hidden" name="recipe_id"
                           value="<?php echo $recipe->getID(); ?>" />
                    <input type="hidden" name="image"
                           value="<?php echo $recipe->getImage(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>

        </tr>
    <?php endforeach; ?>
</table>

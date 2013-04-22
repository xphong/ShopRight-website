<!---------------Recipes - Search --------------->
<h3>Results</h3>
<div id="recipes-search">
    <?php
        // search for type only
        if (empty($search)){
            echo "search type only";
        }
        // search keyword + type
        else {
            echo "search keyword";
        }
    ?>
</div>
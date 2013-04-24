<!---------------Update Search--------------->
<h2>Update Search Results</h2>
<div id="recipes-admin">
     <form action="search-admin.php" method="post" id="update_search_form">
        <input type="hidden" name="action" value="update_search" />
        <input type="hidden" name="search_id" value="<?php echo $search->getID(); ?>" />
        <label>Title</label>
        <input name="title" type="Text" placeholder="Search Title" value="<?php echo $search->getTitle(); ?>" />
        <label>URL</label>
        <input name="url" type="Text" placeholder="URL Link" value="<?php echo $search->getURL(); ?>" />
        <label>Keywords:</label>
        <textarea name="keywords" cols="50" rows="6" placeholder="Keywords"><?php echo $search->getKeywords(); ?></textarea>

        <input type="submit" value="Update" />
    </form><!-- /form -->
    <input type="button" onclick="window.location.href='search-admin.php'" value="Cancel" />
</div>


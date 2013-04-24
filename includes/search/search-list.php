<!---------------Search List--------------->
<h2>Search Table</h2>
<br />
<br />
<p><a href="../search.php" target="_blank">View Page</a>
</p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
            $outputmessage = "<div class='successbox'>Search Result $message</div>";
            echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>URL</th>
        <th>Keywords</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($search as $searchresults) : ?>
        <tr>
            <td><?php echo $searchresults->getID(); ?></td>
            <td><?php echo $searchresults->getTitle(); ?></td>
            <td><?php echo $searchresults->getURL(); ?></td>
            <td><?php echo $searchresults->getKeywords(); ?></td>
            <td><form action="search-admin.php?action=show_update_form" method="post"
                      id="update_search_form" >
                    <input type="hidden" name="search_id"
                           value="<?php echo $searchresults->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
        </tr>
    <?php endforeach; ?>
</table>

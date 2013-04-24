<!---------------Flyer List--------------->
<h2>Flyer Table</h2>
<br />
<p><a href="?action=show_add_form">Add Flyer</a></p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
    $outputmessage = "<div class='successbox'>Flyer $message</div>";
    echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>FlyerDate</th>
        <th>Page 1</th>
        <th> </th>
        <th> </th>
    </tr>
    <?php foreach ($flyers as $flyer) : ?>
        <tr>
            <td><?php echo $flyer->getID(); ?></td>
            <td><?php echo $flyer->getFlyerDate(); ?></td>
            <td><?php echo $flyer->getPage1(); ?></td>
            <td><form action="flyer-admin.php?action=show_update_form" method="post" id="update_flyer_form" >
                    <input type="hidden" name="flyer_id" value="<?php echo $flyer->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
            <td><form action="flyer-admin.php" method="post" id="delete_flyer_form" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="action" value="delete_flyer" />
                    <input type="hidden" name="flyer_id" value="<?php echo $flyer->getID(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>

        </tr>
    <?php endforeach; ?>
</table>
<!---------------Store Location List--------------->
<h2>Store Locator Table</h2>
<br />
<p><a href="?action=show_add_form">Add Store Location</a></p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
            $outputmessage = "<div class='successbox'>Store Location $message</div>";
            echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Hours</th>
        <th>Phone</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($storelocators as $storelocator) : ?>
        <tr>
            <td><?php echo $storelocator->getID(); ?></td>
            <td><?php echo $storelocator->getName(); ?></td>
            <td><?php echo $storelocator->getAddress(); ?></td>
            <td><?php echo $storelocator->getLatitude(); ?></td>
            <td><?php echo $storelocator->getLongitude(); ?></td>
            <td><?php echo $storelocator->getHours(); ?></td>
            <td><?php echo $storelocator->getPhone(); ?></td>
            <td><form action="store-locator-admin.php?action=show_update_form" method="post"
                      id="update_storelocator_form" >
                    <input type="hidden" name="storelocator_id"
                           value="<?php echo $storelocator->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
            <td><form action="store-locator-admin.php" method="post"
                      id="delete_storelocator_form" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="action"
                           value="delete_storelocator" />
                    <input type="hidden" name="storelocator_id"
                           value="<?php echo $storelocator->getID(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>

        </tr>
    <?php endforeach; ?>
</table>
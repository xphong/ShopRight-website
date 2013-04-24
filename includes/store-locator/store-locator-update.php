<!---------------Update Store Location--------------->
<h2>Update Store Locator</h2>
<div id="store-locator">
     <form action="store-locator-admin.php" method="post" id="update_storelocator_form">
        <input type="hidden" name="action" value="update_storelocator" />
        <input type="hidden" name="storelocator_id" value="<?php echo $storelocator->getID(); ?>" />
        <label>Name:</label>
        <input name="name" type="Text" placeholder="Store name here" value="<?php echo $storelocator->getName(); ?>" />
        <label>Address:</label>
        <input name="address" type="Text" placeholder="123 Fake Street, Toronto,ON M4M 3L1" value="<?php echo $storelocator->getAddress(); ?>" />
        <label>Latitude:</label>
        <input name="lat" type="Text" placeholder="Latitude coordinates go here" value="<?php echo $storelocator->getLatitude(); ?>" />
        <label>Longitude:</label>
        <input name="lng" type="Text" placeholder="Longitude coordinates go here" value="<?php echo $storelocator->getLongitude(); ?>" />
        <label>Hours:</label>
        <input name="hours" type="Text" placeholder="days 11:00" value="<?php echo $storelocator->getHours(); ?>" />
        <label>Phone Number:</label>
        <input name="phone" type="Text" placeholder="555-555-5555" value="<?php echo $storelocator->getPhone(); ?>" />
        <input type="submit" value="Update" />
    </form><!-- /form -->
</div>
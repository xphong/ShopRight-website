<!---------------Add Store Location--------------->
<h2>Add Store Location</h2>
<div id="gift-cards">
     <form action="store-locator-admin.php" method="post" id="add_storelocator_form">
        <input type="hidden" name="action" value="add_storelocator" />
         <label>Name:</label>
        <input name="name" type="Text" placeholder="Store name here" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
        <label>Address:</label>
        <input name="address" type="Text" placeholder="123 Fake Street, Toronto,ON M4M 3L1" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" />
        <label>Latitude:</label>
        <input name="lat" type="Text" placeholder="Latitude coordinates go here" value="<?php echo isset($_POST['lat']) ? $_POST['lat'] : ''; ?>" />
        <label>Longitude:</label>
        <input name="lng" type="Text" placeholder="Longitude coordinates go here" value="<?php echo isset($_POST['lng']) ? $_POST['lng'] : ''; ?>" />
        <label>Hours:</label>
        <input name="hours" type="Text" placeholder="days 11:00" value="<?php echo isset($_POST['hours']) ? $_POST['hours'] : ''; ?>" />
        <label>Phone Number:</label>
        <input name="phone" type="Text" placeholder="555-555-5555" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" />
        <input type="submit" value="Add" />
    </form><!-- /form -->
</div>
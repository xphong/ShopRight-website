<!---------------Add Flyer--------------->
<h2>Add Flyer</h2>
<div id="gift-cards">
     <form action="flyer-admin.php" method="post" id="add_flyer_form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_flyer" />
        <label>Date:</label>
        <input id="datepick" size="50" name="flyerdate" placeholder="Flyer date here" value="<?php echo isset($_POST['flyerdate']) ? $_POST['flyerdate'] : ''; ?>" />		
        <label>Page 1:</label>
        <input name="page1" type="file" />
        <input type="submit" value="Add" />
    </form><!-- /form -->
</div>
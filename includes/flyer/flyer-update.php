<!---------------Update Flyer--------------->
<h2>Update Flyer</h2>
<div id="flyer">
     <form action="flyer-admin.php" method="post" id="update_flyer_form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update_flyer" />
        <input type="hidden" name="flyer_id" value="<?php echo $flyer->getID(); ?>" />
        <div>
            <label>Date:</label>
            <input id="datepick" size="50" name="flyerdate" placeholder="Flyer date here" value="<?php echo $flyer->getFlyerDate(); ?>" />		

        </div>
        <label>Page 1:</label>
        <div>
<?php
            if ($flyer->getPage1()){
?>
                <img src="<?php echo "../images/".$flyer->getFormattedID($flyer->getID())."/".$flyer->getPage1();?>" width="100" height="100" />
<?php
            }
?>
            <input name="page1" type="file" value="<?php echo $flyer->getPage1(); ?>" />
            <input name="page[]" type="hidden" value="<?php echo $flyer->getPage1(); ?>" />
<?php
            if ($flyer->getPage1()){
?>
                <label>delete image</label>
                <input name="pagedel[]" type="checkbox" value="<?php echo $flyer->getPage1(); ?>" />
<?php
            }
?>
        </div>
        <input type="submit" value="Update" />
    </form><!-- /form -->
</div>
<?php
// page title
$title = "ShopRight - Flyer";

require("includes/header.php");
require("includes/nav.php");

require('classes/database.class.php');
require('classes/Flyer.class.php');
require('classes/flyer_db.class.php');
?>

<section id="content">
    <div id="single-content">

<?php
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : 1;
//$id= isset($_POST['id']);
        $flyer = FlyerDB::getFlyerByID($id);
        $image = $flyer->getPage1();
        $formatted_id = $flyer->getFormattedID($id);
?>
        <article>
            <div class="content">
<?php
                if ($image!=""){
?>
                    <img src="images/<?php echo $formatted_id;?>/<?php echo $image;?>" width="600" height="600" />
<?php
                } else{
?>
                    <p style="font-size:18px;">There are no flyers available!</p>
<?php
                }
?>
            </div>
        </article>
        <div>
            <h2><a href="flyers.php">Back to Flyers Page</a></h2>
        </div>
    </div>
    <div class="clear"></div>
</section>

<?php
require("includes/footer.php");
?>
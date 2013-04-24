<?php
require_once '../includes/events/processslides.php';

// page title
$title = "ShopRight Admin - About Slides";

include('../includes/header-admin.php');
include('../includes/nav-admin.php');

?>

        <section id="content">
            <div id="single-content">
                <article>
                    <div class="heading">
                        <h2>Image Slides</h2>
                    </div>
                </article>

                <div class="content">
                    <div class="left">
                        <h2>All Images</h2>                        
                        <ol>
                            <?php foreach ($db->getAllSlides() as $slide): ?>
                            <li><form action="" method="post"> <button name="imgslider_id" value="<?php echo $slide['imgslider_id']; ?>" onclick="return confirm('Are you sure you want to delete this image?')" class="btn">Delete</button> <img class="small-image" src="../images/slides/<?php echo $slide['img_name']; ?>" /></form></li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                    <div class="right">
                        <h2>Add New Image</h2><br /><br />
                        <div class="error">
                        <?php echo $error_message; ?>                        
                    </div>
                        
                        <form enctype="multipart/form-data" action="" method="post">
                            <input type="file" name="file" />
                            
                            <input type="submit" name="upload" value="Upload" class="btn" />
                        </form>
                    </div>
                </div>
            </div>
            <!-- /main-content -->

            <div class="clear"></div>
            <!-- /clear --> 
        </section>
        <!-- /content --> 


        <?php include('../includes/footer-admin.php'); ?>
    </body>
</html>
<?php
require("includes/header.php");
require("includes/nav.php");
?>

<section id="content">
    <div id="single-content">
        <article>
<?php
            if (isset($_REQUEST['jobid'])){
?>
                <div class="heading">
                    <h2><?php echo $_REQUEST['work_title'];?></h2>
                </div>
                <div class="content">
                    <form action="career-thanks.php" method="post" enctype="multipart/form-data">
                        <p>JobID: <?php echo $_REQUEST['jobid'];?></p>
                        <input type="hidden" name="jobid" value="<?php echo $_REQUEST['jobid'];?>"/>
                        <p>Applications:<br/>
                        Please submit your information and we will keep your resume on files for coming opportunities.</p>
                        Name: <br/>
                        <input type="text" name="name"/><br/>
                        Address:<br/>
                        <input type="text" name="address" /><br/>
                        Postal Code:<br/>
                        <input type="text" name="postalcode" /><br/>
                        Phone:<br/>
                        <input type="text" name="phone" /><br/>
                        Email:<br/>
                        <input type="text" name="email" /><br/>
                        Upload resume:<br/>
                        <input type="file" name="resume" /><br/>
                        <input type="submit" value="Apply for this job" />
                    </form>
                </div>
<?php
            } else{
?>
                <div class="heading">
                    <p>Error! You need to choose a<a href="careers.php">position</a>.</p>
                </div>
<?php
            }
?>
        </article>
    </div>
    <div class="clear"></div>
</section>

<?php
require("includes/footer.php");
?>
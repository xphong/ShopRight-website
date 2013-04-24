<?php
// page title
$title = "ShopRight - Flyers";
     
require("includes/header.php");
require("includes/nav.php");

require('classes/database.class.php');
require('classes/Flyer.class.php');
require('classes/flyer_db.class.php');
?>

<section id="content">
    <div id="main-content">
        <h2>ShopRight May 2013 Flyers</h2>
<?php
        $flyers = FlyerDB::getFlyer();
        foreach($flyers as $flyer){
            $id = $flyer->getID();
            $flyerdate = $flyer->getFlyerDate(); 
?>
            <article>
                <div class="heading">
                    <h2><a href="flyer.php?id=<?php echo $id;?>"><br><?php echo $flyerdate."<br>";?></a></h2>
                </div>
            </article>
            <br/>
<?php
        }
?>
    </div>

<div id="sidebar">
    <section>
        <div class="heading">
            <h2> Members Login </h2>
        </div>
        <div class="content">
            <p> <a class="reg" href="login.php">Member Login</a><br /><br />
            Not a Registered User?<br /><a href="register.php" class="reg">Click Here</a> To Register with the store.
            </p>
        </div>
    </section>
    <!-- /sidebar section -->
    <section>
        <div class="heading">
            <h2> Locate Us </h2>
        </div>
        <div class="content">Check out our <a href="map.php" >Store locator </a>and find out the location closest to you. </div>
    </section>
    <!-- /sidebar section -->
    <section>
        <div class="heading">
            <h2> Follow Us </h2>
        </div>
        <div class="content"> <p>
                <a href="http://www.twitter.com"><img
                    src="http://cdn3.iconfinder.com/data/icons/free-social-icons/67/twitter_square-32.png" alt="Twitter" /></a> 
                <a href="http://www.facebook.com"><img
                    src="http://cdn3.iconfinder.com/data/icons/free-social-icons/67/facebook_square-32.png" alt="Facebook" /></a> 
                <a href="http://www.linkedin.com"><img
                    src="http://cdn3.iconfinder.com/data/icons/free-social-icons/67/linkedin_square_color-32.png" alt="Twitter" /></a> 
            </p>
            <br /><br />
        </div>
    </section>
    <!-- /sidebar section -->
</div>
<!-- /sidebar -->
    <div class="clear"></div>
</section>

<?php
require("includes/footer.php");
?>
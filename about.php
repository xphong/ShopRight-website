<?php
session_start();
require_once 'includes/events/processevent.php';

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>

        <!-- Metas -->
        <meta charset="utf-8">
        <title>ShopRight - About Us</title>
        <meta name= "description" content="ShopRight Groceries: lower price deals every week. Flyer. Store Locator. Recipes. Events. About. Contact. Gift Cards. Coupons. Careers"  >
        <meta name= "keywords" content="food, groceries, flyer, location, recipes, events, gift cards, coupons, careers, weekly deals" >

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="css/extra.css">
        <script src="js/jquery.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" charset="utf-8">
  $(window).load(function() {
    $('.flexslider').flexslider();
  });
</script>

        <!--[if lt IE 8]>
               <div style=' clear: both; text-align:center; position: relative;'>
                 <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
                   <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." />
                </a>
              </div>
            <![endif]-->
        <!--[if lt IE 9]>
                        <script src="js/html5.js"></script>
                <![endif]-->

        <link href='./images/favicon.png' rel='icon' type='image/x-icon'/>
    </head>
    <body>

        <?php include('includes/header.php'); ?>
        <!-- /header -->

        <?php include('includes/nav.php'); ?>
        <!-- /nav -->

        <section id="content">
            <div id="single-content">
                <div style="float: right;">
                    <?php if (isset($_SESSION['role']) && $_SESSION['role'] == "admin"): ?>
                    <a href="admin/manageslides.php" class="btn">Manage Slides</a>
                    <?php endif; ?>
                </div>
                <article>
                    <div class="heading">
                        <h2>ABOUT US</h2>
                    </div>

                    <div class="content">
                        <p>It all began with a horse-drawn meat cart in Toronto, Canada in 2007. Now, ShopRight maintains its tradition of freshness in nearly 4 stores across the area.</p>
                        <p>At ShopRight, our commitment to proudly serve our communities is more than just a slogan, it is integral in the way we do business. The people who work in our stores, offices and retail support centres live up to this commitment everyday and are passionate about making a difference in their local communities.</p>
                        <p>ShopRight has a long history of supporting the communities in which we serve and are proud to continue this legacy. Each year, we receive hundreds of requests for community and provincial support from a wide range of organizations across Ontario. In order for us to support as many deserving causes as possible, we ask that you read through our criteria and application requirements outlined on this site before submitting a proposal. We welcome new opportunities and thank you for your interest in ShopRight.</p>
                    </div>
                    
                </article>
            </div>
            <!-- /main-content -->

            <div class="clear"></div>
            
            <!--------------Slider--------------->
<div class="header-wrapper">
    <section id="slider" style="height: auto;">
        <div class="flexslider">
            <ul class="slides">
                <?php foreach ($db->getAllSlides() as $slide): ?>
                    <li><img src="slides/<?php echo $slide['img_name']; ?>" /></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section><!-- end slider -->
</div><!-- end slider-wrapper -->


<!--------------/Slider--------------->
            <!-- /clear --> 
        </section>
        <!-- /content --> 


        <?php include('includes/footer.php'); ?>
        <!-- /footer -->
    </body>
</html>
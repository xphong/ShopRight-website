<!--Phong Huynh 810194340
PHP Project
ShopRight - Gift Cards-->﻿

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
        <title>ShopRight - Gift Cards</title>
        <meta name= "description" content="ShopRight Groceries: lower price deals every week. Flyer. Store Locator. Recipes. Events. About. Contact. Gift Cards. Coupons. Careers"  >
        <meta name= "keywords" content="food, groceries, flyer, location, recipes, events, gift cards, coupons, careers, weekly deals" >

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">

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
            <div id="main-content">
                <h2>Gift Cards - Guest Form </h2>
                <div id="gift-cards">
                <form method="post" action="gift-cards-confirmation.php">
                    Name:
                    <input name="name" type="Text" />
                    Email:
                    <input name="email" type="Text" />
                    Recipient name:
                    <input name="rname" type="Text" />
                    Address:
                    <input name="address" type="Text" />
                    Postal Code:
                    <input name="postalcode" type="Text" />
                    Phone Number:
                    <input name="phonenumber" type="Text" />
                    Message:
                    <textarea name="message" cols="50" rows="6">
                </textarea>
                    Gift Card Amount:
                    <select name="amount">
                        <option value="25">$25</option>
                        <option value="50">$50</option>
                        <option value="100">$100</option>
                    </select>
                    <input type="submit" value="Submit" />
                </form>
                </div>
            </div>
            <!-- /main-content -->
            <?php include('includes/sidebar.php'); ?>
            <!-- /sidebar -->
            <div class="clear"></div>
            <!-- /clear --> 
        </section>
        <!-- /content --> 
        

        <?php include('includes/footer.php'); ?>
        <!-- /footer -->
    </body>
</html>
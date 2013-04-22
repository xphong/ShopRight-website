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
        <title><?= $title ?></title>
        <meta name= "description" content="ShopRight Groceries: lower price deals every week. Flyer. Store Locator. Recipes. Events. About. Contact. Gift Cards. Coupons. Careers"  >
        <meta name= "keywords" content="food, groceries, flyer, location, recipes, events, gift cards, coupons, careers, weekly deals" >

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="css/flexslider.css" type="text/css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
            
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script src="js/jquery.flexslider.js"></script>
        <script type="text/javascript" charset="utf-8">
            $(window).load(function() {
                $('.flexslider').flexslider();
            });
            
            $(document).ready(function(){
                $('.menu li a').hover(function(){
                    $(this).stop().animate({ color: '#7BBA55'}, 300);
                }, function() {
                    $(this).stop().animate({ color: '#000000'}, 300); //original color
                });
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

        <link href='images/favicon.png' rel='icon' type='image/x-icon'/>
    </head>
    <body>
        <!--------------Header--------------->
        <div class="header-wrapper">
            <header>
                <div id="logo"><a href="index.php"><img src="images/logo.png" alt="ShopRight" /></a></div>
                <div id="search">
                    <div class="button-search"></div>
                    <input type="text" value="Search..." onfocus="if (this.value == &#39;Search...&#39;) {this.value = &#39;&#39;;}" onblur="if (this.value == &#39;&#39;) {this.value = &#39;Search...&#39;;}">
                </div>
            </header>
        </div>
        <!--------------/Header---------------> 
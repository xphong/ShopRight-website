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
        <title>ShopRight - Events</title>
        <meta name= "description" content="ShopRight Groceries: lower price deals every week. Flyer. Store Locator. Recipes. Events. About. Contact. Gift Cards. Coupons. Careers"  >
        <meta name= "keywords" content="food, groceries, flyer, location, recipes, events, gift cards, coupons, careers, weekly deals" >

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" type="text/css" href="css/extra.css">

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
                        <a href="admin/manageevent.php" class="btn">Add Event</a>
                    <?php endif; ?>



                </div>
                <article>
                    <div class="heading">
                        <h2>Event Booking </h2>
                    </div>
                </article>

                <div class="content">
                    <div class="left">
                        <h2>All Events</h2>                        
                        <ol>
                            <?php foreach ($db->getAllEvents() as $event): ?>
                                <li><a href="" name="view" rel="<?php echo $event['event_id']; ?>" class="btn">View</a> <?php echo $event['event_name']; ?> </li>
                            <?php endforeach; ?>
                        </ol>
                    </div>
                    <div class="right">                        
                    </div>
                </div>
            </div>
            <!-- /main-content -->

            <div class="clear"></div>
            <!-- /clear --> 
        </section>
        <!-- /content --> 


        <?php include('includes/footer.php'); ?>
        <!-- /footer -->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
            $("a[name=view]").click(function(e){
                e.preventDefault();
                $.post("includes/events/viewdetails.php", { event_id : this.rel }, function(data) 
                {
                    $(".right").html(data);
                });
            })
            
            $("button[name=book]").live("click", function(e){
                e.preventDefault();
                if(confirm("Do you want to book for this event?")){
                    _this = this;
                    $.post("includes/events/viewdetails.php", { booking : true, event_id : this.value }, function(data) 
                    {
                        if(data=='success'){
                            $(_this).after('<span class="booked">You have booked for this event</span>')
                            $(_this).remove()
                        }
                        else{
                            alert(data)
                        }
                    });
                }
            })
        </script>
    </body>
</html>
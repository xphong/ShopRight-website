<?php
// page title
$title = "ShopRight - Contact Us";
include('includes/header.php');
include('includes/nav.php');

?>


<section id="content">
    <div id="main-content">
        <div id="gift-cards">
            <h2><a href="#">Contact Us</a></h2>
            <p>* means required</p><br />
            <strong>*Name:</strong>
            <input type="text" name="name" placeholder="Your name"/>

            <strong>*Email:</strong>
            <input type="text" name="email" placeholder="Your email (abc@abc.com"/>
            
            <strong>*Subject:</strong>
            <input type="text" name="subject" placeholder="Subject"/>
            
            <strong>*Message:</strong>
            <textarea name="message" cols="50" rows="6" placeholder="Your message"></textarea>

            <input type="submit" name="submit" value="Submit" />
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


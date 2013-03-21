<!---------------Gift Cards User Form--------------->
<h2>Gift Cards - User Form </h2>
<div id="gift-cards">
        <?php
        if ($_POST) {
            /* receive from database
              $name = $_POST["name"];
              $email = $_POST["email"];

              $address = $_POST["address"];
              $postalcode = $_POST["postalcode"];
              $phonenumber = $_POST["phonenumber"];
             */
            // receive from form
            $rname = $_POST["rname"];
            $message = $_POST["message"];
            $amount = $_POST["amount"];

            // errors array: stores all error messages
            $errors = array();

            // validation
            if ((isset($name) && !empty($name)) && (isset($email) && !empty($email)) && (isset($rname) && !empty($rname))
                    && (isset($address) && !empty($address)) && (isset($postalcode) && !empty($postalcode))
                    && (isset($phonenumber) && !empty($phonenumber))) {

                echo "<div class=\"errorbox\">";
                foreach ($errors As $err) {
                    echo "$err<br />";
                }
                echo "</div><br />";
                // if there are no validatione errors, insert into table
                if (empty($errors)) {
                    $giftcard = new GiftCard($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount);
                    GiftCardDB::addGiftCard($giftcard);
                    // email function here

                    header("Location: gift-cards-confirmation.php");
                }
            } else {
                echo "<div class=\"errorbox\">Please fill in all fields.</div><br />";
            }
        }
        ?>
    
        <form method="post" action="gift-cards.php">
        <label>Recipient name:</label>
        <input name="rname" type="Text" placeholder="Recipient name here" value="<?php echo isset($_POST['rname']) ? $_POST['rname'] : ''; ?>" />
        <label>Message:</label>
        <textarea name="message" cols="50" rows="6" placeholder="Your message"><?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?></textarea>
        <br /><label>Gift Card Amount:</label>
        <select name="amount" >
            <option value="25">$25</option>
            <option value="50">$50</option>
            <option value="100">$100</option>
        </select>
        <input type="submit" value="Submit" />
    </form><!-- /form -->
</div>
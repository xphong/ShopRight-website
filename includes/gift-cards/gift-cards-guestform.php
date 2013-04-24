<!---------------Gift Cards Guest form--------------->

<input type="button" onclick="window.location.href='login.php'" value="Log In" /> for a shorter form
<h2>Gift Cards - Guest Form </h2>
<div id="gift-cards">
    <?php
    ob_start();
    if ($_POST) {
        // retrieve from form
        $name = $_POST["name"];
        $email = $_POST["email"];
        $rname = $_POST["rname"];
        $address = $_POST["address"];
        $postalcode = $_POST["postalcode"];
        $phonenumber = $_POST["phonenumber"];
        $message = $_POST["message"];
        $amount = $_POST["amount"];


        // regular expression patterns
        $number_pattern = "/[0-9]/";
        $email_pattern = "/[\w\.-]+(\+[\w-]*)?@([\w-]+\.)+[\w-]+/";
        $postalcode_pattern = "/[A-Z,a-z][0-9][A-Z,a-z]\ ?[0-9][A-Z,a-z][0-9]$/";
        $phonenumber_pattern = "/\(?\d{3}\)?(\s|-)\d{3}-\d{4}$/";

        // errors array: stores all error messages
        $errors = array();

        // validation
        if ((isset($name) && !empty($name)) && (isset($email) && !empty($email)) && (isset($rname) && !empty($rname))
                && (isset($address) && !empty($address)) && (isset($postalcode) && !empty($postalcode))
                && (isset($phonenumber) && !empty($phonenumber))) {

            if (preg_match($number_pattern, $name)) {
                $errors[] = "Please enter name without a number";
            }

            if (!preg_match($email_pattern, $email)) {
                $errors[] = "Please enter correct email";
            }

            if (preg_match($number_pattern, $rname)) {
                $errors[] = "Please enter recipient name without number";
            }

            if (!preg_match($postalcode_pattern, $postalcode)) {
                $errors[] = "Please enter correct postal code";
            }

            if (!preg_match($phonenumber_pattern, $phonenumber)) {
                $errors[] = "Please enter correct phone number";
            }
            echo "<div class=\"errorbox\">";
            foreach ($errors As $err) {
                echo "$err<br />";
            }
            echo "</div><br />";
            // if there are no validation errors, insert into table
            if (empty($errors)) {

                $giftcard = new GiftCard($name, $email, $rname, $address, $postalcode, $phonenumber, $message, $amount);
                GiftCardDB::addGiftCard($giftcard);
                
                // email function
                $msg = "E-MAIL SENT FROM http://shopright.phonghuynh.ca ";
                $msg .= "Confirmation for gift card purchase: \n\n";
                $msg .= "Your name: $name\n";
                $msg .= "Recipient Name: $rname\n";
                $msg .= "Address: $address\n";
                $msg .= "Postal Code: $postalcode\n";
                $msg .= "Phone Number: $phonenumber\n";
                $msg .= "Message: $message\n";
                $msg .= "Amount: $amount\n\n";

                $to = $email; //send the email to this address can change to $sender_email
                $subject = "Gift Card Confirmation";
                $mailheaders = "From: shopright@shopright.phonghuynh.ca \n";
                $mailheaders .= "Reply-to: shopright@shopright.phonghuynh.ca \n\n";

                mail($to, $subject, $msg, $mailheaders);

                header("Location: gift-cards-confirmation.php");
            }
        } else {
            echo "<div class=\"errorbox\">Please fill in all fields.</div><br />";
        }
    }
    ?>

    <form method="post" action="gift-cards.php">
        <label>Name:</label>
        <input name="name" type="Text" placeholder="Your name here" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />
        <label>Email:</label>
        <input name="email" type="Text" placeholder="email@host.com" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />
        <label>Recipient name:</label>
        <input name="rname" type="Text" placeholder="Recipient name here" value="<?php echo isset($_POST['rname']) ? $_POST['rname'] : ''; ?>" />
        <label>Address:</label>
        <input name="address" type="Text" placeholder="123 Fake Street" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" />
        <label>Postal Code:</label>
        <input name="postalcode" type="Text" placeholder="A1A 1A1" value="<?php echo isset($_POST['postalcode']) ? $_POST['postalcode'] : ''; ?>" />
        <label>Phone Number:</label>
        <input name="phonenumber" type="Text" placeholder="555-555-5555" value="<?php echo isset($_POST['phonenumber']) ? $_POST['phonenumber'] : ''; ?>" />
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
<!---------------Update Gift Card--------------->
<h2>Update Gift Card</h2>
<div id="gift-cards">
     <form action="gift-cards-admin.php" method="post" id="update_giftcard_form">
        <input type="hidden" name="action" value="update_giftcard" />
        <input type="hidden" name="giftcard_id" value="<?php echo $giftcard->getID(); ?>" />
        <label>Name:</label>
        <input name="name" type="Text" placeholder="Your name here" value="<?php echo $giftcard->getName(); ?>" />
        <label>Email:</label>
        <input name="email" type="Text" placeholder="email@host.com" value="<?php echo $giftcard->getEmail(); ?>" />
        <label>Recipient name:</label>
        <input name="rname" type="Text" placeholder="Recipient name here" value="<?php echo $giftcard->getRname(); ?>" />
        <label>Address:</label>
        <input name="address" type="Text" placeholder="123 Fake Street" value="<?php echo $giftcard->getAddress(); ?>" />
        <label>Postal Code:</label>
        <input name="postalcode" type="Text" placeholder="A1A 1A1" value="<?php echo $giftcard->getPostalcode(); ?>" />
        <label>Phone Number:</label>
        <input name="phonenumber" type="Text" placeholder="555-555-5555" value="<?php echo $giftcard->getPhone(); ?>" />
        <label>Message:</label>
        <textarea name="message" cols="50" rows="6" placeholder="Your message"><?php echo $giftcard->getMessage(); ?></textarea>
        <br /><label>Gift Card Amount:</label>
        <select name="amount" >
            <option value="25">$25</option>
            <option value="50">$50</option>
            <option value="100">$100</option>
        </select>
        <input type="submit" value="Submit" />
    </form><!-- /form -->
</div>
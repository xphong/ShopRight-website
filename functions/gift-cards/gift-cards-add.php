<!---------------Add Gift Card--------------->
<h2>Add Gift Card</h2>
<div id="gift-cards">
     <form action="gift-cards-admin.php" method="post" id="add_giftcard_form">
        <input type="hidden" name="action" value="add_giftcard" />
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
        <input type="submit" value="Add" />
    </form><!-- /form -->
</div>
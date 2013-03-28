<!---------------Gift Cards List--------------->
<h2>Gift Cards Table</h2>
<br />
<p><a href="?action=show_add_form">Add Gift Card</a></p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
            $outputmessage = "<div class='successbox'>Gift Card $message</div>";
            echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Recipient Name</th>
        <th>Address</th>
        <th>Postal Code</th>
        <th>Phone Number</th>
        <th>Message</th>
        <th>Amount</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    <?php foreach ($giftcards as $giftcard) : ?>
        <tr>
            <td><?php echo $giftcard->getID(); ?></td>
            <td><?php echo $giftcard->getName(); ?></td>
            <td><?php echo $giftcard->getEmail(); ?></td>
            <td><?php echo $giftcard->getRname(); ?></td>
            <td><?php echo $giftcard->getAddress(); ?></td>
            <td><?php echo $giftcard->getPostalCode(); ?></td>
            <td><?php echo $giftcard->getPhone(); ?></td>
            <td><?php echo $giftcard->getMessage(); ?></td>
            <td><?php echo $giftcard->getAmount(); ?></td>
            <td><form action="gift-cards-admin.php?action=show_update_form" method="post"
                      id="update_giftcard_form" >
                    <input type="hidden" name="giftcard_id"
                           value="<?php echo $giftcard->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
            <td><form action="gift-cards-admin.php" method="post"
                      id="delete_giftcard_form" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="action"
                           value="delete_giftcard" />
                    <input type="hidden" name="giftcard_id"
                           value="<?php echo $giftcard->getID(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>

        </tr>
    <?php endforeach; ?>
</table>

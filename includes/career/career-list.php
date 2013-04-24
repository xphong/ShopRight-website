<!---------------Career List--------------->
<h2>Career Table</h2>
<br />
<p><a href="?action=show_add_form">Add Career Applicant</a></p>
<br />
<?php
if (isset($_GET['msg'])){
    $message = $_GET['msg'];
    // set output message 
    $outputmessage = "<div class='successbox'>Career $message</div>";
    echo $outputmessage;
}
?>
<table>
    
    <tr>
        <th>ID</th>
        <th>Job ID</th>
        <th>Name</th>
        <th>Address</th>
        
        <th>Postal Code</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Resume</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($careers as $career) : ?>
        <tr>
            <td><?php echo $career->getID(); ?></td>
            <td><?php echo $career->getJobID(); ?></td>
            <td><?php echo $career->getName(); ?></td>
            <td><?php echo $career->getAddress(); ?></td>
            
            <td><?php echo $career->getPostalcode(); ?></td>
            <td><?php echo $career->getPhone(); ?></td>
            <td><?php echo $career->getEmail(); ?></td>
            <td><?php echo $career->getResume(); ?></td>
            <td><form action="career-admin.php?action=show_update_form" method="post" id="update_career_form" >
                    <input type="hidden" name="career_id" value="<?php echo $career->getID(); ?>" />
                    <input type="submit" value="Update" />
                </form></td>
            <td><form action="career-admin.php" method="post" id="delete_career_form" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    <input type="hidden" name="action" value="delete_career" />
                    <input type="hidden" name="career_id" value="<?php echo $career->getID(); ?>" />
                    <input type="submit" value="Delete" />
                </form></td>

        </tr>
    <?php endforeach; ?>
</table>
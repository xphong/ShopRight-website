<!---------------Add Career--------------->
<h2>Add Career</h2>
<div id="gift-cards">
     <form action="career-admin.php" method="post" id="add_career_form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="add_career" />
        <label>Job ID:</label>
        <input name="jobid" placeholder="JobID here" value="<?php echo isset($_POST['jobid']) ? $_POST['jobid'] : ''; ?>" />

        <br/>
        <label>Name:</label>
        <input name="name" placeholder="Name here" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" />		
        <br/>
        <label>Address:</label>
        <input name="address" placeholder="Address here" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''; ?>" />		
        <br/>
        <label>Postal Code:</label>
        <input name="postalcode" placeholder="Postal Code here" value="<?php echo isset($_POST['postalcode']) ? $_POST['postalcode'] : ''; ?>" />
        <br/>
        
        <label>Phone:</label>
        <input name="phone" placeholder="Phone here" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" />		
        <br/>
        <label>Email:</label>
        <input name="email" placeholder="Email here" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" />		
        <br/>
        <label>Resume:</label>
        <input name="resume" type="file" />
        <br/>
        <input type="submit" value="Add" />
    </form><!-- /form -->
</div>
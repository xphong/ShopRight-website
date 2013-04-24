<!---------------Update Career--------------->
<h2>Update Career</h2>
<div id="career">
     <form action="career-admin.php" method="post" id="update_career_form" enctype="multipart/form-data">
        <input type="hidden" name="action" value="update_career" />
        <input type="hidden" name="career_id" value="<?php echo $career->getID(); ?>" />
        <label>JobID:</label>
        <input name="jobid" placeholder="JobID here" value="<?php echo $career->getJobID(); ?>" />
        <br/>
        <label>Name:</label>
        <input name="name" placeholder="Name here" value="<?php echo $career->getName(); ?>" />		
        <br/>
        <label>Address:</label>
        <input name="address" placeholder="Address here" value="<?php echo $career->getAddress(); ?>" />		
        <br/>
        
        <label>Postal Code:</label>
        <input name="postalcode" placeholder="Postal Code here" value="<?php echo $career->getPostalcode(); ?>" />
        <br/>
        <label>Phone:</label>
        <input name="phone" placeholder="Phone here" value="<?php echo $career->getPhone(); ?>" />		
        <br/>
        <label>Email:</label>
        <input name="email" placeholder="Email here" value="<?php echo $career->getEmail(); ?>" />		
        <br/>
        <label>Resume:</label>
        <div>
            <input name="resume" type="file" value="<?php echo $career->getResume(); ?>" />
            <input name="resume[]" type="hidden" value="<?php echo $career->getResume(); ?>" />
<?php
            if ($career->getResume()){
?>
                <label>delete existing resume</label>
                <input name="resumedel[]" type="checkbox" value="<?php echo $career->getResume(); ?>" />
<?php
            }
?>
        </div>
        <input type="submit" value="Update" />
    </form><!-- /form -->
</div>
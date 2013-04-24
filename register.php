<?php
require_once 'includes/events/processuser.php';

// page title
$title = "ShopRight - Register";
include('includes/header.php');
include('includes/nav.php');

?>

        <section id="content">
            <div id="single-content">
                <article>
                    <div class="heading">
                        <h2>User Registration</h2>
                    </div>
                </article>

                <div class="content">
                    <div class="error">
                        <?php echo $error_message; ?>                        
                    </div>
                    <form action="" method="post">
                        <table>
                            <tr>
                                <td><label>Username</label></td>
                                <td><input type="text" name="username" value="<?php echo $user->username; ?>" /></td>
                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td><input type="password" name="password" value="<?php echo $user->username; ?>" /></td>
                            </tr>
                            <tr>
                                <td><label>Repeat Password</label></td>
                                <td><input type="password" name="cpassword" value="<?php echo getValue("cpassword"); ?>" /></td>
                            </tr>
                            <tr>
                                <td><label>First Name</label></td>
                                <td><input type="text" name="firstname" value="<?php echo $user->firstname; ?>" /></td>
                            </tr>
                            <tr>
                                <td><label>Last Name</label></td>
                                <td><input type="text" name="lastname" value="<?php echo $user->lastname; ?>" /></td>
                            </tr>
                            <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn" name="register" value="register">Register</button>
                                &nbsp; &nbsp; <a href="index.php" class="reg">Cancel</a>
                            </td>
                        </tr>
                        </table>
                    </form>
                </div>
            </div>

            <div class="clear"></div>
            <!-- /clear --> 
        </section>
        <!-- /content --> 


        <?php include('includes/footer.php'); ?>
    </body>
</html>
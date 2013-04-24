<?php
require_once 'includes/events/processuser.php';
// page title
$title = "ShopRight - Login";
include('includes/header.php');
include('includes/nav.php');

?>

        <section id="content">
            <div id="single-content">
                <article>
                    <div class="heading">
                        <h2>User Login</h2>
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
                                <td><input type="text" name="username" /></td>
                            </tr>
                            <tr>
                                <td><label>Password</label></td>
                                <td><input type="password" name="password" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit"name="submit" class="btn" value="submit">login</button>
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
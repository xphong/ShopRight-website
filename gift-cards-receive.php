<?php

if ($_POST["submit"] == "Guest") {
    header("Location: gift-cards-guestform.php");
}

else {
    header("Location: gift-cards-loggedinform.php");
}


?>

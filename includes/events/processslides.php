<?php
session_start();
require_once '../classes/DB.php';
require_once '../classes/functions.php';
$db = new DB();
$error_message = "";
$target = "slides/";


if(!isset($_SESSION['role']) || $_SESSION['role']!="admin")
    redirect ("../login.php");

if(isset($_POST['imgslider_id'])){
    unlink($target.$db->getSlideById($_POST['imgslider_id']));
    $db->deleteSlide(getValue("imgslider_id"));
    redirect("manageslides.php");
}
else if(isset($_POST['upload'])){
    
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    $extension = end(explode(".", $_FILES["file"]["name"]));
    if (in_array($extension, $allowedExts)) {
        if ($_FILES["file"]["error"] > 0) {
            $error_message = "<p>Error: " . $_FILES["file"]["error"] . "</p>";
        } else {
            /*
            echo "Upload: " . $_FILES["file"]["name"] . "<br>";
            echo "Type: " . $_FILES["file"]["type"] . "<br>";
            echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
             * 
             */

            if (file_exists($target . $_FILES["file"]["name"])) {
                $error_message = "<p>".$_FILES["file"]["name"] . " already exists.</p>";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"], $target . $_FILES["file"]["name"]);
                $db->insertSlide($_FILES["file"]["name"]);
                redirect("manageslides.php");
            }
        }
    } else {
        $error_message = "<p>Invalid file</p>";
    }
}

?>

<?php
session_start();
require_once 'classes/DB.php';
$db = new DB();
$error_message = "";

$user = new User();

// User login
if(isset($_POST['submit'])){
    $db = new DB();
    $user = $db->userLogin(getValue("username"), md5(getValue("password")));
    //echo $user;
    if($user !== FALSE){
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['username'] = $user->firstname;
        $_SESSION['role'] = $user->role;
        redirect("admin/index.php");
    }
 else {
       $error_message = "Invalid username or password"; 
    }
}


// User registration
else if (isset($_POST['register'])) {
    
    $user->username = getValue("username");
    $user->password = getValue("password");
    $user->firstname = getValue("firstname");
    $user->lastname = getValue("lastname");
    
    if(!isValid($user->username))
        $error_message.="<p>* Username is required.</p>";
    
    if(!isValid($user->password))
        $error_message.="<p>* Password is required.</p>";
    
    if(!isValid($user->firstname))
        $error_message.="<p>* First Name is required.</p>";
    
    if(!isValid($user->lastname))
        $error_message.="<p>* Last Name is required.</p>";
    
    if(getValue("cpassword")!= $user->password)
        $error_message.="<p>* Paswords do not match.</p>";
    
    if($error_message=="" && $db->insertUser($user))
        redirect ("index.php");
}
?>
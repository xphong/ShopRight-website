<?php

function getValue($param){    
     return isset($_POST[$param]) ? trim($_POST[$param]) : "";
}

function isValid($var) {
    return (isset($var) && !empty($var));
}

function sanitize($param) {
    return ucfirst(stripslashes($param));
}

function redirect($page) {
    header('Location: '.$page);
}
?>

<?php

include_once 'restricted/functions.php';
sec_session_start();
 
// Unset all session values 
$_SESSION = array();
 
// get session parameters 
$params = session_get_cookie_params();
 
// Delete the actual cookie. 
setcookie(session_name(),
        '', time() - 42000, 
        $params["path"], 
        $params["domain"], 
        $params["secure"], 
        $params["httponly"]);
 
// Destroy session 
session_destroy();

if (isset($_GET['back'])) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit();
}
else {
	header('Location: ../pages/login.php');
	exit();
}

?>
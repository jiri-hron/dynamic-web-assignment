<?php
include_once 'php/db_connect.php';
include_once 'php/functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ./pages/articles.php');
        exit();
    } else {
        // Login failed 
        header('Location: index.html');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
    header('Location: index.html');
    exit();
}

?>
<?php
include_once 'restricted/db_connect.php';
include_once 'restricted/functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'])) {
    $email = $_POST['email'];
    $password = $_POST['p']; // The hashed password.
 
    if (login($email, $password, $mysqli) == true) {
        // Login success

        if (isset($_GET['write']) && $_GET['write'] == 1) {
            header('Location: ../pages/editor.php');
            exit();
        }
        elseif (isset($_GET['ref'])) {
            header('Location: ' . $_GET['ref']);
            exit();
        }
        else {
            header('Location: ../index.php');
            exit();
        }
    } else {
        // Login failed 
        header('Location: ../pages/login.php?error=1');
        exit();
    }
} else {
    // The correct POST variables were not sent to this page. 
    echo 'Invalid Request';
    header('Location: ../pages/login.php?error=1');
    exit();
}

?>
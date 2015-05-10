<?php
include_once 'restricted/db_connect.php';
include_once 'restricted/functions.php';

sec_session_start();

$user_id = $_SESSION['user_id'];
$heading = htmlentities($_POST["heading"]);
$text = htmlentities($_POST["article_text"]);
$text = nl2br($text);

$text = preg_replace("/ +/", " ", $text);
$text = preg_replace("/(<br\ ?\/?>( |\n|\r\n|\r|\n\r)+?){2,}/",
                        "</p>\n<p>", $text);

$text = "<p>" . $text . "</p>";

if ($stmt = $mysqli->prepare("
	INSERT INTO articles.article(author_id, article_heading, article_text)
    VALUES (?, ?, ?)")) {

    $stmt->bind_param('iss', $user_id, $heading, $text);

    // Execute the prepared query. 
    if ($stmt->execute()) {
        header('Location: ../pages/articles.php');
        exit();
    }
    else {
    	header('Location: ../pages/error.php?err=Saving failure: INSERT');
        exit();
    }

}
else {
	header("Location: ../pages/error.php?err=Could not connect to database");
    exit();
}


?>
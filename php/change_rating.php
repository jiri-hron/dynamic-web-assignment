<?php
include_once 'restricted/db_connect.php';
include_once 'restricted/functions.php';

sec_session_start();

$article_id = $_GET['article_id'];
$jeremy = ($_POST['jeremy'] == 'on');
$james = ($_POST['james'] == 'on');
$richard = ($_POST['richard'] == 'on');

// max 3 rows
if (! $mysqli->query("DELETE FROM articles.article_badge
                WHERE article_id = " . $article_id)) {
    header('Location: ../pages/error.php?err=Badge change failure: DELETE');
    exit();
}


if (!$stmt = $mysqli->prepare("
    INSERT INTO articles.article_badge(article_id, badge_id)
        VALUES (?, ?)")) {
    header('Location: ../pages/error.php?err=Badge change failure: prepare');
    exit();
}

if ($jeremy) {
    $stmt->bind_param('ii', $article_id, $tmp = 1);
    if (! $stmt->execute()) {
        header('Location: ../pages/error.php?err=Badge change failure: INSERT');
        exit();
    }
}

if ($james) {
    $stmt->bind_param('ii', $article_id, $tmp = 2);
    if (! $stmt->execute()) {
        header('Location: ../pages/error.php?err=Badge change failure: INSERT');
        exit();
    }
}

if ($richard) {
    $stmt->bind_param('ii', $article_id, $tmp = 3);
    if (! $stmt->execute()) {
        header('Location: ../pages/error.php?err=Badge change failure: INSERT');
        exit();
    }
}


header('Location: ../pages/articles.php');
exit();

?>
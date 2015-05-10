<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';

    sec_session_start();

    if (!login_check($mysqli)) {
        header('Location: login.php?write=1');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Editor</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../css/main.css" type="text/css">
	<script type="text/JavaScript" src="../js/forms.js"></script>
	<!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<div id="main">
		<div class="aut_form" id="editor">
			<div class="logo">
                    <img src="../img/tg_logo.png" alt="Top Gear">
            </div>
			<form name="edit_form" method="post" 
				action="../php/submit_article.php"
				onsubmit="return requireNonEmpty()">
				<table>
					<col class="column-one">
                    <col class="column-two">
					<tr>
						<td><label for="heading">Heading:</label></td>
						<td><input type="text" name="heading" id="heading" /></td>
					</tr>
					<tr>
						<td colspan="2"><textarea name="article_text"
						rows="30" cols="64" id="article_text"></textarea></td>
					</tr>
				</table>
				<span>
					<?php
						echo "Logged in as: <b>" . $_SESSION["username"] .
						"</b>. Do you want to <a href=\"../php/logout.php\">
						log out</a>? Or get to the 	<a href=\"" . 
						$_SERVER['HTTP_REFERER'] . " \">previous</a> page?";
					?>					
				</span>		
				<input type="submit" value="Submit" />
			</form>
		</div>
	</div>
</body>
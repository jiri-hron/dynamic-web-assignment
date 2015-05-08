<?php
    include_once '../php/db_connect.php';
    include_once '../php/functions.php';

    sec_session_start();

    if (login_check($mysqli) == false) {
        header('Location: ../index.php');
        exit();
    }

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Jeremy Clarkson (Orangutan) - used to be Top Gear presenter on BBC2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
    <div id="main">
        <div id="common">
            <div id="logo">
                <img src="../img/tg_logo.png" alt="Top Gear">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="../index.html">Top Gear Show</a>
                    </li>
                    <li>
                        <a href="clarkson.html">Jeremy Clarkson</a>
                    </li>
                    <li>
                        <a href="may.html">James May</a>
                    </li>
                    <li>
                        <a href="hammond.html">Richard Hammond</a>
                    </li>
                    <li>
                        <a href="stig.html">The Stig</a>
                    </li>
                    <li class="selected">
                        <a href="articles.php">Articles</a>
                    </li>
                </ul>
            </nav>
        </div>
        <article>

        	<?php
				
				echo 'hello';
			?>
            
            <footer>
                <span>author: Jiř&iacute; Hron</span>
            </footer>
        </article>
    </div>
</body>

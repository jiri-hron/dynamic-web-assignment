<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';

    sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Articles</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script type="text/JavaScript" src="../js/articles.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="main">
        <div id="common">
            <div class="logo">
                <img src="../img/tg_logo.png" alt="Top Gear">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="../index.php">Top Gear Show</a>
                    </li>
                    <li>
                        <a href="clarkson.php">Jeremy Clarkson</a>
                    </li>
                    <li>
                        <a href="may.php">James May</a>
                    </li>
                    <li>
                        <a href="hammond.php">Richard Hammond</a>
                    </li>
                    <li>
                        <a href="stig.php">The Stig</a>
                    </li>
                    <li class="selected">
                        <a href="articles.php">Articles</a>
                    </li>
                    <li>
                        <a href="editor.php">Write article ...</a>
                    </li>
                </ul>
            </nav>
        </div>

        <article class="description">
            <header>
                <?php 
                    if (login_check($mysqli)) {
                       echo "
                            <span>You are currently logged-in as <b>" . 
                            $_SESSION['username'] .  
                            "</b>. 
                            <a href=\"../php/logout.php?back=1\">
                                Log out
                            </a>.
                            </span>\n"; 
                    }
                    else {                        
                        echo "
                            <span>You are currently not
                                <a href=\"login.php?write=0\">
                                    logged-in</a>.
                            </span>\n";
                    }
                ?>
                <h1>Articles</h1>
            </header>
            <!-- /header -->
            <p>This page contains user created articles. You must be 
            logged-in to be able to either add or rate articles.</p>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
            </footer>
        </article>

        <?php
            print get_articles($mysqli);

            if (login_check($mysqli)) {
               print 
                '<script type="text/javascript">
                    enable_voting();
                </script>';
            }
        ?>
        </div>
    </body>
</html>
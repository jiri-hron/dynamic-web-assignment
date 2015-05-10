<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';
     
    sec_session_start();

    $write = 1;
    if (isset($_GET['write'])) {
        $write = $_GET['write'];
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Log-In page</title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <script type="text/JavaScript" src="../js/sha512.js"></script> 
        <script type="text/JavaScript" src="../js/forms.js"></script> 
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="main">
            <div class="aut_form">
                <div class="logo">
                    <img src="../img/tg_logo.png" alt="Top Gear">
                </div>

                <?php
                    print "
                        <form action=\"../php/process_login.php?write=" .
                        $write . "&ref= " . $_SERVER['HTTP_REFERER'] . "\" 
                        method=\"post\" name=\"login_form\">
                            <h1>Editor Area Log-in</h1>";

                        if (isset($_GET['success'])) {
                            print "<p class=\"success\"><b>The registration was successful!</b><p>";
                        }
                        elseif (isset($_GET['error'])) {
                            print '<p class="error">Error Logging In!</p>';
                        }

                        if (login_check($mysqli)) {
                            print '<p>You are already logged-in!</p>';
                            print '<p>Do you want to 
                                <a href="../php/logout.php?back=1">
                                    log-out
                                </a>?</p>';
                            print '<p>You migh also want to 
                            <a href="../index.php">return</a><br/>
                                to the main page.</p>';
                        } else {
                            print "
                            <table>
                                <col class=\"column-one\">
                                <col class=\"column-two\">                  
                                <tr>
                                    <td><label for=\"email\">Email:</label></td>
                                    <td><input type=\"text\" name=\"email\" id=\"email\" /></td>
                                </tr>
                                <tr>
                                    <td><label for=\"password\">Password:</label></td>
                                    <td><input type=\"password\" name=\"password\" id=\"password\" /></td>
                                </tr>
                            </table>
                            <input type=\"button\" value=\"Login\" onclick=\"formhash(this.form, this.form.password);\" />
                            <p>If you don't have an account, please <a href='register.php'>register</a>.
                            Return to the main 
                            <a href='../index.php'>page</a>.</p>";
                        }

                        print " </form>";
                                    
                    ?>
            </div>           
        </div>
    </body>
</html>
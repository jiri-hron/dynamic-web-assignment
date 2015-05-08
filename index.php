<?php
    include_once 'php/db_connect.php';
    include_once 'php/functions.php';
     
    sec_session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Log-In page</title>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
        <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="main">
            <?php
                if (isset($_GET['error'])) {
                    echo '<p class="error">Error Logging In!</p>';
                }
            ?>
            <div class="aut_form">
                <div class="logo">
                    <img src="img/tg_logo.png" alt="Top Gear">
                </div>
                <form action="process_login.php" method="post" name="login_form">
                    <h1>Editor Area Log-in</h1>
                    <table>                   
                        <tr>
                            <td><label for="email">Email:</label></td>
                            <td><input type="text" name="email" id="email" /></td>
                        </tr>
                        <tr>
                            <td><label for="password">Password:</label></td>
                            <td><input type="password" name="password" id="password" /></td>
                        </tr>
                    </table>
                    <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />

                    <?php
                        if (login_check($mysqli)) {
                            print '<p>Do you want to change user? <a href="logout.php">Log out</a>.</p>';
                        } else {
                            print "<p>If you don't have an account, please <a href='register.php'>register</a>.</p>";
                        }
                    ?>
                     
                </form>
            </div>           
        </div>
    </body>
</html>
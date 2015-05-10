<?php
include_once '../php/restricted/register.inc.php';
include_once '../php/restricted/functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../css/main.css" type="text/css">
    <script type="text/JavaScript" src="../js/sha512.js"></script>
    <script type="text/JavaScript" src="../js/forms.js"></script>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
    <div id="main">
        <!-- Registration form to be output if the POST variables are not
            set or if the registration script caused an error. -->
        <div class="aut_form">
            <div class="form_description">
                <div class="logo">
                    <img src="../img/tg_logo.png" alt="Top Gear">
                </div>
                <h1>Registration</h1>
                <?php
                if (!empty($error_msg)) {
                    echo $error_msg;
                }
                ?>
                <ul>
                    <li>
                        Usernames may contain only digits, upper and lower case letters and underscores
                    </li>
                    <li>Emails must have a valid email format</li>
                    <li>Passwords must be at least 6 characters long</li>
                    <li>
                        Passwords must contain
                        <ul>
                            <li>At least one uppercase letter (A..Z)</li>
                            <li>At least one lower case letter (a..z)</li>
                            <li>At least one number (0..9)</li>
                        </ul>
                    </li>
                    <li>Your password and confirmation must match exactly</li>
                </ul>
            </div>
            <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>"  method="post" 
                name="registration_form">
                <table>
                    <col class="column-one">
                    <col class="column-two">
                    <tr>
                        <td>
                            <label for="username">Username:</label>
                        </td>
                        <td>
                            <input type='text' name='username' id='username' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="email">Email:</label>
                        </td>
                        <td>
                            <input type="text" name="email" id="email" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="password">Password:</label>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="confirmpwd">Confirm password:</label>
                        </td>
                        <td>
                            <input type="password" name="confirmpwd" id="confirmpwd" size="50" />
                        </td>
                    </tr>
                </table>
                <input type="button" value="Register" 
                       onclick="return regformhash(this.form,
                                       this.form.username,
                                       this.form.email,
                                       this.form.password,
                                       this.form.confirmpwd);" />
                <p>Return to the <a href="login.php">Log-In page</a>.</p>
            </form>
        </div>
    </div>
</body>
</html>
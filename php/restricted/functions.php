<?php
include_once 'psl-config.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';   // Set a custom session name
    $secure = SECURE;
    // This stops JavaScript being able to access the session id.
    $httponly = true;
    // Forces sessions to only use cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../../pages/error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    // Gets current cookies params.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    // Sets the session name to the one set above.
    session_name($session_name);
    session_start();            // Start the PHP session 
    session_regenerate_id(true);    // regenerated the session, delete the old one. 
}

function login($email, $password, $mysqli) {
    // Using prepared statements means that SQL injection is not possible. 
    if ($stmt = $mysqli->prepare("
                        SELECT id, username, password, salt 
                        FROM members
                        WHERE email = ?
                        LIMIT 1")) {
        
        if (! $stmt->bind_param('s', $email)) {
            header('Location: ../../pages/error.php?err=login failure: bind');
            exit();
        }

        if (! $stmt->execute()) {
            header('Location: ../../pages/error.php?err=login failure: execute');
            exit();
        }

        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        // hash the password with the unique salt.
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            // If the user exists we check if the account is locked
            // from too many login attempts 
 
            if (checkbrute($user_id, $mysqli) == true) {
                // Account is locked 
                // Send an email to user saying their account is locked
                return false;
            } else {
                // Check if the password in the database matches
                // the password the user submitted.
                if ($db_password == $password) {
                    // Password is correct!
                    // Get the user-agent string of the user.
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    // XSS protection as we might print this value
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    // XSS protection as we might print this value
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    // Login successful.
                    return true;
                } else {
                    // Password is not correct
                    // We record this attempt in the database
                    $now = time();

                    if (! $mysqli->query("INSERT INTO secure_login.login_attempts(user_id, time) VALUES ('$user_id', '$now')")) {
                        header('Location: ../../pages/error.php?err=login attempt failure: INSERT');
                        exit();
                    }
                    return false;
                }
            }
        } else {
            // No user exists.
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    // Get timestamp of current time 
    $now = time();
 
    // All login attempts are counted from the past 2 hours. 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts 
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {

        if (! $stmt->bind_param('i', $user_id)) {
            header('Location: ../../pages/error.php?err=checkbrute failure: bind');
            exit();
        }
 
        // Execute the prepared query.

        if(! $stmt->execute()) {
            header('Location: ../../pages/error.php?err=checkbrute failure: execute');
            exit();
        }
        $stmt->store_result();
 
        // If there have been more than 5 failed logins 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    // Check if all session variables are set 
    if (isset($_SESSION['user_id'], $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        // Get the user-agent string of the user.
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter.

            if(! $stmt->bind_param('i', $user_id)) {
                header('Location: ../../pages/error.php?err=Login failure: bind');
                exit();
            }

            if (! $stmt->execute()) {
                header('Location: ../../pages/error.php?err=Login failure: execute');
                exit();
            }

            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    // Logged In!!!! 
                    return true;
                } else {
                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {
        // Not logged in 
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

function get_articles($mysqli) {
    $no_article_message = "
        <article>
            <p>No articles yet published!</p>
        </article>";
    $article_query = "
        SELECT articles.article.article_id, secure_login.members.username,
                articles.article.article_heading, articles.article.article_text
        FROM articles.article
            INNER JOIN secure_login.members
                ON articles.article.author_id = secure_login.members.id
        ORDER BY
            articles.article.article_id";
    $badge_query = "
        SELECT name
        FROM articles.badge
        WHERE 
            badge_id IN (SELECT badge_id 
                FROM articles.article_badge
                WHERE article_id = ?)";


    if ($badge_stmt = $mysqli->prepare($badge_query)) {

        if (! $res = $mysqli->query($article_query)) {
            header('Location: ../../pages/error.php?err=Get article failure: SELECT');
            exit();
        }
        
        if($res->num_rows > 0) {

            $articles = array();
            $res->data_seek(0);
            while ($row = $res->fetch_assoc()) {
                $articles[] = $row;
            }

            $ret = "";

            for ($i = 0; $i < count($articles); $i++) {
                $article = $articles[$i];

                if (! $badge_stmt->bind_param('i', $article['article_id'])) {
                    header('Location: ../../pages/error.php?err=Get article failure: bind');
                    exit();
                }
 
                // Execute the prepared query.

                if (! $badge_stmt->execute()) {
                    header('Location: ../../pages/error.php?err=Get article failure: execute');
                    exit();
                }

                $badge_stmt->store_result();

                $badge_stmt->bind_result($badge);
                
                $badges = "none";
                if ($badge_stmt->num_rows > 0) {
                    $badge_stmt->fetch();
                    $badges = $badge;
                    while ($badge_stmt->fetch()) {
                        $badges .= ", " . $badge;
                    }
                }

                $jeremy = strpos($badges,'Jeremy') !== false;
                $james = strpos($badges,'James') !== false;
                $richard = strpos($badges,'Richard') !== false;

                $ret .= "
                    <article>
                        <header>
                            <h1>" . $article['article_heading'] . "</h1>
                            <div class=\"badges\" title=\"You must be 
                            logged-in to rate the article\" 
                            id=\"" . $i . "\">
                            <p>" . $badges . "</p>\n";

                $ret .= "<div class=\"rate_dialog\" title=\"Rate the article\" 
                    id=\"dialog_" . $i . "\">";
                $ret .= "<form name=\"rate_form\" method=\"post\" 
                    action=\"../php/change_rating.php?article_id=". 
                    $article['article_id'] . "\">";
                if ($jeremy) {
                    $ret .= "
                        <div class=\"selected item\">
                            <input type=\"checkbox\" name=\"jeremy\" checked>
                                Jeremy has found this
                        </div>";
                }
                else {
                    $ret .= "
                        <div class=\"item\">
                            <input type=\"checkbox\" name=\"jeremy\">
                                Jeremy has found this
                        </div>";
                }

                if ($james) {
                    $ret .= "
                        <div class=\"selected item\">
                        <input type=\"checkbox\" name=\"james\" checked>
                            James awards the Golden Cock
                        </div>";
                }
                else {
                    $ret .= "
                        <div class=\"item\">
                        <input type=\"checkbox\" name=\"james\">
                            James awards the Golden Cock
                        </div>";
                }

                if ($richard) {
                    $ret .= "
                        <div class=\"selected item\">
                        <input type=\"checkbox\" name=\"richard\" checked>
                            Richard's ladder-supported like
                        </div>";
                }
                else {
                    $ret .= "
                        <div class=\"item\">
                        <input type=\"checkbox\" name=\"richard\">
                            Richard's ladder-supported like
                        </div>";
                }

                $ret .= "<input type=\"submit\" value=\"Submit\" />";
                $ret .= "</form>";

                $ret .= "\n</div>\n</div>\n</header>\n<!-- /header -->\n";

                $ret .= $article['article_text'] . 
                        "\n<footer>\n
                            <span>author: " . $article['username'] . "</span>\n
                        </footer>\n</article>\n";
            }
        }
        else {
            return $no_article_message;
        }

        return $ret;
    }
    else {
        return $no_article_message;
    }
}

function bind_array($stmt, &$row) {
    $md = $stmt->result_metadata();
    $params = array();
    while($field = $md->fetch_field()) {
        $params[] = &$row[$field->name];
    }

    call_user_func_array(array($stmt, 'bind_result'), $params);
}


?>
<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';
     
    sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>The Stig - used to be the Top Gear's tamed racing driver on BBC2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css" type="text/css">
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
                    <li class="selected">
                        <a href="stig.php">The Stig</a>
                    </li>
                    <li>
                        <a href="articles.php">Articles</a>
                    </li>
                    <li>
                        <a href="editor.php">Write article ...</a>
                    </li>
                </ul>
            </nav>
        </div>
        <article>
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
                            </span>"; 
                    }
                    else {                        
                        echo "<span>You are currently not
                                <a href=\"login.php?write=0\">
                                    logged-in</a>.
                            </span>";
                    }
                ?>
                <h1>The Stig</h1>
            </header>
            <!-- /header -->
            <figure class="article_img">
                <img src="../img/stig.jpg" alt="The Stig">
                <figcaption>The Stig (nobody knows what or who IT is)</figcaption>
            </figure>
            <p> <b>The Stig</b> is a character on the British motoring television show Top Gear. The Stig's primary role is setting lap times for cars tested on the show, as well as instructing celebrity guests, off-camera, for the show's &quot;Star in a Reasonably Priced Car&quot; segment. The character is a play on the anonymity of racing drivers' full-face helmets, with the running joke that nobody knows who, or indeed what, is inside the Stig's racing suit.
            </p>
            <p>
                The identity of the original &quot;Black&quot; Stig, Perry McCarthy, was exposed by a Sunday newspaper in January 2003, and confirmed by McCarthy later that year. The black-suited Stig was subsequently &quot;killed off&quot; that October in the series 3 premiere, and replaced in the following episode by a new White Stig who lasted through to the end of series 15. In series 13, the show jokingly unmasked the Stig as seven-time world champion F1 driver Michael Schumacher. In the hiatus following series 15, racing driver Ben Collins was revealed to be the Stig in a court battle over Collins' impending autobiography, titled The Man in the White Suit. In series 16, debuting in December 2010, Collins was replaced by a second White Stig, whose identity has so far remained secret.
            </p>
            <h2>Some say that ...</h2>
            <p>
                The Stig's introductions on the show have underlined his oddness. Initially the presenters heralded his appearance with simple humorous introductions, such as &quot;His Holiness, the Stig!&quot;. Beginning in series 6, the introductions began to follow a format of, &quot;Some say that [two bizarre characteristics]. All we know is, he's called the Stig.&quot;
            </p>
            <p>Some of the introductions:</p>
            <ul>
                <li>
                    &ldquo;Some say his droppings have been found as far north as York, and that he has a full size tattoo of his face, on his face. All we know is he&rsquo;s called the Stig.&rdquo;
                </li>
                <li>
                    &ldquo;Some say it&rsquo;s impossible for him to wear socks, and he can open a beer bottle with his testes. All we know is he&rsquo;s called the Stig.&rdquo;
                </li>
                <li>
                    &ldquo;Some say that on really warm days he sheds his skin like a snake, and that for some reason he&rsquo;s allergic to the Dutch. All we know is he&rsquo;s called the Stig.&rdquo;
                </li>
                <li>
                    &ldquo;Some say he isn&rsquo;t machine washable, and all his potted plants are called &lsquo;Steve&rsquo;. All we know is he&rsquo;s called the Stig.&rdquo;
                </li>
                <li>
                    &ldquo;Some say that he has to take his shoes off with an allen key, and that his new year&rsquo;s resolution is to eat fewer mice. All we know is he&rsquo;s called the Stig.&rdquo;
                </li>
            </ul>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
                <cite>
                    <a href="http://en.wikipedia.org/wiki/The_Stig">source: en.wikipedia.org</a>
                </cite>
            </footer>
        </article>
    </div>
</body>

</html>

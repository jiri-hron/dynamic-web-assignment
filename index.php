<?php
    include_once 'php/restricted/db_connect.php';
    include_once 'php/restricted/functions.php';
     
    sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Top Gear - the best car show that ever was</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <!--[if IE]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>

<body>
    <div id="main">
        <div id="common">
            <div class="logo">
                <img src="./img/tg_logo.png" alt="Top Gear">
            </div>
            <nav>
                <ul>
                    <li class="selected">
                        <a href="index.php">Top Gear Show</a>
                    </li>
                    <li>
                        <a href="pages/clarkson.php">Jeremy Clarkson</a>
                    </li>
                    <li>
                        <a href="pages/may.php">James May</a>
                    </li>
                    <li>
                        <a href="pages/hammond.php">Richard Hammond</a>
                    </li>
                    <li>
                        <a href="pages/stig.php">The Stig</a>
                    </li>
                    <li>
                        <a href="pages/articles.php">Articles</a>
                    </li>
                    <li>
                        <a href="pages/editor.php">Write article ...</a>
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
                            <a href=\"php/logout.php?back=1\">
                                Log out
                            </a>.
                            </span>"; 
                    }
                    else {                        
                        echo "<span>You are currently not
                                <a href=\"pages/login.php?write=0\">
                                    logged-in</a>.
                            </span>";
                    }
                ?>
                <h1>Top Gear</h1>
            </header>
            <!-- article content -->
            <figure class="article_img">
                <img src="./img/top_gear.png" alt="Top Gear">
                <figcaption>The Top Gear's presenters</figcaption>
            </figure>
            <p><b>Top Gear</b> is a British television series about motor vehicles, primarily cars, and is the most widely watched factual television programme in the world. It began in 1977 as a conventional motoring magazine programme. Over time, and especially since a relaunch in 2002, it has developed a quirky, humorous and sometimes controversial style. Main host Jeremy Clarkson was informed by the BBC on 25 March 2015 that his contract would not be renewed and the status of fellow presenters Richard Hammond and James May is unknown. The show has also featured at least three different test drivers known as &quot;The Stig&quot;. The programme is estimated to have around 350 million views per week in 170 different countries.
            </p>
            <p>
                First run episodes are broadcast in the United Kingdom on BBC Two and (from Series 20) BBC Two HD. From Series 14 until Series 19, prior to the launch of the dedicated BBC Two HD channel, new episodes were also simulcast on BBC HD. The series is also carried on cable television systems in the United States via BBC America, in Latin America via BBC Entertainment and in Europe via BBC Knowledge. Series 22 started with the Patagonia special in two parts over Christmas 2014. Part 1 aired on Saturday 27 December and Part 2 aired on Sunday 28 December. The remaining ten episodes began airing from Sunday 25 January, but broadcast of the eighth and subsequent episodes has been delayed as host Clarkson was suspended by the BBC on 10 March 2015. Whether or not these episodes will be broadcast has not been confirmed, although the BBC has announced that &quot;Top Gear ... will continue without Clarkson&quot;.
            </p>
            <p>
                The programme has received acclaim for its visual style and presentation, and criticism for its content and often politically incorrect commentary made by its presenters. Columnist A. A. Gill, close friend of Clarkson and fellow Sunday Times columnist, described the programme as &quot;a triumph of the craft of programme making, of the minute, obsessive, musical masonry of editing, the French polishing of colourwashing and grading&quot;.
            </p>
            <div class="video">
                <iframe class="youtube" src="https://www.youtube.com/embed/frqvoVY1wSU" allowfullscreen></iframe>
            </div>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
                <cite>
                    <a href="http://en.wikipedia.org/wiki/Top_Gear_%282002_TV_series%29">source: en.wikipedia.org</a>
                </cite>
            </footer>
        </article>
    </div>
</body>

</html>

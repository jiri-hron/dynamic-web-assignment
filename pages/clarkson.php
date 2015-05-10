<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';

    sec_session_start();
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
            <div class="logo">
                <img src="../img/tg_logo.png" alt="Top Gear">
            </div>
            <nav>
                <ul>
                    <li>
                        <a href="../index.php">Top Gear Show</a>
                    </li>
                    <li class="selected">
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
                <h1>Jeremy Clarkson</h1>
            </header>
            <!-- /header -->
            <figure class="article_img">
                <img src="../img/clarkson.jpg" alt="Orangutan">
                <figcaption>Jeremy &quot;Orangutan&quot; Clarkson</figcaption>
            </figure>
            <p> <b>Jeremy Charles Robert Clarkson</b> (born April 11, 1960) is an English broadcaster and writer who specialises in motoring.
            </p>
            <p>
                He writes weekly columns for The Sunday Times and The Sun, but is better known for his role on the BBC TV show Top Gear.
            </p>
            <p>
                &quot;Not a man given to considered opinion,&quot; according to the BBC, Clarkson is known to be opinionated and forthright in his views. The Economist, on the subject of road pricing in UK, has described him as a &quot;skilful propagandist for the motoring lobby&quot;.
            </p>
            <p>
                Born in Doncaster, Clarkson was educated at Repton School, although he claims to have been expelled. His first job was as a travelling salesman for his parents' business selling Paddington Bear toys, after which he trained as a journalist with the Rotherham Advertiser.
            </p>
            <p>
                In 2004 during an episode of the BBC's Who Do You Think You Are?, Clarkson was invited to investigate his family history; including the story of his great-great-great grandfather John Kilner (1792-1857), who invented the Kilner jar; a receptacle for preserved fruit.
            </p>
            <p>
                In spite of his penchant for fast driving and high performance cars, Clarkson has been reported as having a clean licence. Nonetheless, he is not reluctant to discuss driving fast: In a November 2005 article in The Sunday Times, Clarkson wrote, while discussing the Bugatti Veyron, &quot;On a recent drive across Europe I desperately wanted to reach the top speed but I ran out of road when the needle hit 240mph&quot;, and later, in the same article,&quot;From the wheel of a Veyron, France is the size of a small coconut. I cannot tell you how fast I crossed it the other day. Because you simply wouldn't believe me&quot;.
            </p>
            <h2>Quotes</h2>
            <ul>
                <li>
                    Speed has never killed anyone, suddenly becoming stationary... That's what gets you.
                </li>
                <li>
                    A turbo, exhaust gasses go into the turbocharger and spin it, with a supercharger, air goes in,witchcraft happens and you go faster.
                </li>
                <li>
                    I'd like to consider Ferrari as a scaled down version of God.
                </li>
                <li>
                    I'd rather go to work on my hands and knees than drive there in a Ford Galaxy; Whoever designed the Ford Galaxy upholstery had a cauliflower fixation; I would rather have a vasectomy than buy a Ford Galaxy.
                </li>
                <li>
                    Owning a TVR in the past was like owning a bear, I mean it was great, until it pulled your head off, which it would.
                </li>
            </ul>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
                <cite>
                    <a href="http://www.jeremyclarkson.co.uk/">source: jeremyclarkson.co.uk</a>
                </cite>
            </footer>
        </article>
    </div>
</body>

</html>

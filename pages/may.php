<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';
     
    sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>James May (Captain Slow) - used to be Top Gear presenter on BBC2</title>
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
                    <li class="selected">
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
                <h1>James May</h1>
            </header>
            <!-- /header -->
            <figure class="article_img">
                <img src="../img/may.jpg" alt="Captain Slow">
                <figcaption>James &quot;Captain Slow&quot; May</figcaption>
            </figure>
            <p> <b>James Daniel May</b> (born 16 January 1963) is a British television presenter and journalist. He is the co-presenter of the motoring programme Top Gear, alongside Richard Hammond and formerly Jeremy Clarkson.
            </p>
            <p>
                May has presented other programmes on themes including science and technology, toys, wine culture, and the plight of manliness in modern times. He wrote a weekly column for The Daily Telegraph's motoring section.
            </p>
            <h2>Top Gear</h2>
            <p>
                May co-presented the original Top Gear series in 1999. He first co-presented the revived series of Top Gear in 2003, where he earned the nickname &quot;Captain Slow&quot; owing to his careful driving style. He jokingly attributed his driving style to being 'traumatised as a small boy' by his mother's driving style. Despite this sobriquet, he has done some especially high-speed driving, including in Top Gear Series 9, taking a Bugatti Veyron to its top speed of 253 mph (407 km/h) which is nearly one-third of the speed of sound at sea level and later on taking a Bugatti Veyron 16.4 Super Sport edition to 260 mph (417 km/h). In an earlier episode he also tested the original version of the Bugatti Veyron against the Pagani Zonda F.
            </p>
            <p>
                May, along with co-presenter Jeremy Clarkson and an Icelandic support crew, traveled by car to the magnetic North Pole in 2007, using a modified Toyota Hilux. In the words of Clarkson, he was the first person to go there &quot;who didn't want to be there&quot;. He also drove the same modified Toyota Hilux up the side of the erupting volcano Eyjafjallaj&ouml;kull in Iceland. He has driven a 1.3-litre Suzuki SJ413 through the Bolivian jungle, along Death Road and over the Andes to the Pacific Ocean in Chile.
            </p>
            <h2>Toy Stories</h2>
            <p>
                Beginning in October 2009, May presented a 6-part TV series showing favourite toys of the past era and whether they can be applied in the modern day. The toys featured were Airfix, Plasticine, Meccano, Scalextric, Lego and Hornby. In each show, May attempts to take each toy to its limits, also fulfilling several of his boyhood dreams in the process. In August 2009, May built a full-sized house out of Lego at Denbies Wine Estate in Surrey. Plans for Legoland to move it to their theme park fell through in September 2009 because costs to deconstruct, move and then rebuild were too high and despite a final Facebook appeal for someone to take it, it was demolished on 22 September, with the plastic bricks planned to be donated to charity.
            </p>
            <p>
                Also for the series, he recreated the banked track at Brooklands using Scalextric track, and an attempt at the world's longest working model railway along the Tarka Trail between Barnstaple and Bideford in North Devon, although the attempt was foiled due to parts of the track being stolen and vandals placing coins on the track, causing a short circuit.
            </p>
            <p>
                In December 2012 aired a special Christmas Episode called Flight Club, where James and his team built a huge toy glider that flew 22 miles (35 km) from Devon to the island of Lundy.
            </p>
            <p>
                In 2013, May created a life size, fully functional motorcycle and sidecar made entirely out of the construction toy Meccano. Joined by Oz Clark, he then completed a full lap of the Isle of Man TT Course, a full 37 3/4 mile long circuit.
            </p>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
                <cite>
                    <a href="http://en.wikipedia.org/wiki/James_May">source: en.wikipedia.org</a>
                </cite>
            </footer>
        </article>
    </div>
</body>

</html>

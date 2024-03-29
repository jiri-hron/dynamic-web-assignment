<?php
    include_once '../php/restricted/db_connect.php';
    include_once '../php/restricted/functions.php';

    sec_session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Richard Hammond (Hamster) - used to be Top Gear presenter on BBC2</title>
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
                    <li class="selected">
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
                <h1>Richard Hammond</h1>
            </header>
            <!-- /header -->
            <figure class="article_img">
                <img src="../img/hammond.png" alt="Hammster">
                <figcaption>Richard &quot;Hammster&quot; Hammond</figcaption>
            </figure>
            <p>
                <b>Richard Mark Hammond</b> (born 19 December 1969) is an English presenter, writer, and journalist. He is most noted for co-hosting the car programme Top Gear with Jeremy Clarkson and James May, as well as presenting series 1&ndash;4 of Brainiac: Science Abuse on Sky1. He also co-hosted Total Wipeout with Amanda Byram on BBC One. Hammond presented Planet Earth Live alongside Julia Bradbury.
            </p>
            <h2>Top Gear</h2>
            <p>
                Hammond became a presenter on Top Gear in 2002, when the show began in its present format. He is sometimes referred to as &quot;The Hamster&quot; by fans and his co-presenters on Top Gear due to his name and comparatively small stature. His nickname was further reinforced when on three separate occasions in series , he ate cardboard, mimicking hamster-like behaviour.
            </p>
            <p>
                Following a high-speed dragster crash while filming in September 2006 near York, Hammond returned in the first episode of series 9 (broadcast on 28 January 200) to a hero's welcome, complete with dancing girls, aeroplane style stairs and fireworks. The show also contained images of the crash, which had made international headlines, with Hammond talking through the events of the day after which the audience broke into spontaneous applause. Hammond then requested that the crash never be mentioned on the show again, though all three Top Gear presenters have since referred to it in jokes during the news segment of the programme. He told his colleagues, &quot;The only difference between me now, and before the crash, is that I like celery now and I didn't before&quot;.
            </p>
            <p>
                During the third episode of series sixteen, Hammond suggested that no one would ever want to own a Mexican car, since cars are supposed to reflect national characteristics and so a Mexican car would be a &quot;lazy, feckless, flatulent, overweight oaf.&quot; Hammond finished with the remark &quot;I'm sorry, but can you imagine waking up and remembering you're Mexican?!&quot; Following complaints, the BBC defended the broadcast of this segment on the grounds that such national stereotyping was a &quot;robust part&quot; of traditional British humour.
            </p>
            <h2>Dragster Crash</h2>
            <p>
                During filming of a Top Gear segment at the former RAF Elvington airbase near York on 20 September 2006, Hammond was injured in the crash of the jet-powered car he was piloting. He was travelling at 288 mph (463 km/h) at the time of the crash.
            </p>
            <p>
                His vehicle, a dragster called Vampire, was theoretically capable of travelling at speeds of up to 370 mph (595 km/h). The vehicle was the same car that in 2000, piloted by Colin Fallows, set the British land speed record at 300.3 mph (483.3 km/h). The Vampire was powered by a single Bristol-Siddeley Orpheus afterburning turbojet engine producing 10000 hp (7.5 MW).
            </p>
            <p>
                Some accounts suggested that the accident occurred during an attempt to break the British land speed record, but the Health and Safety Executive report on the crash found that a proposal to try to officially break the record was vetoed in advance by Top Gear executive producer Andy Wilman, due to the risks and complexities of such a venture. (The report stated: &quot;Runs were to be carried out in only one direction along a pre-set course on the Elvington runway. Vampire&rsquo;s speed was to be recorded using GPS satellite telemetry. The intention was to record the maximum speed, not to measure an average speed over a measured course, and for (Hammond) to describe how it felt.&quot;
            </p>
            <p>
                Hammond was completing a seventh and final run to collect extra footage for the programme when his front-right tyre failed, and, according to witness and first responder Dave Ogden, &quot;one of the parachutes had deployed but it went on to the grass and spun over and over before coming to a rest about 100 yards from us.&quot; The emergency crew quickly arrived at the car, finding it inverted and partially embedded in the grass. During the roll, Hammond's helmet had embedded itself into the ground, flipping the visor up and forcing soil into his mouth and damaging his left eye. Rescuers felt a pulse and heard the unconscious Hammond breathing before the car was turned upright. Hammond was cut free with hydraulic shears, and placed on a backboard. &quot;He was regaining consciousness at that point and said he had some lower back pain&quot;. He was then transported by the Yorkshire Air Ambulance to the neurological unit of the Leeds General Infirmary. Hammond's family visited him at the hospital along with Top Gear co-presenters James May and Jeremy Clarkson. Clarkson wished Hammond well, saying &quot;Both James and I are looking forward to getting our 'Hamster' back&quot;, referring to Hammond by his nickname.
            </p>
            <p>
                The Health and Safety Executive report stated that &quot;Hammond's instantaneous reaction to the tyre blow-out seems to have been that of a competent high performance car driver, namely to brake the car and to try to steer into the skid. Immediately afterwards he also seems to have followed his training and to have pulled back on the main parachute release lever, thus shutting down the jet engine and also closing the jet and afterburner fuel levers. The main parachute did not have time to deploy before the car ran off the runway.&quot; The HSE notes that, based on the findings of the North Yorkshire Police (who investigated the crash), &quot;the accident may not have been recoverable&quot;, even if Hammond's efforts to react were as fast as &quot;humanly possible&quot;.
            </p>
            <p>
                The crash was shown on an episode of Top Gear on 28 January 2007; this was the first episode of the new series, which had been postponed pending Hammond's recovery. Hammond requested at the end of the episode that his fellow presenters never mention the crash again, a request which has been generally observed, although occasional oblique references have been made. On The Edge: My Story, which contains first-hand accounts from both Hammond and his wife about the crash, immediate aftermath, and his recovery was published later that year. Hammond also appeared on the BBC chat show Friday Night with Jonathan Ross revealing he was &quot;a bit fighty&quot; right after the crash and then in a coma for two weeks.
            </p>
            <p>
                In February 2008 Hammond gave an interview to The Sunday Times newspaper in which he described the effects of his brain injuries and the progression of his recovery. He reported suffering loss of memory, depression and difficulties with emotional experiences, for which he was consulting a psychiatrist. He also talked about his recovery in a 2010 television programme where he interviewed Sir Stirling Moss and they discussed the brain injuries they had both received as a result of car crashes.
            </p>
            <footer>
                <span>author: Jiř&iacute; Hron</span>
                <cite>
                    <a href="http://en.wikipedia.org/wiki/Richard_Hammond">source: en.wikipedia.org</a>
                </cite>
            </footer>
        </article>
    </div>
</body>

</html>

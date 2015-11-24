<?php include 'includes/config.php';?>
<?php
//a3dailygrind
//index.php

/*
1) Find a php Date day of the week, numeric
2) Create day variable
3) Create if/else statements dependng on the days of the week
4) Write html
5) Create variables
6) Write CSS
7) Test PHP
8) Check html and css
*/

if(isset($_GET['day']))
{//show the selected day
   $myDay = $_GET['day'];
    
}else{//show today
    $myDay = date('N');

}


//$myDay = date('N'); //get day of the week, as a #.  1 is monday, 7 is sunday
$myTitle = '';
$backgroundColor = ''; //Background Color
$myImage = ''; //Image
$myAlt = '';  //Image Alt
$poetName = '';
$myWeekDay = ''; //Day of the week
$myQuote = ''; //Quote of the day
$myAuthor = ''; //author


//$myDay = 3;

switch ($myDay){
    
case '1':
    $myTitle = "Monday";
    $backgroundColor = "#817599"; //Background Color
    $myImage = "mondaykerouac.jpg"; //Image
    $myAlt = "Kerouac Monday";  //Image Alt
    $poetName = "Jack Kerouac";
    $myWeekDay = "Monday"; //Day of the week
    $myQuote = "&quot;the only people for me are the mad ones, the ones who are mad to live, mad to talk, mad to be saved, desirous of everything at the same time, the ones who never yawn or say a commonplace thing, but burn, burn, burn like fabulous yellow roman candles exploding like spiders across the stars.&quot;"; //Quote of the day
    $myAuthor = "&ndash; Jack Kerouac, On the Road"; //author
    break;
    
case '2':
    $myTitle = "Tuesday";
    $backgroundColor = "#75A3A3";
    $myImage = "tuesdayginsberg.jpg";
    $myAlt = "Ginsberg Tuesday";
    $poetName = "Allen Ginsberg";
    $myWeekDay = "Tuesday";
    $myQuote = "<p>&quot;A perfect beauty of a sunflower! a perfect excellent lovely sunflower existence! a sweet natural eye to the new hip moon, woke up alive and excited grasping in the sunset shadow sunrise golden monthly breeze!</p>
<p>How many flies buzzed round you innocent of your grime, while you cursed the heavens of the railroad and your flower soul?</p>
<p>Poor dead flower? when did you forget you were a flower? when did you look at your skin and decide you were an impotent dirty old locomotive? the ghost of a locomotive? the specter and shade of a once powerful mad American locomotive?</p>
<p>You were never no locomotive, Sunflower, you were a sunflower! </p>
<p>And you Locomotive, you are a locomotive, forget me not!</p>
<p>So I grabbed up the skeleton thick sunflower and stuck it at my side like a scepter,</p>
<p>and deliver my sermon to my soul, and Jack’s soul too, and anyone who’ll listen,</p>
<p>—We’re not our skin of grime, we’re not dread bleak dusty imageless locomotives, we’re golden sunflowers inside, blessed by our own seed & hairy naked accomplishment-bodies growing into mad black formal sunflowers in the sunset, spied on by our own eyes under the shadow of the mad locomotive riverbank sunset Frisco hilly tincan evening sitdown vision.&quot;</p>";
    $myAuthor = "&ndash; Allen Ginsberg, exerpt from Sunflower Sutra";
    break;
    
case '3':
    $myTitle = "Wednesday";
    $backgroundColor = "#ccc";
    $myImage = "wednesdayburroughs.jpg";
    $myAlt = "Burroughs Wednesday";
    $poetName = "William S. Burroughs";
    $myWeekDay = "Wednesday";
    $myQuote = "&quot;In the U.S., you have to be a deviant or die of boredom.&quot;";
    $myAuthor = "&ndash; William S. Burroughs";
    break;
    
case '4':
    $myTitle = "Thursday";
    $backgroundColor = "#CCCC00";
    $myImage = "thursdaycassady.jpg";
    $myAlt = "Cassady Thursday";
    $poetName = "Neal Cassady";
    $myWeekDay = "Thursday";
    $myQuote = "&quot;Sometimes I sits and thinks. Other times I sits and drinks, but mostly I just sits.&quot;";
    $myAuthor = "&ndash;Neal Cassady";
    break;
    
case '5':
    $myTitle = "Friday";
    $backgroundColor = "#B8B894";
    $myImage = "fridaycorso.jpg";
    $myAlt = "Corso Thursday";
    $poetName = "Gregory Corso";
    $myWeekDay = "Friday";
    $myQuote = "&quot;But when the conquered spirit breaks free And indicates a new light Who'll take care of the cats?&quot;";
    $myAuthor = "&ndash;Gregory Corso";
    break;
    
case '6': 
    $myTitle = "Saturday";
    $backgroundColor = "#D65C33";
    $myImage = "saturdayferlinghetti.jpg";
    $myAlt = "Ferlinghetti Saturday";
    $poetName = "Lawrence Ferlinghetti";
    $myWeekDay = "Saturday";
    $myQuote = "&quot;The world is a beautiful place to be born into if you don't mind some people dying all the time or maybe only starving some of the time which isn't half so bad if it isn't you.&quot;";
    $myAuthor = "&ndash;Lawrence Ferlinghetti";
    break;
    
case '7':
    $myTitle = "Sunday";
    $backgroundColor = "#66CCFF";
    $myImage = "sundaysolomon.jpg";
    $myAlt = "Solomon Sunday";
    $poetName = "Carl Solomon";
    $myWeekDay = "Sunday";
    $myQuote = "&quot;The Wisdom of Solomon (Carl) <p>They censor words not the things they denote:</p><br>
It would create less of a stir to drop a piece of shit on Grant's tomb<br>
than to write it out in white paint. <br>
Because people recognize that's what memorials are for–old bums & dogs to shit on.&quot;";
    $myAuthor = "&ndash;Allen Ginsberg, Journals: Early Fifties, Early Sixties";
    break;


}


?>


<!--    <h1>A Beat a Day <img class="splatter" alt="splatter" src= "images/splatter.png"></h1>
    <section class="poet">
        <h2><?=$myWeekDay?></h2>
        <img src="images/<?=$myImage?>" class="beatImage" alt="<?=$myAlt?>">
        <p class="subHeading">The beat of the day for <?=$myWeekDay?> is <?=$poetName?>.</p>
        <div class="quote">
            <p><?=$myQuote?></p>
            <p class="author"> <?=$myAuthor?></p>
        </div>
        <div class="clearFix"></div>
    </section>
    <footer>
        <p><a href="http://validator.w3.org/check/referer" target="_blank">Valid HTML</a> ~ <a href="http://jigsaw.w3.org/css-validator/check?uri=referer" target="_blank">Valid CSS</a></p>
    </footer>
</body>
    
</html> -->
<?php include 'includes/header.php';?>
    <h1><?=$pageID?></h1>
    <h2><?=$myWeekDay?></h2>
    <p class="subHeading">The beat of the day for <?=$myWeekDay?> is <?=$poetName?>.</p>
    <img src="images/<?=$myImage?>" class="beatImage" alt="<?=$myAlt?>">
    <p><a href="daily.php?day=7">Sunday</a></p>
    <p><a href="daily.php?day=1">Monday</a></p>
    <p><a href="daily.php?day=2">Tuesday</a></p>
    <p><a href="daily.php?day=3">Wednesday</a></p>
    <p><a href="daily.php?day=4">Thursday</a></p>
    <p><a href="daily.php?day=5">Friday</a></p>
    <p><a href="daily.php?day=6">Saturday</a></p>
    
<?php include 'includes/footer.php';?>
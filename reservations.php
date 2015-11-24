<?php require 'includes/config.php';?>
<?php include 'includes/header.php';?>

<h1><?=$pageID?></h1>
<?php
    if(isset($_POST['submit']))
{//data submitted
    /*echo '<pre>';
    var_dump($_POST);
    echo '</pre>';*/
    
    /*
Allows us to send an email that respects the server domain spoofing polices of 
hosts like DH.

$response = safeEmail($to, $subject, $message, $replyTo='','html');

if($response)
{
    echo 'hopefully HTML email sent!<br />';
}else{
   echo 'Trouble with HTML email!<br />'; 
}

*/

/*Needs: 
    Two Radio buttons
    Three Checkboxes
    Two Textboxes
    One Textarea (for comments) 
*/

    $to = 'bkarle01@seattlecentral.edu';
    $message = process_post();
    $replyTo = $_POST['email'];
    $subject = 'Test from contact form';
    $website = 'Retro Reservations';
    $sendEmail = TRUE;
    
    safeEmail($to, $subject, $message, $replyTo);
    
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
        <fieldset>
            Name:<br />
            <input type="text" name="Name" required="required" /><br />
            Email:<br />
            <input type="email" name="Email" required="required" /><br />
            Phone Number:<br />
            <input type="text" name="Phone" /><br />
        </fieldset>
        <br />
        <fieldset>
           <legend> What type of Reservation would you like to make?</legend>
            <br /><input type="radio" name="type" required="required" value="Table"> Table </input>
            <br /><input type="radio" name="type" required="required" value="Party Room"> Party Room </input>
            <br /><input type="radio" name="type" required="required" value="Restaurant"> Restaurant </input>
            <br /><input type="radio" name="type" required="required" value="Other"> Other</input>
        </fieldset>
        <br />
        <fieldset>
            <legend>Do you have any special needs?</legend>
            <br /><input type="checkbox" name="Needs[]" id="Keg" value="Keg"> A Keg </input>
            <br /><input type="checkbox" name="Needs[]" id="Hates" value="Hats"> Party hats </input>
            <br /><input type="checkbox" name="Needs[]" id="Clown"value="Clown"> A Clown </input>
        </fieldset>
        <br />
        <fieldset>
            <legend>Comments:</legend>
            <br /><textarea name="Comments"></textarea><br />
            <input type="submit" value="Send" name="submit" />
        </fieldset>
        <br />
    </form>
    ';
    
}

?>

<?php include 'includes/footer.php';?>
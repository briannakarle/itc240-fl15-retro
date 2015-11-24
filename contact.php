<?php require 'includes/config.php';?>
<?php include 'includes/header.php';?>

<h1><?=$pageID?></h1>

<?php include 'includes/contact-simple.php';?>
<!-- <?php
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
    
    $to = 'bkarle01@seattlecentral.edu';
    $message = process_post();
    $replyTo = $_POST['email'];
    $subject = 'Test from contact form';
    
    safeEmail($to, $subject, $message, $replyTo);
    
}else{//show form
    echo '
    <form method="post" action="' . THIS_PAGE . '">
    Name: <input type="text" name="Name" required="required" /><br />
    Email: <input type="email" name="Email" required="required" /><br />
    Comments: <textarea name="Comments"></textarea><br />
    <input type="submit" value="Send" name="submit" />
    ';
    
}

?>-->

<?php include 'includes/footer.php';?>
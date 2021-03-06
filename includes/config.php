<?php
//config.php

define('DEBUG',TRUE); #we want to see all errors

date_default_timezone_set('America/Los_Angeles'); #sets default date/timezone for this website

//database credentials here
include 'credentials.php';
include 'common.php'; //stores all unsightly application functions, etc.
include 'MyAutoLoader.php'; //loads class that autoloads all classes in include folder

/* automatic path settings - use the following path settings for placing all code in one application folder */ 
define('VIRTUAL_PATH', 'http://briannakarle.com/itc240/retro/'); # Virtual (web) 'root' of application for images, JS & CSS files
define('PHYSICAL_PATH', '/home/brikar8/briannakarle.com/itc240/retro/'); # Physical (PHP) 'root' of application for file & upload reference
define('INCLUDE_PATH', PHYSICAL_PATH . 'includes/'); # Path to PHP include files - INSIDE APPLICATION ROOT

ob_start();  #buffers our page to be prevent header errors. Call before INC files or ANY html!
header("Cache-Control: no-cache");header("Expires: -1");#Helps stop browser & proxy caching


//This defines the current file name
define('THIS_PAGE', basename($_SERVER['PHP_SELF']));

//echo THIS_PAGE;


//this allows us to add unique info to our pages
switch(THIS_PAGE)
{
    case "template.php":
        $title = "My Template Title Tag";
        $pageID = "My Template Page ID";
        break;
        
    case "daily.php":
        $title="Daily Special!";
        $pageID = "Daily Special";
        break;
    
    case "contact.php":
        $title="Contact Us!";
        $pageID = "Contact Us";
        break;
    
     case "index.php":
        $title="Welcome to Retro Diner!";
        $pageID = "Welcome";
        break;
    
     case "menu.php":
        $title="Menu!";
        $pageID = "Menu";
        break;
        
    case "reservations.php":
        $title="Make a Reservation!";
        $pageID = "Make a Reservation";
        break;
        
    case "data1.php":
        $title="Our First Data Page";
        $pageID = "Customer Data";
        break;
        
    case "customer_list.php":
        $title="Our Customer List";
        $pageID = "Customer List";
        break;
        
    case "character_list.php":
        $title="Star Wars Character List";
        $pageID = "Star Wars Characters";
        break;
        
    default:
        $title = THIS_PAGE;
        $pageID = "Retro Diner";
}//end of switch

//here are our navigation pages:
$nav1['template.php'] = 'Template';
$nav1['daily.php'] = 'Daily';
$nav1['menu.php'] = 'Menu';
$nav1['reservations.php'] = 'Reservations';
$nav1['contact.php'] = 'Contact';
$nav1['customer_list.php'] = 'Customers';
$nav1['character_list.php'] = 'Star Wars Characters';

/*foreach($nav1 as $link => $label)


				<li>
					<a href="index.html">Home</a>
				</li>
				<li>
					<a class="active" href="about.html">About</a>
				</li>
				<li>
					<a href="burger.html">Menu</a>
				</li>
				<li>
					<a href="contact.html">Contact</a>
				</li>
				<li>
					<a href="blog.html">Blog</a>
				</li>
			
            
{
    echo "link is $link and label is $label <br />";

}*/



//echo $title;

//die;
/*
Creates Links inside header.php file

<li><a href="LINK">LABEL</a></li>
<li class="active"><a href="LINK">LABEL</a></li>


*/
function makeLinks($arr,$prefix='',$suffix='',$exception='')
{
    $myReturn = '';
    foreach($arr as $link => $label)

    {
        
        if(THIS_PAGE == $link)
        {//current file gets active class
             $myReturn .= $exception . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
            
        }else{
            $myReturn .= $prefix . '<a href="' . $link . '">' . $label . '</a>' . $suffix;
        }

     }//foreach

    return $myReturn;

}//end makeLinks function

//echo $title;

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


function safeEmail($to, $subject, $message, $replyTo = '',$contentType='text')
{
    $fromAddress = "Automated Email <noreply@" . $_SERVER["SERVER_NAME"] . ">";

    if(strtolower($contentType)=='html')
    {//change to html format
        $contentType = 'Content-type: text/html; charset=iso-8859-1';
    }else{
        $contentType = 'Content-type: text/plain; charset=iso-8859-1';
    }
    
    $headers[] = "MIME-Version: 1.0";//optional but more correct
    //$headers[] = "Content-type: text/plain; charset=iso-8859-1";
    $headers[] = $contentType;
    //$headers[] = "From: Sender Name <sender@domain.com>";
    $headers[] = 'From: ' . $fromAddress;
    //$headers[] = "Bcc: JJ Chong <bcc@domain2.com>";
    //$headers[] = "Reply-To: Recipient Name <receiver@domain3.com>";
    
    if($replyTo !=''){
        $headers[] = 'Reply-To: ' . $replyTo;   
    }
    
    
    $headers[] = "Subject: {$subject}";
    $headers[] = "X-Mailer: PHP/". phpversion();
    
    $headers = implode(PHP_EOL,$headers);

    
    return mail($to, $subject, $message, $headers);

}//end safeEmail()



//die;

function process_post()
{//loop through POST vars and return a single string
    $myReturn = ''; //set to initial empty value

    foreach($_POST as $varName=> $value)
    {#loop POST vars to create JS array on the current page - include email
         $strippedVarName = str_replace("_"," ",$varName);#remove underscores
        if(is_array($_POST[$varName]))
         {#checkboxes are arrays, and we need to collapse the array to comma separated string!
             $myReturn .= $strippedVarName . ": " . implode(",",$_POST[$varName]) . PHP_EOL;
         }else{//not an array, create line
             $myReturn .= $strippedVarName . ": " . $value . PHP_EOL;
         }
    }
    return $myReturn;
} 

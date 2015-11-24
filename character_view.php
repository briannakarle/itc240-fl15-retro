<?php
//character_view.php -- shows details of a single character
?>

<?php include 'includes/config.php';?>

<?php 

//process querystring here

if(isset($_GET['id']))
{//if there is data, process data
    $id = (int)$_GET['id']; //cast the data to integer, for security purposes
    
}else{ //if data is not good, send to "safe" place
    header('location: character_list.php');

}
$sql = "select * from Characters where CharacterID = $id"; //work in this area.  Connect to the database.

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); //extract data here


$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) >0) //if we have more than zero records, show them
{//show records
    
    /*
    CREATE TABLE `Characters` (
  `CharacterID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Occupation` varchar(50) DEFAULT NULL,
  `Species` varchar(50) DEFAULT NULL,
  `Affiliation` varchar(50) DEFAULT NULL,
  `Description` tinytext,
  PRIMARY KEY (`CharacterID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/   
    while($row = mysqli_fetch_assoc($result)) //show data in row, one at a time
    { //work in this area
       $Name = stripslashes($row['Name']);
       $Occupation = stripslashes($row['Occupation']);
       $Species = stripslashes($row['Species']);
       $Affiliation = stripslashes($row['Affiliation']);
       $Description = stripslashes($row['Description']);
       $title = $Name;
       $pageID = $Name;
       $Feedback = '';//no feedback necessary
        
    }    
    
}else{//inform no records
    
    $Feedback = '<p>Character Does not Exist</p>';//tell user that character does not exist

}



?>

<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
 
    
if($Feedback == '')//data exists, show it
{
    //specific view item
    echo '<img src="uploads/character_' . $id . '.jpg" alt="' . $Name . '">';
    echo '<p><div class="db_elements_view">';
    echo '<p><span class="column">Name:</span> ' . $Name . ' </p>';
    echo '<p><span class="column">Occupation: </span>' . $Occupation . ' </p>';
    echo '<p><span class="column">Species: </span>' . $Species . ' </p>';
    echo '<p><span class="column">Affiliation: </span>' . $Affiliation . ' </p>';
    echo '<p><span class="column">Description: </span>' . $Description . ' </p>';

    //echo '<a href="character_view.php?id=' . $row['CharacterID'] . '">' . $row['FirstName'] . '</a>';

    echo '</p></div>';
    
}else{ //warn user no data

    echo $Feedback;
    
}

     echo '<p><a href="character_list.php">Go Back</a></p>'; //send back to list page

//release web server resources

@msqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>

<?php include 'includes/footer.php';?>
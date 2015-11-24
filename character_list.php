<?php
//character_list.php -- show a list of character data
?>

<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<div class="db_elements">
<?php

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); //extract data here

$sql = "select * from Characters"; //work in this area.  Connect to the database.

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
        echo '<p><section>';
        echo '<a href="character_view.php?id=' . $row['CharacterID'] . '">' . $row['Name'] . '</a>';
        //echo '<p><span class="column">Name: </span>' . $row['Name'] . ' </p>';
        echo '<p><span class="column">Occupation: </span>' . $row['Occupation'] . ' </p>';
        //echo '<p><span class="column">Species: </span>' . $row['Species'] . ' </p>';
        //echo '<p><span class="column">Affiliation: </span>' . $row['Affiliation'] . ' </p>';
        echo '<p><span class="column">Description: </span>' . $row['Description'] . ' </p>';
        
        
        echo '</p></section>';
    }    
    
}else{//inform no records
    
    echo '<p>Currently no character records</p>';//tell user that there are no records

}

//release web server resources

@msqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>
</div>

<?php include 'includes/footer.php';?>
<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

$sql = "select * from test_Customers"; //work in this area

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) >0) //if we have more than zero records, show them
{//show records
    
    while($row = mysqli_fetch_assoc($result)) //show data in row, one at a time
    { //work in this area
        echo '<p>';
        echo 'FirstName: <b>' . $row['FirstName'] . '</b> ';
        echo 'FirstName: <b>' . $row['LastName'] . '</b> ';
        echo 'FirstName: <b>' . $row['Email'] . '</b> ';

        echo '</p>';
    }    
    
}else{//inform no records
    
    echo '<p>Currently no customer records</p>';//tell user that there are no records

}


?>


<?php include 'includes/footer.php';?>
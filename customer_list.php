<?php
//customer_list.php -- show a list of customer data
?>

<?php include 'includes/config.php';?>
<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); //extract data here

$sql = "select * from test_Customers"; //work in this area.  Connect to the database.

$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) >0) //if we have more than zero records, show them
{//show records
    
    while($row = mysqli_fetch_assoc($result)) //show data in row, one at a time
    { //work in this area
        echo '<p>';
        echo 'FirstName: <b>' . $row['FirstName'] . '</b> ';
        echo 'LastName: <b>' . $row['LastName'] . '</b> ';
        echo 'Email: <b>' . $row['Email'] . '</b> ';
        
        echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';
        
        echo '</p>';
    }    
    
}else{//inform no records
    
    echo '<p>Currently no customer records</p>';//tell user that there are no records

}

//release web server resources

@msqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>


<?php include 'includes/footer.php';?>
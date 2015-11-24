<?php
//customer_view.php -- shows details of a single customer
?>

<?php include 'includes/config.php';?>

<?php 

//process querystring here

if(isset($_GET['id']))
{//if there is data, process data
    $id = (int)$_GET['id']; //cast the data to integer, for security purposes
    
}else{ //if data is not good, send to "safe" place
    header('location: customer_list.php');

}
$sql = "select * from test_Customers where CustomerID = $id"; //work in this area.  Connect to the database.

$iConn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME); //extract data here


$result = mysqli_query($iConn,$sql);

if(mysqli_num_rows($result) >0) //if we have more than zero records, show them
{//show records
    
    while($row = mysqli_fetch_assoc($result)) //show data in row, one at a time
    { //work in this area
       $FirstName = stripslashes($row['FirstName']);
       $LastName = stripslashes($row['LastName']);
       $Email = stripslashes($row['Email']);
       $title = "Title page for " . $FirstName;
       $pageID = $FirstName;
       $Feedback = '';//no feedback necessary
        
    }    
    
}else{//inform no records
    
    $Feedback = '<p>Customer Does not Exist</p>';//tell user that customer does not exist

}



?>

<?php include 'includes/header.php';?>
<h1><?=$pageID?></h1>
<?php
    
if($Feedback == '')//data exists, show it
{
    //specific view item
    echo '<p>';
    echo 'FirstName: <b>' . $FirstName . '</b> ';
    echo 'LastName: <b>' . $LastName . '</b> ';
    echo 'Email: <b>' . $Email . '</b> ';

    //echo '<a href="customer_view.php?id=' . $row['CustomerID'] . '">' . $row['FirstName'] . '</a>';

    echo '</p>';
    
}else{ //warn user no data

    echo $Feedback;
    
}

     echo '<p><a href="customer_list.php">Go Back</a></p>'; //send back to list page

//release web server resources

@msqli_free_result($result);

//close connection to mysql
mysqli_close($iConn);

?>


<?php include 'includes/footer.php';?>
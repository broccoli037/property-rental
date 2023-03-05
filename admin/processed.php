<?php

include('../config/constants.php');


$id = $_GET['id'];
    

// delete the data
$sql = "UPDATE contact_request SET status = 'processed' WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: manage-user.php");
}
else{
     echo "ERROR...Failed to delete the data";
}
?>
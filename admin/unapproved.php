<?php

include('../config/constants.php');


$id = $_GET['id'];
$image_name = $_GET['image_name'];


// delete image
if($image_name!="")
{
     $path="../images/properties/".$image_name;

     $remove = unlink($path);

     if($remove==false){
          echo 'Failed to remove image';
          header('location'.SITEURL.'admin/listing-approval.php');
          die();
     }
}
    

// delete the data
$sql = "DELETE FROM listing_request WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: listing-approval.php");
}
else{
     echo "ERROR...Failed to delete the data";
}
?>
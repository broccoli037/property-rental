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
          header('location'.SITEURL.'admin/properties.php');
          die();
     }
}
    

// delete the data
$sql = "DELETE FROM property WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: properties.php");
}
else{
     echo "ERROR...Failed to delete the data";
}
?>
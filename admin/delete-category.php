<?php

include('../config/constants.php');


$id = $_GET['id'];

    

// delete the data
$sql = "DELETE FROM category WHERE id=$id";

$res = mysqli_query($conn, $sql);

if($res==true)
   {
     header("Location: manage-category.php");
}
else{
     echo "ERROR...Failed to delete the data";
}

// if(isset($_GET['id']) AND isset($_GET['title']))
// {
//     $id = $_GET['id'];
    

//     // delete the data
//     $sql = "DELETE FROM category WHERE id=$id";

//     $res = mysqli_query($conn, $sql);

//     if($res==true)
//     {
//         header("Location: manage-category.php");
//     }
//     else{
//         echo "ERROR...Failed to delete the data";
//     }
// }
// else
// {
//     header("Location: manage-category.php");
// }

?>
<?php
    include('config/constants.php');
    include('config/functions.php');

    $index_user_data = index_loginval($conn);
    $userid= $index_user_data['user_id'];
    if($index_user_data == false){
        header("Location: login.php");
    }

   
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For making responsive website -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajilo Renter</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon-32x32.png">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   
    
    <!-- Navigation Section start-->
    <?php include('partials/header.php'); ?>
    <!-- Navigation section ends -->


        <!-- main starts here -->
        <div class="main">
            <div class="container">
                <h1>YOUR LISTINGS</h1> <br>

                <!-- button to add admin -->
                <a href="user_add_property.php" class="btn-primary">Add Property</a> <br> <br>
                <div style="overflow-x:auto;">
                <table class="tbl-full">
                    <tr>
                        <th>SN.</th>
                        <th>Title</th>
                        <!-- <th>Description</th> -->
                        <th>Price</th>
                        <th>Image name</th>
                        <th>Location</th>
                        <th>Property type</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    
                    // create a sql query to get all data
                    $sql = "SELECT * FROM property WHERE user_id=$userid";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                    $sn=1;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            // $description = $row['description'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $location = $row['location'];
                            $property_type = $row['property_type'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <!-- <td><?php echo $description; ?></td> -->
                                <td>Rs. <?php echo $price; ?></td>
                                <td>
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "Image not available";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL; ?>images/properties/<?php echo $image_name ?>" width="100px">

                                            <?php
                                        }
                                    ?>
                                </td>
                                <td><?php echo $location; ?></td>
                                <td><?php echo $property_type; ?></td>
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-property.php?id=<?php echo $id; ?>" class="btn-secondary"><i class="fa fa-edit" style="font-size:24px"></i></i></a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-property.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger"><i class="fa fa-remove" style="font-size:24px"></i></a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        echo "ERROR";
                    }

                    ?>

                    
                </table>
                </div>

                
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
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
                <h1>Contact request Status</h1> <br>

                

                <table class="tbl-full">
                    <tr>
                        <th>SN.</th>
                        <th>Title</th>
                        <!-- <th>Description</th> -->
                        <th>Price</th>
                        <th>Location</th>
                        <th>Detail location</th>
                        <th>Seller/renter</th>
                        <th>Status<th>
                    </tr>

                    <?php
                    
                    // create a sql query to get all data
                    $sql = "SELECT * FROM contact_request WHERE user_id=$userid";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);
                    $sn=1;

                    if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id = $row['id'];
                            $title = $row['product_title'];
                            // $description = $row['description'];
                            $price = $row['price'];
                            $location = $row['product_location'];
                            $detail_location = $row['detail_location'];
                            $seller_name= $row['seller_name'];
                            $status = $row['status'];
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>
                                <td>Rs. <?php echo $price; ?></td>
                                <td><?php echo $location; ?></td>
                                <td><?php echo $detail_location; ?></td>
                                <td><?php echo $seller_name; ?></td>
                                <td><?php echo $status; ?></td>
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

                
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
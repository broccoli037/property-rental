<?php 
    include('../config/constants.php');
    include('../config/functions.php');
?>

<?php include('partials/header.php'); ?>
<?php

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);

    }

?>


        <!-- main starts here -->
        <div class="main">
            <div class="container">
                <h1>Listing approval</h1> <br>

                <!-- button to add admin -->
                

                <table class="tbl-full">
                    <tr>
                        <th>SN.</th>
                        <th>Title</th>
                        <!-- <th>Description</th> -->
                        <th>Price</th>
                        <th>Image name</th>
                        <th>Location</th>
                        <th>Property type</th>
                        <th>Seller Name</th>
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                    
                    // create a sql query to get all data
                    $sql = "SELECT * FROM listing_request";

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
                            $seller_name = $row['seller_name'];
                            $seller_phone = $row['seller_phone'];
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
                                <td><?php echo $seller_name; ?></td>
                                <td><?php echo $seller_phone; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/approved.php?id=<?php echo $id; ?>" class="btn-secondary">Approve</a> 
                                    <a href="<?php echo SITEURL; ?>admin/unapproved.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete</a>
                                </td>
                            </tr>

                            <?php
                        }
                    }
                    else
                    {
                        echo "";
                    }

                    ?>

                    
                </table>

                
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
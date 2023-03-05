<?php 
    include('../config/constants.php');
    include('../config/functions.php');
    $index_user_data = index_loginval($conn);

    $userid= $index_user_data['user_id'];

    if($index_user_data == false){
        header("Location: ../login.php");
    }
    if($index_user_data == true){
      if($index_user_data['type'] == 0)
      {
          echo'
          <script>alert("Access denied")</script>';
          header("Location: ../index.php");}
      }
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
                <h1>PROPERTIES</h1> <br>

                <!-- button to add admin -->
                <a href="add-property.php" class="btn-primary">Add Property</a> <br> <br>

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
                    $sql = "SELECT * FROM property";

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
                                    <a href="<?php echo SITEURL; ?>admin/update-property.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a> 
                                    <a href="<?php echo SITEURL; ?>admin/delete-property.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name ?>" class="btn-danger">Delete</a>
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

                
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
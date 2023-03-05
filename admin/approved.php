<?php 
    include('../config/constants.php');
    include('../config/functions.php');

    $id = $_GET['id'];
    
    $sql2 = "SELECT * FROM listing_request WHERE id=$id";

    $res2 = mysqli_query($conn,$sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['image_name'];
    $location = $row2['location'];
    $detail_location = $row2['detail_location'];
    $nearby_landmarks = $row2['nearby_landmarks'];
    $seller_name = $row2['seller_name'];
    $seller_phone = $row2['seller_phone'];
    $seller_email = $row2['seller_email'];
    $current_property_type = $row2['property_type'];
    $featured = $row2['featured'];
    $active = $row2['active'];
    $image_name = $current_image;

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $location = $_POST['location'];
        $detail_location = $_POST['detail_location'];
        $nearby_landmarks = $_POST['nearby_landmarks'];
        $seller_name = $_POST['seller_name'];
        $seller_phone = $_POST['seller_phone'];
        $seller_email = $_POST['seller_email'];
        $property_type = $_POST['property_type'];

        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = 'no'; 
        }

        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = 'no'; 
        }
        if(!empty($title) && !empty($description) && !empty($price) && !empty($location) && !empty($property_type)){

            $user_id = random_num(20);
            $query = "INSERT INTO property(title,description,price,image_name,location,detail_location,nearby_landmarks,seller_name,seller_phone,seller_email,property_type,featured,active,user_id) VALUES ('$title','$description',$price,'$image_name','$location','$detail_location','$nearby_landmarks','$seller_name','$seller_phone','$seller_email','$property_type','$featured','$active','$userid')";

            mysqli_query($conn,$query);

            header("Location: listing-approval.php");
            

            
    

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
            
        }
        else{
            echo "enter valid information!";
        }
    }


?>

<?php include('partials/header.php'); ?>

<div class="main">
    <div class="container">
    <div class="addpropertybg">
        <div class="addprptybox">
            <h1 >Update Property</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Title:</label><br>
                    <input type="text" name="title" placeholder="eg: 3bhk Flat for rent" value="<?php echo $title ?>" required><br><br>
                    
                    <label>Description:</label><br>
                    <textarea name="description" placeholder="Please describe detail about your property like property conditions, BHK, and land mark near your locations" cols="50" rows="8" required><?php echo $description ?>"</textarea><br><br>
                    
                    <label>Price:</label><br>
                    <input type="number" name="price"value="<?php echo $price ?>" required><br><br>
                    
                    <label>Current Image:</label><br>
                    <?php 
                    
                        if($current_image == "")
                        {
                            echo 'image not available';
                        }
                        else
                        {
                            ?>
                                <img src="<?php echo SITEURL;?>images/properties/<?php echo $current_image; ?>"style="width: 100px; height: auto;"><br>
                            <?php
                        }
                    
                    ?>
                    <!-- <label>Select New Image</label>
                    <input type="file" name="image_name" required><br><br> -->
                    
                    <label>Location:</label><br>
                    <select name="location" required>
                    <option value="kathmandu">Kathmandu</option>
                    <option value="bhaktapur">Bhaktapur</option>
                    <option value="lalitpur">Lalitpur</option>
                    </select>
                    <br><br>
                    <label>Detail location:</label><br>
                    <input type="text" name="detail_location"value="<?php echo $detail_location ?>"><br>
                    <label>Nearby Landmarks:</label><br>
                    <input type="text" name="nearby_landmarks"value="<?php echo $nearby_landmarks ?>"><br>                    
                    <label>Property type:</label><br>
                    <select name="property_type" required>

                    <?php
                        // code to display property type or categories from database
                        $sql = "SELECT * FROM category";

                        $res = mysqli_query($conn, $sql);
                        // count rows to check whether we have categories or not
                        $count = mysqli_num_rows($res);
                        if($count>0)
                        {
                            while($row=mysqli_fetch_assoc($res))
                            {
                                $id = $row['id'];
                                $title = $row['title'];
                                ?>
                                <option <?php if($current_property_type==$id){echo"selected";} ?> value="<?php echo $id; ?>"><?php echo $title; ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                                <option value="0">none</option>
                            <?php
                        }
                    ?>
                    
                    </select>
                    <br><br>
                    <label>Seller Name:</label><br>
                    <input type="text" name="seller_name"value="<?php echo $seller_name ?>"><br>
                    <label>Seller Phone</label><br>
                    <input type="number" name="seller_phone"value="<?php echo $seller_phone ?>"><br>
                    <label>Seller Email</label><br>
                    <input type="email" name="seller_email"value="<?php echo $seller_email ?>"><br>
                    
                    <label>Featured:</label><br>
                    <input type="radio" name="featured" value="yes" required>Yes
                    <input type="radio" name="featured" value="no" required>No<br><br>
                    
                    <label>Active:</label><br>
                    <input <?php if($active=='yes'){echo"checked";} ?> type="radio" name="active" value="yes" required>Yes
                    <input <?php if($active=='no'){echo"checked";} ?> type="radio" name="active" value="no" required>No<br><br>

                    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
                   
                    <input type="submit" name="submit" value="Approve" class="form-btn">
                </form>
                


                

            </div>  
         </div>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
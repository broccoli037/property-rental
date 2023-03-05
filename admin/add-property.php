<?php 
    include('../config/constants.php');
    include('../config/functions.php');
    $index_user_data = index_loginval($conn);
    $userid= $index_user_data['user_id'];
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
        $userid = $_POST['user_id'];

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


        // for image
        if(isset($_FILES['image_name']['name']))
        {
            $image_name = $_FILES['image_name']['name'];

            if($image_name!="")
            {
                // rename image
                // get extension of selected image
                $ext = end(explode('.', $image_name));

                // create new name for image
                $image_name = "sajilo-renter-".rand(00000,99999).".".$ext; 

                // upload image
                // get src path and destination path

                // source path is current location of the image
                $src=$_FILES['image_name']['tmp_name'];

                // destination path for the image to be uploaded
                $dst = "../images/properties/".$image_name;
                
                // finally upload the food image
                $upload = move_uploaded_file($src, $dst);

                // checking
                if($upload==false)
                {

                    header("Location: add-property.php");
                    $_SESSION['upload'] = '<script> alert("Failed to upload the image"); </script>';

                    die();
                }
            }
        }
        else{
            $image_name = ""; //deafult value
        }

        if(!empty($title) && !empty($description) && !empty($price) && !empty($location) && !empty($property_type) && !empty($image_name)){

            $user_id = random_num(20);
            $query = "INSERT INTO property(title,description,price,image_name,location,detail_location,nearby_landmarks,seller_name,seller_phone,seller_email,property_type,featured,active,user_id) VALUES ('$title','$description',$price,'$image_name','$location','$detail_location','$nearby_landmarks','$seller_name','$seller_phone','$seller_email','$property_type','$featured','$active','$userid')";

            mysqli_query($conn,$query);

            header("Location: properties.php");
        }
        else{
            echo "enter valid information!";
        }
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

<div class="main">
    <div class="container">
    <div class="addpropertybg">
        <div class="addprptybox">
            <h1 >Add Property</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <label>Title:</label><br>
                    <input type="text" name="title" placeholder="eg: 3bhk Flat for rent" required><br><br>
                    
                    <label>Description:</label><br>
                    <textarea name="description" placeholder="Please describe detail about your property like property conditions, BHK, and land mark near your locations" cols="50" rows="8" required></textarea><br><br>
                    
                    <label>Price:</label><br>
                    <input type="number" name="price" required><br><br>
                    
                    <label>Select Image:</label><br>
                    <input type="file" name="image_name" required><br><br>
                    
                    <label>Location:</label><br>
                    <select name="location" required>
                    <option value="kathmandu">Kathmandu</option>
                    <option value="bhaktapur">Bhaktapur</option>
                    <option value="lalitpur">Lalitpur</option>
                    </select>
                    <br><br>
                    <label>Detail location:</label><br>
                    <input type="text" name="detail_location"><br>
                    <label>Nearby Landmarks:</label><br>
                    <input type="text" name="detail_location"><br>                    
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
                                <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
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
                    <input type="text" name="seller_name"><br>
                    <label>Seller Phone</label><br>
                    <input type="number" name="seller_phone"><br>
                    <label>Seller Email</label><br>
                    <input type="email" name="seller_email"><br>
                    
                    <label>Featured:</label><br>
                    <input type="radio" name="featured" value="yes" required>Yes
                    <input type="radio" name="featured" value="no" required>No<br><br>
                    
                    <label>Active:</label><br>
                    <input type="radio" name="active" value="yes" required>Yes
                    <input type="radio" name="active" value="no" required>No<br><br>
                   
                    <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
                    <input type="submit" name="submit" value="Add Property" class="form-btn">
                </form>



            </div>  
         </div>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
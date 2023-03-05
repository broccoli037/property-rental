<?php
    include('config/constants.php');
    include('config/functions.php');

    $index_user_data = index_loginval($conn);

    $userid= $index_user_data['user_id'];

    if($index_user_data == false){
        header("Location: login.php");
    }
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
                $dst = "images/properties/".$image_name;
                
                // finally upload the food image
                $upload = move_uploaded_file($src, $dst);

                // checking
                if($upload==false)
                {

                    header("Location: user_add_property.php");
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
            $query = "INSERT INTO listing_request(title,description,price,image_name,location,detail_location,nearby_landmarks,seller_name,seller_phone,seller_email,property_type,user_id) VALUES ('$title','$description',$price,'$image_name','$location','$detail_location','$nearby_landmarks','$seller_name','$seller_phone','$seller_email','$property_type','$userid')";

            mysqli_query($conn,$query);

            header("Location: alldone.php");
        }
        else{
            echo "enter valid information!";
        }
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
                        
                        
                        <input type="hidden" name="user_id" value="<?php echo $userid; ?>">
                        
                        <input type="submit" name="submit" value="Add Property" class="form-btn">
                    </form>



                </div>  
            </div>
        </div>

    </div>





    <!-- Footer section start -->
    <section class="footer">
        <div class="container">
            <div class="foot-3">
                <p class="logo2"><span class="sajilo">Sajilo</span> <span class="renter">Renter</span></p> 
                <br>
                Finding a place for everyone.
                <br>
                ©2022 All rights reserved
            </div>

            <div class="foot-3">
                <span class="foot-title">Our Company</span><br>
                <div class="foot-content">
                    <ul>
                        <!-- <li><a href="#">Career</a></li> -->
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="terms.php ">Terms</a></li>
                    </ul>
                </div>
            </div>

            <div class="foot-3">
                <span class="foot-title">Help</span><br>
                <div class="foot-content">
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Feedback</a></li>
                    </ul>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
        <!-- <div class="container">
            social media links
        </div> -->
        
    </section>
    <!-- Footer section ends -->
</body>
</html>
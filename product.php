<?php
    include('config/constants.php');
    include('config/functions.php');

    $index_user_data = index_loginval($conn);
    
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        header("Location: messagesent.php");
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
    <link rel="stylesheet" href="css/style.css">
    <script src="js.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:wght@200;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @media screen and (max-width: 750px)
         {
            .navbar{
                padding-top:10px;
            }
            .logo{
                font-size: 25px;
                margin-top: 2%;
            }
            .menu{
                width: 100%;
                margin-top: 4%;
                padding-left: 2%;
                float:left;
                word-spacing: 20px;
            }
            .menu ul li{
                display: inline;
                padding: 0 0;
                
                margin:0 0;
                
            }
            .menu ul li a{
                font-size: 15px;
                
            }
            .nav-btn{
                margin-top: -20%;
                margin-right: 6%;
                
            }
            .navbtn{
                font-size: 25px
            }
            .navbtn:hover{
                font-size: 20px;
            }
            .b-3{
                width: 80%;
                text-align: center;
            }
            .prtysrchtxt{
                font-size: 2em;
            }
            .property-search input[type="search"]{
                font-size: 1.5em;
            }
            .btn{
                font-size: 1.5em;
            }
            .place{
                font-size: 2em;
            }
            .des-text1{
                font-size: 1.5em;
            }
            .description{
                width: 80%;
            }
            .des-text2{
                font-size: 1em;
            }
            .loctn{
                width: 90%;
            }
            .loctn-con1{
                font-size: 2em;

            }
            .loctn-con2{

                font-size: 0.8em;
                width: 80%;
            }
            #featloctxt{
                font-size: 0.5em;
                
            }
            .feat-title{
                font-size: 1.6em;
            }
            .feat-des{
                font-size: 0.6em;
            }
            .feat-lct{
                font-size: 0.5em;
            }
            .price{
                font-size: 0.6em;
            }
            .abt-con{
                width: 80%;
                font-size: 0.6em;
            }
            .logo{
                font-family: 0.5em;
            }
            .foot-3{
                
                margin: auto;
            }
            .foot-title{
                font-size: 1em;
            }
            .featpty-con{
                width: 100%
            }
            .filter-search-items{
                width: 250%;
            }
            .cat-pro{
                width: 100%;
            }
         }
    
        .popupform{
            width: 100%;
            height: 130%;
            background-color: rgba(0,0,0,0.7);
            top:0;
            display: none;
            justify-content: center;
            align-items: center;
            position: absolute;
            
        }
       
        .popuplogin{
            width: 100%;
            height: 130%;
            background-color: rgba(0,0,0,0.7);
            top:0;
            display: none;
            justify-content: center;
            align-items: center;
            position: absolute;
            
            
        }
        .poplogbutton{
            width: 20%;
            
            background-color: white;
            padding: 1%;
            border-radius: 10px;
            text-align: center;
            font-family: 'open-sans', sans-serif;
            margin: 1%;
            color: #535353;
            position: relative;
        
            
        }
     
        .poplogbutton h2{
            font-family: 'K2D', sans-serif;
            color: black;
            
        }
        .contactform{
            width: 30%;
            
            background-color: white;
            padding: 1%;
            border-radius: 10px;
            text-align: center;
            font-family: 'open-sans', sans-serif;
            margin: 1%;
            color: #535353;
            position: relative;
        
        }
        #closeicon{
            float:right;
            position: absolute;
            top:5px;
            right: 14px;;
            font-weight: bold;
            font-size: 3em;
            transform: rotate(45deg);
            cursor: pointer;
            color: black;
            
        }
        .contactform h2{
            font-family: 'K2D', sans-serif;
            color: black;
            
            
            
        }
        label{
            font-weight: bold;
        }
        input{
            width: 50%;
            padding: 2%;
            border:1px solid #659DBD;
            margin-top: 5px;
            border-radius: 5px;
        }
        select{
            padding: 2%;
            border:1px solid #659DBD;
            margin-top: 5px;
            border-radius: 5px;
        }
        textarea{
            padding: 2%;
            border:1px solid #659DBD;
            margin-top: 5px;
            border-radius: 5px;
        }
        #contactform{
            background-color: white;
            font-size: 20px;
            padding: 1% 3%;
            font-family: 'K2D', sans-serif;
            color: black;
            border-style: none;
            border-radius: 5px;
            transition: 200ms ease;
        }
        #contactform:hover{
            background-color: #FBEEC1;
            color: #659DBD;
            
            transition: 200ms ease;
        }
        #productbutton{
            margin:1;
        }
        #productbutton a{
            text-decoration: none;
            font-family: 'K2D', sans-serif;
            margin: 3%;
            color: white;
            padding: 2%;
            border-radius: 10px;
            font-size: 1.5em;
        }
        
        #logindirect{
            background-color:#BC986A;
            transition: 200ms ease;
        }
        #logindirect:hover{
            background-color: #FBEEC1;
            color:#BC986A;
            transition: 200ms ease;
        }
        #signupdirect{
            background-color:#659DBD;
            transition: 200ms ease;
        }
        #signupdirect:hover{
            background-color:#9cd0ed;
            transition: 200ms ease;
            color:#BC986A;
        }


    </style>
   
</head>
<body>
    <!-- Navigation Section start-->
    <?php include('partials/responsivenav.php'); ?>
    <?php include('partials/header.php'); ?>
    <!-- Navigation section ends -->


    <!-- productdetail main page starts -->
    <div class="prodetails">
            <?php 
                
                $property_id=$_GET['property_id'];
                // getting properties from database that are active and featured
                $sql2 = "SELECT * FROM property WHERE active='yes' AND id='$property_id'";

                $res2 = mysqli_query($conn, $sql2);

                $count2 = mysqli_num_rows($res2);

                if($count2>0)
                {
                    while($row=mysqli_fetch_assoc($res2))
                    {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row ['description'];
                        $price = $row ['price'];
                        $image_name = $row ['image_name'];
                        $location = $row['location'];
                        $detail_location= $row['detail_location'];
                        $nearby_landmarks= $row['nearby_landmarks'];
                        $seller_name= $row['seller_name'];
                        $seller_phone= $row['seller_phone'];
                        $seller_email= $row['seller_email'];
                        ?>
                        
                            <?php
                            // checking image avaibility
                            if($image_name==""){
                                echo"error";
                            }
                            else
                            {
                                ?>
                                
                                <div class="imagebox">

                                    <img src="<?php echo SITEURL; ?>images/properties/<?php echo $image_name; ?>" style="width: 90%; height: auto;">

                                </div>
                                
                                <?php
                            }
                            ?>
                            <div class="detailsbox" style="color: #696969;">
                
                                <h1 ><?php echo $title ?></h1><br>
                                <h3 style="color: #BC986A;">RS.<?php echo $price ?></h3><br>
                                <? echo $location ?><br>
                                <h3>Overview</h3><br>
                                <p>- <?php echo $description ?></p><br>
                                <h3>Detail location</h3><br>
                                <p>- <?php echo $detail_location ?></p><br>
                                <h3>Nearby Landmarks</h3><br>
                                <p>- <?php echo $nearby_landmarks ?></p><br><br><br>

                                <div class="contactseller">
                                    <p style="font-size: 2em;">Contact the seller/renter:</p><br>
                                    <p style="font-size: 1.5em;"><?php echo $seller_name ?></p><br> 
                                    
                                    <button id="contactform" onclick="formfunction()">Contact</button>

                                </div>
                                
                            </div>

                            

                        <?php

                    }
                }
                else{
                    echo " Nothing to show";
                }
            
            ?>
            
            
        <div class="clearfix"></div>
     </div>
        
        

    <!-- product detail main page ends -->





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
    <?php
    
    if($index_user_data == false){
        echo'
        <div class="popupform">
            <div class="poplogbutton">
                <h2>Please Login To Send Message</h2><div id="closeicon"onclick="formclosefunction()">+</div>
                <br>
                <br>
                <div id="productbutton">
                    <a href="login.php" id="logindirect">Login</a>
                    <a href="signup.php" id="signupdirect">Sign up</a>
                </div>
            </div>
        </div>';
    }
    else{
        $user_id = $_SESSION['user_id'];
        echo'
            <div class="popupform">
                    <div class="contactform">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div id="frmtxt"><h2>Enquire and request visit</h2></div><div id="closeicon"onclick="formclosefunction()">+</div> <br>
                            <label>Full Name:</label><br>
                            <input type="text" name="full_name" placeholder="Full name" required><br><br>
                            <label>Email:</label><br>
                            <input type="email" name="email" placeholder="eg: email@example.com" required><br><br>
                            <label>Phone:</label><br>
                            <input type="text" name="phone" placeholder="eg: 986xxxxxxx" maxlength="10" onblur="allnumeric()" required><br><br>
                            <label>Enqire/Request tour</label><br>
                            <select name="contacted_for" required>
                            <option value="enquiry">Enquiry</option>
                            <option value="request_tour">Request a tour</option>
                            </select><br><br>
                            <label>preferred visit date:</label><br>
                            <input type="date" name="prefered_date"><br><br>
                            <label>Contact Via</label><br>
                            <select name="contact_via" required>
                            <option value="email">Email</option>
                            <option value="phone">Phone</option>
                            </select><br><br>
                            <label>Custom message:</label><br>
                                <textarea name="custom_message" placeholder="Your message" cols="30" rows="4" required></textarea><br><br>
                            <input type="submit" name="submit" id="submit" value="Submit" class="form-btn">
                        </form>
                    </div>
                </div>';
    }

   ?>
    <?php
   
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $user_id=$index_user_data['user_id'];
        $request_type = $_POST['contacted_for'];
        $prefered_visit_date = $_POST['prefered_date'];
        $contact_via = $_POST['contact_via'];
        $custom_message = $_POST['custom_message'];
        

        
        $query1 = "INSERT INTO contact_request(full_name,email,phone,user_id,request_type,prefered_visit_date,contact_via,custom_message,product_id,product_title,product_location,detail_location,price,seller_name,seller_email,seller_phone) VALUES ('$full_name','$email',$phone,$user_id,'$request_type','$prefered_visit_date','$contact_via','$custom_message',$id,'$title',' $location','$detail_location',$price,'$seller_name','$seller_email','$seller_phone')";

        mysqli_query($conn,$query1);
        
    }
    
    ?>
    
    
</body>
</html>
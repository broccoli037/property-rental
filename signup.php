<?php 
    include('config/constants.php');
    include('config/functions.php');
    $index_user_data = index_loginval($conn);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !ctype_alpha($phone)){

            $user_id = random_num(20);
            $query = "INSERT INTO users(full_name,username,email,phone,password,user_id) VAlUES ('$full_name','$username','$email','$phone','$password','$user_id')";

            mysqli_query($conn,$query);

            header("Location: login.php");
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
    <link rel="stylesheet" href="css/style.css">
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
            .loginbox{
                width: 70%;
            }
         }

         #submit:disabled{
             opacity:0,2;
             background-color: #bdaa91;
         }
         .loginbox{
             width: 29%;
             margin-top: 1%;
         }
         .loginbox input[type="text"]{
            width: 80%;
         }
         .loginbox input[type="password"]{
            width: 80%;
         }
         #h1{
             padding-bottom: 5%;
         }
    


    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <!-- Navigation Section start-->
    <?php include('partials/header.php'); ?>
    <!-- Navigation section ends -->

    <div class="signupbg">
        <div class="loginbox">
            <h1 id="h1">Sign Up</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST">
                    <label>Full Name:</label><br>
                    <input type="text" name="full_name" placeholder="eg: Anish Karki" required><br>
                    <span id="availaibity"></span>
                    <br>
                    <label>Username:</label><br>
                    <input type="text" name="username" id="username" placeholder="Enter Username" onInput="checkUsername()" required><br>
                    <span id ="username_availability"></span>
                        
                    <br>
                    <label>E-mail:</label><br>
                    <input type="text" name="email" id="email" placeholder="eg: xyz@gmail.com" required><br>
                    <span id ="email_availability"></span>
                    <br>
                    <label>Phone:</label><br>
                    <input type="text" name="phone" placeholder="eg: 986xxxxxxx" maxlength="10" onblur="allnumeric()" required><br><br>
                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="Enter Password" required><br><br>
                    <input type="submit" name="submit" id="submit" value="Sign up" class="form-btn" disabled>
                </form>
            </div>
            <br>
            <div id="signuptxt">
                <h5 id="log.txt">Already registered?<h5> <a href="login.php">Login<a>

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
                        <li><a href="terms.html">Terms</a></li>
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
<script>

    $(document).ready(function(){
        $('#username').blur(function(){

            var username = $(this).val();

            $.ajax({
                url:'check.php',
                method:"POST",
                data:{username:username},
                success:function(data)
                {
                    if(data != '0'){
                        $('#username_availability').html('<span style= "color: red;font-size: 0.8em">Username already in use</span>');
                        $('#submit').attr("disabled",true);
                    }
                    else{
                        $('#username_availability').html('<span style= "color: green">Username available</span>');
                        $('#submit').attr("disabled",false);
                    }
                }
            })
        });

        $('#email').blur(function(){

            var email = $(this).val();

            $.ajax({
                url:'check.php',
                method:"POST",
                data:{email:email},
                success:function(data)
                {
                    if(data != '0'){
                        $('#email_availability').html('<span style= "color: red;font-size: 0.8em">email already in use</span>');
                        $('#submit').attr("disabled",true);
                    }
                    else{
                        $('#email_availability').html('<span style= "color: green">email available</span>');
                        $('#submit').attr("disabled",false);
                    }
                }
            })
        });
    });

</script>
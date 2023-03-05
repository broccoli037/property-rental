<?php 
    include('config/constants.php');
    include('config/functions.php');
    $index_user_data = index_loginval($conn);

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        // $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        // $email = $_POST['email'];
        // $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password)){

            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";

            $result = mysqli_query($conn,$query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] == $password);
                    {
                        if($user_data['type'] == 0)
                        {
                            $id = $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die;
                        }
                        else
                        {
                            $id = $_SESSION['user_id'] = $user_data['user_id'];
                            header("Location: index.php");
                            die; 
                        }
                    }
                        echo '<script>alert("Wrong Password")</script>';
                    
                }
            }
            echo '<script>alert("Wrong Username or Password")</script>';
            
            // header("Location: index.html");
        }
        else{
            
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
    


    </style>
</head>
<body>
    <!-- Navigation Section start-->

    
    
    <?php include('partials/header.php'); ?>
        <!-- Navigation section ends -->'
    
    <div class="loginbg">
        <div class="loginbox">
            <h1 id="h1">LOGIN</h1><br>
            

            <div id="login">
                <!-- form start here -->
                <form action="" method="POST">
                    <label>Enter Username:</label><br>
                    <input type="text" name="username" placeholder="Enter Username"><br><br>
                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="Enter Password"><br><br>
                    <input type="submit" name="submit" value="Login" class="form-btn">
                </form>
            </div>
            <br>
            <div id="signuptxt">
                <h5 id="log.txt">Create account here:<h5> <a href="signup.php">Sign up<a>

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


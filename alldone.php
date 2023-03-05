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
         
         .terms{
            font-family: 'Open Sans', sans-serif;
            padding: 2%;
            width: 80%;
        }
        h2{
            color: #BC986A;
        }
    
    *{
        font-family: 'Open Sans', sans-serif;
        color: #535353;

    }
    .alldone{
        background-image: url(../images/checking.png);
        background-size: 600px;
        background-position-x: left;
        
        background-repeat: no-repeat;
    }
    .mainbody{
        margin: auto;
        margin-top: 10%;
        margin-bottom: 10%;
        width:30%;
        border-radius: 10px;
        text-align: center;
        padding: 3%;
        background-color: #ebebeb;
        font-family: 'K2D', sans-serif;
        
    }
    .mainbody a{
        text-decoration: none;
        font-size: 1.5em;
        background-color: #BC986A;
        color: white;
        border-radius: 10px;
        
        padding: 3%;
        transition: 200ms ease-in-out;
    }
    .mainbody a:hover{
        background-color: #FBEEC1;
        color: #BC986A;
        transition: 200ms ease-in-out;
    }
    h3{
        font-size: 2rem;
    }
    p{
        font-size: 1.5rem;
    }


    </style>
    
</head>
<body>
    <!-- Navigation Section start-->
    <section class="navbar">
        <div class="container">
            <div class="logo nav1"><a href="index.html"><span class="sajilo">Sajilo</span> <span class="renter">Renter</span></a></div>
            <div class="menu text-center">
                <ul>
                    <li><a href="apartments.html">Apartments</a></li>
                    <li><a href="houses.html">Houses</a></li>
                    <li><a href="office.html">Office</a></li>
                    <li><a href="commercial.html">Commercial</a></li>
                    
                </ul>
               
            </div>
            <div class="nav-btn nav1 dropdown">
                <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
                <button type="submit" name="submit" value="nav-btn" class="navbtn"><span class="iconify" data-icon="fluent:inprivate-account-16-filled"></span></button>
                <div class="dropdown-content">
                    <ul>
                        <li><a href="#">Favrouites</a></li>
                        <li><a href="notifications.php">Notification</a></li>
                        <li><a href="#">Your Listings</a></li>
                        <li><a href="#" id="diff">______________</a></li>
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Create Account</a></li>
                    </ul>
                </div>
            </div>
            
            <!-- <i class="iconify" data-icon="fluent:navigation-16-filled"> hamburger logo -->
            <div class="clearfix"></div>
            
        </div>

    </section>
    <!-- Navigation section ends -->
    <div class="container alldone">
        <br>
        
        <div class="mainbody">
            <h3>Thanks for your listing</h3><br>
            <p>Your listing have been submitted and would be online once it is verified.</p>
            <br><br>
            <a href="index.php">Homepage</a>
        
        
        </div>

        


    </div>


    <!-- Main body section starts here -->
    


    <!-- Main body section ends here -->

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
                        <li><a href="#">Terms</a></li>
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
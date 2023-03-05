<?php
    include('config/constants.php');
    include('config/functions.php');

    $index_user_data = index_loginval($conn);
   
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('partials/responsivenav.php'); ?>
    <style>
        @media screen and (max-width: 750px)
         {
            
            .prtysrchtxt{
                font-size: 2em;
            }
            .property-search input[type="search"]{
                font-size: 1.2em;
                width:50%;
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
                font-size: 0.8em;
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
            #feat_txt{
                font-size: 0.4em;
                
            }
            .btn1{
                width:30%;
                font-size: 15px;
                padding: 3%;
            }
         }
    
         .feat-cards{
             width:95%;
             
         }
         .slick-prev:before{
             color:#659DBD;
             
         }
         .slick-next:before{
             color:#659DBD;
         }
         .slick-slide{
            margin: 0 13px;
         }
         .slick-list {
            margin: 0 -13px;
        }

    </style>
</head>
<body>
    <!-- Navigation Section start-->
    <?php include('partials/header.php'); ?>
    <!-- Navigation section ends -->
    
    <!-- Property Search Section Start -->
    <section class="property-search text-center">
        <div class="container">
            <strong><span class="prtysrchtxt">Find <span class="your">Your</span> New</span><br>
            <span class="place">Place</span></strong>
            <br>
            <form action="<?php echo SITEURL; ?>search.php" method="POST">
                <input type="search" name="search" placeholder="Search City or Rent Type">
                <button type="submit" name="submit" value="search" class="btn"><i class="fa fa-search"></i></button>
            </form>
        </div>
        
    </section>
    <!-- Property Search Section Ends -->

    <!-- Description section start -->
    <section class="description">
        <div class="container">
            <span class="des-text1">Looking for a rent has always been a hassle.</span><br><br>
            <span class="des-text2">No more with Sajilo Renter providing service for everyone.</span>
        </div>
        
    </section>
    <!-- Description section ends -->

    <!-- Featured Location  section start -->
    <section class="loctn">
        <div class="container">
            <div class="loctn-con1"><span class="loctn-txt1">Cities we are in</span></div>
            <div class="loctn-con2"><span class="loctn-txt2">See what these cities have to offer and rent the perfect place</span></div>
            <div class="box-3">
                <a href="<?php echo SITEURL; ?>location.php?lctn=kathmandu" style="text-decoration: none;color:white;font-size:1.5em" >
                    <!-- image sige 440*500 -->
                    <img src="images/kathmandu.png" alt="kathmandu" class="img-responsive" style="width:100%;object-fit: cover;">
                    <span id="feat_txt">KATHMANDU</span>
                </a>
            </div>

            <div class="box-3">
                <a href="<?php echo SITEURL; ?>location.php?lctn=bhaktapur"style="text-decoration: none;color:white;font-size:1.5em">
                    <img src="images/bkt.png" alt="bhaktapur" class="img-responsive"style="width:100%;object-fit: cover;">
                    <span id="feat_txt">BHAKTAPUR</span>
                </a>
            </div>

            <div class="box-3">
                <a href="<?php echo SITEURL; ?>location.php?lctn=lalitpur"style="text-decoration: none;color:white;font-size:1.5em">
                    <img src="images/llt.png" alt="lalitpur" class="img-responsive"style="width:100%;object-fit: cover;">
                    <span id="feat_txt">LALITPUR</span>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        
    </section>
    <!-- Featured Location section ends -->

    <!-- Featured property section start -->
    <section class="feat-pty ">
        <div class="container featbg">
            
            <div class="feat-title">Featured Property</div>
            <div class="feat-cards slider">
                

                <?php 
                    // getting properties from database that are active and featured
                    $sql2 = "SELECT * FROM property WHERE active='yes' AND featured= 'yes' LIMIT 6";

                    $res2 = mysqli_query($conn, $sql2);

                    $count2 = mysqli_num_rows($res2);

                    if($count2>0)
                    {
                        while($row=mysqli_fetch_assoc($res2))
                        {
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row ['price'];
                            $image_name = $row ['image_name'];
                            $location = $row['location'];
                            ?>
                            
                            <div class="featpty-con">
                                <?php
                                // checking image avaibility
                                if($image_name==""){
                                    echo"error";
                                }
                                else
                                {
                                    ?>
                                    <a href="<?php echo SITEURL;?>product.php?property_id=<?php echo $id ?>"style="text-decoration: none;color:white;">
                                    <img src="<?php echo SITEURL; ?>images/properties/<?php echo $image_name; ?>" alt="feat-1" class="img-responsive" style="width: 100%;height:300px;object-fit: cover;">
                                    <?php
                                }
                                ?>
                                
                                <span class="feat-des"><?php echo substr($title, 0, 18); ?>...</span><br>
                                <span class="feat-lct"><?php echo $location ?></span><br>
                                <span class="price">RS.<?php echo $price ?></span>
                            </div></a>

                            <?php

                        }
                    }
                    else{
                        echo " Nothing to show";
                    }
                
                ?>
            </div>

            

            <div class="clearfix"></div>
            
        </div>
        
    </section>
    <!-- Featured property section ends -->

    <!-- About section starts -->
    <section class="about-sec">
        <div class="container abt-sec">
            <span class="abt">ABOUT</span>
            <p class="logo3"><span class="sajilo">Sajilo</span> <span class="renter">Renter</span></p><br>
            <div class="abt-con">smart renter is a trustful convient and easy to use rent providing platform which connects landlord and rent seeker and provide service to everyone according to their need. for more info.</div>
            <br><br>
            <a href="#"><input type="submit" name="Learnmore" value="Learn More" class="btn1"></a>
        </div>
    </section>

    <!-- About section ends -->

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js" integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.slider').slick({
        dots: true,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
            },
            {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
            },
            {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
        });
    </script>
</body>
</html>
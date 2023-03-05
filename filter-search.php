<?php
    include('config/constants.php');
    include('config/functions.php');

    $index_user_data = index_loginval($conn);
    $search = $_POST['search'];
    $req_location = $_POST['req_location'];
    $req_property_type = $_POST['req_property_type'];
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
         }
         

         .pages-btn{
             float: right;
            
         }
         .pages-btn a{
            margin: 5px;
            padding: 3px;
            text-decoration: none;
            border: 3px solid #659DBD;
            border-radius: 30px;
            color: white;
            background-color:  #659DBD;
            font-family: 'Open Sans', sans-serif;
            

            
        }
        .page_active {
            text-decoration: none;
            color: black;
            font-family: 'Open Sans', sans-serif;
        }
        

    </style>
</head>
<body>
    <!-- Navigation Section start-->
    <?php include('partials/header.php'); ?>
    <!-- Navigation section ends -->

    <!-- Product category main section -->
    <div class="container">
        <section class="category-mp">

            <div class="filter-search box-2"><div class="filter-title">Filter Search</div>
            <?php echo $req_property_type ?>
                <div class="filter-search-items">
                    <form>
                        <label>Search  </label><input type="search" name="search" placeholder="Search"><br><br>
                        <label>Select Location:</label><br>
                        <input type="radio" id="kathmandu" name="req_location" value="kathmandu">
                        <label1 for="kathmandu"> Kathmandu</label><br>
                        <input type="radio" id="bhaktapur" name="req_location" value="bhaktapur">
                        <label1 for="bhaktapur"> Bhaktapur</label><br>
                        <input type="radio" id="lalitpur" name="req_location" value="lalitpur">
                        <label1 for="lalitpur"> Lalitpur</label><br><br>
                        <label>Price</label><br>
                        Rs. <input type="text" maxlength="10" placeholder="Min-Price" id="price-input"> to <input type="text" maxlength="10"placeholder="Max-Price" id="price-input"><br><br>
                        <input type="submit" class="cat-btn" value="Filter">
                    </form>
                    <div class="clearfix"></div>
                </div>

        </div>
        
        <div class="product-cards box-2">
            <div class="cat-title">Search for <?php echo $search; ?> in <?php echo $req_location; ?> </div><br>

            <?php
            
                $search = $_POST['search'];
                $req_location = $_POST['req_location'];
                $req_property_type = $_POST['req_property_type'];

                // sql query to search keyword
                $sql = "SELECT * FROM property WHERE title LIKE '%$search%' OR description LIKE '%$search%' AND location = '%$req_location%' AND property_type = $req_property_type LIMIT 9";

                // execution
                $res = mysqli_query($conn, $sql); 

                $count = mysqli_num_rows($res);

                if($count>0)
                {
                    while($rows = mysqli_fetch_assoc($res))
                    {
                        $id = $rows['id'];
                        $title = $rows['title'];
                        $description = $rows['description'];
                        $price = $rows['price'];
                        $location = $rows['location'];
                        $image_name = $rows['image_name'];
                        ?>
                            <div class="cat-pro">
                                <?php 
                                
                                    if($image_name==""){
                                        echo "image not available";

                                    }
                                    else
                                    {
                                        ?>
                                        <a href="<?php echo SITEURL;?>product.php?property_id=<?php echo $id ?>"style="text-decoration: none;color:white;">
                                        <img src="<?php echo SITEURL; ?>images/properties/<?php echo $image_name; ?>" alt="feat-1" class="img-responsive" style="width:100%;height:250px;object-fit:cover">
                                        <?php
                                    }

                                ?>
                                
                                <span class="feat-des"><?php echo substr($title, 0, 20); ?>...</span><br>
                                <span class="feat-lct"><?php echo $location ?></span><br>
                                <span class="price">RS.<?php echo $price ?></span>
                            </div></a>
                        <?php

                    }
                }
                else{
                    echo "<h1>No Match Found</h1>";
                }
            
            ?>

      
        </div>
        <div class="clearfix"></div>
        <div class="pages-btn">
            <input type="button" value="Next page" id="page-button">
        </div>
        <div class="clearfix"></div>
        </section>
        
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
                        <li><a href="terms.php">Terms</a></li>
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
<?php include('partials/responsivenav.php'); ?>
<section class="navbar">
        <div class="container b-3">
            <div class="logo nav1"><a href="index.php"><span class="sajilo">Sajilo</span> <span class="renter">Renter</span></a></div>
            <div class="menu text-center">
                <ul>
                    
                    <li><a href="apartments.php">Apartments</a></li>
                    <li><a href="houses.php">Houses</a></li>
                    <li><a href="office.php">Office</a></li>
                    <li><a href="commercial.php">Commercial</a></li>
                    <?php 
                    if($index_user_data == true){
                        if($index_user_data['type'] == 1)
                        {
                            echo'
                                <li><a href="admin/dashboard.php">Dashboard</a></li>';}
                        }
                        
                    ?>
                   
                    
                </ul>
               
            </div>
            
                        <div class="nav-btn nav1 dropdown">
                            <script src="https://code.iconify.design/2/2.2.0/iconify.min.js"></script>
                            <button type="submit" name="submit" value="nav-btn" class="navbtn"><span class="iconify" data-icon="fluent:inprivate-account-16-filled"></span></button>
                            <div class="dropdown-content">
                                <ul>
                                    <li><a href="#">Favrouites</a></li>
                                    <li><a href="<?php echo SITEURL;?>notifications.php">Notification</a></li>
                                    <li><a href="<?php echo SITEURL;?>your_listings.php">Your Listings</a></li>
                                    <li><a href="<?php echo SITEURL;?>user_add_properties.php">Rent/Sell properties</a></li>
                                    <li><a href="#" id="diff">______________</a></li>

                        <?php
                            // session_start();
                            // ;
                            if($index_user_data == true){


                                echo'

                                    <li><a href="#">'. $index_user_data['username'];'</a></li>';
                                echo'
                                    <li><a href="logout.php">Logout</a></li>';}
                            else{
                                echo'

                                    <li><a href="login.php">Login</a></li>
                                    <li><a href="signup.php">Create Account</a></li>';}?>
                                </ul>
                            </div>
                        </div><br><br>
                <div id="reshead">
                <ul>
                    
                    <li><a href="apartments.php">Apartments</a></li>
                    <li><a href="houses.php">Houses</a></li>
                    <li><a href="office.php">Office</a></li>
                    <li><a href="commercial.php">Commercial</a></li>
                    <?php 
                    if($index_user_data == true){
                        if($index_user_data['type'] == 1)
                        {
                            echo'
                                <li><a href="admin/dashboard.php">Dashboard</a></li>';}
                        }
                        
                    ?>
                   
                    
                </ul>

                </div>                   
            
            <!-- <i class="iconify" data-icon="fluent:navigation-16-filled"> hamburger logo -->
            <div class="clearfix"></div>
            
        </div>
        

    </section>
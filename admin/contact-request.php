<?php 
    include('../config/constants.php');
    include('../config/functions.php');
?>

<?php include('partials/header.php'); ?>
<?php include('partials/contactpagecss.php'); ?>
<?php

    if(isset($_SESSION['upload']))
    {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);

    }
   
?>


        <!-- main starts here -->
    <div class="main">
        <div class="container">
                <h1>contact requests</h1> <br>
                <div class="conmenu">
                    <ul style="text-align:center;list-style:none;display:inline;">
                        <a href="#" style="text-decoration: none;color:white;"><li>Processing</li></a>
                        <a href="<?php echo SITEURL;?>admin/processedlist.php"style="text-decoration: none;color:white;"><li>Processed</li></a>
                        <a href="<?php echo SITEURL;?>admin/rejectedlist.php"style="text-decoration: none;color:white;"><li>Rejected</li></a>
                    </ul>
                </div>

                <div class="contactcards">
                    
                    <?php 
                // getting properties from database that are active and featured
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                else{
                    $page = 1;
                }
                $offset = ($page - 1) * 16;
                $sql1 = "SELECT * FROM contact_request WHERE status='processing'";
                $res1 = mysqli_query($conn, $sql1);
                
                $sql = "SELECT * FROM contact_request WHERE status='processing' LIMIT $offset, 16";

                $res = mysqli_query($conn, $sql);

                $count = mysqli_num_rows($res1);
                $total = ceil($count / 16);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $name = $row['full_name'];
                        $phone = $row['phone'];
                        $email = $row['email'];
                        $request = $row['request_type'];
                        $date = $row['prefered_visit_date'];
                        $contact_via = $row['contact_via'];
                        $message = $row['custom_message'];
                        $productid = $row['product_id'];
                        $product_title = $row['product_title'];
                        $price = $row ['price'];
                        $location = $row['product_location'];
                        $detail_location = $row['detail_location'];
                        $s_name = $row['seller_name'];
                        $s_phone = $row['seller_phone'];
                        $s_email = $row['seller_email'];
                        ?>
                        <div class="cntcrd">
                             <input type="hidden" id="id" value="<?php echo $id ?>" >
                             <input type="hidden" id="msg" value="<?php echo $message ?>">
                            <b>Sender name:</b> <?php echo $name ?><br>
                            <b>contacts:</b> <?php echo $phone ?>/ <?php echo $email ?><br>
                            <b>request type:</b> <?php echo $request ?><br>
                            <b>preferred date:</b> <?php echo $date ?><br>
                            <b>Message:</b> <?php echo $message ?><br>
                            <b>contact via:</b> <?php echo $contact_via ?><br>
                            <b>Product id:</b> <?php echo $productid ?><br>
                            <b>product title:</b> <?php echo $product_title ?><br>
                            <b>Price:</b> Rs. <?php echo $price ?><br>
                            <b>Location:</b> <?php echo $location ?><br>
                            <b>Detail location:</b> <?php echo $detail_location ?><br>
                            <b>Seller name:</b> <?php echo $s_name ?><br>
                            <b>Seller contacts:</b> <?php echo $s_phone ?>/ <?php echo $s_email ?><br><br>
                            
                                <div class="contactbut">
                                    <a href="<?php echo SITEURL;?>admin/processed.php?id=<?php echo $id ?>"style="text-decoration: none;color:black;background-color: #7bed9f;padding:2%;border-radius: 5px;" class="processed">Processed</a>
                                    <a href="<?php echo SITEURL;?>admin/rejected.php?id=<?php echo $id ?>"style="text-decoration: none;color:black;background-color: #df6571;padding:2%;border-radius: 5px;" class="rejeccted">Rejected</a>
                                </div>
                        
                            
                            
                            
                        </div>

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
    <div class="pages-btn">
            <a href="?page=1">First</a>

            <a href="<?php if($page <=1){echo '#';}else{echo "?page=".$page -1;} ?>"><</a>
            <?php 
                
                
                for($i = 1; $i <= $total; $i++){

                    if($page==$i)
                    {
                        $active= "page_active";
                    }
                    else{
                        $active="";
                    }
            
                    echo"<a href='?page=$i'><span class='$active'>". $i ."</span></a>";

                }
                
                if($page!==$i)
                {
                 
                }
            
            ?>
           
            <a href="<?php if($page >= $total){echo '#';}else{echo "?page=".$page +1;} ?>">></a>
            <a href="?page=<?php echo $total; ?>">Last</a>

            
    </div>
   

    <div class="viewmessage">
            <div class="showmessage">
                <h2>Message:</h2><div id="closeicon"onclick="conclosefunction()">+</div>
                <br>
                <br>
                <span id="msgshow"></span>
                
                
                
            </div>
    </div>
   

        
    <?php include('partials/footer.php'); ?>
    
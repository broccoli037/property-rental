<?php include('partials/header.php');
      include('../config/constants.php');
      include('../config/functions.php');
      $index_user_data = index_loginval($conn);

      $userid= $index_user_data['user_id'];
  
      if($index_user_data == false){
          header("Location: ../login.php");
      }
      if($index_user_data == true){
        if($index_user_data['type'] == 0)
        {
            echo'
            <script>alert("Access denied")</script>';
            header("Location: ../index.php");}
        }
?>

        <!-- main starts here -->
        <div class="main">
            <div class="container">
                <h1>DASHBOARD</h1>

                <div class="col-4 text-center">
                    <?php 

                        $sql = "SELECT * FROM property ";
                        
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);
                    
                    ?>
                    <h2><?php echo $count;?></h2> <br>
                    Properties
                </div>


                <div class="col-4 text-center">
                    <?php 

                        $sql = "SELECT * FROM users ";
    
                        $res = mysqli_query($conn, $sql);

                        $count = mysqli_num_rows($res);

                    ?>
                    <h2><?php echo $count;?></h2> <br>
                    Users
                </div>


                <div class="col-4 text-center">
                <?php 

                    $sql = "SELECT * FROM users WHERE type = '1' ";

                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                ?>
                <h2><?php echo $count;?></h2> <br>
                    
                    Admins
                </div>


                <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM users WHERE type = '0' ";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                
                ?>
                    <h2><?php echo $count;?></h1> <br>
                    Non-Admins
                </div>


                <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM listing_request";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                
                ?>
                    <h2><?php echo $count;?></h1> <br>
                    Listing requests
                </div>
                <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM contact_request WHERE status='processing'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                
                ?>
                    <h2><?php echo $count;?></h1> <br>
                    Processing Contact requests
                </div>
                <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM contact_request WHERE status='processed'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                
                ?>
                    <h2><?php echo $count;?></h1> <br>
                    Processed Contact requests
                </div>
                <div class="col-4 text-center">
                <?php
                    $sql = "SELECT * FROM contact_request WHERE status='rejected'";
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                
                ?>
                    <h2><?php echo $count;?></h1> <br>
                    Rejected Contact requests
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
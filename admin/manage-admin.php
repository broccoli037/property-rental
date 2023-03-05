<?php 
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
<?php include('partials/header.php'); ?>

        <!-- main starts here -->
        <div class="main">
            <div class="container">
                <h1>MANAGE ADMIN</h1> <br>

                <!-- button to add admin -->
                <a href="add-admin.php" class="btn-primary">Add Admin</a> <br> <br>

                <table class="tbl-full">
                    <tr>
                        <th>SN.</th>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>

                    <?php 
                     $sql = "SELECT * FROM users";

                     $res = mysqli_query($conn, $sql);

                    if($res==TRUE)
                    {
                        // check number of rows
                        $count = mysqli_num_rows($res);
                        $sn = 1;

                        if($count>0)
                        {
                            // we have data in database
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                // using while loop to get data from database

                                // get individual data
                                if($rows['type'] == 1){
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];
                                    $email=$rows['email'];
                                    $phone=$rows['phone'];

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $full_name ?></td>
                                        <td><?php echo $username ?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $phone ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id?>" class="btn-secondary"><i class="fa fa-edit" style="font-size:24px"></i></a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id?>" class="btn-danger"><i class="fa fa-remove" style="font-size:24px"></i></a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            }
                        }
                        else{
                            // we donot have data in database
                        }
                    }
                    ?>

                </table>

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- main ends here -->

        
        <?php include('partials/footer.php'); ?>
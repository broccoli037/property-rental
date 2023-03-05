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
                <h1>MANAGE CATEGORY</h1> <br>

                <!-- button to add admin -->
                <a href="add-category.php" class="btn-primary">Add Category</a> <br> <br>

                <table class="tbl-full">
                    <tr>
                        <th>SN.</th>
                        <th>Title</th>
                        <th>Actions</th>
                        
                    </tr>
                    <?php 
                     $sql = "SELECT * FROM category";

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
                                
                                    $id=$rows['id'];
                                    $title=$rows['title'];
                                    

                                    // display values in table
                                    ?>
                                    
                                    <tr>
                                        <td><?php echo $sn++ ?></td>
                                        <td><?php echo $title ?></td>
                                        
                                        <td>
                                            <a href="<?php echo SITEURL; ?>admin/update-category.php?id=<?php echo $id?>" class="btn-secondary"><i class="fa fa-edit" style="font-size:24px"></i></a> 
                                            <a href="<?php echo SITEURL; ?>admin/delete-category.php?id=<?php echo $id?>" class="btn-danger"><i class="fa fa-remove" style="font-size:24px"></i></a>
                                        </td>
                                    </tr>

                                    <?php
                                
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
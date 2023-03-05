<?php 
    include('../config/constants.php');
    include('../config/functions.php');

    $id = $_GET['id'];
    
    $sql2 = "SELECT * FROM category WHERE id=$id";

    $res2 = mysqli_query($conn,$sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $title=$row2['title'];

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
       
        $title=$_POST['title'];


        
        if(!empty($title)){

            $user_id = random_num(20);
            $query = "UPDATE category SET
                title = '". $title ."',
                
            ";

            mysqli_query($conn,$query);

            header("Location: manage-category.php");
        }
        else{
            echo "enter valid information!";
        }
    }


?>

<?php include('partials/header.php'); ?>

<div class="main">
    <div class="container">
    <div class="addpropertybg">
        <div class="addprptybox">
            <h1 >Update category</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    
                    <label>Category Title (all lower case): </label><br>
                    <input type="text" name="title" placeholder="eg: apartments" value="<?php echo $title?>" required><br><br>
                    
                    <input type="submit" name="submit" value="Update Category" class="form-btn">>
                </form>
                


                

            </div>  
         </div>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
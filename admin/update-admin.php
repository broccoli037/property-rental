<?php 
    include('../config/constants.php');
    include('../config/functions.php');

    $id = $_GET['id'];
    
    $sql2 = "SELECT * FROM users WHERE id=$id";

    $res2 = mysqli_query($conn,$sql2);

    $row2 = mysqli_fetch_assoc($res2);

    $full_name = $row2['full_name'];
    $username = $row2['username'];
    $email = $row2['email'];
    $phone = $row2['phone'];
    $password = $row2['password'];


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];


        
        if(!empty($password) && !empty($full_name)){

           
            $query = "UPDATE users SET
                full_name = '". $full_name ."',
                username = '". $username ."',
                email = '". $email ."',
                phone ='". $phone ."',
                password ='". $password ."',
                WHERE id=". $id ."
            ";

            mysqli_query($conn,$query);

            header("Location: manage-admin.php");
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
            <h1 >Update Admin</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST" enctype="multipart/form-data">
                    
                    <label>Full Name:</label><br>
                    <input type="text" name="full_name" placeholder="eg: Anish Karki" value="<?php echo $full_name ?>" required><br><br>
                    <label>Username:</label><br>
                    <input type="text" name="username" placeholder="Enter Username" value="<?php echo $username ?>" required><br><br>
                    <label>E-mail:</label><br>
                    <input type="text" name="email" placeholder="eg: xyz@gmail.com" value="<?php echo $email ?>" required><br><br>
                    <label>Phone:</label><br>
                    <input type="text" name="phone" placeholder="eg: 986xxxxxxx" maxlength="10" onblur="allnumeric()" value="<?php echo $phone ?>" required><br><br>
                    <label>Password:</label><br>
                    <input type="text" name="password" placeholder="Enter Password" value="<?php echo $password ?>" required><br><br>
                    <input type="submit" name="submit" value="Update Admin" class="form-btn">
                </form>
                


                

            </div>  
         </div>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
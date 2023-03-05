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

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        if(!empty($username) && !empty($password) && !ctype_alpha($phone)){

            $user_id = random_num(20);
            $type = 1;
            $query = "INSERT INTO users(full_name,username,email,phone,password,user_id,type) VAlUES ('$full_name','$username','$email','$phone','$password','$user_id',$type)";

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
    <div class="signupbg">
        <div class="loginbox">
            <h1 id="h1">Add admin</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST">
                    <label>Full Name:</label><br>
                    <input type="text" name="full_name" placeholder="eg: Anish Karki" required><br><br>
                    <label>Username:</label><br>
                    <input type="text" name="username" placeholder="Enter Username" required><br><br>
                    <label>E-mail:</label><br>
                    <input type="text" name="email" placeholder="eg: xyz@gmail.com" required><br><br>
                    <label>Phone:</label><br>
                    <input type="text" name="phone" placeholder="eg: 986xxxxxxx" maxlength="10" onblur="allnumeric()" required><br><br>
                    <label>Password:</label><br>
                    <input type="password" name="password" placeholder="Enter Password" required><br><br>
                    <input type="submit" name="submit" value="Add Admin" class="form-btn">
                </form>
            </div>
    </div>
</div>



<?php include('partials/footer.php'); ?>
<?php
    include('config/constants.php');
    if(isset($_POST["username"])){
        $username = mysqli_real_escape_string($conn, $_POST["username"]);

        $query="SELECT * FROM users WHERE username = '".$username."'";
        $result = mysqli_query($conn,$query);
        echo mysqli_num_rows($result);
    }
    if(isset($_POST["email"])){
        $email = mysqli_real_escape_string($conn, $_POST["email"]);

        $query="SELECT * FROM users WHERE email = '".$email."'";
        $result = mysqli_query($conn,$query);
        echo mysqli_num_rows($result);
    }
?>
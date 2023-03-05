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
        $title = $_POST['title'];
        

        if(!empty($title)){

            
            $query = "INSERT INTO category(title) VAlUES ('$title')";

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
    <div class="addcategorybg">
        <div class="loginbox">
            <h2 id="h1">Add Category</h2><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST">
                    <label>Category Title (all lower case): </label><br>
                    <input type="text" name="title" placeholder="eg: apartments" required><br><br>
                    
                    <input type="submit" name="submit" value="Add Category" class="form-btn">
                </form>
            </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>
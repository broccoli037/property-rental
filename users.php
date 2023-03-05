<?php 
 
  include('config/constants.php');
  include('config/functions.php');

  $index_user_data = index_loginval($conn);
  $userid= $index_user_data['user_id'];
  if($index_user_data == false){
      header("Location: login.php");
  }

?>

<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE user_id = {$_SESSION['user_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <!-- <img src="php/images/<?php echo $row['img']; ?>" alt=""> -->
          <div class="details">
            <span><?php echo $row['full_name'] ?></span>
            
          </div>
        </div>
        
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

  <script src="javascript/users.js"></script>

</body>
</html>

<?php 
    include('../config/constants.php');
    include('../config/functions.php');

    $id = $_GET['id'];
    
    $sql2 = "SELECT * FROM contact_request WHERE id=$id";

    $res2 = mysqli_query($conn,$sql2);

    $row = mysqli_fetch_assoc($res2);

    $id = $row['id'];
    $phone = $row['phone'];
    $email = $row['email'];
    $request = $row['request_type'];
    $date = $row['prefered_visit_date'];
    $contact_via = $row['contact_via'];
    $message = $row['custom_message'];
    $productid = $row['product_id'];
    $price = $row ['price'];
    $location = $row['product_location'];
    $detail_location = $row['detail_location'];
    $s_name = $row['seller_name'];
    $s_phone = $row['seller_phone'];
    $s_email = $row['seller_email'];
    $name = $row['full_name'];
    $product_title = $row['product_title'];


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        // something was posted
        $rejected_for = $_POST['rejected_for'];
        


        
        if(!empty($rejected_for)){

            
            $query = "UPDATE contact_request SET
                status = 'rejected',
                rejected_for = '". $rejected_for ."'
                WHERE id=$id
                
                
            ";

            mysqli_query($conn,$query);

            header("Location: contact-request.php");
            
        }
        else{
            echo "Failed!";
        }
    }


?>

<?php include('partials/header.php'); ?>

<div class="main">
    <div class="container">
    <div class="addpropertybg">
        <div class="addprptybox">
            <h1 >Reject contact</h1><br>
            <div id="login">
                <!-- form start here -->
                <form action="" method="POST" enctype="multipart/form-data">
                        
                            <b>ID:</b> <?php echo $id ?><br>
                            <b>Message:</b> <?php echo $message ?><br>
                            <b>Sender name:</b> <?php echo $name ?><br>
                            <b>contacts:</b> <?php echo $phone ?>/ <?php echo $email ?><br>
                            <b>request type:</b> <?php echo $request ?><br>
                            <b>preferred date:</b> <?php echo $date ?><br>
                            <b>contact via:</b> <?php echo $contact_via ?><br>
                            <b>Product id:</b> <?php echo $productid ?><br>
                            <b>product title:</b> <?php echo $product_title ?><br>
                            <b>Price:</b> Rs. <?php echo $price ?><br>
                            <b>Location:</b> <?php echo $location ?><br>
                            <b>Detail location:</b> <?php echo $detail_location ?><br>
                            <b>Seller name:</b> <?php echo $s_name ?><br>
                            <b>Seller contacts:</b> <?php echo $s_phone ?>/ <?php echo $s_email ?><br><br>
                            <b>Rejected for:</b>
                            <select name="rejected_for" required>
                                <option value="Failed to contact">Failed to contact</option>
                                <option value="Failed to verify">Failed to verify</option>
                                <option value="Property sold">Property sold</option>
                                <option value="Failed to contact seller">Request a tour</option>

                            </select>
                            <input type="submit" name="submit" value="Reject contact" class="form-btn">
                </form>
                


                

            </div>  
         </div>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>
                        
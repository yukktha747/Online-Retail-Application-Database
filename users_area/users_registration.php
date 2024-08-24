<?php
include('../connects/connect.php');
include('../functions/commom_functions.php');
?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    </head>
<body>
<div class="container-fluid my-3">
  <h2 class="text-center">New User Registration</h2>
   <div class="row d-flex align-items-center justify-content-center">
    <div class="col-lg-12 col-x1-6">
<form action="" method="post" enctype="multipart/form-data">
   <div class="form-outline">
<!-- username feield -->
        <label for="user_username" class="form-label">Username</label>
        <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
    </div>
<!-- email | -->
  <div class="form-outline">
    <label for="user_Email" class="form-label">Email</label>
    <input type="email" id="user_Email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_Email"/>
  </div>
  <div class="form-outline">
    <label for="user_Image" class="form-label">User Image</label>
    <input type="file" id="user_Image" class="form-control" autocomplete="off" required="required" name="user_Image"/>
  </div>
  <div class="form-outline">
    <label for="user_password" class="form-label">Password</label>
    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
  </div>
  <div class="form-outline">
    <label for="conf_user_password" class="form-label">Confirm password</label>
    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required" name="conf_user_password"/>
  </div>
  <div class="form-outline">
    <label for="user_address" class="form-label">Address</label>
    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
  </div>
  <div class="form-outline">
    <label for="user_contact" class="form-label">Contact</label>
    <input type="number" id="user_contact" class="form-control" placeholder="Enter your number" autocomplete="off" required="required" name="user_contact"/>
  </div>
  <div class="mt-4 pt-2">
    <input type="submit" placeholder="Register" class="bg-info py-2 px-3 border-8" name="user_register">
    <p class="small fw-bold mt-2 pt-1 mb-0"> Don't have an account?<a href="user_registration.php" class="text-danger">Register</a> </p>
</div>

</form>
  
</div>
</div>
</div>
</body>
</html>

<?php
  if(isset($_POST['user_register'])){
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_Email'];
    $user_password=$_POST['user_password'];
    $conf_user_password=$_POST['conf_user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_image=$_FILES['user_Image']['name'];
    $user_image_tmp=$_FILES['user_Image']['tmp_name'];
    $user_ip=getIPAddress();
    $select_query="select * from user_table where username='$user_username' or user_email='$user_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
   if($rows_count>0){
    echo "<script>alert('Username and email is already present in the database')</script>";
   }
   else if( $user_password!=$conf_user_password){
    echo "<script>alert('passwords do not match')</script>";
    "<script>window.open('user_registration.php')</script>";
   }
   else{
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
    $sql_exexute=mysqli_query($con,$insert_query);
    if($sql_exexute){
      echo "<script>alert('Data inserted successfully')</script>";
    }
    else{
      die(mysqli_error($con));
    }
}
  
$select_cart_item="select * from `cart_details` where ip_adress='$user_ip'";
$result=mysqli_query($con,$select_cart_item);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
$_SESSION['username']=$user_username;
echo "<script>alert('You have items in your cart')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}
else{
    echo "<script>window.open('../retail.php','_self')</script>";
}
  }
?>
<?php

function sendOrderConfirmationEmail($userEmail, $orderDetails) {
    // Email details
    $to = $userEmail;
    $subject = "Order Confirmation";
    
    // Compose the email message
    $message = "Thank you for your order!\n\n";
    $message .= "Order Details:\n";
    $message .= $orderDetails;
    
    // Additional headers
    $headers = "From: yourstore@example.com\r\n";
    $headers .= "Reply-To: support@example.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}

// Example usage
$userEmail = "customer@example.com";
$orderDetails = "Item 1: Product A - $19.99\n";
$orderDetails .= "Item 2: Product B - $29.99\n";
$orderDetails .= "Total: $49.98";

if (sendOrderConfirmationEmail($userEmail, $orderDetails)) {
    echo "Order confirmation email sent successfully.";
} else {
    echo "Failed to send order confirmation email.";
}

?>
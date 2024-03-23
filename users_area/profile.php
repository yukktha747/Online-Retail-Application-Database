<?php
include('../connects/connect.php');
include('../functions/commom_functions.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Welcome<?php echo $_SESSION['username']?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<style>
.logo{
    width:4%;
    height:4%;
    padding-left:10px;
}
.profile_img{
width:90%;
margin:auto;
display:block;
object-fit: contain;
    }

</style>
<body>
<nav class="navbar navbar-expand-lg bg-info">
    
  <div class="container-fluid p-0">
    <img src="..\images\logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../retail.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart_details.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i><sup><?php cart_item();?></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Total price:<?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="../search_product.php" method="get" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
        <input class="btn btn-outline-light" type="submit" value="Search" name="search_data_product">
      </form>
    </div>
  </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul classbar="navbar-nav me-auto" style="list-style-type:none;">
    <?php
    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a></li>";
    }

    if(!isset($_SESSION['username'])){
      echo " <li class='nav-item'>
      <a class='nav-link' href='users_login.php'>Login</a>
      </li>";
    }
    else{
      echo " <li class='nav-item'>
      <a class='nav-link' href='users_logout.php'>Logout</a>
      </li>";
    }
   ?>
</ul>
</nav>
<div class="bg-light text-center">
    <h3 class="a">Hidden store</h3>
    <p class="b">Communication is the heart of retail and community</p>
</div> 
<div class="row">
    <div class="col-md-2">
    <ul class="navbar-nav bg-secondary text-center style="height:100vh">
        <li class="nav item bg-info">
            <a class="nav-link text-light" href="#"><h4>Your profile</h4></a>
        </li>
        <?php
        $username=$_SESSION['username'];
        $user_image="select * from user_table where username='$username'";
        $result=mysqli_query($con,$user_image);
        $row_image=mysqli_fetch_array($result);
        $user_image=$row_image['user_image'];
        echo "<li class='nav-item'><img src='./user_images/$user_image' class='profile_img my-4' alt=''></li>";
        ?>
        <li class="nav item">
            <a class="nav-link text-light" href="profile.php">Pending orders</a>
        </li>
        <li class="nav item">
            <a class="nav-link text-light" href="profile.php?edit_account">Edit account</a>
        </li>
        <li class="nav item">
            <a class="nav-link text-light" href="profile.php?my_orders">My orders</a>
        </li>
        <li class="nav item">
            <a class="nav-link text-light" href="profile.php?delete_account">Delete account</a>
        </li>
        <li class="nav item">
            <a class="nav-link text-light" href="users_logout.php">Logout</a>
        </li>
    </div>
    <div class="col-md-10">
    <?php get_order_details();
    if(isset($_GET['edit_account'])){
        include('edit_account.php');
    }
    if(isset($_GET['my_orders'])){
        include('user_orders.php');
    }
    if(isset($_GET['delete_account'])){
        include('delete_account.php');
    }
    ?>
    </div>

</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
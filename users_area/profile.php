<!-- connect file  -->
<?php
 include('../includes/connect.php');
 include('../functions/common_function.php');
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!--BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
    <!--FONT AWESOME LINK-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
   <!-- orbitron font  -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

    <!--css file-->
    <link rel="stylesheet" href="../style.css">

</head>
<body>
  <div class="container-fluid p-0">
    <!--first child-->
<nav class="navbar navbar-expand-lg " style="background-color: #FFD449;">
  <div class="container-fluid">
    <img src="../images/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="../index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../cart.php"><i class="fas fa-regular fa-basket-shopping " style="color: #104711;"></i><sup><b><?php  cart_item();?></b></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TOTAL: <?php echo total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="../search_product.php" method="get" role="search">
        <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
        <input type="submit" value="search" name="search_data_product" class="btn btn-outline-light">
      </form>
    </div>
  </div>
</nav>
  </div>

  <!-- calling cart function  -->
  <?php 
  cart();
  ?>
 <!-- second child-->
 <nav class="navbar navbar-expand-lg" style="background-color: #F9A620;">
 <ul class="navbar-nav me-auto">
 
<?php
if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
  <a class='nav-link ' href='#'>WELCOME GUEST!</a>
</li>";
}
else{
  echo "<li class='nav-item'>
  <a class='nav-link ' href='#'>WELCOME".$_SESSION['username']."</a>
</li>";
}

if(!isset($_SESSION['username'])){
  echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>LOGIN</a>
        </li>";
}
else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='logout.php'>LOGOUT</a>
</li>";
}
?>       
 </ul>
 </nav>

 <!-- fourth child  -->
 <div class="row">
    <div class="col-md-3 ">
<ul class="navbar-nav text-center" style="background-color: #002626;  color:#fff">
        <li class="nav-item">
          <a class="nav-link " href="#" style="font-family:Orbitron;">YOUR PROFILE</a>
        </li>

        <?php
           $username=$_SESSION['username'];
           $user_image_select="select * from `user_table` where username='$username'";
           $user_image_query=mysqli_query($con,$user_image_select);
           $row_image=mysqli_fetch_array($user_image_query);
           $user_image=$row_image['user_image'];
           echo " <li class='nav-item mb-2'>
           <img class='my-4' src='./user_images/$user_image'  height='100%' width='100%'>
           </li>";
        ?>
        
        <li class="nav-item">
          <a class="nav-link " href="profile.php" style="font-family:Orbitron;">Pending Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="profile.php?edit_account" style="font-family:Orbitron;">Edit Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="profile.php?my_orders" style="font-family:Orbitron;">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="profile.php?delete_account" style="font-family:Orbitron;">Delete Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="logout.php" style="font-family:Orbitron;">Logout</a>
        </li>
</ul>
    </div>
    <div class="col-md-9">
    <?php
     user_order_details();

     if(isset($_GET['edit_account'])){
        include('edit_account.php');
     }
     if(isset($_GET['my_orders'])){
      include('my_orders.php');
   }
   if(isset($_GET['delete_account'])){
    include('delete_account.php');
 }
    ?>
    </div>
 </div>
  <!--LAST CHILD (footer)-->
  <!-- include footer  -->
  <?php
 include('../includes/footer.php');

?>

<!--BOOTSTRAP JS LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
crossorigin="anonymous"></script>
</body>
</html>
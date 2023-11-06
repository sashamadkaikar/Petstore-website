<!-- connect file  -->
<?php
 include('includes/connect.php');
 include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FurEverMart</title>
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
   
    <!--css file-->
    <link rel="stylesheet" href="style.css">


</head>
<body>
  <div class="container-fluid p-0">
    <!--first child-->
<nav class="navbar navbar-expand-lg " style="background-color: #FFD449;">
  <div class="container-fluid">
    <img src="./images/logo.png" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fas fa-regular fa-basket-shopping " style="color: #104711;"></i><sup><b><?php  cart_item();?></b></sup></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">TOTAL: <?php total_cart_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get" role="search">
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
 <li class="nav-item">
          <a class="nav-link " href="#">WELCOME GUEST!</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">LOGIN</a>
        </li>
 </ul>
 </nav>
 <!--ad carousel-->
 <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src=".\images\dogp1.jpg" class="d-block w-100" alt="..." data-bs-interval="1000">
    </div>
    <div class="carousel-item">
      <img src=".\images\cute.jpg" class="d-block w-100" alt="..." data-bs-interval="1000">
    </div>
    <div class="carousel-item">
      <img src=".\images\pup.jpg" class="d-block w-100" alt="..." data-bs-interval="1000">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

 <!--fourth-child-->
<div class="row mt-3 ml-2">
  <div class="col-md-10">
      <div class="row">
        <!-- fetching products  -->
        <?php
        getproduct();
        get_unique_dog_categories();
        get_unique_cat_categories();
        get_unique_brand();
        $ip = getIPAddress();  
echo 'User Real IP Address - '.$ip; 
        ?>
          <!-- row end -->    
      </div>  
      <!-- < col and  -->
  </div>


            <div class="col-md-2 p-0 " style="background-color:#0E4749;">
            <!-- brands to be displayed -->
              <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #002626;">
                  <a href="#" class="nav-link"  style="color: #FFFFFF;"><h4>BRANDS<h4></a>
                </li>
                <?php
                getbrand();
                
                ?>
              </ul>
              <!-- DOG categorY-->
              <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #002626;">
                  <a href="#" class="nav-link"  style="color: #FFFFFF;"><h4> DOG CATGORIES<h4></a>
                </li>
                <?php
                getdcategory();
                
                ?>
              </ul>
            <!-- CAT CATEGORY -->
              <ul class="navbar-nav me-auto text-center">
                <li class="nav-item" style="background-color: #002626;">
                <a href="#" class="nav-link"  style="color: #FFFFFF;"><h4> CAT CATGORIES<h4></a>
                </li>
                <?php
               getccategory();
                  
                ?>
              </ul>
            </div>
 </div>
  <!--LAST CHILD (footer)-->
  <!-- include footer  -->
  <?php
 include('includes/footer.php');

?>



<!--BOOTSTRAP JS LINK -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
crossorigin="anonymous"></script>
</body>
</html>
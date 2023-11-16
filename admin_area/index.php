<!-- connect file  -->
<?php
 include('../includes/connect.php');
 include('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style2.css">
    <!-- font awesome link  -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" 
    referrerpolicy="no-referrer" />

    <!-- orbitron font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg"  style="background-color: #FFD449;">
          <div class="container-fluid">
            <img src="../images/logo.png" class="logo">
            <nav class="navbar navbar-expand-lg"> 
               <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="" class="nav-link">WELCOME PETLOVER</a>
                </li>
               </ul>
            </nav>
          </div>
        </nav>

        <!-- second child  -->
        <h2 style="text-align:center;  margin-top:20px; font-family: 'Orbitron', sans-serif;">MANAGE INVENTORY</h2>

        <!-- third child -->
        <div class="row">
          <div class="col-md-12 p-1 d-flex" style="background-color: #FFD449;">
            <div class="p-2">
              <a href="#" ><img src="../images/user.png" alt="" class="admin_image"></a>
              <p class="text-center " style=" margin-left:20px;">Admin name</p>
            </div>
            <div class="button text-center"style="background-color: #FFD449;">
              <button class="ad_button"><a href="insert_product.php" class="nav-link my-1 ">INSERT PRODUCTS</a></button>
              <button class="ad_button"><a href="index.php?view_products" class="nav-link my-1 ">VIEW PRODUCTS</a></button>
              <button class="ad_button"><a href="index.php?insert_category" class="nav-link my-1 ">INSERT CATEGORIES</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1 ">VIEW CATEGORIES</a></button>
              <button class="ad_button"><a href="index.php?insert_brands" class="nav-link my-1">INSERT BRANDS</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1">VIEW BRANDS</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1">ALL ORDERS</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1">ALL PAYMENTS</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1">LIST USERS</a></button>
              <button class="ad_button"><a href="" class="nav-link my-1">LOGOUT</a></button>
            </div>
          </div>
        </div>

        <!-- fourth child  -->
        <div class="container my-3">
          <?php
            if(isset($_GET['insert_category']))
            {
              include('insert_category.php');
            }
            if(isset($_GET['insert_brands']))
            {
              include('insert_brands.php');
            }
            if(isset($_GET['view_products']))
            {
              include('view_products.php');
            }
            if(isset($_GET['edit_products']))
            {
              include('edit_products.php');
            }
          ?>
        </div>

        <div class="container my-5">
          <?php
            if(isset($_GET['insert_dogcategories']))
            {
              include('insert_dogcategories.php');
            }
            if(isset($_GET['insert_catcategory']))
            {
              include('insert_catcategory.php');
            }
            
          ?>
    </div>
    </div>
    <?php
 include('../includes/footer.php');

?>
    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
crossorigin="anonymous"></script>
</body>
</html>
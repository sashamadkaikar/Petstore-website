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

    <!-- orbitron font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">


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
       
      </ul>
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
<!-- fourth child -table  -->
<div class="container d-flex">
    <div class="row">
        <form action="" method="post">
        <table cellpadding="0" cellspacing="0" >
                
                <tbody>
                    <!-- phpcode to display dynamic data  -->
                    <?php
                     global $con;
                     $get_ip_add = getIPAddress();
                     $total=0;
                     $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                     $result_query=mysqli_query($con,$cart_query);
                      
                     $result_count=mysqli_num_rows($result_query);
                     if($result_count>0){
                            echo " <thead>
                          <tr>
                          <th>Product</th>
                          <th>Product Image</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                          <th>Remove</th>
                          <th colspan='2'>Operations</th>
                          </tr>
                      </thead>";

                     while($row=mysqli_fetch_array($result_query)){
                         $product_id=$row['product_id'];
                         $select_products="select * from `product` where prod_id='$product_id'";
                         $result_products=mysqli_query($con,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_products)){
                               $product_price=array($row_product_price['prod_price']);
                               $price_table=$row_product_price['prod_price'];
                               $product_title=$row_product_price['prod_title'];
                               $product_img1=$row_product_price['prod_img1'];
                               $product_values=array_sum($product_price);
                               $total+=$product_values;
                    ?>
                               <tr>
                               <td><?php echo $product_title ?> </td>
                               <td><img src='./admin_area/product_images/<?php echo $product_img1 ?>' class='cart_image'></td>
                               <td><input type='text' name='qty' class='form-control me-2' style='width:160px;'></td>
                               <?php
                                $get_ip_add = getIPAddress();
                                if(isset($_POST['update_cart']))
                                {
                                    $quantities=$_POST['qty'];
                                    $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";
                                    $result_product_quantity=mysqli_query($con,$update_cart);
                                    $total=$total*$quantities;
                                }

                             ?>
                               <td><?php echo $price_table ?>/-</td>
                              
                               <td><input name="removeitem[]" type='checkbox' value="<?php echo $product_id  ?>"></td>
                               <td>
                                <input type='submit' value='Update' name='update_cart' class='ad_button'  style='width: 145px;0px;'>
                               </td>
                               <td>
                                  <input type='submit' value='Remove' name='remove_cart' class='ad_button'  style='width: 145px;0px;'>
                               </td>
                               </tr>
                    <?php
                            }
                        }
                      }

                      else{
                        echo "<h2 class='text-center'>Cart is empty</h2>";
                      }
                    ?>
                </tbody>
        </table>
        <!-- sub total  -->
        <div class="d-flex">
          <?php 
           global $con;
           $get_ip_add = getIPAddress();
          
           $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
           $result_query=mysqli_query($con,$cart_query);
            
           $result_count=mysqli_num_rows($result_query);
           if($result_count>0){
            echo "<h2 class='p-3'>Subtotal: <strong> $total/-</strong></h2>
            </div>
            <div class='d-flex'>
            <a href='index.php' class='ad_button' style='text-decoration: none;'>Continue shopping</a>
            <a href='checkout.php' class='ad_button' style='text-decoration: none;'>Checkout</a>
               ";
           }
           else{
            echo "<a href='index.php' class='ad_button' style='text-decoration: none;'>Continue shopping</a>";
           }
           ?>
        
        </div>

        </form>

    </div>
</div>
<!-- function to remove items  -->
<?php 
function remove_cart_item(){
    global $con;
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            echo $remove_id;
            $delete_query="Delete from `cart_details` where product_id=$remove_id ";
            $run_delete=mysqli_query($con,$delete_query);
            if($run_delete){
                echo "<script>window.open('cart.php','_self')</script>";
              }
        }
    }
}
echo $remove_item=remove_cart_item();
?>
  <style>
 
  table{
    width: 100%;
    table-layout: fixed;
    background: linear-gradient(to right, #fff0b3, #ffcc80);
    text-align:center;
   
  }
 
  .row{
    height:1000px;
    overflow-x:auto;
    margin-top: 0px;
    border: 1px solid rgba(255,255,255,0.3);
  
  }
  th{
    padding: 20px 15px;
    text-align: left;
    font-weight: 500;
    font-size: 22px;
    color: #000;
    text-transform: uppercase;
    font-family: 'Orbitron', sans-serif;
    border: 3px solid rgba(255,255,255,0.5);
    border-bottom: solid 5px rgba(255,255,255,0.5);
 
  }
  td{
    padding: 15px;
    text-align: left;
    vertical-align:middle;
    font-weight: 500;
    font-size: 20px;
    color: #000;
    border-bottom: solid 3px rgba(255,255,255,0.4);
    border: 3px solid rgba(255,255,255,0.3);
    font-family: 'Roboto', sans-serif; 
  }
  /* tr {
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
  } */
  
  @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
  .ad_button{
    margin: 10px;
  padding: 15px 30px;
  text-align: center;
  text-transform: uppercase;
  transition: 0.5s;
  background-size: 200% auto;
  color: white;
  border-radius: 10px;
  display: inline-block;
  border: 0px;
  font-weight: 700;
  box-shadow: 0px 0px 14px -7px #f09819;
  background-image: linear-gradient(45deg, #F7CE47 0%, #F09819  51%, #FF512F  100%);
  cursor: pointer;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  }
  .ad_button:hover {
  background-position: right center;
  /* change the direction of the change here */
  color: #fff;
  text-decoration: none;
  }
  .cart_image{
    width:120px;
    height:120px;
    object-fit:contain;
}

 
</style>

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
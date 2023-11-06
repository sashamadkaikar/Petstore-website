<?php
include('./includes/connect.php');
function getproduct(){
    global $con;
    //condition to check isset
    if(!isset($_GET['dogcategory'])){
    if(!isset($_GET['catcategory'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `product` order by rand() LIMIT 0,6";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
            <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
          </div>
      </div>";

        }
    }
    }
}
}

//get all products
function get_all_products(){
  global $con;
    //condition to check isset
    if(!isset($_GET['dogcategory'])){
    if(!isset($_GET['catcategory'])){
        if(!isset($_GET['brand'])){
    $select_query="select * from `product` order by rand()";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
              <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
          </div>
      </div>";

        }
    }
    }
}
}

// get unique categories
function get_unique_dog_categories(){
    global $con;
    //condition to check isset
    if(!isset($_GET['catcategory'])){
    if(isset($_GET['dogcategory'])){
      $category_id=$_GET['dogcategory'] ; 
    $select_query="select * from `product` where category_id=$category_id and pro_ca_type='1' ";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center'>No stock for this category</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
              <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
              </div>
          </div>";

    }
    }
  }
  }
  function get_unique_cat_categories(){
    global $con;
    //condition to check isset
    if(!isset($_GET['dogcategory'])){
    if(isset($_GET['catcategory'])){
        $category_id=$_GET['catcategory'] ; 
        $select_query="select * from `product` where category_id=$category_id and pro_ca_type='2' ";
          $result_query=mysqli_query($con,$select_query);
          $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center'>No stock for this category</h2>";
        }
          while($row=mysqli_fetch_assoc($result_query)){
            $pro_id=$row['prod_id'];
            $pro_title=$row['prod_title'];
            $pro_desc=$row['prod_desc'];
            $pro_ca_type=$row['pro_ca_type'];
            $pro_category=$row['category_id'];
            $pro_brand=$row['brand_id'];
            $pro_price=$row['prod_price'];
            $pro_img1=$row['prod_img1'];
            echo "  <div class='col-md-4 mb-3'>
            <div class='card' style='width: 18rem;'>
              <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$pro_title</h5>
                <p class='card-text'>$pro_desc</p>
                <p class='card-text'>Rs.$pro_price</p>
                <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
              <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
                </div>
            </div>
        </div>";
  
      }
      }
}
  }
//get unique brands
function get_unique_brand(){
    global $con;
    //condition to check isset
    if(isset($_GET['brand'])){
      $brand_id=$_GET['brand'] ; 
    $select_query="select * from `product` where brand_id=$brand_id ";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center'>no stock for this brand</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
              <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
          </div>
      </div>";

    }
    }
}
function getbrand(){
    global $con;
    $select_brand="Select * from `brands`";
    $result_query=mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($result_query))
    {
      $brand_ti=$row_data['brand_title'];
      $brand_id=$row_data['brand_id'];
      echo "<li class='nav-item' style='background-color: #0E4749;'>
      <a href='index.php?brand=$brand_id' class='nav-link'  style='color: #FFFFFF;'>$brand_ti</a>
      </li>";
    }
}

function getdcategory()
{
    global $con;
    $select_brand="Select * from `dog_categories`";
    $result_query=mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($result_query))
    {
      $dog_ca_ti=$row_data['dog_ca_title'];
      $dog_ca_id=$row_data['dog_ca_id'];
      echo "<li class='nav-item' style='background-color: #0E4749;'>
      <a href='index.php?dogcategory=$dog_ca_id' class='nav-link'  style='color: #FFFFFF;'>$dog_ca_ti</a>
      </li>";
    }
}

function getccategory(){
    global $con;
    $select_brand="Select * from `cat_category`";
    $result_query=mysqli_query($con,$select_brand);
    while($row_data=mysqli_fetch_assoc($result_query))
    {
      $cat_ca_ti=$row_data['cat_ca_title'];
      $cat_ca_id=$row_data['cat_ca_id'];
      echo "<li class='nav-item' style='background-color: #0E4749;'>
      <a href='index.php?catcategory=$cat_ca_id' class='nav-link'  style='color: #FFFFFF;'>$cat_ca_ti</a>
      </li>";
    }
}

function search_product(){
    global $con;
    //condition to check isset
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
        $search_query="select * from `product` where prod_key like '%$search_data_value%' ";
        $result_query=mysqli_query($con,$search_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo"<h2 class='text-center'>NO PRODUCTS FOUND</h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
              <a href='product_details.php?product_id=$pro_id' class='btn btn-primary'>View Similar</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
          </div>
      </div>";

        }
    }
    }
    

//view similar fuction
function view_similar(){
  global $con;
    //condition to check isset
    if(isset($_GET['product_id'])){
    if(!isset($_GET['dogcategory'])){
    if(!isset($_GET['catcategory'])){
        if(!isset($_GET['brand'])){
          $product_id=$_GET['product_id'];
          $select_query="select * from `product` where prod_id=$product_id";
          $result_query=mysqli_query($con,$select_query);
          while($row=mysqli_fetch_assoc($result_query)){
          $pro_id=$row['prod_id'];
          $pro_title=$row['prod_title'];
          $pro_desc=$row['prod_desc'];
          $pro_ca_type=$row['pro_ca_type'];
          $pro_category=$row['category_id'];
          $pro_brand=$row['brand_id'];
          $pro_price=$row['prod_price'];
          $pro_img1=$row['prod_img1'];
          $pro_img2=$row['prod_img2'];
          echo "  <div class='col-md-4 mb-3'>
          <div class='card' style='width: 18rem;'>
            <img src='./admin_area/product_images/$pro_img1' class='card-img-top' alt='...'>
            <div class='card-body'>
              <h5 class='card-title'>$pro_title</h5>
              <p class='card-text'>$pro_desc</p>
              <p class='card-text'>Rs.$pro_price</p>
            <a href='index.php' class='btn btn-primary'>Go Home</a>
            <a href='index.php?add_to_cart=$pro_id' class='btn btn-primary'>ADD TO CART</a>
              </div>
          </div>
      </div>

      <div class='col-md-8'>
        <!-- related products  -->
        <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center'>RELATED PRODUCTS</h4>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$pro_img2' 
            class='card-img-top' alt='...'>
            </div>
      
        </div>

        </div>";
        }
    }
    }
}
}
}

//get ip address function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  

//CART FUNCTION
function cart(){
   if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $get_product_id=$_GET['add_to_cart'];
    $select_query="select * from `cart_details` where ip_address='$get_ip_add' and product_id=$get_product_id ";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows>0){
      echo "<script>alert('Item already present in cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_add',1)";
      $result_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item added to cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
   }
}

//function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_add = getIPAddress(); 
    $select_query="select * from `cart_details` where ip_address='$get_ip_add' ";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
    else{
      global $con;
      $get_ip_add = getIPAddress(); 
      $select_query="select * from `cart_details` where ip_address='$get_ip_add' ";
      $result_query=mysqli_query($con,$select_query);
      $count_cart_items=mysqli_num_rows($result_query);
    }

    echo $count_cart_items;
   }

   //total cart price
  function total_cart_price(){
    global $con;
    $get_ip_add = getIPAddress();
    $total=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
    $result_query=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result_query)){
        $product_id=$row['product_id'];
        $select_products="select * from `product` where prod_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
              $product_price=array($row_product_price['prod_price']);
              $product_values=array_sum($product_price);
              $total+=$product_values;
        }
    }
  echo $total;
  }
?>
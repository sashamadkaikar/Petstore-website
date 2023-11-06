<?php
include('../includes/connect.php');
// insert the product only when the submit button is clicked 
if(isset($_POST['pro_ca_type'])){
if(isset($_POST['insert_product'])){
  $pro_title=$_POST['product_title'];
  $pro_desc=$_POST['pro_desc'];
  $pro_keywords=$_POST['pro_keywords'];
  $pro_ca_type=$_POST['pro_ca_type'];
  if($pro_ca_type=='1'){
    $pro_category=$_POST['pro_category_dog'];
  }
  if($pro_ca_type=='2'){
    $pro_category=$_POST['pro_category_cat'];
  }

  $pro_brand=$_POST['pro_brand'];
  $pro_price=$_POST['pro_price'];
  $pro_status='true';

  //accsessing images
  $pro_img1=$_FILES['pro_img1']['name'];
  $pro_img2=$_FILES['pro_img2']['name'];

  //accessing temp image name
  $temp_img1=$_FILES['pro_img1']['tmp_name'];
  $temp_img2=$_FILES['pro_img2']['tmp_name'];

  //checking empty condition
  if($pro_title=='' or $pro_desc=='' or $pro_keywords=='' or $pro_ca_type=='' or $pro_category=='' or $pro_brand=='' or $pro_price=='' or $pro_img1==''or $pro_img2==''){
    echo "<script>alert('Please fill out all the fields')</script>";
    exit();
  }
  else{
        move_uploaded_file($temp_img1,"./product_images/$pro_img1");
        move_uploaded_file($temp_img2,"./product_images/$pro_img2");

        //insert query
        $insert_product = "INSERT INTO `product` (prod_title, prod_desc, prod_key, pro_ca_type, category_id, brand_id, prod_img1, prod_img2, prod_price, pro_date, status) 
VALUES ('$pro_title', '$pro_desc', '$pro_keywords', '$pro_ca_type', '$pro_category', '$pro_brand', '$pro_img1', '$pro_img2', '$pro_price', NOW(), '$pro_status')";

        $result_query=mysqli_query($con,$insert_product);
        if($result_query){
            echo "<script>alert('Product added Successfully')</script>";
        }
      }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>

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

<!-- additional css  -->
   <style>
   .form-label{
    font-family:'Orbitron';
    font-size:21px;
   }
   .sub-select {
            display: none;
            margin-bottom:4px;
            width:50%;
            align: center;
            margin: 0 auto;
        }
   </style>
</head>
<body class="bg-light">
    <div class="container mt-4">
     <h1 style="text-align:center; font-family: 'Orbitron';">INSERT PRODUCT</h1>
     <form action="" method="post" enctype="multipart/form-data">
        <!-- product title  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required>
        </div>

        <!-- product description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_desc" class="form-label">Product Description</label>
            <input type="text" name="pro_desc" id="pro_desc" class="form-control" placeholder="Enter Product Description" autocomplete="off" required>
        </div>
        <!-- product keyword -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_keywords" class="form-label">Product Keywords</label>
            <input type="text" name="pro_keywords" id="pro_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required>
        </div>

        <!-- product category  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_ca_type" class="form-label">Product Category Type</label>
            <select name="pro_ca_type" class="form-select" id="pro_ca_type" required>
                <option value="">select a category type</option>
                <option value="1">Dog Category</option>
                <option value="2">Cat Category</option>
            </select> 
        </div>
        

        <div id="subSelect1" class="sub-select">
           <label for="pro_category_dog" class="form-label">Choose form the below Dog categories:</label>
           <select name="pro_category_dog" class="form-select" id="pro_category_dog">
                <option value="">select a category</option>
                <?php
                   $select_query="Select * from `dog_categories`";
                   $result_query=mysqli_query($con,$select_query);
                   while($row=mysqli_fetch_assoc($result_query))
                   {
                     $d_cate_ti=$row['dog_ca_title'];
                     $d_cate_id=$row['dog_ca_id'];
                     echo "<option value='$d_cate_id'> $d_cate_ti</option>";
                   }
                ?>
            </select>
        </div>

        <div id="subSelect2" class="sub-select">
        <label for="pro_category_cat" class="form-label">Choose form the below Cat categories:</label>
           <select name="pro_category_cat" class="form-select" id="pro_category_cat">
                <option value="">select a category</option>
                <?php
                   $select_query="Select * from `cat_category`";
                   $result_query=mysqli_query($con,$select_query);
                   while($row=mysqli_fetch_assoc($result_query))
                   {
                     $c_cate_ti=$row['cat_ca_title'];
                     $c_cate_id=$row['cat_ca_id'];
                     echo "<option value='$c_cate_id'> $c_cate_ti</option>";
                   }
                ?>
            </select>
        </div>

        <!-- javascript for category display as per the choice  -->
        <script>
            document.getElementById("pro_ca_type").addEventListener("change", function () {
                var subSelect1 = document.getElementById("subSelect1");
                var subSelect2 = document.getElementById("subSelect2");
                var selectedOption = this.value;

                // Hide all sub-select boxes
                var subSelects = document.getElementsByClassName("sub-select");
                for (var i = 0; i < subSelects.length; i++) {
                    subSelects[i].style.display = "none";
                }

                if (selectedOption === "1") {
                    subSelect1.style.display = "block";
                } else if (selectedOption === "2") {
                    subSelect2.style.display = "block";
                }
            });
        </script>

        <!-- product brand  -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_brand" class="form-label">Product Brand</label>
            <select name="pro_brand" class="form-select">
                <option value="">select a brand</option>
                <?php
                   $select_query="Select * from `brands`";
                   $result_query=mysqli_query($con,$select_query);
                   while($row=mysqli_fetch_assoc($result_query))
                   {
                     $brand_ti=$row['brand_title'];
                     $brand_id=$row['brand_id'];
                     echo "<option value='$brand_id'> $brand_ti</option>";
                   }
                ?>
            </select>
        </div>
        <!-- product price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_price" class="form-label">Product Price</label>
            <input type="text" name="pro_price" id="pro_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required>
        </div>

        <!-- product img 1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_img1" class="form-label">Product Image 1</label>
            <input type="file" name="pro_img1" id="pro_img1" class="form-control" required>
        </div>

         <!-- product img 2 -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="pro_img2" class="form-label">Product Image 2</label>
            <input type="file" name="pro_img2" id="pro_img2" class="form-control" required>
        </div>

         <!-- submit-->
         <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="ad_button" value="Insert Product">
        </div>
     </form>
    </div> 
</body>
</html>
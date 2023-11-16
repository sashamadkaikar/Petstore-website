<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_product="select * from `product` where prod_id=$edit_id";
    $result=mysqli_query($con,$get_product);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['prod_title'];
    $product_description=$row['prod_desc'];
    $product_keywords=$row['prod_key'];
    $product_price=$row['prod_price'];
    $product_image=$row['prod_img1'];
}


?>
 <style>
        .product{
              width:200px;
             height:20%;
        }
      
    </style>
<div class="container mt-5">
    <h3 class="text-center" style="font-family:Orbitron;">EDIT PRODUCT</h3>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-outline w-50 m-auto mb-4 text-center">
        <img src="./product_images/<?php echo $product_image?>" class="product">
    </div>
    <div class="form-outline w-50 m-auto mb-4">
        <label for="product_title" class="form-label">Product Title</label>
        <input type="text"  value="<?php echo  $product_title?>" name="product_title" class="form-control" required>
    </div>
    <div class="form-outline w-50 m-auto md-4">
    <label for="product_description" class="form-label">Product Description</label>
    <input type="text" value="<?php echo  $product_description ?>" name="product_description" class="form-control" required>
    </div>
    <div class="form-outline w-50 m-auto md-4">
    <label for="product_keywords" class="form-label">Product Keywords</label>
    <input type="text"  value="<?php echo $product_keywords ?>" name="product_keywords" class="form-control" required>
    </div>
    <div class="form-outline w-50 m-auto md-4">
    <label for="product_price" class="form-label">Product Price</label>
    <input type="text" value="<?php echo $product_price?>" name="product_price" class="form-control" required>
    </div>
    <div class="text-center">
        <input type="submit" value="Update Product" name="edit_prod" class="ad_button">
    </div>
</form>
</div>
<!-- editing products  -->
<?php
if(isset($_POST['edit_prod'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_price=$_POST['product_price'];

    //checking if any field is empty
    if($product_title=='' or $product_description=='' or $product_keywords=='' or$product_price==''){
        echo "<script>alert('Please fill all the fields')</script>";
    }
    else{
        //query to update products
        $update_products=" update `product` set prod_title='$product_title',
        prod_desc='$product_description',prod_key='$product_keywords', prod_price='$product_price',pro_date=NOW() where prod_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('Product Updated Successfully')</script>";
            echo "<script>window.open('./index.php?view_products','_self')</script>";
        }
    }
}
?>
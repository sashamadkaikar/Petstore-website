<?php
include('../includes/connect.php');

if(isset($_POST['insert_cat_ca'])){
  $cat_category_title=$_POST['cat_ca_title'];

  //select if similar data exists from database
  $select_query="select * from `cat_category` where cat_ca_title='$cat_category_title'";
  $result_select=mysqli_query($con,$select_query);
  $num=mysqli_num_rows( $result_select);
  if($num>0){
    echo "<script>alert('Cat Category already present')</script>";
  }
  else{
     $insert_query="insert into `cat_category` (cat_ca_title) values ('$cat_category_title')";
     $result=mysqli_query($con,$insert_query);
     if($result){
       echo "<script>alert('Category has been added succesfully')</script>";
     }
  }
}
?>
<!-- css link  -->
<link rel="stylesheet" href="style2.css">




<!-- this form is to include dog categories in the database  -->
<h2 style="text-align:center; font-family: 'Orbitron';">INSERT CAT CATEGORY</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2" >
  <span class="input-group-text" id="basic-addon1" style="background-color: #FFD449;width:50px;"><i class="fa-solid fa-receipt"></i>
  </span>
  <input type="text" class="form-control p-3" name="cat_ca_title" placeholder="Insert New Cat Category" required>
</div>

<div class="input-group w-10"  >
     <input type="submit" class="in_pet_ca"  name="insert_cat_ca" value="Insert Cat Category">
</div>
</form>


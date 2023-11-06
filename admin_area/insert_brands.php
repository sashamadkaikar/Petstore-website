<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
  $bran_title=$_POST['brand_title'];

  //select if similar data exists from database
  $select_query="select * from `brands` where brand_title='$bran_title'";
  $result_select=mysqli_query($con,$select_query);
  $num=mysqli_num_rows( $result_select);
  if($num>0){
    echo "<script>alert('Brand already present')</script>";
  }
  else{
     $insert_query="insert into `brands` (brand_title) values ('$bran_title')";
     $result=mysqli_query($con,$insert_query);
     if($result){
       echo "<script>alert('Brand has been added succesfully')</script>";
     }
  }
}
?>

<!-- this form is to insert brands in the database  -->
<h2 style="text-align:center; font-family: 'Orbitron';">INSERT BRANDS</h2>
<form action="" method="post" class="mb-2">
<div class="input-group w-90 mb-2" >
  <span class="input-group-text" id="basic-addon1" style="background-color: #FFD449;width:50px;"><i class="fa-solid fa-receipt"></i>
  </span>
  <input type="text" class="form-control p-3" name="brand_title" placeholder="Insert Brand Name" required>
</div>

<div class="input-group w-10">
     <input type="submit" class="in_brand"  name="insert_brand" value="Insert Brand">
</div>
</form>

<style>
.in_brand{
  background-image: linear-gradient(45deg, #F7CE47 0%, #F09819  51%, #e38f04  100%);
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  flex-shrink: 0;
  font-family: 'Orbitron';
  font-size: 16px;
  font-weight: 500;
  height: 4rem;
  padding: 0 1.6rem;
  text-align: center;
  text-shadow: rgba(0, 0, 0, 0.25) 0 3px 8px;
  transition: all .5s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  margin-top:30px;
}

.in_brand:hover {
  box-shadow: rgba(227, 143, 4, 0.5) 0 1px 30px;
  transition-duration: .1s;
}
</style>
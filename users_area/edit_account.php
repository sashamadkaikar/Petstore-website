<?php
if(isset($_GET['edit_account'])){
   $user_session_name=$_SESSION['username'];
   $select_query="select * from `user_table` where username='$user_session_name'";
   $result_query=mysqli_query($con,$select_query);
   $row_fetch=mysqli_fetch_assoc($result_query);
   $user_id=$row_fetch['user_id'];
   $username=$row_fetch['username'];
   $user_email=$row_fetch['user_email'];
   $user_address=$row_fetch['user_address'];
   $user_mobile=$row_fetch['user_mobile'];
}

if(isset($_POST['user_update'])){
   $update_id=$user_id;
   $username=$_POST['user_username'];
   $user_email=$_POST['user_email'];
   $user_address=$_POST['user_address'];
   $user_mobile=$_POST['user_mobile'];
   $user_image=$_FILES['user_image']['name'];
   $user_image_tmp=$_FILES['user_image']['tmp_name'];
   move_uploaded_file($user_image_tmp,"./user_images/$user_image");

   //update query
   $update_data=" update `user_table` set username='$username',
   user_email='$user_email',user_address='$user_address',user_mobile='$user_mobile', user_image='$user_image' where user_id=$update_id";
   $result_update_query=mysqli_query($con,$update_data);
   if($result_update_query){
      echo "<script>alert('Profile updated successfully')</script>";
      echo "<script>window.open('logout.php','_self')</script>";
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit account</title>
    <!-- orbitron font  -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
<style>
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
</style>
</head>
<body>
   <h3 class="text-center mt-3" style="font-family:Orbitron;">EDIT ACCOUNT</h3>
   <form action="" method="post" enctype="multipart/form-data" class="text-center">
      <div class="form-outline mb-4">
         <input type="text" value="<?php echo $username?>" class="form-control w-50 m-auto" name="user_username">
      </div>
      <div class="form-outline mb-4">
         <input type="email" value="<?php echo $user_email?>" class="form-control w-50 m-auto" name="user_email">
      </div>
      <div class="form-outline mb-4 d-flex w-50 m-auto">
         <input type="file" class="form-control " name="user_image">
      <img src="./user_images/<?php echo $user_image?>"  height='20%' width='20%'>
      </div>
      <div class="form-outline mb-4">
         <input type="text" value="<?php echo $user_address?>" class="form-control w-50 m-auto" name="user_address">
      </div>
      <div class="form-outline mb-4">
         <input type="text"  value="<?php echo $user_mobile?>" class="form-control w-50 m-auto" name="user_mobile">
      </div>

      <input type="submit" value="update" class="ad_button" name="user_update">
   </form>
</body>
</html>
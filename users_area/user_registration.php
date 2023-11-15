<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Registration</title>
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
    <div class="container-fluid my-3">
    <h1 style="text-align:center; font-family: 'Orbitron';">New User Registration</h1>
     <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- username  -->
                <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                </div>
                 <!-- email  -->
                 <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_email" class="form-label">Email</label>
                <input type="email" name="user_email" id="user_email" class="form-control" placeholder="Enter Your Email" autocomplete="off" required>
                </div>
                <!-- image  -->
                <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_image" class="form-label">Image</label>
                <input type="file" name="user_image" id="user_image" class="form-control" required>
                </div>
                 <!-- password  -->
                 <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required>
                </div>
                <!-- confirm password  -->
                <div class="form-outline mb-4 w-500 m-auto">
                <label for="conf_user_password" class="form-label">Confirm Password</label>
                <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required>
                </div>
                 <!-- address  -->
                 <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_address" class="form-label">Address</label>
                <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter Address" autocomplete="off" required>
                </div>
                 <!-- mobile  -->
                 <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_contact" class="form-label">Contact</label>
                <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Your Mobile Number" autocomplete="off" required>
                </div>
                <div class="text-center">
                    <input type="submit" value="Register" class="ad_button" name="user_register">
                    <p>Already have an account? <a href="user_login.php">Login</a></p>
                </div>
            </form>
        </div>
     </div>
    </div>
</body>
</html>
<!-- php code  -->
<?php
if (isset($_POST['user_register']))
{
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];

  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];

  $user_ip=getIPAddress();

  //select query
  $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0)
  {
    echo "<script>alert('Username and email already present')</script>";
  }
  else if($user_password!=$conf_user_password){
    echo "<script>alert('Passwords do not match')</script>";
  }

 else{
      //insert query
      move_uploaded_file($user_image_tmp,"./user_images/$user_image");
      $insert_query="insert into `user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile)
      values ('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_contact')";
      $sql_execute=mysqli_query($con, $insert_query);
      if($sql_execute)
      {
        echo "<script>alert('Data inserted succesfully')</script>";
      }
      else{
        die(mysqli_error($con));
      }
 }

 //selecting cart items
 $select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
 $result_cart=mysqli_query($con,$select_cart_items);
 $rows_count=mysqli_num_rows($result_cart);
  if($rows_count>0){
    $_SESSION['username']=$user_username;
    //user is not logged in but is adding items to cart
    echo "<script>alert('You have items in your cart')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
  }
  else{
    echo "<script>window.open('../index.php','_self')</script>";
  }
}

?>
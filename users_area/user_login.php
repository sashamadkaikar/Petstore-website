<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Login</title>
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
    <div class="container-fluid my-5 mb-3">
    <h1 style="text-align:center; font-family: 'Orbitron';" class="mb-5">User Login</h1>
     <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post">
                <!-- username  -->
                <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_username" class="form-label">Username</label>
                <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter Username" autocomplete="off" required>
                </div>
               
                 <!-- password  -->
                 <div class="form-outline mb-4 w-500 m-auto">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter Your Password" autocomplete="off" required>
                </div>
                
                <div class="text-center">
                    <input type="submit" value="Login" class="ad_button" name="user_login">
                    <p>Don't have an account? <a href="user_registration.php">Register</a></p>
                </div>
            </form>
        </div>
     </div>
    </div>
</body>
</html>

<!-- php code  -->
<?php
if(isset($_POST['user_login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];

    $select_query="select * from `user_table` where username='$user_username'";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
    $user_ip=getIPAddress();

    //cart item
    $select_cart_query="select * from `cart_details` where ip_address='$user_ip' ";
    $select_cart=mysqli_query($con,$select_cart_query);
    $row_count_cart=mysqli_num_rows($select_cart);

    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_password,$row_data['user_password'])){
           
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                 echo "<script>alert('Login Successfull !')</script>";
                 echo "<script>window.open('profile.php','_self')</script>";
            }
            else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('Login Successfull !')</script>";
                echo "<script>window.open('payment.php','_self')</script>";
            }
        }
        else{
            echo "<script>alert('Invalid credentials')</script>";
        }

    }
    else{
        echo "<script>alert('Invalid credentials')</script>";
    }

}
?>
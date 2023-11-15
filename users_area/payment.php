<?php
include('../includes/connect.php');
include('../functions/common_function.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-Page</title>
     <!--BOOTSTRAP CSS LINK-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
    <!-- orbitron font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- php code to access user id  -->
    <?php
    $user_ip=getIPAddress();
    $get_user="Select * from `user_table` where user_ip='$user_ip' ";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_assoc($result);
    $user_id=$run_query['user_id'];

    ?>
   <div class="container">
    <h2 class="text-center my-5" style="font-family:Orbitron;">PAYMENT OPTIONS</h2>
    <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-md-6">
            <a href="https://www.paypal.com/in/home" target="_blank"><img src="../images/paypic.jpg" width=600px ></a>
        </div>
        <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id ?>" target="_blank"> <h2 class="text-center" style="font-family:Orbitron;">PAY OFFLINE</h2></a>
        </div>
    </div>
   </div>
</body>
</html>
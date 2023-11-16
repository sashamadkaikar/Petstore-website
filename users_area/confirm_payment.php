<!-- connect file  -->
<?php
 include('../includes/connect.php');
 session_start();
 if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $select_data="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select_data);
    $row_fetch=mysqli_fetch_assoc($result);
    $invoice_number=$row_fetch['invoice_number'];
    $amount_due=$row_fetch['amount_due'];
}


if(isset($_POST['confirm_payment'])){
  $invoice_number=$_POST['invoice_number'];
  $amount=$_POST['amount'];
  $payment_mode=$_POST['payment_mode'];
  $insert_query="insert into `user_payments` (order_id,invoice_number,amount,
  payment_mode) values ($order_id,$invoice_number,$amount,'$payment_mode')";
  $result=mysqli_query($con,$insert_query);
  if($result)
  {
    echo "<h3 class='text-center'>Payment completed successfully</h3>";
    echo "<script>window.open('profile.php?my_order','_self')</script>";
  }
  $update_orders="update `user_orders` set order_status='Complete' where 
  order_id=$order_id";
  $result_update=mysqli_query($con,$update_orders);
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment-page</title>
    <!--BOOTSTRAP CSS LINK-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" 
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous">
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
    <div class="container">
        <h1 style="text-align:center; font-family: 'Orbitron';" class="mb-5">CONFIRM PAYMENT</h1>
        <form action="" method="post">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" value="<?php echo $invoice_number?>" class="form-control w-50 m-auto" name="invoice_number">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="amount">AMOUNT</label>
                <input type="text" value="<?php echo $amount_due?>"class="form-control w-50 m-auto" name="amount">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
              <select name="payment_mode" class="form-select w-50 m-auto" >
                <option >UPI</option>
                <option >NetBanking</option>
                <option >Paypal</option>
                <option >Cash on Delivery</option>
                <option >Pay Offline</option>
              </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                
                <input type="submit" class="ad_button"  value="Confirm" name="confirm_payment">
            </div>
        </form>
    </div>
</body>
</html>
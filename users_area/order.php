<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}


//getting total items and total price of all items
$get_ip=getIPAddress();
$total_price=0;
$cart_query_price="select * from `cart_details` where ip_address='$get_ip'";
$result_cart_price=mysqli_query($con,$cart_query_price);


$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
$total_price=total_cart_price();


//incase of any problem refer to code in video part51

//inserting the orders
$insert_orders="Insert into `user_orders` (user_id,amount_due,
  invoice_number,total_products,order_date,order_status) values
  ($user_id,$total_price,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_orders);
if($result_query)
{
   
    //accesing individual products from the cart and inserting to the user orders and pending orders table
    while ($row = mysqli_fetch_assoc($result_cart_price)){
    $product_id = $row['product_id'];//getting the product id for the item in the cart
    $product_quantity=$row['quantity'];//getting the quantity  for the item in the cart
    //orders pending
    $insert_pending_orders="Insert into `orders_pending` (user_id,
    invoice_number,product_id,quantity,order_status) values
    ($user_id,$invoice_number,$product_id,$product_quantity,'$status')";
    $result_pending_query=mysqli_query($con,$insert_pending_orders);
    }

    //delete from cart
    $empty_cart="Delete from `cart_details` where ip_address='$get_ip'";
    $result_delete=mysqli_query($con,$empty_cart);
    if($result_delete)
    {
        echo "<script>alert('Orders are submitted succesfully')</script>";
    }
    echo "<script>window.open('profile.php','_self')</script>";

}

?>
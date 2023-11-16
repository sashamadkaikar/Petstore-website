<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .product{
              width:100px;
        height:20%;
        }
      
    </style>
</head>
<body>
   <h1 style="font-family:Orbitron;" class="text-center">ALL PRODUCTS</h1> 
<table class="table table-bordered mt-5">
<thead>
    <tr>
      <th>Product_ID</th>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Product Price</th>
      <th>Total sold</th>
      <th>Status</th>
      <th>Edit</th>  
      <th>Delete</th>
      <img src="" alt="">
    </tr>
</thead>
<tbody>
    <?php
    $get_products="select * from `product`";
    $result=mysqli_query($con,$get_products);
    while($row=mysqli_fetch_assoc($result)){
        $product_id=$row['prod_id'];
        $product_title=$row['prod_title'];
        $product_image=$row['prod_img1'];
        $product_price=$row['prod_price'];
        $status=$row['status'];
        ?>

       <tr class='text-center'>
        <td><?php echo $product_id ?></td>
        <td><?php echo $product_title ?></td>
        <td><img class='product' src='./product_images/<?php echo $product_image ?>' /></td>
        <td><?php echo $product_price ?>/-</td>
        <td>
            <?php
            $get_count="select * from `orders_pending` where product_id=$product_id";
            $result_query=mysqli_query($con,$get_count);
            $total_q=0;
            while($row_data=mysqli_fetch_assoc($result_query))
            {
                $quantity=$row_data['quantity'];
                $total_q=$total_q+ $quantity;
            }
            //$row_count=mysqli_num_rows($result_query);
            echo $total_q;
            
            ?>
        </td>
        <td><?php echo $status ?></td>
        <td><a href='index.php?edit_products=<?php echo $product_id?>'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href=''><i class='fa-solid fa-trash'></i></a></td>
    
    </tr>
<?php
    }
    ?>
    
    
</tbody>
</table>
</body>
</html>
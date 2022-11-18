<?php
   
    require("connection.php");
    $user_id = $_POST['user_id'];
  
  if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price']; 
    $product_image = $_POST['product_image']; 
    $product_quantity = 1;

    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE Cart_name = '$product_name' AND Cart_user_id = '$user_id'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = "Product is already added to your cart!" ;
    }else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(Cart_user_id, Cart_name, Cart_price, Cart_image, Cart_quantity) 
      VALUES ('$user_id','$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = "Product successfully add to cart!" ;
    }
  }
?> 
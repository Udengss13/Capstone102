<?php 

// require_once "controllerUserData.php"; 
     require('layouts/header_employee.php');
     
    //GET USER ID IN REGISTRATION
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
      header('location: login-user.php');
    }

    //  To Update the Quantity
     if(isset($_POST['update_update_btn'])){
       $update_value = $_POST['update_quantity'];
       $update_id = $_POST['update_quantity_id'];

       $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET  Cart_quantity = '$update_value'
       WHERE Cart_id = '$update_id'");

      if($update_quantity_query){
        header('location: cart.php');
      }
     }

     //To remove by ID
     if(isset($_GET['remove'])){
       $remove_id = $_GET['remove'];

      $querydelete = mysqli_query($con, "DELETE FROM `cart` WHERE Cart_id = '$remove_id'");
      if($querydelete){
        header('location: cart.php');
      }
     }

     //To Delete all ITems
     if(isset($_GET['delete_all'])){
     mysqli_query($con, "DELETE FROM `cart` WHERE Cart_user_id = '$user_id'");
     header('location: cart.php');




     }
?>



    <!--Button-->
    <td colspan=""><a href="product.php" class=" btn "><span class="text fw-bold" style="color:#034D73"><i
                    class="bi bi-arrow-left"> </i>Continue
                Shopping</span></a></td>




    <div class="container">
        <div class="row">
            <div class="text-center  mt-4">
                <h1 class=""><span><i class="fa-solid fa-cart-shopping"> </i> My Cart</h1></span>
            </div>
            <!--Table-->
            <div class="table-responsive-sm table-responsive-md table-responsive-lg mt-3">
                <table class="table table-sm-responsive">
                    <thead class="thead text-light">
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
          $select_cart = mysqli_query($con, "SELECT * FROM `cart`WHERE Cart_user_id = '$user_id' ");
          $grand_total = 0;

          if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){    
        ?>
                        <tr class="text-white">
                            <!--Image-->
                            <td><img src="asset/menu/<?= $fetch_cart['Cart_image'];?>" height="53"
                                    style=" display:block; " alt="Images"></td>
                            <!--Name-->
                            <td class="align-middle"><?= $fetch_cart['Cart_name'];?></td>
                            <!--Price-->
                            <td class="align-middle">Php
                                <?php echo number_format($fetch_cart['Cart_price'],2);?>
                            </td>
                            <!--Input Number and Update Button-->
                            <td class="align-middle" class="">
                                <form action="" method="post">
                                    <input type="hidden" name="update_quantity_id" id="update_quantity_id<?php echo $fetch_cart['Cart_id']; ?>" min="1" max="10"
                                        value="<?php echo $fetch_cart['Cart_id'] ?>">
                                    <input type="number" name="update_quantity" min="1" data-id="<?php echo $fetch_cart['Cart_id']; ?>" max="10"
                                        value="<?php echo $fetch_cart['Cart_quantity'] ?>" class="col-5 prc">
                                    

                                </form>
                            </td>
                            <!--Quantity-->

                            <td class="align-middle">Php
                                <?php $sub_total = $fetch_cart['Cart_price'] * $fetch_cart['Cart_quantity'];
                                echo number_format($sub_total,2)?>
                            </td>
                            <!--Remove Button-->
                            <td class="align-middle"><a href="cart.php?remove=<?php echo $fetch_cart['Cart_id'] ?>"
                                    class="btn btn-danger bg-button"
                                    onclick="return confirm('Do you want to remove it from your Cart?')"><i
                                        class="bi bi-trash"></i><span class="text-light">Remove</span></a>
                            </td>

                        </tr>
                        <?php
                        $grand_total += $sub_total;
                        };
                    }else {
                        echo '<tr><td colspan="6" class="text-center fs-5 text-danger">No item added</td></tr>'; 
                    };
                    ?>
                        <tr>

                            <!--Total-->
                            <td colspan="4" class="text-center fw-bold align-middle">Total Cart:</td>
                            <td class="fw-bold fs-6 align-middle">Php
                                <?php echo number_format($grand_total,2) ?></td>
                            <output id="result"></output>
                            <td><a href="cart.php?delete_all"
                                    class="btn btn-danger   <?php  echo ($grand_total > 1),'disabled'; ?>"
                                    onclick="return confirm('Do you want remove all your items from your cart?')">Delete
                                    All</a></td>
                        </tr>
                    </tbody>
                </table>
                <!--Proceed to Checkout BUtton-->
                <div class="text-center">
                    <a href="checkout.php?user_id=<?php echo $_SESSION['user_id'];?>"
                        class="btn btn-danger bg-button <?php  echo ($grand_total > 1),'disabled'; ?>">Proceed to
                        Checkout</a>
                </div>

            </div>

        </div>
        <!-- <script>
            $('.form-group').on('input', ',prc',function(){
                var totalSum =0;
                $('.form-group.prc').each(function(){
                    var inputVal = $(this).val();
                    if($.isNumeric(inputVal)){
                        totalSum += parseFloat(inputVal);
                    }
                });
                $('#result').text(totalSum);
            });

        </script> -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
        </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   

    <script>
        $(document).ready(function(){
            $('#cart-user-user').addClass('bg-primary');
            $(document).on('change','input[name="update_quantity"]',function(){
                var qty = $(this).val();
                var id = $(this).data('id');
                $.post("cart.php",{update_update_btn:'submit',update_quantity:qty,update_quantity_id:id},function(data){ 
                    location.reload();
                });
            });
        
        });
    </script>
</body>

</html>
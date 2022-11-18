<?php require_once "controllerUserData.php"; 
     require('php/connection.php');
     
    //GET USER ID IN REGISTRATION
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
   

    if(!isset($user_id)){
    //   header('location: login-user.php');
    }
?>
<?php
  //This is for calling the informaiton of user in fields.
    $sqlInfo = mysqli_query($con, "SELECT * FROM `order` where `order`.`order_status`");

    // $user_id1=$user_id;

    
?>

<?php 
  if(isset($_POST['confirmed'])){
    $update_status_query = mysqli_query($con, "UPDATE `order` SET `order_status` = 'confirmed' WHERE `order`.`id` = ".$_GET['id']);

   if($update_status_query){
    header('location: admin-view-orders.php?id='.$_GET['id']);
   }
   else{
    echo "amlii";
   }
  }

  if(isset($_POST['pickup'])){
    $update_status = $_POST['update_status'];
    $update_status_id = $_POST['update_status_id'];
    $update_status = 1;
    
    $update_status_query = mysqli_query($con, "UPDATE `order` SET `order_status` = 'pickup' WHERE `order`.`id` = ".$_GET['id']);
    

   if($update_status_query){
    header('location: admin-view-orders.php?id='.$_GET['id']);
   }
  }
  if(isset($_POST['pickedup'])){
    $update_status = $_POST['update_status'];
    $update_status_id = $_POST['update_status_id'];
    $update_status = 1;
    
    $update_status_query = mysqli_query($con, "UPDATE `order` SET `order_status` = 'pickedup' WHERE `order`.`id` = ".$_GET['id']);
    

   if($update_status_query){
    header('location: admin-view-orders.php?id='.$_GET['id']);
    //  header('location: admin-orders.php');
   }
  }
?>


<!--When Click ORDER NOW!-->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin || View Orders</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">


</head>
<body style="background:  #9FBACD;">

<!--Navbar-->
<div class="nav-bar container-fluid overflow-hidden">
    <div class="row vh-100 overflow-auto">
        <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flexs sticky-top">
            <div
                class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                <a href="/"
                    class="navbar-brand d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"><img
                        src="asset/logopet.png" alt="Saint Jude Logo"
                        style="width: 50px; padding-left: 10px; padding-top: 5px;">
                    <span class="navbar-brand">PETCO. ADMIN</span>
                </a>
                <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                    id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link align-middle px-0">
                            <i class="fs-4 bi-speedometer2"></i> <span
                                class="ms-1 d-none d-sm-inline">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-4 bi-person-lines-fill"></i><span
                                class="ms-1 d-none d-sm-inline">Accounts</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="#">Admin Accounts</a></li>
                            <li><a class="dropdown-item" href="admin-user-accounts.php">User Accounts</a></li>
                            <li><a class="dropdown-item" href="#">Employee Accounts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-table"></i><span class="ms-1 d-none d-sm-inline">Sales</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-4 bi-archive"></i><span class="ms-1 d-none d-sm-inline">Pet Archives</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="#">Pet Profile</a></li>
                            <li><a class="dropdown-item" href="#">Pet Owners</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-4 bi-pencil-square"></i><span
                                class="ms-1 d-none d-sm-inline">Content</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="admin-slider.php">Slider</a></li>
                            <li><a class="dropdown-item" href="admin-quicktips.php">Quicktips</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="admin-orders.php" class="nav-link px-sm-0 px-2">
                            <i class="fs-4 bi-bag-check"></i><span class="ms-1 d-none d-sm-inline">Orders</span>
                        </a>
                    </li>
                </ul>
                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="asset/cha.jpg" alt="Admin" width="28" height="28"
                            class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Cha</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="admin-profile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="admin-login.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>




        <div class="col-auto col-md-9 col-sm-9 col-xl-10 mt-5 body">
            <table class="table  table-bordered">
                <?php 
                    $select_user = mysqli_query($con, "SELECT * FROM `order` WHERE id = ".$_GET['id']);
                    if(mysqli_num_rows($select_user) > 0){
                    $fetch_user = mysqli_fetch_assoc($select_user); 
                    };
                ?>
                <tbody>
                    <div >
                        <tr  class="col-5">
                            <!-- <table class="table table-striped table table-bordered"> -->
                            <td class="text-capitalize " col-5> Name:
                                <?php echo $fetch_user['first_name']." ". $fetch_user['last_name']; ?></td>
                        </tr>
                        <tr class="col-5">
                            <td class="text-capitalize col col-5"> Contact Number:
                                <?php echo $fetch_user['contact'] ?> </td>
                        </tr>
                        <tr class="col-5">
                            <td class="text-capitalize col-5 justify-content">Address:
                                <?php echo $fetch_user['address'] ?>
                            </td>
                        </tr>
                        <tr class="col-5">
                            <td class="text-capitalize col-5 justify-content">Email:
                                <?php echo $fetch_user['email'] ?>
                            </td>
                        </tr>
                        <tr class="col-5">
                            <?php if($fetch_user['order_status'] == 'confirmed'): ?>
                            <td class=" col-5">
                                <div class="col">
                                <span class="col"> Order Status: </span> <span class="badge badge-success bg-success "> Confirmed</span>
                                    <input type="hidden" value="<?php echo $fetch_user['order_status'] ?>"
                                        name="update_status">
                                    <input type="hidden" value="<?php echo $fetch_user['order_user_id'] ?>"
                                        name="update_status_id">
                                </div>
                            </td>
                        </tr>
                        <tr class="col-5">

                            <?php elseif($fetch_user['order_status'] == 'pickup'): ?>
                            <td class="">
                                <div class="col">
                                    Order Status: <span class="badge badge-success bg-warning">For Pick Up</span>
                                    <input type="hidden" value="<?php echo $fetch_user['order_status'] ?>"
                                        name="update_status">
                                    <input type="hidden" value="<?php echo $fetch_user['order_user_id'] ?>"
                                        name="update_status_id">
                                </div>
                            </td>
                        </tr>
                            <?php elseif($fetch_user['order_status'] == 'pickedup'): ?>
                            <td class="">
                                <div class="col">
                                    Order Status: <span class="badge badge-info bg-info text-dark">Picked Up</span>
                                    <input type="hidden" value="<?php echo $fetch_user['order_status'] ?>"
                                        name="update_status">
                                    <input type="hidden" value="<?php echo $fetch_user['order_user_id'] ?>"
                                        name="update_status_id">
                                </div>
                            </td>
                        </tr>
                        <tr class="col-5">
                            <?php else: ?>
                            <td class=" ">
                                <div class="col">
                                        Order Status: <span class="badge badge-success bg-secondary"> For
                                            Verification</span></div>
                            </td>
                        </tr>

                        <?php endif; ?>
            </table>


            <form action=" " method="post">
                <table class="table table-striped table table-bordered">
                    <!-- <div class="row"> -->
                    <thead style="background: black; color: white;">
                        <tr>
                            <th>Image</th>

                            <th>Quantity</th>
                            <th>Order</th>
                            <th>Amount</th>
                            <input type="hidden" value="<?php echo $row['order_status'] ?>" name="update_status">
                            <input type="hidden" value="<?php echo $row['order_user_id'] ?>" name="update_status_id">
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                        $select_cart = mysqli_query($con, "SELECT * FROM order_list o inner join admin_menu p on menu_id = product_id  where order_id =".$_GET['id']);
                                        $total = 0;
                                        $grand_total= 0;


                                    while($row=$select_cart->fetch_assoc()):
                                        $total += $row['qty'] * $row['product_price'];
                                                ?>
                        <tr>
                            <td><img src=" asset/menu/<?php echo $row['Menu_filename']; ?> "
                                    class="zoom img-thumbnail img-responsive images_menu" height="50" width="50"></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td><?php echo $row['Menu_name'] ?></td>
                            <td>Php <?php echo number_Format($row['Menu_price'],2 )?></td>
                        </tr>


                        <?php endwhile; ?>
                        <tr>

                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">TOTAL</th>
                            <th>Php <?php echo number_format($total,2) ?></th>
                        </tr>





                        <!-- </table> -->
        </div>



        </tbody>
        <!-- </tfoot> -->
        </table>

        <div class="text-center">
            <h5>Choose Status:</h5>
            <button  class="btn btn-warning bg-success border border-dark " type="submit" name="confirmed">Confirm</a></button>
            <button class="btn bg-warning border border-dark  " type="submit" name="pickup">For Pick Up</a></button>
            <button class="btn bg-info border border-dark " type="submit" name="pickedup">Picked Up</a></button>
            <a href="admin-orders.php"><span class="btn btn-outline-danger mx-2 float-end">Back</span></a>

        </div>
    </div>

</div>
</form>
</div>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>

</body>

</html>

<?php 
require('layouts/header_admin.php');
require_once "controllerUserData.php"; 
     require('php/connection.php');
     
    //GET USER ID IN REGISTRATION
    if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    }
    if(!isset($user_id)){
    //  header('location: login-user.php');
    }
?>
<?php
  //This is for calling the informaiton of user in fields.
  if(isset($_SESSION['user_id'])){
    $sqlInfo = mysqli_query($con, "SELECT * FROM order WHERE order_user_id = '$user_id'");
  }else{
    $sqlInfo = mysqli_query($con, "SELECT * FROM order");
  }
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="icon" href="asset/logopet.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Admin || Order</title>







            <div class="col-md-9 col-xl-10 py-3">
                <h3 class="text-center c-white py-3 mb-4">All Orders</h3>

                <div class="row justify-content-center">
                    <div class="col-1 c-white"><p class="bg-secondary text-secondary">|</p></div>For Verification
                    <div class="col-1 c-white "><p class="bg-success text-success">|</p></div>Confirmed
                    <div class="col-1 c-white "><p class="bg-warning text-warning">|</p></div>For Pick Up
                    <div class="col-1 c-white"><p class="bg-info text-info">|</p></div>Picked Up
                </div>

                <!-- <div class="card"> -->
                <div class="card-body">
                    <form action="" method="POST">
                        <table class="table table-striped table table-bordered">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">Number</th> -->
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                      $i = 1;
                                      $order_query = mysqli_query($con, "SELECT * FROM `order` ORDER BY `order`.`id` DESC " );
                                      
                                      if(mysqli_num_rows($order_query) > 0){
                                        while($row = mysqli_fetch_assoc($order_query)){    
                                  ?>

                                <tr>

                                    <td class="col-sm-5 col-md-2 col-lg-2">
                                        <div class="col">
                                            <?php echo $row['first_name']." ".$row['last_name']  ?></div>
                                    </td>
                                    <td class=" col-sm-5 col-md-2 col-lg-1"><input name="email" readonly class="c-white"
                                            type="text" style="background-color:transparent;border:0; "
                                            value="<?php echo $row['email']; ?>">
                                    </td>

                                    <td class="col-sm-5 col-md-2 col-lg-4">
                                        <div class="col"><?php echo $row['address'] ?></div>
                                    </td>
                                    <td class="col-sm-5 col-md-2 col-lg-2">
                                        <div class="col"><?php echo $row['contact'] ?></div>
                                    </td>

                                    <?php if($row['order_status'] == 'confirmed'): ?>
                                    <td class="text-center col-sm-1 col-md-1 col-lg-1">
                                        <div class="col">
                                            <span class="badge badge-success bg-success text-white">Confirmed</span>
                                            <input type="hidden" value="<?php echo $row['order_status'] ?>"
                                                name="update_status">
                                            <input type="hidden" value="<?php echo $row['order_user_id'] ?>"
                                                name="update_status_id">
                                        </div>
                                    </td>

                                    <?php elseif($row['order_status'] == 'pickup'): ?>
                                    <td class="text-center col-sm-1 col-md-1 col-lg-1">
                                        <div class="col">
                                            <span class="badge badge-success bg-warning text-white">For Pick Up</span>
                                            <input type="hidden" value="<?php echo $row['order_status'] ?>"
                                                name="update_status">
                                            <input type="hidden" value="<?php echo $row['order_user_id'] ?>"
                                                name="update_status_id">
                                        </div>
                                    </td>
                                    <?php elseif($row['order_status'] == 'pickedup'): ?>
                                    <td class="text-center col-sm-1 col-md-1 col-lg-1">
                                        <div class="col">
                                            <span class="badge badge-success bg-info text-dark">Picked Up</span>
                                            <input type="hidden" value="<?php echo $row['order_status'] ?>"
                                                name="update_status">
                                            <input type="hidden" value="<?php echo $row['order_user_id'] ?>"
                                                name="update_status_id">
                                        </div>
                                    </td>


                                    <?php else: ?>
                                    <td class="text-center col-sm-1 col-md-1 col-lg-1 ">
                                        <div class="col"><span class="badge badge-secondary bg-secondary text-dark">For
                                                Verification</span></div>
                                    </td>
                                    <?php endif; ?>

                                    <td class="col-sm-1 col-md-1 col-lg-1">
                                        <div class="container btn btn-primary mt-3">

                                            <a class="btn btn primary  text-light"
                                                href='admin-view-orders.php?id=<?php echo $row["id"] ?>'>View Orders</a>

                                        </div>

                                    </td>
                                </tr>

                                <?php
                                          };
                                        };
                                    ?>
                    </form>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>
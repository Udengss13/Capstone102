<?php

require('layouts/header_admin.php');
    require_once "php/user-list-process.php";
    require('php/connection.php');
    

    $query = "SELECT * FROM usertable"; //You don't need a like you do in SQL;
    $result = mysqli_query($con, $query);
    

    //this is for search name or id;
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $query = "SELECT * FROM usertable WHERE first_name='$user_id' OR id='$user_id' OR email='$user_id'"; //You don't need a ; like you do in SQL
        $result = mysqli_query($con, $query);
    }else{
        $query = "SELECT * FROM usertable"; //You don't need a ; like you do in SQL
        $result = mysqli_query($con, $query);
    }
?>
<!-- <?php
require_once "controllerAdmin.php";  
?> -->


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

<title>Admin || User</title>

            <div class="col py-3">
                <div class="w3-main">
                    <div class="w3-transparent">
                        <h3 class="text-center c-white py-3">User Accounts</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-10">
                        <form action="admin-user-accounts.php" method="GET">
                            <div class="input-group mx-auto" style="width: 450px;">
                                <span class="input-group-text">Search User</span>
                                <input type="text" required class="form-control" name="id"
                                    placeholder="User ID or Name.">
                                <span class="input-group-btn">
                                    <button class="btn btn-success" name="search" type="submit"><span
                                            class="bi bi-search c-white"></span></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                        <div class="dropdown  ms-auto ms-sm-0 flex-shrink-1 " style="background-color: #EA6D52; border-radius: 10px;">

                            <a href="#" class="d-flex align-items-center text-decoration-none text-dark dropdown-toggle btn"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-plus text-primary"></i>
                                Add User
                            </a>

                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="adminAddClient.php">Client</a></li>
                                <li><a class="dropdown-item" href="#">Admin</a></li>
                                <li><a class="dropdown-item" href="adminAddEmployee.php">Employee</a></li>
                                
                            </ul>
                        </div>

                        <div class="d-flex flex-row-reverse">

                        </div>
                    </div>

                </div>
             



            <!-- Modal -->


            <!--    <div class="card mt-3"> -->
            <div class="card-body">
                <form action="" method="POST">
                    <table class="table table-striped table table-bordered">
                        <thead>
                            <tr>


                                <!-- <th scope="col">User ID</th> -->
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <!--<th  scope="col">Last Name</th> -->
                                <!-- <th  scope="col">Suffix</th> -->
                                <th scope="col">Email</th>
                                <th scope="col">User Level</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while($row = mysqli_fetch_array($result)){ ?>
                            <form action="php/user-list-process.php" method="post">
                                <tr>
                                    <!-- <td class="col-sm-1 col-md-2 col-lg-1">

                                        <div class="col"><?php echo $row['id'] ?></div>
                                    </td> -->
                                    <td class="col-sm-1 col-md-1 col-lg-2">
                                        <div class="col">
                                            <?php echo $row['first_name']  ?></div>
                                    </td>
                                    <td class="col-sm-1 col-md-1 col-lg-2">
                                        <div class="col">
                                            <?php echo $row['last_name']  ?></div>
                                    </td>

                                    <td class=" col-sm-1 col-md-1 col-lg-3">
                                        <div class="col-sm-1">
                                            <?php echo $row['email']; ?>
                                    </td>

                                    <td class=" col-sm-1 col-md-1 col-lg-2">
                                        <div class="col">

                                            <?php echo $row['user_level']  ?></div>
                                    </td>

                                    <td class=" col-sm-1 col-md-1 col-lg-1 ">
                                        <!-- <td> -->
                                   
                                        <input name="status" readonly class=" text-center " type="text"
                                        style="background-color:transparent;border:0; color: " value="<?php  if( $row['status']!="verified"){
                                                echo "Not Verified";}
                                                else{
                                                    echo "Verified";
                                            }; 
                                        ?>">

                                    </td>
                                    <td class="c-white text-nowrap text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#id<?php echo $row['id'];?>"
                                            type="button" class="btn btn-outline-danger">Archive</button>
                                    </td>

                                    <!-- Modal -->
                                    <div class="modal fade" id="id<?php echo $row['id'] ;?>" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="id<?php echo $row['id'] ;?>">
                                                        Confirmation:
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <label class="text-center mb-2 mx-auto">Enter Password
                                                        before delete
                                                        <span
                                                            class="fw-bold"><?php echo $row['first_name']; ?>!</span></label>
                                                    <input type="password" class="form-control" name="password"
                                                        placeholder="Password" aria-label="Password"
                                                        aria-describedby="addon-wrapping" required>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary"
                                                        name="delete_user">Submit</button>
                                                </div>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="id<?php echo $row['id'] ;?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="id<?php echo $row['id'] ;?>">
                                                                Confirmation:
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <label class="text-center mb-2 mx-auto">Enter
                                                                Password
                                                                before delete
                                                                <span
                                                                    class="fw-bold"><?php echo $row['first_name']; ?>!</span></label>
                                                            <input type="password" class="form-control" name="password"
                                                                placeholder="Password" aria-label="Password"
                                                                aria-describedby="addon-wrapping" required>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary"
                                                                name="delete_user">Submit</button>
                                                        </div>
                                                    </div>

                                </tr>
                            </form>
                            <?php } ?>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="id<?php echo $row['id'] ;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id<?php echo $row['id'] ;?>">
                        Confirmation:
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <label class="text-center mb-2 mx-auto">Enter Password
                        before delete
                        <span class="fw-bold"><?php echo $row['first_name']; ?>!</span></label>
                    <input type="password" class="form-control" name="password" placeholder="Password"
                        aria-label="Password" aria-describedby="addon-wrapping" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="delete_user">Submit</button>
                </div>
            </div>
        </div>
    </div>                             
</main>        
</body>

</html>
        
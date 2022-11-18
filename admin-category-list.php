<?php
    require_once "php/user-list-process.php";
    require('php/connection.php');

   //call all Category
  $queryslide = "SELECT * FROM admin_category"; //You don't need a ; like you do in SQL
  $resultslide = mysqli_query($db_admin_account, $queryslide);
?>

<html>
<head>
<meta charset="UTF-8">
<link rel="icon" href="asset/logopet.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Admin Category</title>
</head>

<body style="background:  #9FBACD;">

<div class="container-fluid">
        <div class="row flex-nowrap">
            <div class=" col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="/"
                        class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"><img
                            src="asset/logopet.png" alt="Saint Jude Logo"
                            style="width: 60px; height: 50px; padding-top: 5px; padding-right: 5px;">
                        <span class="fs-5 d-none d-sm-inline">PETCO. ADMIN</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        <li class="nav-item">
                            <a href="admin-dashboards.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li>
                        <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fs-4 bi-person-lines-fill"></i><span class="ms-1 d-none d-sm-inline">Accounts</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdown">
                            <li><a class="dropdown-item" href="#">Admin Accounts</a></li>
                            <li><a class="dropdown-item" href="admin-user-accounts.php">User Accounts</a></li>
                            <li><a class="dropdown-item" href="#">Employee Accounts</a></li>
                        </ul>
                    </li>
                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table"></i> <span class="ms-1 d-none d-sm-inline">Sales</span></a>
                        </li>
                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                                <i class="fs-4 bi-archive"></i> <span class="ms-1 d-none d-sm-inline">Pet
                                    Archives</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Pet
                                            Profile</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-0"> <span class="d-none d-sm-inline">Pet
                                            Owner</span></a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#submenu3" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-pencil-square"></i> <span
                                    class="ms-1 d-none d-sm-inline">Content</span> </a>
                            <ul class="collapse nav flex-column ms-1" id="submenu3" data-bs-parent="#menu">
                                <li class="w-100">
                                    <a href="admin-slider.php" class="nav-link px-0"> <span
                                            class="d-none d-sm-inline">Slider</span> </a>
                                </li>
                            </ul>
                        <li>
                            <a href="admin-view-orders.php" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-bag-check"></i> <span class="ms-1 d-none d-sm-inline">Orders</span>
                            </a>
                        </li>

                        
                       

                <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="asset/cha.jpg" alt="Admin" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Charlize</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="admin-login.php">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </div>
    <div class="col py-3">
        <h3>Category List</h3> 
        <p class="lead"> 
        <div class="w3-main" style="margin-left:200px">
            <div class="w3-black">
            <button class="w3-button w3-blue w3-xlarge w3-hide-large" onclick="w3_open()">&#9776;</button>
             <div class="w3-container">
                    <h1 class="text-center c-white py-3">Category List</h1>
                </div>
        </div>
    <!-- Button trigger modal -->
    <div>
    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        ADD
    </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"> New Category Name</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->

                <form action="php/category-list-process.php" method="post" class="row gap-2 justify-content-center">
                    <div class="modal-body">
                        <div class="card d-flex justify-content-center">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <label>Category Name:</label>
                                    <input class="col-12" name="title" type="text" placeholder="Enter Category Name"
                                        required>
                                </li>
                                <li class="list-group-item">
                                    <label>Category Details:</label>
                                    <input class="col-12" name="details" type="text"
                                        placeholder="Enter Category Details" required>
                                </li>
                                <!-- Modal footer -->

                            </ul>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" name="submit_category" class="btn btn-outline-success float-end"
                                style="max-width:450px;">Add</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>
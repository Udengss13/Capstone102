<?php
    require_once "php/admin-login-process.php";
    require('php/connection.php');

    $query = "SELECT * FROM admin_login WHERE username='petko'"; //You don't need a like you do in SQL;
    $result = mysqli_query($db_admin_account, $query);
    $fetch_user = $result->fetch_array();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|| Profile</title>
    <!-- MATERIAL CDN -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp"
      rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="./adminstyles.css">
</head>

<body>
    <div class="container">
        <aside>
            <div class="top">
             <div class="logo">
                <img src="asset/logopet.png">
                <h2>PETCo.<span class="danger">ADMIN</span></h2>
             </div>
             <div class="close" id="close-btn">
                <span class="material-icons-sharp">close</span>
             </div>
            </div>
            <div class="sidebar">
                <a href="#">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>
                </a>
                <a href="admin-user-accounts.php">
                    <span class="material-icons-sharp">person</span>
                    <h3>Accounts</h3>
                </a>
                <a href="admin-orders.php">
                    <span class="material-icons-sharp">receipt_long</span>
                    <h3>Orders</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">insights</span>
                    <h3>Analytics</h3>
                </a>     
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">26</span>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">inventory</span>
                    <h3>Products</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">report_gmailerrorred</span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">settings</span>
                    <h3>Settings</h3>
                </a>
                <a href="admin-content.php">
                    <span class="material-icons-sharp">add</span>
                    <h3>Add Content</h3>
                </a>
                <a href="admin-login.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>

            
     <div class="col py-3">
                <div class="row mt-4">
                    <div class="col">
                        <h2 class="text-justify py-3">My Profile</h2>
                        <img src="asset/cha.jpg" alt="Logo" style="width: 200px; padding-left: 5px; padding-top: 5px;">
                    </div>
                </div>
            </div>
            
            <div class="col-4 mt-3">
                    <a href="admin-edit-profile.php?updateid=<?php echo $fetch_user['id'];?>">
                        <span class="btn btn-primary ms-1">Edit Profile <i class="bi bi-pencil-square"></i></span>
                    </a>
                    
                    <a href="admin-edit-profile.php?updateid=<?php echo $fetch_user['id'];?>">
                        <span class="btn btn-success ms-1">Settings <i class="bi bi-gear"></i></span>
                    </a>

                    <div class="container mt-5">

        <div class="row">
            <div class="col ">
                    <div class="row">
                        <div class="col-sm-4 labels">
                            <p class="mb-0">User Name:</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="c-blue mb-0"><?php echo $fetch_user['username']; ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-4 labels">
                            <p class="mb-0">Password:</p>
                        </div>
                        <div class="col-sm-8">
                            <p class="c-blue mb-0"><?php echo $fetch_user['password']; ?></p>
                        </div>
                    </div>
            
 <!--DIVISION -->


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>

</html>                    
                    
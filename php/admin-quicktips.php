<?php
    require_once "php/user-list-process.php";
    require('php/connection.php');
    

    
    $queryimage = "SELECT * FROM admin_quicktips"; //You don't need a like you do in SQL;
    $resultimage = mysqli_query($db_admin_account, $queryimage);
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/color.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Admin || Content</title>
</head>

<body class="">
  <!--Navbar-->
 <!--Navbar-->
 <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
        <h3 class=""><img src="asset/logopet.png" alt="Petco Logo"
                style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white"
                href="#" style="padding-left: 15px;">PET CO.</a></h3>
        <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
            <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">

                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-orders.php">Order</a>
                </li>

                <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        Content</button>
                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="dropdown-item" href="admin-content.php">NEWS</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Normal</a></li>
                        <li><a class="dropdown-item" href="#">Active</a></li>
                        <li><a class="dropdown-item" href="#">Disabled</a></li>
                    </ul>
                </div>
                <li class="nav-item">
                    <a class="nav-link c-green  rounded" href="admin-category-list.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green  rounded" href="admin-menu.php">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link c-green rounded" href="admin-dashboard.php">User List</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link c-green" href="admin-login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

  <!--All Content for Image Here-->
  <div class=" px-3 mt-3 mb-3">
        <h4 class="text-center c-white py-3">Image Content for Home</h4>

        <form action="php/quicktips-image-process.php" method="post" enctype="multipart/form-data"
            class="row gap-2 justify-content-center">
            <div class="row justify-content-md-center mb-5">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="card d-flex justify-content-center">
                        <div class="card-header">
                            Upload New Image for Quicktips

                            <?php if(!empty($messages)){
	                              echo "<div class='alert alert-success'>";
	                                foreach ($messages as $message) {
		                              echo "<span class='glyphicon glyphicon-ok'></span>&nbsp;".$message."<br>";
	                                }
	                                 echo "</div>";
                                    }
                          ?>

                            <ul class="list-group list-group-flush">
                                
                        
                                <!--Body-->
                                <li class="list-group-item">
                                    <div> <label>Information:</label></div>
                                    <textarea name="info" style="height:150px;" required class="col-12"
                                        placeholder="Information"></textarea>
                                </li>
                                <!--Choose File-->
                                <li class="list-group-item">
                                    <input name="photo" class="" id="upload-news" type="file" required>
                                </li>

                                <li class="list-group-item">
                                    <!--Add button-->
                                    <button type="submit" name="upload_image_content"
                                        class="btn btn-outline-success float-end" style="max-width:450px;">Add</button>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
        </form>

        <!--Displaying data in table-->
        <div class="div_background_light">
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table mt-3">
                    <thead class="table-dark c-white">
                        <th>Image ID</th>
                        <th>Information</th>
                        <th>Delete</th>
                    </thead>
                    <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo $rowimage['id']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowimage['info']; ?></td>

                        <td class="c-red d-flex mt-1">

                            <a href="admin-edit-quicktips.php?updateid=<?php echo $rowimage['id'];?>">
                                <span class="btn btn-outline-success mx-2">Edit </span>
                            </a>

                            <a href="php/quicktips-image-process.php?id=<?php echo $rowimage['id'];?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete"></a>
                        </td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>



  

 


</body>
</html>


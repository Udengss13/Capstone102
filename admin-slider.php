<?php
require('php/connection.php');

$queryimage = "SELECT * FROM admin_carousel_homepage"; //You don't need a like you do in SQL;
$resultimage = mysqli_query($db_admin_account, $queryimage);

$msg='';
if(isset($_POST['upload'])){
  $image = $_FILES['image']['name'];
  $path ='asset/sliderimage/'.$image;

  $sql = $db_admin_account->query("INSERT INTO admin_carousel_homepage (image_path) VALUES ('$path')");

  if($sql){
    move_uploaded_file($_FILES['image']['tmp_name'], $path);
    $msg='Image Uploaded successfully';
  }
  else{
    $msg='Image Upload Failed';
  }
}

$result = $db_admin_account->query("SELECT image_path from admin_carousel_homepage");

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
<title>Admin || Slider</title>
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
                            <a href="admin-dashboards.php" class="nav-link align-middle px-0">
                                <i class="fs-4 bi-speedometer2"></i> <span
                                    class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="quicktips_content.php" class="nav-link align-middle px-0">
                                <i class="fs-4 	fa fa-file-video-o"></i> <span
                                    class="ms-1 d-none d-sm-inline">Quicktips</span>
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
                                <li><a class="dropdown-item" href="admin-content.php">Announcement</a></li>
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

    <!-- <h2 class="text-center text-light pb-4 ">Dynamic boostrap 5 caroussel using php and mysqli</h2> -->
    <div class="col py-3">
    <div class="container-fluid bg-transparent">
        <div class="row justify-content-center mb-5 ">
            <div class="col-lg-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php 
                      $i=0;
                      foreach($result as $row){
                        $actives ='';
                        if($i==0){
                          $actives= 'active';
                        }
                      
                      ?>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$i; ?>"
                            class="<?=$actives; ?>" aria-current="true" aria-label="Slide 1"></button>
                        <?php $i++;} ?>
                    </div>
                    <div class="carousel-inner">
                        <?php 
                      $i=0;
                      foreach($result as $row){
                        $actives ='';
                        if($i==0){
                          $actives= 'active';
                        }
                      
                      ?>
                        <div class="carousel-item <?= $actives; ?>">
                            <img src="<?= $row['image_path'] ?>" width="100%" height="400">
                        </div>

                        <?php $i++; } ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 bg-dark rounded px-4">
                <h4 class="text-center text-light p-1">select image for upload</h4>
               
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" name="image" class="form-control p-1 mb-3" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="upload" class="btn btn-warning btn-block  mb-3" value="Upload Image">
                    </div>
                    <div class="form-group">
                        <h5 class="text-center text-light"><?=$msg; ?></h5>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <!-- displaying Editin Slider Content  -->
   <!--Displaying data in table-->
   <div class="div_background_light">
            <div class="table-responsive mt-4 mx-auto" style="width:95%;">
                <table class="table mt-3">
                    <thead class="table-dark c-white">
                        <th>Image ID</th>
                        <th>Image Filename</th>
                        <th>Delete</th>
                    </thead>
                    <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
                    <tbody>
                        <td class="text-nowrap c-white"><?php echo $rowimage['id']; ?></td>
                        <td class="text-nowrap c-white"><?php echo $rowimage['image_path']; ?></td>

                        <td class="c-red d-flex mt-1">
                            <a href="php/admin-delete-carousel.php?id=<?php echo $rowimage['id'];?>"><input
                                    type="button" class="btn btn-outline-danger" value="Delete"></a>
                        </td>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>
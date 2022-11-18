<?php
    require('php/connection.php');

    session_start();
    //This is for message alert
  if(isset($_SESSION['update_changes'])){
      $applychanges = $_SESSION['update_changes'];
      unset($_SESSION['update_changes']);
  }
  else{
      $applychanges="";
  }
    
   //call all slideshow
  $queryslide = "SELECT * FROM admin_category"; //You don't need a ; like you do in SQL
  $resultslide = mysqli_query($db_admin_account, $queryslide);

  if(isset($_GET['updateid'])){ //Get['updateid'] is called on admin-category-list ex. admin-edit-category?updateid
    $category_id = $_GET['updateid'];

    $query = "SELECT * FROM admin_category WHERE category_id = $category_id";
    $result = mysqli_query($db_admin_account, $query);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

    if(empty($row['Menu_dir'])){
      $menudir = "asset/menu/default.jpg";
    }
    else{
      $menudir = "asset/menu/". $row['Menu_dir'];
    }
}
  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/color.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Admin || Edit Category Name</title>
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src=" asset/logopet.png" alt="PETCO" style="width: 50px; padding-left: 10px; padding-top: 5px;">
      <a class="navbar-brand fw-bold c-white" href="#" style="padding-left: 15px;">PET CO.</a>
    </h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
      <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">
        <li class="nav-item">
        <a href="#" class="btn1"><i class="fa fa-home"></i> Dashboard</a>
            
            <div class="dropdown">     
            <button class="btn1"><i class="fa fa-bars"></i> Content</button>
                     <div class="dropdown-content">
                    <a href="admin-content.php">Announcement and Promos</a>
                    <a href="admin-quicktips.php">Quicktips</a>
                    <a href="admin-slider.php">Slider</a>
             </div>
        </div>
                    
         
             <a href="admin-category-list.php" class="btn1"><i class="fa fa-archive"></i> Category</a>
         
             <a href="admin-dashboard.php" class="btn1"><i class="fa fa-folder"></i> User List</a>
                
             <a href="admin-login.php" class="btn1"><i class="fa fa-close"></i> Log-out</a>

            <div class="social_media">
                <a href="https://www.facebook.com/"><img src="asset/facebook.png" width="35px"
                                height="40px"></a>
                <a href="https://www.instagram.com//"><img src="asset/instagram.png" width="35px"
                                height="40px"></a>
                <a href="https://www.messenger.com/"><img src="asset/messenger.png" width="35px"
                                height="40px"></a>
         
                
            </ul>
        </div>
  <!--Content of Categories-->
  <div class="container mt-5">
    <div class="div_background_light px-3">
      <h4 class="text-center c-white py-3">- Edit Category -</h4>

      <form action="php/edit-category-process.php" method="post" class="row gap-2 justify-content-center mb-5">
        <div class="row justify-content-md-center mb-5">
          <div class="col-lg-7 col-md-6 col-sm-12">
            <div class="card d-flex justify-content-center">
              <div class="card-header">
                Edit Category Name

                <!--Success Message-->
                <?php if($applychanges!=""){?>
                <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert"
                  style="width: 90%;">
                  <strong>Apply Changes Successfully!</strong> <?php echo $applychanges; ?>.
                </div>
                <?php } ?>

              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <label>Enter new name of Category</label>
                  <input class=" col-9" name="categoryid" type="text" value=<?php echo $row['category_id'] ?> hidden>
                  <input class=" col-12" name="title" type="text" value="<?php echo $row['category_name'];   ?>"
                    required>
                </li>
                <li class="list-group-item">
                  <label>Enter new details of Category</label>
                  <input class=" col-12" name="details" type="text" value="<?php echo $row['category_details'];   ?>"
                    required>
                </li>
                <li class="list-group-item">
                  <!--Back-->
                  <a href="admin-category-list.php"><span class="btn btn-outline-danger mx-2 float-end">Back</span></a>

                  <!--Update button-->
                  <button type="submit" name="update_category_name" class="btn btn-outline-success  float-end"
                    style="max-width:150px;">Update</button>
                </li>
              </ul>

            </div>
          </div>
        </div>







      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script src="/js/script.js"></script>
</body>

</html>
<?php
    
    require('php/connection.php');

    session_start();
    //This is for message
      if(isset($_SESSION['update_changes'])){
          $applychanges = $_SESSION['update_changes'];
          unset($_SESSION['update_changes']);
      }
      else{
          $applychanges="";
      }
  
  
    
    $queryimage = "SELECT * FROM admin_quicktips"; //You don't need a like you do in SQL;
    $resultimage = mysqli_query($db_admin_account, $queryimage);


    if (isset($_GET['updateid'])){
      $id = $_GET['updateid'];

      $queryimageEdit = "SELECT * FROM admin_quicktips WHERE id = '$id'";
      $resultimageEdit = mysqli_query($db_admin_account, $queryimageEdit);
      $rowimageEdit = mysqli_fetch_array($resultimageEdit, MYSQLI_ASSOC);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/colour.css">
  <link rel="stylesheet" href="css/gallery.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Admin Content</title>
</head>

<body class="">
  <!--Navbar-->
  <nav class="navbar navbar-expand-lg nav_color navbar-dark nav_outline">
    <h3 class=""><img src="asset/logo.png" alt="Saint Jude Logo"
        style="width: 50px; padding-left: 10px; padding-top: 5px;"><a class="navbar-brand fw-bold c-white" href="#"
        style="padding-left: 15px;">PET CO.</a></h3>
    <button style="margin-right: 20px;" class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end col-6" style="padding-right: 20px;" id="navbarNav">
      <ul class="navbar-nav text-center gap-3" style="padding-left: 10px;">

        <li class="nav-item">
          <a class="nav-link c-white bg_nav_menu rounded" href="#">Content</a>
        </li>
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

  <!--All Content Here-->
  <div class="div_background_dark px-3">
    <h4 class="text-center c-white py-3">Edit Information Content for Home </h4>

    <form action="php/quicktips-image-edit-process.php" method="post" enctype="multipart/form-data"
      class="row gap-2 justify-content-center">
      <div class="row justify-content-md-center mb-5">
        <div class="col-lg-7 col-md-6 col-sm-12">
          <div class="card d-flex justify-content-center">
            <div class="card-header">
              Edit Information for Homepage
            </div>
            <!--Success Message-->
            <?php if($applychanges!=""){?>
            <div class="alert alert-primary alert-dismissible fade show mt-3 mx-auto" role="alert" style="width: 90%;">
              <strong>Apply Changes Successfully!</strong> <?php echo $applychanges; ?>.
            </div>
            <?php } ?>
            <ul class="list-group list-group-flush">
              <!--Title-->
              <li class="list-group-item">
                <input name="id" class="col-12" type="text"
                  value="<?php echo $rowimageEdit['id'];    ?>" hidden>
            
                  </li>
              <!--Body-->
              <li class="list-group-item">
                <div> <label>Information</label></div>
                <textarea name="info" style="height:150px;" required
                  class="col-12"><?php echo $rowimageEdit['info']  ?></textarea>
              </li>
              <!--Choose File-->
              <li class="list-group-item">
                <input name="photo" class="" id="upload-news" type="file" required>
              </li>


              <li class="list-group-item">
                <!--Back-->
                <a href="admin-quicktips.php"><span class="btn btn-outline-danger mx-2 float-end">Back</span></a>

                <!--Add button-->
                <button type="submit" name="update_image_content" class="btn btn-outline-success float-end"
                  style="max-width:450px;">Update</button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script src="/js/script.js"></script>
</body>

</html>
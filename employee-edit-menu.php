<?php
session_start();
  //This is for message
    if(isset($_SESSION['update_changes'])){
        $applychanges = $_SESSION['update_changes'];
        unset($_SESSION['update_changes']);
    }
    else{
        $applychanges="";
    }

    require('php/connection.php');
    
     //call all Category
  $querycategory = "SELECT * FROM admin_category"; //You don't need a ; like you do in SQL
  $resultcategory = mysqli_query($db_admin_account, $querycategory);
    
  //call all Menu
  $querymenu = "SELECT * FROM admin_menu"; //You don't need a ; like you do in SQL
  $resultmenu = mysqli_query($con, $querymenu);

  if(isset($_GET['editid'])){
      $menu_id = $_GET['editid'];

      $query = "SELECT * FROM admin_menu WHERE Menu_id = $menu_id";
      $result = mysqli_query($con, $query);
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
  <title> Update Products</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/color.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Document</title>
</head>

  <body class="">
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light ; ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="asset/logopet.png" alt="Logo" class="logo" />
                <span style="text-shadow: 2px 2px 2px  rgba(49, 44, 44, 0.767);" class="text-white"><b>PETCO. ANIMAL
                        CLINIC</b></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse me-3" id="navbarScroll">
            <ul class="navbar-nav me-auto my-0 my-lg-0 " style="--bs-scroll-height: 100px;">
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white bg-primary " style="border-radius:10px;" aria-current="page"
                            href="index.php">HOME</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="shop.php">Products</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="appointments.php">Appointments</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="messages.php">Messages</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">

                        <a class="nav-link text-white" href="employee-dashboard.php">My Profile</a>

                    </li>
                </div>
                <!-- <div class=" text-white">
         <?php echo  date("m/d/y") . "<br>"; ?>
       </div> -->
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="employee.php">Log-out</a>
                    </li>
                </div>


            </ul>
        </div>
    </nav>

  <div class="container-xl-fluid mt-5 mb-5">
    
      <h4 class="text-center c-white py-3">- Edit Menu -</h4>
      <!--Success Message-->
      <?php if($applychanges!=""){?>
      <div class="alert alert-primary alert-dismissible fade show mt-2 mx-auto" role="alert" style="width: 90%;">
        <strong>Apply Changes Successfully!</strong> <?php echo $applychanges; ?>.
      </div>
      <?php } ?>

      <!--Card-->

      <div class="row justify-content-md-center">
        <div class="col-lg-7 col-md-6 col-sm-12 mb-5">

          <form action="php/edit-menu-process.php" method="post" enctype="multipart/form-data"
            class="row gap-2 justify-content-center">
            <div class="justify-content-center">
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
              <div class="card-header">
                Update Products
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <label>Menu Name:</label>
                  <input class="col-4 mb-3" name="menuid" type="text" value="<?php echo $row['Menu_id']; ?>" hidden>
                  <input name="title" class="col-12" type="text" required value="<?php echo $row['Menu_name']; ?>">
                </li>
                <li class=" list-group-item">
                  <label>Menu Description:</label>
                  <textarea name="paragraph" style="height:100px;" required
                    class="col-12"><?php echo $row['Menu_description']; ?></textarea>
                </li>
                <li class="list-group-item">
                  <label>Price:</label>
                  <input name="price" class="col-md-5" type="number" required value="<?php echo $row['Menu_price']; ?>"
                    min="0" step="0.01">
                </li>
                <li class="list-group-item">
                  <label>Category:</label>

                  <div class="input-group flex-nowrap">
                    <select class="form-select form-select-md" name="category_name" required>
                      <option value="">Select Category</option>
                      <?php while($rowcategory =  mysqli_fetch_array($resultcategory)){ ?>
                      <option value=" <?php echo $rowcategory['category_name']; ?>">
                        <?php echo $rowcategory['category_name']; ?>
                      </option>
                      <?php } ?>
                    </select>

                  </div>
                  

                </li>

                <li class="list-group-item">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="upload-news" name="photo" required >
                  </div>
                  <!-- <input name="photo" class="col-md-6 c-white" id="upload-news" type="file" required> -->
                </li>
                
                <li class="list-group-item">
                  <a href="employee-menu.php" class="float-end mx-2"><span class="btn btn-outline-danger">Back</span></a>

                  <button type="submit" name="update_changes" class="btn btn-outline-success float-end"
                    style="max-width:450px;">Update</button>

                </li>
              </ul>
            </div>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
  </script>
  <script src="/js/script.js"></script>
</body>

</html>
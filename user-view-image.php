<?php 
    require("php/connection.php");
    require_once "controllerUserData.php"; 

      $user_id = $_SESSION['user_id'];

      if(!isset($user_id)){
        header('location: login-user.php');
      }
        $id = $_GET['id'];
        //call all news and announcement
        $queryimage = "SELECT * FROM admin_content_homepage WHERE Image_id = $id "; //You don't need a ; like you do in SQL
        $resultimage = mysqli_query($db_admin_account, $queryimage);
        

?>

      

<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <title>PetCo Homepage</title>
        <link rel="icon" href="asset/logopet.png" type="image/x-icon">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/styles.css">

    </head>

<body>
    <!--navbar-->
<!--Navigation Bar-->
<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="asset/logopet.png" alt="Logo" style="width:22%; height:8vh" />
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

                        <a class="nav-link bg-primary text-white mt-2" aria-current="page" href="home.php">HOME</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white mt-2" href="product.php">SHOP</a>
                    </li>
                </div>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <a href="userprofile.php" class="nav-link text-white"><img src=" asset/picon.png" alt="PETCO"
                                style="width: 40px;"></a>
                    </li>
                </div>

                <?php 
                    $select_rows = mysqli_query($con,"SELECT * FROM `cart` WHERE Cart_user_id = '$user_id'") or die ('query failed');
                    $row_count = mysqli_num_rows($select_rows);
                  ?>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="cart.php"><img src=" asset/cart.png" alt="PETCO"
                                style="width: 40px;"><span
                                class="badge badge-light mx-1 bg-light text-dark"><?php echo $row_count ?></span></a>

                    </li>
                </div>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link  text-white mt-2" href="logout-user.php"
                            onclick="return confirm('Are you sure do you want to logout?')">LOGOUT</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>



    <section id="#home">
        <div class="container mt-4">
            <div class="row ">
                <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
                <div class="col-12  justify-content-center  mt-4">
                    <img class="img-responsive"src="asset/homepage/<?php echo $rowimage['Image_filename']; ?>"
                        width="100%" height="500px">
                        <div class="news-body img-body mt-4 p-3">
                    <!--Name-->
                    <h1 class="text-center c-green display-8 " style="color: ;">
                        <?php echo $rowimage['Image_title']; ?></h1>
                    <!--Price-->
                    <p class="text-center text-muted pb-4" style="font-size:20px">
                        <?php echo $rowimage['Image_subtitle']; ?>
                    </p>
                   
                        <!-- <label>Information:</label> -->
                        <p class="c-white  m-5 " style="font-size: 20px; text-align: justify;"><?php echo $rowimage['Image_body']; ?></p>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
   




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

    </script>

</body>

</html>
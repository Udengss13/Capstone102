<?php 
    require_once "controllerUserData.php"; 
    require("php/connection.php");
    
        $id = $_GET['id'];

        //call all Menu's
        $querymenu = "SELECT * FROM admin_menu WHERE Menu_id = $id"; //You don't need a ; like you do in SQL
        $resultimage = mysqli_query($con, $querymenu);

        $user_id = $_SESSION['user_id'];

        if(isset($_GET['back'])){
          $filtervalues = $_GET['back']; 
          $querysearchmenu = "SELECT * FROM admin_menu WHERE CONCAT(Menu_name, Menu_price, Menu_category,Menu_filename) LIKE '%$filtervalues%'"; //You dont need like you do in SQL;
          $resultsearchmenu = mysqli_query($con, $querysearchmenu);
        }
      

?>
<!-- <?php 
  
  if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price']; 
    $product_image = $_POST['product_image']; 
    $product_quantity = 1;

    $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE Cart_name = '$product_name' AND Cart_user_id = '$user_id'");

    if(mysqli_num_rows($select_cart) > 0){
        $message[] = "Product is already added to your cart!" ;
    }else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(Cart_user_id, Cart_name, Cart_price, Cart_image, Cart_quantity) 
      VALUES ('$user_id','$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = "Product successfully add to cart!" ;
    }
  }
?> -->
<?php 
  if(isset($message)){
    foreach($message as $message){
     echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="Myid">'
    .$message.
     '<button type="button" class="btn-close" aria-label="Close" onclick="toggleText()"></button></div>';
     echo '<script>
     function toggleText(){
       var x = document.getElementById("Myid");
       if (x.style.display === "none") {
         x.style.display = "block";
       } else {
         x.style.display = "none";
       }
     }
     </script>';

}
}
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    </head>

<body>

   <!--Navigation Bar-->
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

                        <a class="nav-link  text-white mt-3" aria-current="page" href="home.php">HOME</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white mt-3" href="#about">ABOUT US</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link text-white dropdown-toggle mt-3" href="#" id="dropdownMenuLink"
                                data-bs-toggle="dropdown" aria-expanded="false">SERVICES</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Vaccination</a></li>
                                <li><a class="dropdown-item" href="#">Confinement</a></li>
                                <li><a class="dropdown-item" href="#">Pet Supplies</a></li>
                                <li><a class="dropdown-item" href="#">Consultation</a></li>
                                <li><a class="dropdown-item" href="#">Surgery</a></li>
                                <li><a class="dropdown-item" href="#">Treatment</a></li>
                                <li><a class="dropdown-item" href="#">Deworming</a></li>
                                <li><a class="dropdown-item" href="#">Grooming</a></li>
                                <li><a class="dropdown-item" href="#">Laboratory Tests</a></li>

                            </ul>

                        </div>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white mt-3 bg-primary" href="product.php">SHOP</a>
                    </li>
                </div>

                <!-- <div class="text-nowrap">
                    <li class="nav-item">
                        <a href="userprofile.php" class="nav-link text-white"><img src=" asset/picon.png" alt="PETCO"
                                style="width: 40px;"></a>
                    </li>
                </div> -->

                <?php 
                    $select_rows = mysqli_query($con,"SELECT * FROM `cart` WHERE Cart_user_id = '$user_id'") or die ('query failed');
                    $row_count = mysqli_num_rows($select_rows);
                  ?>
                <div class="text-nowrap">
                    <li class="nav-item mt-3">

                        <a class="nav-link text-white" href="#imagesec">PET GALLERY</a>

                    </li>
                </div>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white mt-3" href="cart.php">CART<span
                                class="badge badge-light mx-1 bg-light text-dark"><?php echo $row_count ?></span></a>

                    </li>
                </div>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <?php 
                            $select_user = mysqli_query($con, "SELECT * FROM usertable WHERE id = '$user_id'");
                            if(mysqli_num_rows($select_user) > 0){
                            $fetch_user = mysqli_fetch_assoc($select_user); 
                            };
                        ?>
                        <!-- <p class="nav-link text-white">
                            <?php echo $fetch_user['first_name']." ". $fetch_user['last_name']; ?></p> -->
                    </li>
                </div>
                <div class="dropdown mb-2 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1 ">

                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                        id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="asset/profiles/<?php echo $fetch_user['image_filename']?>" alt="user"
                            style=" margin-left: 10px" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-2"><?php echo $fetch_user['first_name']?></span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="#">yes</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="userprofile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="logout-user.php"
                                onclick="return confirm('Are you sure do you want to sign out?')">Sign out</a></li>
                    </ul>
                </div>
                <!-- <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link  text-white mt-2" href="logout-user.php"
                            onclick="return confirm('Are you sure do you want to logout?')">LOGOUT</a>
                    </li>
                </div> -->
            </ul>
        </div>
    </nav>


    <div class="float-left col-2">
        <a href="product.php" class=" btn    w-100"><span class="text fw-bold" style="color:#034D73"><i
                    class="bi bi-arrow-left"> </i>Continue
                Shopping</span></a>
    </div>

    <section id="#home">
        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
                    <form action="product.php" method="post">
                        <div class=" col-12 d-flex justify-content-center ">
                            <img class="img-responsive" src="asset/menu/<?php echo $rowimage['Menu_filename']; ?>"
                            width="400vh" >
                        </div>
                </div>

                <div class="col-6">

                    <div class="news-headings">
                        <!-- <div class="row">
                                <div class="col-md-12"> -->
                        <!--Name-->
                        <h1 class=" c-blue display-6 ">
                            <?php echo $rowimage['Menu_name']; ?></h1>
                        <!--Price-->
                        <p class=" text-light " style="font-size:20px">Php
                            <?php echo $rowimage['Menu_price']; ?>
                        </p>
                        <!--Price-->
                        <!-- <p class="text-muted " style="font-size:20px">Category
                            ( <?php echo $rowimage['Menu_category']; ?> )
                        </p> -->

                        <!-- </div>
                        </div> -->

                        <td>
                            <!--hidden inputs-->
                            <input type="hidden" name="product_id" value="<?php echo $rowimage['Menu_id'] ?>">
                            <input type="hidden" name="product_name" value="<?php echo $rowimage['Menu_name'] ?>">
                            <input type="hidden" name="product_price" value="<?php echo $rowimage['Menu_price'] ?>">
                            <input type="hidden" name="product_description"
                                value="<?php echo $rowimage['Menu_description'] ?>">
                            <input type="hidden" name="product_image" value="<?php echo $rowimage['Menu_filename'] ?>">
                        </td>

                        <div class="container">
                            <div class="news-body">

                                <p class="c-white mb-5 " style="font-size: 20px">
                                    <?php echo $rowimage['Menu_description']; ?></p>
                            </div>
                            <input type="submit" name="add_to_cart" value="Add to Cart"
                                class="btn btn-danger bg-button text w-50">

                        </div>
                    </div>
                    </form>

                    <?php } ?>
                </div>
            </div>
    </section>

    </div>




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

    </script>

</body>

</html>
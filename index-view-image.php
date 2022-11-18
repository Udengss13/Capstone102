<?php 
    require("php/connection.php");
    
        $id = $_GET['id'];
        //call all news and announcement
        $queryimage = "SELECT * FROM admin_content_homepage WHERE Image_id = $id"; //You don't need a ; like you do in SQL
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
                        <a class="nav-link text-white" href="aboutUs.php">ABOUT US</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="services.php">SERVICES</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="shop.php">SHOP</a>
                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">

                        <a class="nav-link text-white" href="#imagesec">PET GALLERY</a>

                    </li>
                </div>
                <!-- <div class=" text-white">
         <?php echo  date("m/d/y") . "<br>"; ?>
       </div> -->
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="login-user.php">SIGN IN</a>
                    </li>
                </div>

                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="signup-user.php">SIGN UP</a>
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

    <!-- </div> -->




    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

    </script>

</body>

</html>
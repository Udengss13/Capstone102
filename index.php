<?php
  require('php/connection.php');
  require_once "controllerUserData.php"; 
  
  $start_from = 0; 
  $queryimage = "SELECT * FROM admin_content_homepage ORDER BY `admin_content_homepage`.`Image_id` DESC"; //You dont need like you do in SQL;
  $resultimage = mysqli_query($db_admin_account, $queryimage);

  $result = $db_admin_account->query("SELECT image_path from admin_carousel_homepage");
  ?>

<?php
  $quicktipsquery = "SELECT * FROM admin_quicktips"; //You dont need like you do in SQL;
  $quicktipsresult = mysqli_query($db_admin_account, $quicktipsquery);
  ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>PetCo Homepage</title>

    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta https-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/f8f3c8a43b.js" crossorigin="anonymous"></script>

    <!-- slider -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">


</head>

<body>
    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light ">
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
                        <div class="dropdown">
                            <a class="nav-link text-white dropdown-toggle" href="#" id="dropdownMenuLink"
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

                        <a class="nav-link text-white" href="#imagesec">PET GALLERY</a>

                    </li>
                </div>
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#about">ABOUT US</a>
                    </li>
                </div>




                <!-- <div class=" text-white">
         <?php echo  date("m/d/y") . "<br>"; ?>
       </div> -->
                <!--
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
-->
        </div>
    </nav>

    <div class="container-fluid  ">
        <div class="waveWrapper waveAnimation  ">
            <div class="waveWrapperInner top  mt-4 ">
                <div class="wave waveTop  mt-4" style="background-image: url(asset/wave-top.png); "></div>
            </div>
            <div class="waveWrapperInner mid">
                <div class="wave waveMid  mt-4" style="background-image: url(asset/wave-mid.png); "></div>
            </div>
            <div class="waveWrapperInner bottom">
                <div class="wave waveBottom  mt-4" style="background-image: url(asset/wave-bot.png); "></div>
            </div>
        </div>
    </div>


    <div class="container Box  mb-5">
        <div class="row">
            <div class=" col-lg-3">
                <img src="asset/shitzu.png" alt="DOG" class="dog" height="500px" />
            </div>
            <div class="col-md-4 col-lg-4 col-sm- 2 mt-5 text-light text" style="margin-left: 50px; ">
                <br>

                <h3 class="text-center">WELCOME</h3>
                <h4 class="text-center">To keep connected with us</h4>
                <h4 class="text-center">Please log-in you personal info</h4>
            </div>
            <div class="col-md-7 col-lg-4 col-sm-4 mt-5 form login-form">
                <form action="login-user.php" method="POST" autocomplete="">
                    <h1 class="text-center  mt-3 text-primary">Sign In</h1>

                    <?php
                        if(count($errors) > 0)
                        {
                            ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror)
                            {
                                echo $showerror;
                            }
                             ?>
                    </div>
                    <?php
                        }
                        ?>
                    <div class="form-group">
                        <input class="form-control mb-3" type="email" name="email" placeholder="Email Address" required
                            value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control mb-3" type="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="link forget-pass text-end text-center"><a href="forgot-password.php">Forgot
                            password?</a>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Sign In">
                    </div>
                    <div class="link login-link text-center mb-1 mt-3">Don't have an account? <a
                            href="signup-user.php">Sign up
                            now</a></div>
                </form>

            </div>




        </div>
    </div>







    <!-- SLIDER Images -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

        <!-- Indicators/dots -->
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
                    <img src="<?= $row['image_path'] ?>" class="img-fluid mt-5" width="100%" height="500px">
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


    <!--QUICKTIPS--> 
    <section class="flex-sect" id="imagesec">
        <section id="imagesection" class="div_background_light py-4">
            <div class="container-fluid px-5">
                <div class="col-lg-12 col-md-12">
                <div style="width: 100%; height: 30px; border-bottom: 2px solid white; text-align: center">
                            <span style="font-size: 40px; background-color:#9FBACD; color: white">
                                QUICKTIPS
                                <!--Padding is optional-->
                            </span>
                        </div>
                    <div class="row mt-5">
                        
                        <?php
                         $querymenu = "SELECT * FROM quicktips"; 
                         $resultmenu = mysqli_query($con, $querymenu);  
                         while($rowmenu =  mysqli_fetch_array($resultmenu)){
                            $str = $rowmenu['link'];
                            $code = explode("?v=",$str);
                        ?>
                        <div class="col-md-6">
                        <iframe width="100%" height="500" src="https://www.youtube.com/embed/<?php echo $code[1]; ?>"></iframe>
                        </div>
                        
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <!-- About us -->
    <section class="flex-sect" id="about" style="background-color:#9FBACD;">>
        <section id="imagesection" class="div_background_light py-4">
            <div class="container-fluid px-5">
                <div class="col-lg-12 col-md-12">
                    <div class="justify-content-center row col-md-12 rounded-3">
                        <div style="width: 100%; height: 30px; border-bottom: 2px solid white; text-align: center">
                            <span style="font-size: 40px; background-color:#9FBACD; color: white">
                                ABOUT US
                                <!--Padding is optional-->
                            </span>
                        </div>
                        <div class="row box" style="height:300px;">
                            <h4 style="color: white">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                when an unknown printer took a galley of type and scrambled it to make a type specimen
                                book. It has survived not only five centuries, but also the leap into electronic
                                typesetting, remaining essentially unchanged. It was popularised in the 1960s with the
                                release of Letraset sheets containing Lorem Ipsum passages, and more recently with
                                desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</h4>
                        </div>

                        <!--ANNOUNCEMENT-->
                        <section class="flex-sect" id="imagesec">
                            <section id="imagesection" class="div_background_light py-4">
                                <div class="container-fluid px-5 mt-3">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="justify-content-center row col-md-12 rounded-3">
                                            <h3 class="col-12  text-center fw-bolder"
                                                style="text-shadow: 3px 1px 3px  lightblue; color: rgb(13, 13, 103)">
                                                ANNOUNCEMENT</h3>
                                            <hr>

                                            <!--Pictures-->

                                            <?php while($rowimage = mysqli_fetch_array($resultimage)) {?>

                                            <div class="col-lg-3 col-xs-1 col-sm-5 card mx-3 my-4"
                                                style="height:350px;">


                                                <img src="asset/homepage/<?php echo $rowimage['Image_filename'] ?>"
                                                    class="card-img-top pt-3 img-responsive "
                                                    style="height:200px; width:100%;">
                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="card-title text-center">
                                                        <?php echo $rowimage['Image_title'] ?></h5>
                                                    <!-- <h6 class="card-text text-center text-muted">
                                    <?php echo $rowimage['Image_subtitle'] ?>
                                </h6>
                                <p class="card-text d-inline-block text-truncate">
                                    <?php echo $rowimage['Image_body'];?>
                                </p> -->
                                                    <div class="mb-4">
                                                        <a href="index-view-image.php?id=<?php echo $rowimage['Image_id'] ?>"
                                                            class=" btn btn-success w-100">View Details</a>
                                                    </div>

                                                </div>
                                            </div>

                                            <?php }?>


                                        </div>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>


        </section>
    </section>
    <footer class=" footer-banner" id="about">
        <div class="container text">
            <div class="row">
                <div class="col-13 text-center">
                    <ul class="follow" style="color: white;">
                        <h3>Please follow us</h3>

                        <a href="https://www.facebook.com/"><img src="asset/facebook.png" width="40px"
                                height="40px"></a>
                        <a href="https://www.instagram.com//"><img src="asset/instagram.png" width="40px"
                                height="40px"></a>
                        <a href="https://www.messenger.com/"><img src="asset/messenger.png" width="40px"
                                height="40px"></a>
                    </ul>
                    <h5>© 2022 All Rights Reserved. PetCo. Animal Clinic.</h5>
                </div>


    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
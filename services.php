<?php
  require('php/connection.php');
  
  $start_from = 0; 
  $queryimage = "SELECT * FROM admin_content_homepage"; //You dont need like you do in SQL;
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
    <title>Services</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- slider -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="css/services.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');

    /* .nav-item {
        margin-left: 3px
    }

    .nav-item:hover {
        background-color: rgb(23, 171, 201);
        border-radius: ;

    }

    .tips {
        font-family: 'Poppins';
        font-size: 22px;
        font-size: 30px;
        font-style: bold;
        color: Blue;
    } */
    </style>
</head>

<body>
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

    <!--SERVICES-->
                  <div style="width: 100%; height: 30px; border-bottom: 2px solid white; text-align: center">
                      <span style="font-size: 40px; background-color:#9FBACD; color: white">
                             SERVICES
                                <!--Padding is optional-->
                            </span>
                        </div>  


                        


                    </div>
                </div>
            </div>
        </section>
    </section> 
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
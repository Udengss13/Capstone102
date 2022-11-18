<!DOCTYPE html>
<html>
<title>PetCo Gallery</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" type="text/css" href="css/styles.css"> -->

<body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-light ; border-bottom border-secondary" style="background: #1572A1;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="asset/logopet.png" alt="Logo" style="width:19%; height:8vh" /><span
                    style="text-shadow: 3px 3px 3px  black" class="mx-2 text-info fw-bold">PETKO.</span>
                <span style="border-left: 3px solid rgba(5, 13, 98, 0.767); margin-right: 3px;padding: 3px;"> </span>
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
                        <a class="nav-link active text-white" style="border-radius:10px; margin-left:3px;"
                            aria-current="page" href="index.php">HOME</a>
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
                        <a class="nav-link text-white" href="petgallery.php">PET GALLERY</a>
                    </li>
                </div>
                <!-- <div class=" text-white">
          <?php echo  date("m/d/y") . "<br>"; ?>
        </div> -->
                <div class="text-nowrap">
                    <li class="nav-item">
                        <a class="nav-link  text-white" href="login-user.php">SIGN IN</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>

    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>
</html>

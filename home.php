<?php 
  require('layouts/header_employee.php');
// require_once "controllerUserData.php"; 
   
   
      $user_id = $_SESSION['user_id'];

      if(!isset($user_id)){
        header('location: login-user.php');
      }

      $start_from = 0; 
        $queryimage = "SELECT * FROM admin_content_homepage"; //You dont need like you do in SQL;
        $resultimage = mysqli_query($db_admin_account, $queryimage);


      $result = $db_admin_account->query("SELECT image_path from admin_carousel_homepage");
?>

<?php
  $quicktipsquery = "SELECT * FROM `admin_quicktips`"; //You dont need like you do in SQL;
  $quicktipsresult = mysqli_query($db_admin_account, $quicktipsquery);

  $queryservice = "SELECT * FROM `service`"; //You don't need a ; like you do in SQL
  $resultservices = mysqli_query($con, $queryservice);
?>





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
                <img src="<?= $row['image_path'] ?>" class="img-fluid" width="100%" height="500px">
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
                        <iframe width="100%" height="500"
                            src="https://www.youtube.com/embed/<?php echo $code[1]; ?>"></iframe>
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
            <div style="width: 100%; height: 30px; border-bottom: 2px solid white; text-align: center">


                <span style="font-size: 40px; background-color:#9FBACD; color: white">
                    ABOUT US
                    <!--Padding is optional-->
                </span>
            </div>
            <div class="col-lg-12 col-md-12">
                <br><br>


                <div class="row box" style="height:300px;">

                    <h4 style="font-size:1.7vw; color: white;  background: rgba(128, 128, 128, 0.395);">PetCo. Animal
                        Clinic was established in June 2021, and they started offering services in their Grand Opening
                        last July 3, 2021.
                        Mr. Karl Ken Sto owned it. Domingo. It started with just an Idea of having a Pet Shop because he
                        has a friend who is a Veterinarian, and he’s the one injecting Mr. Sto. Domingo’s pets. He also
                        sees that some people around their area have to go too far to find an accessible Pet Clinic,
                        and that is where they started building the PetCo. Their intention to provide an accessible Pet
                        Clinic around their area is why their ideas turned into a Clinic that offers many pet services.
                        The PetCo. Animal Clinic is currently residing at 389 Parada, Sta. Maria, Bulacan, their main
                        branch.
                        PetCo. Animal Clinic specializes in Vaccination, Consultation, Confinement, Surgery, Pet
                        Supplies, etc., for cats and dogs only.</h4>
                </div>
            </div>

            <!--ANNOUNCEMENT-->
            <section class="flex-sect" id="imagesec">
                <section id="imagesection" class="div_background_light py-4">
                    <div class="container-fluid px-5 mt-3">
                        <div class="col-lg-12 col-md-12">
                            <div class="justify-content-center row col-md-12 rounded-3">
                                <div
                                    style="width: 100%; height: 30px; border-bottom: 2px solid white; text-align: center">


                                    <span style="font-size: 40px; background-color:#9FBACD; color: white">
                                        ANNOUNCEMENT
                                        <!--Padding is optional-->
                                    </span>
                                </div>

                                <!--Pictures-->

                                <?php while($rowimage = mysqli_fetch_array($resultimage)) {?>

                                <div class="col-lg-3 col-xs-1 col-sm-5 card mx-3 my-4" style="height:350px;">


                                    <img src="asset/homepage/<?php echo $rowimage['Image_filename'] ?>"
                                        class="card-img-top pt-3 img-responsive " style="height:200px; width:100%;">
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
                                            <a href="user-view-image.php?id=<?php echo $rowimage['Image_id'] ?>"
                                                class=" btn btn-success w-100">View Details</a>
                                        </div>

                                    </div>
                                </div>

                                <?php }?>


                            </div>
                        </div>
                    </div>
                </section>
            </section>

            <!--Footer-->
            <footer class="footer-banner" id="about">
                <div class="container text">
                    <div class="row">
                        <div class="col-12 text-center">
                            <ul class="follow">
                                <h3>Please follow us</h3>

                                <a href="https://www.facebook.com/"><img src="asset/facebook.png" width="50px"
                                        height="40px"></a>
                                <a href="https://www.instagram.com//"><img src="asset/instagram.png" width="50px"
                                        height="40px"></a>
                                <a href="https://www.messenger.com/"><img src="asset/messenger.png" width="50px"
                                        height="40px"></a>
                            </ul>
                            <h5>© 2022 All Rights Reserved. PetCo. Animal Clinic.</h5>
                        </div>
                    </div>
                </div>


            </footer>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
                crossorigin="anonymous">
            </script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#home-menu').addClass('bg-primary');
            });
            </script>

            </body>

            </html>
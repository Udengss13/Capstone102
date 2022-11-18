<?php 
 require('layouts/header_employee.php');
?>

    <!-- SLIDER Images -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#home-menu').addClass('bg-primary');
        });
    </script>


</body>

</html>
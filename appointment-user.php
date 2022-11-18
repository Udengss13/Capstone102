<?php require('layouts/header_employee.php');
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
$users = "SELECT * FROM usertable where id='$user_id'"; //You dont need like you do in SQL;
$userresult = mysqli_query($con, $queryimage);
?>
<?php 
                 $select_user = mysqli_query($con, "SELECT * FROM usertable WHERE id = '$user_id'");
                 if(mysqli_num_rows($select_user) > 0){
                 $fetch_user = mysqli_fetch_assoc($select_user); 
                 };

                 $queryservice = "SELECT * FROM `service`"; //You don't need a ; like you do in SQL
                 $resultservices = mysqli_query($con, $queryservice);
        
        
                 $select_pet = mysqli_query($con, "SELECT * FROM pettable WHERE user_id = '$user_id'");
                 if(mysqli_num_rows($select_user) > 0){
                 $fetch_pet = mysqli_fetch_assoc($select_pet); 
                 };
             
             ?>

<?php
         
    if(isset($_POST['appoint'])){
        $appno = uniqid('PETCO-');
        

        $service = mysqli_real_escape_string($con, $_POST['service']);
        $appointdate = date('Y-m-d', strtotime($_POST['appointdate']));
        $appointtime = date('h:i A', strtotime($_POST['appointtime']));
        $petname =mysqli_real_escape_string($con,$_POST['petname']);
        

            $sql = "INSERT INTO `client_appointment`( `service`, `appoint_no`, `appoint_date`, `appoint_time`, `petname`, `user_id`) 
            VALUES ('$service','$appno','$appointdate','$appointtime','$petname','$user_id')";

            if(mysqli_query($con, $sql)){
                
                echo '<script>
                alert("Thank You! Your reservation has been made $petname!);
                window.location.href="appointment-user.php";
                </script>';
            }
                
        
            
  
    }
    ?>

<style>
@media only screen and (min-width:1115px) {
    .images_menu {
        width: 80%;
        height: 10vh;
    }
}
</style>




    <!--Content of Menu-->
    <div class="container-xl-fluid mt-5 mb-5">
        <div class="px-3">
            <h4 class="text-center c-white py-3">Appointment History</h4>

            <!-- Modal -->

            <div class="d-flex flex-row-reverse">
                <button type="button" class="btn bg-button"
                    style="background: #EA6D52; border-radius: 15px; border-width: 7px;" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="fa-solid fa-circle-plus"> </i> Appointment


                </button>
            </div>


            <!-- The Modal -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header bg">
                            <h4 class="modal-title text-light">Appointment Form</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data"
                                class="row gap-2 justify-content-center">

                                <div class="justify-content-center">

                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-2"> <label>Service: </label></div>
                                                <div class="col-4">

                                                    <select class="form-select form-select-md" name="service" required>
                                                        <option value="">Select Service</option>
                                                        <?php while($row =  mysqli_fetch_array($resultservices)){ ?>
                                                        <option value=" <?php echo $row['service_name']; ?>">
                                                            <?php echo $row['service_name']; ?>
                                                        </option>
                                                        <?php } ?>
                                                    </select>

                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item" id="service-content">

                                        </li>
                                        <li class="list-group-item" style="display:none;">

                                            <div class="row">
                                                <div class="col-2"> <label> Date: </label></div>
                                                <div class="col-4 ">

                                                    <input type="date" name="appointdate" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item" style="display:none;">
                                            <div class="row">
                                                <div class="col-2"> <label> Time: </label></div>
                                                <div class="col-4 ">

                                                    <input type="time" name="appointtime" class="form-control"
                                                        required />
                                                </div>
                                            </div>
                                        </li>
                                        <li class="list-group-item mt-5">
                                            <div class="row">
                                                <div class="col-2"> <label> Pet Name: </label></div>
                                                <div class="col-4 ">

                                                    <?php $select_pet = mysqli_query($con, "SELECT * FROM pettable WHERE user_id = '$user_id'");
                                                    if(mysqli_num_rows($select_user) > 0){
                                                    $fetch_pet = mysqli_fetch_assoc($select_pet); 
                                                    };?>

                                                    <input name="petname" class="form-control bg-transparent" 
                                                        value="<?php echo $fetch_pet['petname']; ?> " readonly required>

                                                    <!-- <?php while($row =  mysqli_fetch_array($fetch_pet)){ ?>
                                                    <option value=" <?php echo $row['petname']; ?>">
                                                        <?php echo $row['petname']; ?>
                                                    </option>
                                                    <?php } ?> -->

                                                </div>
                                        </li>



                                        <li class="list-group-item">
                                            <button type="button" class="btn btn-danger float-end"
                                                style="margin-left: 5px;" data-bs-dismiss="modal"
                                                onclick="return confirm('Are you sure you want to cancel?')">Cancel</button>
                                            <button type="submit" name="appoint"
                                                class="btn btn-outline-success float-end" style="max-width:450px;">Set
                                                Appointment</button>


                                        </li>



                                    </ul>


                                </div>
                            </form>
                        </div>



                    </div>
                </div>
            </div>





            <!--Displaying Data -->
            <div class="container mt-4 ">
                <table class="table table-striped table table-bordered">
                    <!-- <div class="row"> -->

                    <?php 
          $select_cart = mysqli_query($con, "SELECT * FROM `client_appointment`WHERE user_id = '$user_id' ORDER BY `client_appointment`.`appoint_date` ASC ");
          $grand_total = 0;

                if(mysqli_num_rows($select_cart) > 0){
                    ?>
                    <thead>

                        <div class="row">

                            <th scope="col" style="text-align: center;">
                                <div class="col">Appointment No.</div>
                            </th>
                            <th scope="col" style="text-align: center;">
                                <div class="col">Service Type</div>
                            </th>
                            <th scope="col" style="text-align: center;">
                                <div class="col">Pet Name</div>
                            </th>
                            <th scope="col" style="text-align: center;">
                                <div class="col">Date</div>
                            </th>
                            <th scope="col" style="text-align: center;">
                                <div class="col">Time</div>
                            </th>
                            <th scope="col" style="text-align: center;">
                                <div class="col">Status</div>
                            </th>
                            </tr>
                    </thead>
                    <?php
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)):   
                    ?>
                    <tr class="text-light ">
                        <!--Image-->

                        <td class="align-middle "><?= $fetch_cart['appoint_no'];?></td>
                        <!--Price-->
                        <td class="align-middle">
                            <?php echo $fetch_cart['service'];?>
                        </td>
                        <td class="align-middle">
                            <?php echo $fetch_cart['petname'];?>
                        </td>
                        <td class="align-middle">
                            <?php echo $fetch_cart['appoint_date'];?>
                        </td>
                        <td class="align-middle">
                            <?php echo $fetch_cart['appoint_time'];?>
                        </td>
                        <td class="align-middle">
                            <?php echo $fetch_cart['status'];?>
                        </td>
                    <tr>
                        <?php
                    endwhile;
                }

                 else{
                    ?><tbody class="text-light ">
                            <center><h1><img src="asset/oops.png" alt="Logo" class="rounded"/></h1></center>
                        </tbody><?php
                }
        
            ?>


            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
    <script src="js/gallery_menu.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $('#appointment-menu').addClass('bg-primary');
        $(document).on('change','select[name="service"]',function(){
            var service = $(this).val();
            $('input[name="appointtime"]').val('');
            $('input[name="appointdate"]').val('');
            $.post("service_available_appointment.php",{service:service},function(data){ 
                $('#service-content').html(data);
            });
        });
        $(document).on('change','select[name="schedule"]',function(){
            var schedule = $(this).find(':selected').val();
            var time = $(this).find(':selected').data('time');
            $('input[name="appointtime"]').val(time);
            $('input[name="appointdate"]').val(schedule);
        });
    });
    </script>
</body>

</html>
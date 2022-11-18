<?php 
      require('layouts/header_employee.php');
    // require_once "controllerUserData.php"; 
   
    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
      header('location: login-user.php');
    }
    
    
?>






      <!-- ====================================================================================================== -->
      <div class="container pt-5">
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row">
                                <div class="col-md-6">
                                  Appointment List
                                </div>
                                <div class="col-md-6" align="right">
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Pending</button>
                                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Approved</button>
                                        <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Serve</button>
                                        <button class="nav-link" id="cancelled-contact-tab" data-bs-toggle="tab" data-bs-target="#cancelled-contact" type="button" role="tab" aria-controls="cancelled-contact" aria-selected="false">Cancelled</button>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ref. No.</th>
                                                        <th>Date Schedule</th>
                                                        <th>Customer Name</th>
                                                        <th>Pet Name</th>
                                                        <th>Service</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $query_pending = "SELECT c.*,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name,' ',u.suffix) AS customer_name FROM client_appointment c LEFT JOIN usertable u ON u.id = c.user_id WHERE c.status='pending' AND u.id is not null"; 
                                                    $result_pending = mysqli_query($con, $query_pending);  
                                                    $count = 0;
                                                    while($row_pending =  mysqli_fetch_array($result_pending)){
                                                        $count++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $row_pending['appoint_no']; ?></td>
                                                        <td><?php echo date('F d,Y h:ia',strtotime($row_pending['appoint_date'].' '.$row_pending['appoint_time'])); ?></td>
                                                        <td><?php echo $row_pending['customer_name']; ?></td>
                                                        <td><?php echo $row_pending['petname']; ?></td>
                                                        <td><?php echo $row_pending['service']; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-info approved" data-id="<?php echo $row_pending['id']; ?>"><span class="fa fa-thumbs-o-up"></span></a> 
                                                            <a class="btn btn-sm btn-danger cancel" data-id="<?php echo $row_pending['id']; ?>"><span class="fa fa-times"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ref. No.</th>
                                                        <th>Date Schedule</th>
                                                        <th>Customer Name</th>
                                                        <th>Pet Name</th>
                                                        <th>Service</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $query_approved = "SELECT c.*,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name,' ',u.suffix) AS customer_name FROM client_appointment c LEFT JOIN usertable u ON u.id = c.user_id WHERE c.status='approved' AND u.id is not null"; 
                                                    $result_approved = mysqli_query($con, $query_approved);  
                                                    $count1 = 0;
                                                    while($row_approved =  mysqli_fetch_array($result_approved)){
                                                        $count1++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $count1; ?></td>
                                                        <td><?php echo $row_approved['appoint_no']; ?></td>
                                                        <td><?php echo date('F d,Y h:ia',strtotime($row_approved['appoint_date'].' '.$row_approved['appoint_time'])); ?></td>
                                                        <td><?php echo $row_approved['customer_name']; ?></td>
                                                        <td><?php echo $row_approved['petname']; ?></td>
                                                        <td><?php echo $row_approved['service']; ?></td>
                                                        <td>
                                                            <a class="btn btn-sm btn-success serve" data-id="<?php echo $row_approved['id']; ?>"><span class="fa fa-check"></span></a> 
                                                            <a class="btn btn-sm btn-danger cancel" data-id="<?php echo $row_approved['id']; ?>"><span class="fa fa-times"></span></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ref. No.</th>
                                                        <th>Date Schedule</th>
                                                        <th>Customer Name</th>
                                                        <th>Pet Name</th>
                                                        <th>Service</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $query_serve = "SELECT c.*,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name,' ',u.suffix) AS customer_name FROM client_appointment c LEFT JOIN usertable u ON u.id = c.user_id WHERE c.status='served' AND u.id is not null"; 
                                                    $result_serve = mysqli_query($con, $query_serve);  
                                                    $count2 = 0;
                                                    while($row_serve =  mysqli_fetch_array($result_serve)){
                                                        $count2++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $count2; ?></td>
                                                        <td><?php echo $row_serve['appoint_no']; ?></td>
                                                        <td><?php echo date('F d,Y h:ia',strtotime($row_serve['appoint_date'].' '.$row_serve['appoint_time'])); ?></td>
                                                        <td><?php echo $row_serve['customer_name']; ?></td>
                                                        <td><?php echo $row_serve['petname']; ?></td>
                                                        <td><?php echo $row_serve['service']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="cancelled-contact" role="tabpanel" aria-labelledby="cancelled-contact-tab">
                                        <div class="table-responsive mt-4">
                                            <table class="table table-hover table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Ref. No.</th>
                                                        <th>Date Schedule</th>
                                                        <th>Customer Name</th>
                                                        <th>Pet Name</th>
                                                        <th>Service</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                    $query_cancelled = "SELECT c.*,CONCAT(u.first_name,' ',u.middle_name,' ',u.last_name,' ',u.suffix) AS customer_name FROM client_appointment c LEFT JOIN usertable u ON u.id = c.user_id WHERE c.status='cancelled' AND u.id is not null"; 
                                                    $result_cancelled = mysqli_query($con, $query_cancelled);  
                                                    $count3 = 0;
                                                    while($row_cancelled =  mysqli_fetch_array($result_cancelled)){
                                                        $count3++;
                                                ?>
                                                    <tr>
                                                        <td><?php echo $count3; ?></td>
                                                        <td><?php echo $row_cancelled['appoint_no']; ?></td>
                                                        <td><?php echo date('F d,Y h:ia',strtotime($row_cancelled['appoint_date'].' '.$row_cancelled['appoint_time'])); ?></td>
                                                        <td><?php echo $row_cancelled['customer_name']; ?></td>
                                                        <td><?php echo $row_cancelled['petname']; ?></td>
                                                        <td><?php echo $row_cancelled['service']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
       </div>
       <!-- ====================================================================================================== -->
     
        <?php
            if(isset($_POST['approved_submit'])){
                $id = $_POST['id'];

                $approved_query = "UPDATE client_appointment SET `status`='approved' WHERE id='$id'";
                $run_approved = mysqli_query($con, $approved_query);
                if($run_approved){
                    echo "<script>window.open('appointment_list.php','_self');</script>";
                }
            }
            if(isset($_POST['cancel_submit'])){
                $id = $_POST['id'];

                $approved_query = "UPDATE client_appointment SET `status`='cancelled' WHERE id='$id'";
                $run_approved = mysqli_query($con, $approved_query);
                if($run_approved){
                    echo "<script>window.open('appointment_list.php','_self');</script>";
                }
            }
            if(isset($_POST['serve_submit'])){
                $id = $_POST['id'];

                $serve_query = "UPDATE client_appointment SET `status`='served' WHERE id='$id'";
                $run_serve = mysqli_query($con, $serve_query);
                if($run_serve){
                    echo "<script>window.open('appointment_list.php','_self');</script>";
                }
            }
            
        ?>
       <!-- ====================================================================================================== -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#list-appointment-menu').addClass('bg-primary');
            $(document).on('click','.approved',function(){
                var id = $(this).data('id');
                if (confirm('Are you sure you want APPROVED this appointment?')) {
                    $.post("appointment_list.php",{approved_submit:'approved_submit',id:id},function(data){
                        window.open('appointment_list.php','_self');
                    });
                }
            });
            $(document).on('click','.cancel',function(){
                var id = $(this).data('id');
                if (confirm('Are you sure you want CANCELLED this appointment?')) {
                    $.post("appointment_list.php",{cancel_submit:'cancel_submit',id:id},function(data){
                        window.open('appointment_list.php','_self');
                    });
                }
            });
            $(document).on('click','.serve',function(){
                var id = $(this).data('id');
                if (confirm('Are you sure you want SERVED this appointment?')) {
                    $.post("appointment_list.php",{serve_submit:'serve_submit',id:id},function(data){
                        window.open('appointment_list.php','_self');
                    });
                }
            });
            
        });
    </script>

</body>

</html>
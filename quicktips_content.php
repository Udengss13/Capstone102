<?php
require('layouts/header_admin.php');
    require_once "php/user-list-process.php";
    require('php/connection.php');
    

    
    $queryimage = "SELECT * FROM admin_quicktips"; //You don't need a like you do in SQL;
    $resultimage = mysqli_query($db_admin_account, $queryimage);

    if(isset($_POST['action'])){
        
        $id = $_POST['id'];
        $update_query = mysqli_query($con, "UPDATE messages SET seen=1 WHERE employee_id=$id");
        
        $query = mysqli_query($con,"SELECT * FROM usertable  WHERE id = $id") or die ('query failed');
        $seQuery = mysqli_fetch_array($query);
        $name = '';
        if(isset($seQuery)){
            $name = $seQuery['first_name'].' '.$seQuery['last_name'].' '.$seQuery['suffix'];
        }
        $returnHtml = '<input name="employee-id" value='.$id.' type="hidden" />
                        <div class="form-group" align="center">
                            <h5>'.$name.'</h5>
                        </div>
        ';
        $get_messages = "SELECT * FROM messages WHERE employee_id = $id";
        $res = mysqli_query($con, $get_messages);
        while($fetch_message = mysqli_fetch_assoc($res)){                                    
            if($fetch_message['sender_id']=='petko'){
                $returnHtml .= '<div class="outgoing_msg">
                                    <div class="sent_msg">
                                    <p>'.$fetch_message['message'].'</p>
                                    <span class="time_date"> '.date('h:i a',strtotime($fetch_message['created_at'])).'  |  '.date('F d',strtotime($fetch_message['created_at'])).'</span> </div>
                                </div>';
            }else{
                $returnHtml .= '<div class="incoming_msg">
                                    <div class="incoming_msg_img"> <img style="width:100%;" src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                        <p>'.$fetch_message['message'].'</p>
                                        <span class="time_date"> '.date('h:i a',strtotime($fetch_message['created_at'])).'  |  '.date('F d',strtotime($fetch_message['created_at'])).'</span> </div>
                                    </div>
                                </div>';
            }
        }

        echo $returnHtml;
        die;
    }

    if(isset($_POST['submit-message'])){
        $message = $_POST['message'];
        

        date_default_timezone_set('Asia/Manila');
        $datetime = date("Y-m-d H:i:s");
        $user_id = $_POST['employee-id'];

        
        $sender = mysqli_query($con,"SELECT * FROM usertable  WHERE id = $user_id") or die ('query failed');
        $senderQuery = mysqli_fetch_array($sender);

        $name = $senderQuery['first_name'].' '.$senderQuery['last_name'].' '.$senderQuery['suffix'];

        $insert_data = "INSERT INTO messages (employee_id, `admin`, `message`, created_at, sender_name, receiver_name, sender_id)
                            values('$user_id', 'petko', '$message', '$datetime', '$name', '$name', 'petko')";
        $data_check1 = mysqli_query($con, $insert_data);
    }
    
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<link rel="icon" href="asset/logopet.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="css/admin.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Admin || Quicktips</title>

            <div class="col py-3 mt-5 p-5">
            <div class="container pt-5">
            <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header row">
                                <div class="col-md-6">
                                    Quicktips
                                </div>
                                <div class="col-md-6" align="right">
                                    <button class="btn btn-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#add-modal"><span class="fa fa-plus"></span> Add Quicktips</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>link</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php 
                                            $querymenu = "SELECT * FROM quicktips"; 
                                            $resultmenu = mysqli_query($con, $querymenu);  
                                            while($rowmenu =  mysqli_fetch_array($resultmenu)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rowmenu['link']; ?></td>
                                            <td><a class="btn btn-sm btn-danger delete" data-id="<?php echo $rowmenu['id']; ?>"><span class="fa fa-times"></span></a> </td>
                                        </tr>
                                        <?php } ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
              <!-- ====================================================================================================== -->
            <div id="add-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Quicktips Link</h5>
                            </div>
                            <div class="modal-body">
                                <form id="add-form" method="POST">
                                    <div class="form-group mb-3">
                                        <label>Link</label>
                                        <input class="form-control" type="text" required name="link"/>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="submit-link" form="add-form">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            if(isset($_POST['submit-link'])){
                $link = $_POST['link'];
                $insertavailable = "INSERT INTO quicktips (link) VALUES ('$link')";
                $run_query = mysqli_query($con, $insertavailable);
                if($run_query){
                    echo "<script>window.open('quicktips_content.php','_self');</script>";
                }
            }
            if(isset($_POST['delete_submit'])){
                $id = $_POST['id'];
                $del_query = "DELETE FROM quicktips WHERE id = '$id'";
                $result = mysqli_query($con, $del_query);
               
            }   
            
        ?>
       <!-- ====================================================================================================== -->
       </div>
                
            </div>



            <!--DIVISION -->


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
                crossorigin="anonymous">
            </script>
            <script src="/js/script.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
            $(document).ready(function(index) {
                $(document).on('click','.delete',function(){
                    var id = $(this).data('id');
                    $.post("quicktips_content.php",{delete_submit:'delte',id:id},function(data){
                        location.reload();
                    });
                });
            });
            </script>
</body>

</html>
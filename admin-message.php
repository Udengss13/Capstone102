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

<!-- =============================================================================================================== -->
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

<title>Admin || Message</title>

            <div class="col py-3 mt-5">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Messages</h4>
                                </div>
                                <div class="srch_bar">
                                    <div class="stylish-input-group">

                                    </div>
                                </div>
                            </div>
                            <div class="inbox_chat">
                                <?php 
                        $chats = mysqli_query($con,"SELECT * FROM messages GROUP BY employee_id ORDER BY id DESC ") or die ('query failed');
                        // $selectQuery = mysqli_fetch_array($chats);


                        while($chat_head = mysqli_fetch_assoc($chats)){
                            $emp = $chat_head['employee_id'];
                            $selectMessageschat = mysqli_query($con,"SELECT * FROM `messages` WHERE employee_id = '$emp' AND seen = 0 AND sender_id = '$emp' ORDER BY id DESC") or die ('query failed');
                            $count_message_head = mysqli_num_rows($selectMessageschat);
                    ?>
                                <a href="#" class="chat-head" data-id="<?php echo $chat_head['employee_id']; ?>">
                                    <div class="chat_list active_chat">
                                        <div class="chat_people">
                                            <?php 
                            $select_user = mysqli_query($con, "SELECT * FROM usertable WHERE id = '$emp'");
                            if(mysqli_num_rows($select_user) > 0){
                            $fetch_user = mysqli_fetch_assoc($select_user); 
                            };
                        ?>
                                            <div class="chat_img"> <img style="width:100%;"
                                                    src="asset/profiles/<?php echo $fetch_user['image_filename']?>"
                                                    alt="sunil" class="rounded-circle"> </div>
                                            <div class="chat_ib">
                                                <h5><?php echo $chat_head['sender_name']; ?>
                                                    <?php if($count_message_head>0){ ?><span
                                                        class="badge badge-danger text-white bg-danger"
                                                        style="margin-left: 9px;"><?php echo $count_message_head; ?></span><?php } ?>
                                                    <span
                                                        class="chat_date mr-3"><?php if(isset($chat_head['created_at'])){ echo date('M d,Y',strtotime($chat_head['created_at'])); } ?></span>
                                                </h5>
                                                <p><?php if(isset($chat_head['message'])){ echo $chat_head['message']; } ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="mesgs">
                            <form action="admin-message.php" method="post">
                                <div class="msg_history" id="msg_history">


                                </div>

                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="text" class="write_msg" required name="message"
                                            placeholder="Type a message" />
                                        <button class="msg_send_btn" type="submit" name="submit-message"><i
                                                class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



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
                $(document).on('click', '.chat-head', function() {
                    var id = $(this).data('id');
                    $.post("admin-message.php", {
                        action: 'chat-list',
                        id: id
                    }, function(data) {
                        $('#msg_history').html(data);
                    });
                });
            });
            </script>
</body>

</html>
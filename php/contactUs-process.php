<?php
require('connection.php');
session_start();

            if(isset($_POST['submit_messsage'])){
                $fname= $_POST['name'];
                $lname= $_POST['surname'];
                $email= $_POST['email'];
                $message= $_POST['message'];
                $message = nl2br($message);
                $subject= $_POST['subject'];

                  
                require '../phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer;
                
                $mail->isSMTP();
                $mail->Host='smtp.gmail.com';
                $mail->Port=587;
                $mail->SMTPAuth=true;
                $mail->SMTPSecure='tls';

                $mail->Username='markanthony.perez.r@bulsu.edu.ph';
                $mail->Password='anthonyandaxlroses';

                $mail->setFrom($email);
                $mail->addAddress('markanthony.perez.r@bulsu.edu.ph');
              

                $mail->isHTML(true);

                // $mail->Subject='Client Message:';
                // $mail->Body='<p> '.$message.'</p>';

                $mail->Subject=$subject;
                $body = "Name: ".$fname." ".$lname."<br> Email: ".$email."<br> Subject:".$subject."<br> Messages: <br>".$message;
                $mail->Body = $body;


                if($mail->send()){
                  
                    $_SESSION['msg'] = "We received your Message! Thank you! ".$fname. " ". $lname;
                    header('location: ../contactUs.php');
                    exit();
                }else{
                    $_SESSION['msg'] = "Sorry! Something went wrong!";
                }

                if(!$mail->send()){
                    echo "Message could not sent!";
                }
                else{
                    echo"Message has been Sent";
                }

            }else{
                $_SESSION['msg'] = "Sorry! Something went wrong!";
            }
?>
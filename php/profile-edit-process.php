<?php
// $user_id = $_SESSION['user_id'];

require('connection.php');
session_start();

    if(isset($_POST['update_profile'])){
        $user_id = $_POST['id'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $suffix = $_POST['suffix'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        
        $filenamedir = "../asset/profiles/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

         // move file to a folder
         if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
         {
         $userquery = "UPDATE `usertable` SET `first_name`  = '$fname', `middle_name` = '$mname',`last_name` = '$lname', suffix = '$suffix',contact = '$contact', address = '$address', 
         image_dir = '$filenamedir', image_filename = '$filename' WHERE `usertable`.`id` = '$user_id'";
              
         if(mysqli_query($con, $userquery)){
             
          $_SESSION['update_changes'] = "Your data has been edited successfully";
          header('location: ../user-edit-profile.php?updateid='.$user_id);
         }
         else{
          echo "mlai";
         }
       }      
}

?>
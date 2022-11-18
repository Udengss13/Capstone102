<?php

require('connection.php');
session_start();

    if(isset($_POST['update_image_content'])){
        $contentimageid = $_POST['contentimageid'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        
        $paragraph = $_POST['paragraph'];
        $paragraph = nl2br($paragraph);
        $safe_input = mysqli_real_escape_string($db_admin_account,$paragraph);

          
        $filenamedir = "../asset/homepage/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];
        
        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
         $query = "UPDATE admin_content_homepage SET Image_title = '$title', Image_subtitle = '$subtitle',
                                                     Image_body = '$safe_input', Image_dir = '$filenamedir', Image_filename = '$filename' 
                                                  WHERE Image_id = '$contentimageid'";
         

         
         if(mysqli_query($db_admin_account, $query)){
          $_SESSION['update_changes'] = "Your data has been edited successfully";
          header('location: ../admin-edit-content.php?updateid='.$contentimageid);
         }
       }      
}

?>

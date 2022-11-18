<?php

require('connection.php');
session_start();

//For editing Carousel 
    if(isset($_POST['update_image_content'])){
        $id = $_POST['id'];      
        $info = $_POST['info'];
        $info = nl2br($info);
        $safe_input = mysqli_real_escape_string($db_admin_account,$info);

          
        $filenamedir = "../asset/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];
        
        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
         $query = "UPDATE admin_quicktips SET info = '$safe_input', image_dir = '$filenamedir', image_filename = '$filename' 
                                                  WHERE id = '$id'";
         

         
         if(mysqli_query($db_admin_account, $query)){
          $_SESSION['update_changes'] = "Your data has been edited successfully";
          header('location: ../admin-edit-quicktips.php?updateid='.$id);
         }
       }      
}





?>
<?php

require('connection.php');
session_start();
    if(isset($_POST['update_changes'])){
      $menuid = $_POST['menuid'];
        $title = $_POST['title'];
        $paragraph = $_POST['paragraph'];
        $paragraph = nl2br($paragraph);
        $safe_input = mysqli_real_escape_string($con,$paragraph);

        $price = $_POST['price'];
        $category_name = $_POST['category_name'];

        $filenamedir = "../asset/menu/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

         // move file to a folder
         if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
         {
          $query = "UPDATE admin_menu SET Menu_name = '$title', Menu_description = '$safe_input', 
          Menu_price = '$price', Menu_category = '$category_name', 
          Menu_dir = '$filenamedir', Menu_filename = '$filename' WHERE Menu_id = '$menuid'";
          

          
          if(mysqli_query($con, $query)){

            echo '<script> alert("Products updated Succesfully");
            window.location.href="../employee-menu.php";
            </script>';
          }
        }
        
    }

?>
?>
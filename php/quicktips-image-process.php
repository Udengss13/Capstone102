<?php
    require("connection.php");
    if(isset($_POST['upload_image_content'])){
        
        $info = $_POST['info'];
        $info = nl2br($info);
        $safe_input = mysqli_real_escape_string($db_admin_account,$info);
       
      
        $filenamedir = "../asset/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];

        // move file to a folder
        if(move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir))
        {
            $sql = "INSERT INTO admin_quicktips ( info, image_dir, image_filename) 
            VALUES('$safe_input', '$filenamedir', '$filename')";
            mysqli_query($db_admin_account,$sql);
            
            if(empty($errors)){
                // Insert Query or sending email
                // if($query){
             
                // }
                $messages[] = "No Erros in the Form";
            }
        
            header("location: ../admin-quicktips.php");
        }
        else
        {   
            header("location: ../admin-quicktips.php");
            $messages[] = "Erros in the Form";
        }
    }

    //For deleting content by ID
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryimage = "SELECT * FROM admin_quicktips WHERE id=$id"; 
        $resultimage = mysqli_query($db_admin_account, $queryimage);
        $rowimage =  mysqli_fetch_array($resultimage);

        $filedir = $rowimage['image_dir'];

        $sqldelete = "DELETE FROM admin_quicktips WHERE id=$id";
        $resultdelete = mysqli_query($db_admin_account, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }


    
?>
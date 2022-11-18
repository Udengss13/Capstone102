<?php
    require("connection.php");
    if(isset($_POST['upload_image_content'])){
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
            $sql = "INSERT INTO admin_content_homepage (Image_title, Image_subtitle, Image_body, Image_dir, Image_filename) 
            VALUES('$title', '$subtitle', '$safe_input', '$filenamedir', '$filename')";
            mysqli_query($db_admin_account,$sql);
            
            if(empty($errors)){
                // Insert Query or sending email
                // if($query){
             
                // }
                $messages[] = "No Erros in the Form";
            }
        
            echo '<script> alert("Announcement posted Succesfully");
            window.location.href="../admin-content.php";
            </script>'; 
        }
        else
        {   
            header("location: ../admin-content.php");
        }
    }

    //For deleting content by ID
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $queryimage = "SELECT * FROM admin_content_homepage WHERE Image_id=$id"; 
        $resultimage = mysqli_query($db_admin_account, $queryimage);
        $rowimage =  mysqli_fetch_array($resultimage);

        $filedir = $rowimage['Image_dir'];

        $sqldelete = "DELETE FROM admin_content_homepage WHERE Image_id=$id";
        $resultdelete = mysqli_query($db_admin_account, $sqldelete);
        unlink($filedir);
        header("location: ../admin-content.php");
    }


    
?>
<?php
    require("connection.php");

    $service= "";      
    $petname= "";      

    if(isset($_POST['appoint'])){
        

        $service = mysqli_real_escape_string($con, $_POST['service']);
        $appointdate = date('Y-m-d', strtotime($_POST['appointdate']));
        $appointtime = date('h:i A', strtotime($_POST['appointtime']));
        // $petname = mysqli_real_escape_string($con,$_POST['petname']);
        $user_id = $con->insert_id;


            $sql = "INSERT INTO client_appointment (service, appoint_date, appoint_time, user_id) 
            VALUES('$service', '$appointdate', '$appointtime',  '$user_id' )";
            mysqli_query($con,$sql);            
            echo  'ok' ;
        
            
  
    }
    // //For deleting menu by ID
    // if(isset($_GET['id'])){
    //     $id = $_GET['id'];
    //     $querymenu = "SELECT * FROM admin_menu WHERE Menu_id=$id"; 
    //     $resultmenu = mysqli_query($con, $querymenu);
    //     $rowmenu =  mysqli_fetch_array($resultmenu);

    //     $filedir = $rowmenu['Menu_dir'];

    //     $sqldelete = "DELETE FROM admin_menu WHERE Menu_id=$id";
    //     $resultdelete = mysqli_query($con, $sqldelete);
    //     unlink($filedir);
    //     echo '<script> alert("Product Deleted Succesfully");
    //     window.location.href="../employee-menu.php";
    //     </script>'; 
    // }

    
?>
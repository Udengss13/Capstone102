<?php

require('connection.php');


   //For deleting Carousel by ID
 if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $queryimage = "SELECT * FROM admin_carousel_homepage WHERE id=$id"; 
    $resultimage = mysqli_query($db_admin_account, $queryimage);
    $rowimage =  mysqli_fetch_array($resultimage);
  
    $filedirs = $rowimage['image_path'];
  
    $sqldelete = "DELETE FROM `admin_carousel_homepage` WHERE id=$id";
    $resultdelete = mysqli_query($db_admin_account, $sqldelete);
    unlink($filedirs);
    echo '<script> alert("You Delete ID '. $id ." ".'in the list");
            window.location.href="../admin-slider.php";
            </script>';
  }

  // if(isset($_POST['delete_user'])){
  //   //This is for the password when delete user
  //   $user_id = $_POST['user_id'];
  //   $fname = $_POST['first_name'];
  //   $password =  mysqli_real_escape_string($db_admin_account, $_POST['password']);

  //   $sql = "SELECT * FROM admin_login WHERE password = '$password'";
  //   $result = mysqli_query($db_admin_account,$sql);
  //   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  //   $count = mysqli_num_rows($result);
      
  //   // If result matched $myusername and $mypassword, table row must be 1 row
  //   if($count == 1) {
  //       //This is for deleting user
  //     $sqldelete = "DELETE FROM usertable WHERE id = $user_id";
  //     mysqli_query($con, $sqldelete);
  //     echo '<script> alert("You Delete '. $fname ." ".'in the list");
  //           window.location.href="../admin-dashboard.php";
  //           </script>';
  //   }
  //   else {
  //     echo '<script> alert("Password Incorrect!");
  //     window.location.href="../admin-dashboard.php";
  //     </script>';
  
  //   }
  // }
   
?>

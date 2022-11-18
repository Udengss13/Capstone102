<?php
   require('connection.php');
   
   $errors = array();
   if(isset($_POST['admin-login'])) {
 
      // username and password sent from form 
      $username = $_POST['username'];
      $password = $_POST['password'];
      
      $sql = "SELECT * FROM admin_login WHERE Username = '$username' and Password = '$password'";
      $result = mysqli_query($db_admin_account,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
       
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         header("location: ../admin-user-accounts.php");
      }
      else{
         echo '<script> alert("username and password does not match");
        window.location.href="../admin-login.php";
        </script>'; 
         // header("location: ../admin-login.php");
      }
   }
 
?>
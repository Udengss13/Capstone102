<?php

require('connection.php');
session_start();
    if(isset($_POST['update_category_name'])){
        $title = $_POST['title'];
        $details = $_POST['details'];
        $categoryid = $_POST['categoryid'];
        
        $query = "UPDATE admin_category SET category_name = '$title', category_details = '$details' WHERE category_id = '$categoryid'";
          

          if(mysqli_query($db_admin_account, $query))
          {
          $_SESSION['update_changes'] = "Your data has been edited successfully";
          header('location: ../admin-edit-category.php?updateid='.$categoryid);
          }
        }

?>
?>
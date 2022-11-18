<?php
   require("connection.php");

   $user_id = $_SESSION['user_id'];
  
   //Add new Category
   if(isset($_POST['submit_category'])){
        $title = $_POST['title'];
        $details = $_POST['details'];

        $sql = "INSERT INTO admin_category (category_name, category_details)
        VALUES('$title', '$details')";
        mysqli_query($db_admin_account,$sql);
        header("location: ../admin-category-list.php");
  }

  //Delete Category By ID
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqldelete = "DELETE FROM admin_category WHERE category_id= '$id'";
    $resultdelete = mysqli_query($db_admin_account, $sqldelete);
  
    header("location: ../admin-category-list.php");
}
?>
<?php 
    require('php/connection.php');
    $id = $_POST['id'];
    $querymenu = "SELECT * FROM admin_content_homepage WHERE Image_id = $id"; //You don't need a ; like you do in SQL
    $resultmenu = mysqli_query($db_admin_account, $querymenu); 

    $selectQuery = mysqli_fetch_array($resultmenu);
    echo json_encode($selectQuery);
?>

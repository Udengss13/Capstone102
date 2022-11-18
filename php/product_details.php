<?php 
 require('connection.php'); 
$id = $_POST['id'];
$querymenu = "SELECT * FROM admin_menu WHERE Menu_id = $id"; //You don't need a ; like you do in SQL
$resultmenu = mysqli_query($con, $querymenu); 

$selectQuery = mysqli_fetch_array($resultmenu);
  echo json_encode($selectQuery);

?>
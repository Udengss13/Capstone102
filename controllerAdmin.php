<?php 
//https://www.codepile.net/pile/ap07x5A1
session_start();
require "php/connection.php";
$email = "";
$fname = "";
$mname = "";
$lname = "";
$suffix = "";
$address = "";
$contact = "";
$pettype= "";
$petname= "";
$petbreed= "";
$errors = array(); 

    //if user signup button
    if(isset($_POST['signup'])){

 
          //for captcha
        // if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        //     // echo "<script>alert('Incorrect verification code');</script>" ;
        //     $errors[]= 'Incorrect Captcha code!';
        // }

        $fname = mysqli_real_escape_string($con, $_POST['first_name']);
        $mname = mysqli_real_escape_string($con, $_POST['middle_name']);
        $lname = mysqli_real_escape_string($con, $_POST['last_name']);
        $suffix = mysqli_real_escape_string($con, $_POST['suffix']);
        $address = mysqli_real_escape_string($con, $_POST['address']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $pettype = mysqli_real_escape_string($con, $_POST['pettype']);
        $petbreed = mysqli_real_escape_string($con, $_POST['petbreed']);
        $petname = mysqli_real_escape_string($con, $_POST['petname']);
        $petsex = mysqli_real_escape_string($con, $_POST['petsex']);
        $petbday = date('Y-m-d', strtotime($_POST['petbday']));
        
        $filenamedir = "asset/profiles/".$_FILES["photo"]["name"];
        $filename = $_FILES["photo"]["name"];
       

        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        
       

        if( count($errors) === 0 && move_uploaded_file($_FILES["photo"]["tmp_name"], $filenamedir)){
         
            $code = rand(999999, 111111);
            $status = "verified";
          

            $insert_data = "INSERT INTO usertable (first_name, middle_name, last_name, suffix, address, email, password, code, status, contact, image_dir, image_filename, user_level)
                            values('$fname', '$mname', '$lname', '$suffix', '$address', '$email', '$password', '$code', '$status', '$contact', '$filenamedir', '$filename', 'client')";
            $data_check1 = mysqli_query($con, $insert_data);

            $user_id = $con->insert_id;

            if($data_check1){
                 $query1 = "INSERT INTO `pettable`(`user_id`, `pettype`, `petbreed`, `petname` ,`petsex`, `petbday`) VALUES ('$user_id','$pettype', '$petbreed', '$petname' , '$petsex', '$petbday')";
                 $data_check = mysqli_query($con, $query1); 
          
              if($data_check){   
                echo '<script> alert("Client Account Created Successfully!");
                        window.location.href="admin-user-accounts.php";
                        </script>';         

              }
            }
        }
    }
 $fname = "";
$mname = "";
$lname = "";
$suffix = "";
$address = "";
$contact = "";
$errors = array(); 
$position= "";
$email= "";
$idno = "";
$empstatus="";

    //if user signup button
    if(isset($_POST['signup_emp'])){
       
        $idno = mysqli_real_escape_string($con, $_POST['idno']);
        $fname = mysqli_real_escape_string($con, $_POST['firstname']);
        $mname = mysqli_real_escape_string($con, $_POST['middle_name']);
        $lname = mysqli_real_escape_string($con, $_POST['last_name']);
        $suffix = mysqli_real_escape_string($con, $_POST['suffix']);
        $position = mysqli_real_escape_string($con, $_POST['position']);
        $contact = mysqli_real_escape_string($con, $_POST['contact']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $address = mysqli_real_escape_string($con, $_POST['address']);       
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);       
        


        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
        
        if(mysqli_num_rows($res) > 0){
            $errors['email'] = "Email that you have entered is already exist!";
        }
        

         if(count($errors) === 0){
         
             $code = rand(999999, 111111);
             $status = "verified";
          
             $insert_data= "INSERT INTO `usertable`(first_name, middle_name, last_name, suffix, position,contact, email, address, password, code, status,  user_level)
                                    VALUES ('$fname', '$mname', '$lname', '$suffix', '$position' ,'$contact', '$email','$address', '$password', '$code', '$status', 'employee')";
             $data_check = mysqli_query($con, $insert_data);

              if($data_check){
                echo '<script> alert("Employee Account Created Successfully!");
                        window.location.href="admin-user-accounts.php";
                        </script>'; 
               
            }
        }

    }

  
?>
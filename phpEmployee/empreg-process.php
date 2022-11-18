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

 }
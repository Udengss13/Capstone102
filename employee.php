<?php require_once "contollerEmployeeData.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Log In</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/emp.css">
</head>

<body>
        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-light;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="asset/logopet.png" alt="Logo" class="logo" /> </span>
                    <span style="text-shadow: 2px 2px 2px  rgba(49, 44, 44, 0.767);" class="text-white"><b>PETCO. ANIMAL
                            CLINIC</b></span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            </div>

            
        </nav>
        

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12  mx-auto form login-form">
                <form action="employee.php" method="POST" autocomplete="">
                    <h1 class="text-center  mt-3">Sign In</h1>
                    
                    <?php
                        if(count($errors) > 0)
                        {
                            ?>
                    <div class="alert alert-danger text-center">
                        <?php
                            foreach($errors as $showerror)
                            {
                                echo $showerror;
                            }
                             ?>
                    </div>
                    <?php
                        }
                        ?>
                    <div class="form-group">
                        <input class="form-control mb-3" type="email" name="email" placeholder="Email Address" required
                            value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control mb-3" type="password" name="password" placeholder="Password"
                            required>
                    </div>
                    <div class="link forget-pass text-end text-center"><a href="forgot-password.php">Forgot
                            password?</a>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Sign In">
                    </div>
                    <div class="link login-link text-center mb-3 mt-3">Don't have an account? <a
                            href="emp_signup.php">Sign up
                            now</a></div>
                </form>

            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>
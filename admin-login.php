<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/color.css"> -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/emp.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Admin Login</title>
</head>

<body style="background-image: url('asset/TransparentBG.png'); ">

    <!--Navigation Bar-->
    <nav class="navbar navbar-expand-lg navbar-light;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="asset/logopet.png" alt="Logo" class="logo" /> </span>
                <span style="text-shadow: 2px 2px 2px  rgba(49, 44, 44, 0.767);" class="text-white"><b>PETCO. ANIMAL
                        CLINIC</b></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>

        <div class="collapse navbar-collapse me-3" id="navbarScroll">
            <ul class="navbar-nav me-auto my-0 my-lg-0 " style="--bs-scroll-height: 100px;">

                
                
            </ul>
        </div>
    </nav>
    


    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="  mx-auto form login-form">
                <form action="php/admin-login-process.php" method="post">

                    <h1 class="text-center mt-3">Sign-in</h1>
                    
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <strong>Warning!</strong> This page is for authorized personnel only.
                    </div>
                    <div class="input-group flex-nowrap mt-3">
                        <span class="input-group-text" id="addon-wrapping">Username</span>
                        <input type="text" class="form-control" name="username" placeholder="Username"
                            aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap mt-2 ">
                        <span class="input-group-text" id="addon-wrapping">Password</span>
                        <input type="password" class="form-control" name="password" placeholder="Password"
                            aria-label="Username" aria-describedby="addon-wrapping" required>
                    </div>
                    <div class="form-group mt-4 pb-3 mb-3">
                        <input class="form-control button" type="submit" name="admin-login" value="Sign In">
                    </div>
                    <!-- <div class="d-grid d-md-flex justify-content-center mt-5 pb-5 mb-3">
                        <button class="btn btn-success" type="submit" name="admin-login">Login</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>
</body>




</html>
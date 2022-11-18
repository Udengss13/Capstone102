<?php require_once "controlleradmin.php";  




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin|| Add Client</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <!-- CSS only -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" -->
    <!-- crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/f8f3c8a43b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">

    <script>
    function populate(s1, s2) {
        var s1 = document.getElementById(s1);
        var s2 = document.getElementById(s2);
        s2.innerHTML = "";
        if (s1.value == "Dog") {
            var optionArray = ["americanbuly|American Bully", "chowchow|Chow Chow", "corgi|Corgi",
                "englishbulldog|English Bulldog", "frenchbulldog|French Bulldog",
                "goldentetriever|Golden Retriever", "pomeranian|Pomeranian", "poodle|Poodle", "pug|Pug",
                "siberianhusky|Siberian Husky", "shittzu|Shih Tzu"
            ];
        } else if (s1.value == "Cat") {
            var optionArray = ["abyssinian|Abyssinian", "siamese|Siamese"];
        }
        for (var option in optionArray) {
            var pair = optionArray[option].split("|");
            var newOption = document.createElement("option");
            newOption.value = pair[0];
            newOption.innerHTML = pair[1];
            s2.options.add(newOption);
        }
    }
    </script>


</head>

<body>

    <body>


        <div class="nav-bar container-fluid overflow-hidden">
            <div class="row vh-100 overflow-auto">
                <div class="col-12 col-sm-3 col-xl-2 px-sm-2 px-0 d-flexs sticky-top">
                    <div
                        class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 pt-2 text-white">
                        <a href="/"
                            class="navbar-brand d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none"><img
                                src="asset/logopet.png" alt="Saint Jude Logo"
                                style="width: 50px; padding-left: 10px; padding-top: 5px;">
                            <span class="navbar-brand">PETCO. ADMIN</span>
                        </a>
                        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start"
                            id="menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link align-middle px-0">
                                    <i class="fs-4 bi-speedometer2"></i> <span
                                        class="ms-1 d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fs-4 bi-person-lines-fill"></i><span
                                        class="ms-1 d-none d-sm-inline">Accounts</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                    aria-labelledby="dropdown">
                                    <li><a class="dropdown-item" href="#">Admin Accounts</a></li>
                                    <li><a class="dropdown-item" href="admin-user-accounts.php">User Accounts</a></li>
                                    <li><a class="dropdown-item" href="#">Employee Accounts</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link px-sm-0 px-2">
                                    <i class="fs-4 bi-table"></i><span class="ms-1 d-none d-sm-inline">Sales</span></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fs-4 bi-archive"></i><span class="ms-1 d-none d-sm-inline">Pet
                                        Archives</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                    aria-labelledby="dropdown">
                                    <li><a class="dropdown-item" href="#">Pet Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Pet Owners</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="nav-link dropdown-toggle px-sm-0 px-1" id="dropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fs-4 bi-pencil-square"></i><span
                                        class="ms-1 d-none d-sm-inline">Content</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                    aria-labelledby="dropdown">
                                    <li><a class="dropdown-item" href="admin-slider.php">Slider</a></li>
                                    <li><a class="dropdown-item" href="admin-quicktips.php">Quicktips</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="admin-orders.php" class="nav-link px-sm-0 px-2">
                                    <i class="fs-4 bi-bag-check"></i><span class="ms-1 d-none d-sm-inline">Orders</span>
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown py-sm-4 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="asset/cha.jpg" alt="Admin" width="28" height="28" class="rounded-circle">
                                <span class="d-none d-sm-inline mx-1">Cha</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark text-small shadow"
                                aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="admin-profile.php">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="admin-login.php">Sign out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!--Sign Up form-->
                <div class="col py-3 mt-5 mb-5 rounded-3">
                    <div class="form-groups  ">
                        <a href=""><i class="fa-solid fa-circle-x"></i><a>
                    </div>
                    <h2 class="text-center text-white">Create Client Account </h2>
                    <p class="text-center text-white">It's quick and easy to Petko.</p>


                    <form action="adminAddClient.php" method="POST" autocomplete="" enctype="multipart/form-data">

                        <!--Message Alert-->
                        <?php if(count($errors) == 1){ ?>
                        <div class="alert alert-danger text-center">
                            <?php
                foreach($errors as $showerror){
                  echo $showerror;
                }
            ?>
                        </div>
                        <?php
            }
            elseif(count($errors) > 1){
            ?>
                        <div class="alert alert-danger">
                            <?php
              foreach($errors as $showerror){
            ?><ul>
                                <li><?php echo $showerror; ?></li>
                            </ul>
                            <?php
              }
            ?>
                        </div>
                        <?php
                    }
                    ?>


                        <div class="container ">
                            <!--1st row-->
                            <div class="row ">
                                <div class="col-6">
                                    <!--FName-->
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Email Address" required value="<?php echo $email ?>"
                                            id="floatingEmail" autocomplete="off">
                                        <label for="floatingEmail">Email</label>
                                    </div>
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="password" name="password"
                                            placeholder="Password" required id="floatingPass">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <!--Confirm Password-->
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="password" name="cpassword"
                                            placeholder="Confirm password" required id="floatingConfirm">
                                        <label for="floatingConfirm">Confirm Password</label>
                                    </div>

                                    <div class="form-floating mb-2">

                                        <input class="form-control" type="text" name="contact" placeholder="Suffix"
                                            id="floatingSuffix" autocomplete="off">
                                        <label for="floatingSuffix">Contact No</label>
                                    </div>
                                    <!--Address-->
                                    <div class="form-floating ">
                                        <input class="form-control" type="text" name="address" placeholder="Address"
                                            required value="<?php echo $address ?>" id="floatingAddress"
                                            autocomplete="off">
                                        <label for="floatingAddress">Complete Address</label>
                                    </div>


                                    <!--Suffix-->

                                </div>

                                <!--2nd Column-->
                                <div class="col-6 ">
                                    <div class="form-floating ">
                                        <input class="form-control mb-2" type="text" name="first_name"
                                            placeholder="First Name" required value="<?php echo $fname ?>"
                                            id="floatingFirst" autocomplete="off">
                                        <label for="floatingFirst">First Name</label>
                                    </div>
                                    <!--MName-->
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="text" name="middle_name"
                                            placeholder="Middle Name" value="<?php echo $mname ?>" id="floatingMiddle"
                                            autocomplete="off">
                                        <label for="floatingMiddle">Middle Name</label>
                                    </div>

                                    <!--LName-->
                                    <div class="form-floating">
                                        <input class="form-control mb-2" type="text" name="last_name"
                                            placeholder="Last Name" required value="<?php echo $lname ?>"
                                            id="floatingLast" autocomplete="off">
                                        <label for="floatingLast">Last Name</label>
                                    </div>




                                    <!--Password-->
                                    <div class="form-floating mb-2">
                                        <input class="form-control" type="text" name="suffix" placeholder="Suffix"
                                            value="<?php echo $suffix ?>" id="floatingSuffix" autocomplete="off">
                                        <label for="floatingSuffix">Suffix</label>
                                    </div>


                                    <input type="file" id="upload-news" name="photo" required>
                                </div>
                                <!--end of row-->
                            </div>

                            <!--2nd Row-->
                            <div class="row">
                                <div class="col mt-4">
                                    <p style="color:white; ">To continue creating account
                                        please,
                                        provide all
                                        the information about your pets that are
                                        need below.</p>
                                </div>
                            </div>


                            <div id="dynamic_field">
                                <div class="row inline" id="row">

                                    <div class="col-4 form-group">
                                        <!-- <label for="exampleFormControlSelect1">Position</label> -->
                                        <select class="form-control" id="slct1" name="pettype"
                                            onchange="populate(this.id,'slct2')" value="<?php echo $pettype ?>">
                                            <option value="" disabled selected>Select Pet Type</option>
                                            <option value="Dog">Dog</option>
                                            <option value="Cat">Cat</option>
                                        </select>
                                    </div>


                                    <div class="col-4 form-group">
                                        <!-- <div class=" flex-nowrap"> -->
                                        <select class="form-control" id="slct2" name="petbreed">
                                            <option value="" disabled selected>Select Pet Breed</option>
                                        </select>
                                        <!-- </div> -->
                                    </div>

                                    <div class="col-4 form-group">
                                        <input class="form-control" type="text" name="petname" placeholder="Pet Name"
                                            required id="floatingAddress" autocomplete="off">
                                    </div>
                                </div>



                                <div class="row mt-4">
                                    <div class="col-4 form-group">Pet Sex:
                                        <!-- <div class=" flex-nowrap"> -->
                                        <select class="form-control" name="petsex">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>

                                        </select>

                                        <!-- </div> -->
                                    </div>
                                    <div class="col-4">Pet Birthday
                                        <div class="form-group mb-3">
                                            <!-- <label for=""></label> -->
                                            <input type="date" name="petbday" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                            </div>







                            <div class="form-group mt-4 text-center">
                                <input class="form-control btn  " style="background-color: #EA6D52; width: 20%"
                                    type="submit" name="signup" value="Create">
                                    <a href="admin-user-accounts.php" class="btn btn-success text-light" onclick="return confirm('Are you sure you want to cancel it?')">Cancel</a>

                            </div>

                    </form>
                </div>
            </div>
        </div>


    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i +
                '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "name.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</html>
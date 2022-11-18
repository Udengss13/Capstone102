<?php require_once "controllerUserData.php";  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <!-- <link href="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js">
    </script>

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

        <!--Navigation Bar-->
        <nav class="navbar navbar-expand-lg navbar-light ; ">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="asset/logopet.png" alt="Logo" class="logo" />
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
                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white " style="border-radius:10px; margin-left:3px;"
                                aria-current="page" href="index.php">HOME</a>
                        </li>
                    </div>
                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="aboutUs.php">ABOUT US</a>
                        </li>
                    </div>
                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="services.php">SERVICES</a>
                        </li>
                    </div>
                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="shop.php">SHOP</a>
                        </li>
                    </div>
                    <div class="text-nowrap">
                        <li class="nav-item">

                            <a class="nav-link text-white" href="petgallery.php">PET GALLERY</a>

                        </li>
                    </div>
                    <!-- <div class=" text-white">
         <?php echo  date("m/d/y") . "<br>"; ?>
       </div> -->
                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="login-user.php">SIGN IN</a>
                        </li>
                    </div>

                    <div class="text-nowrap">
                        <li class="nav-item">
                            <a class="nav-link text-white bg-primary" href="signup-user.php">SIGN UP</a>
                        </li>
                    </div>
                </ul>
            </div>
        </nav>



        <!--Sign Up form-->
        <div class="container py-3 mt-5 mb-5 rounded-3">
            <h2 class="text-center text-white">Create Your Account </h2>
            <p class="text-center text-white">It's quick and easy to Petko.</p>

            <form action="signup-user.php" method="POST" autocomplete="" enctype="multipart/form-data">

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
                                <input class="form-control" type="email" name="email" placeholder="Email Address"
                                    required value="<?php echo $email ?>" id="floatingEmail" autocomplete="off">
                                <label for="floatingEmail">Email</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                    required id="floatingPass">
                                <label for="floatingPassword">Password</label>
                            </div>

                            <!--Confirm Password-->
                            <div class="form-floating mb-2">
                                <input class="form-control" type="password" name="cpassword"
                                    placeholder="Confirm password" required id="floatingConfirm">
                                <label for="floatingConfirm">Confirm Password</label>
                            </div>

                            <div class="form-floating ">
                                <input class="form-control mb-2" type="text" name="first_name" placeholder="First Name"
                                    required value="<?php echo $fname ?>" id="floatingFirst" autocomplete="off">
                                <label for="floatingFirst">First Name</label>
                            </div>
                            <!--MName-->
                            <div class="form-floating mb-2">
                                <input class="form-control" type="text" name="middle_name" placeholder="Middle Name"
                                    value="<?php echo $mname ?>" id="floatingMiddle" autocomplete="off">
                                <label for="floatingMiddle">Middle Name</label>
                            </div>

                            <!--LName-->
                            <div class="form-floating">
                                <input class="form-control mb-2" type="text" name="last_name" placeholder="Last Name"
                                    required value="<?php echo $lname ?>" id="floatingLast" autocomplete="off">
                                <label for="floatingLast">Last Name</label>
                            </div>






                            <!--Suffix-->

                        </div>

                        <!--2nd Column-->
                        <div class="col-6 ">
                            <div class="form-floating mb-2">

                                <input class="form-control" type="text" name="contact" placeholder="Suffix"
                                    id="floatingSuffix" autocomplete="off">
                                <label for="floatingSuffix">Contact No</label>
                            </div>
                            <!--Address-->
                            <div class="form-floating mb-2 ">
                                <input class="form-control" type="text" name="address" placeholder="Address" required
                                    value="<?php echo $address ?>" id="floatingAddress" autocomplete="off">
                                <label for="floatingAddress">Complete Address</label>
                            </div>




                            <!--Password-->
                            <div class="form-floating mb-2">
                                <input class="form-control" type="text" name="suffix" placeholder="Suffix"
                                    value="<?php echo $suffix ?>" id="floatingSuffix" autocomplete="off">
                                <label for="floatingSuffix">Suffix</label>
                            </div>

                            <div class="form-floating mb-2">
                                <div class="row">
                                    <label for="floatingSuffix " class="col-4  p-2 rounded">Choose Profile
                                        picture:</label>
                                    <input type="file" id="upload-news" class="col" name="photo" required>

                                </div>
                            </div>
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
                    <button type="button" name="add" id="add" class="btn btn-success">Add More Pets</button>

                    <div id="dynamic_field">
                        <div class="rows border border-primary p-3 rounded">
                            <div class="row inline">
                                <div class="col-4 form-group">Pet Type:
                                    <!-- <label for="exampleFormControlSelect1">Position</label> onchange="populate(this.id,'slct2')"-->
                                    <select class="form-control" name="pettype[]" value="<?php echo $pettype ?>">
                                        <option value="" disabled selected>Select Pet Type</option>
                                        <option value="Dog">Dog</option>
                                        <option value="Cat">Cat</option>
                                    </select>

                                </div>


                                <div class="col-4 form-group"> Pet Breed
                                    <input list="browsers" class="form-control" name="petbreed[]" id="browser">
                                    <datalist id="browsers">
                                        <option value="american bully">
                                        <option value="chowchow">
                                        <option value="corgi">
                                        <option value="englishbulldog">
                                        <option value="frenchbulldog">
                                        <option value="abyssinian">
                                        <option value="siamese">
                                        <option value="golden retriever">
                                        <option value="pomeranian">
                                        <option value="poodle">
                                        <option value="pug">
                                        <option value="siberian husky">
                                        <option value="shittzu">


                                    </datalist>
                                    <!-- </div> -->
                                </div>

                                <div class="col-4 form-group"> Pet Name
                                    <input class="form-control" type="text" name="petname[]" placeholder="Pet Name"
                                        required id="floatingAddress" autocomplete="off">
                                </div>
                            </div>



                            <div class="row mt-2">
                                <div class="col-4 form-group">Pet Sex:
                                    <!-- <div class=" flex-nowrap"> -->
                                    <select class="form-control" name="petsex[]">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>

                                    </select>

                                    <!-- </div> -->
                                </div>
                                <div class="col-4">Pet Birthday
                                    <div class="form-group mb-3">
                                        <!-- <label for=""></label> -->
                                        <input type="month" id="start"  class="form-control" name="petbday[]" min="2000-03" value="2018-05">
                                        <!-- <input type="text" class="form-control" name="petbday[]" id="datepicker" /> -->
                                        <!-- <input type="date" name="petbday" class="form-control" /> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="form-group mt-4 text-center">
                        <input class="form-control btn  " style="background-color: #EA6D52; width: 20%" type="submit"
                            name="signup" value="Sign up">
                    </div>
                    <div class="link login-link text-center text-white">Already have an account? <a href="index.php"
                            class="text-primary">Login here</a></div>
            </form>
        </div>


        <script>
        $("#datepicker").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true //to close picker once year is selected
        });
        </script>


    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append(
                '<div class="rows border border-primary mt-2 p-3 rounded" id="row' + i +
                '">  <div class="row inline"> <div class="col-4 form-group">Pet Type:<select class="form-control" name="pettype[]" value="<?php echo $pettype ?>"> <option value="" disabled selected>Select Pet Type</option><option value="Dog">Dog</option><option value="Cat">Cat</option></select></div><div class="col-4 form-group"> Pet Breed<input list="browsers" class="form-control" name="petbreed[]" id="browser"><datalist id="browsers"><option value="american bully"><option value="chowchow"><option value="corgi"><option value="englishbulldog"><option value="frenchbulldog"><option value="abyssinian"><option value="siamese"><option value="golden retriever"><option value="pomeranian"><option value="poodle"><option value="pug"><option value="siberian husky"><option value="shittzu"></datalist></div><div class="col-4 form-group"> Pet Name<input class="form-control" type="text" name="petname[]" placeholder="Pet Name" required id="floatingAddress" autocomplete="off"></div></div><div class="row mt-2"><div class="col-4 form-group">Pet Sex:<select class="form-control" name="petsex[]"><option value="male">Male</option><option value="female">Female</option></select></div><div class="col-4">Pet Birthday<div class="form-group mb-3"><input type="month" id="start"  class="form-control" name="petbday[]" min="2000-03" value="2018-05"></div></div> </div><td><button type="button" name="remove" id="' +
                i + '" class="btn btn-danger btn_remove">Remove pet</button></td></tr>');

            $("#datepicker").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true //to close picker once year is selected
            });
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</html>
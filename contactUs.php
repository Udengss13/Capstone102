<?php
  require('php/connection.php');
  
  $start_from = 1; 
  $queryimage = "SELECT * FROM (SELECT * FROM admin_content_homepage LIMIT $start_from, 9) _t ORDER BY RAND() "; //You dont need like you do in SQL;
  $resultimage = mysqli_query($db_admin_account, $queryimage);

?>
<?php

session_start();
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Us</title>
  <link rel="icon" href="asset/logopet.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #1572A1">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="asset/logopet.png" alt="Logo" style="width:45%; height:8vh" /><span
          class="mx-2 text-warning fw-bold">PETCO.</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

    </div>

    <div class="collapse navbar-collapse me-3" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 " style="--bs-scroll-height: 100px;">
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link text-white" aria-current="page" href="index.php">Home</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link active text-info fw-bold" href="#">Contact Us</a>
          </li>
        </div>
        <div class="text-nowrap">
          <li class="nav-item">
            <a class="nav-link active text-white" href="login-user.php">Login</a>
          </li>
        </div>
      </ul>
    </div>
  </nav>

  <!--Contact Us Form-->
  <div class="container mb-5">
    <div class=" text-center mt-5 ">
      <h1 class="display-6 text-uppercase">Get in Touch</h1>
    </div>

    <div class="row ">
      <div class="col-lg-7 mx-auto">
        <div class="card mt-2 mx-auto p-4" style="background-color: #1572A1">
          <div class="card-body ">
            <div class="container ">
              <form action="php/contactUs-process.php" id="contact-form" role="form" method="POST">

                <?php if(isset($msg)){ ?>
                <div class="alert alert-primary alert-dismissible fade show mt-3" role="alert">
                  <span class="text-center"><strong>Message Sent!<br></strong></span>
                  <?php echo $msg; ?>
                </div>

                <?php } ?>

                <div class="controls">

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_name" class="text-white">Firstname <span class="text-danger">*</span></label>
                        <input id="form_name" type="text" name="name" class="form-control"
                          placeholder="Please enter your firstname *" required="required"
                          data-error="Firstname is required.">

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="form_lastname" class="text-white ">Lastname <span
                            class="text-danger">*</span></label>
                        <input id="form_lastname" type="text" name="surname" class="form-control"
                          placeholder="Please enter your lastname *" required="required"
                          data-error="Lastname is required.">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group mt-2">
                        <label for="form_email " class="text-white ">Email <span class="text-danger">*</span></label>
                        <input id="form_email" type="email" name="email" class="form-control"
                          placeholder="Please enter your email *" required="required"
                          data-error="Valid email is required.">

                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group mt-2">
                        <label for="form_email " class="text-white ">Subject <span class="text-danger">*</span></label>
                        <input id="form_email" type="tex" name="subject" class="form-control"
                          placeholder="Please enter your email *" required="required"
                          data-error="Valid email is required.">

                      </div>
                    </div>

                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group mt-2 mb-4">
                        <label for="form_message" class="text-white ">Message <span class="text-danger">*</span></label>
                        <textarea id="form_message" name="message" class="form-control"
                          placeholder="Write your message here." rows="4" required="required"
                          data-error="Please, leave us a message."></textarea>
                      </div>

                    </div>
                    <div class="col-md-12">
                      <input type="submit" class="btn btn-success btn-send  pt-2 btn-block" name="submit_messsage"
                        value="Send Message">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>


        </div>
        <!-- /.8 -->

      </div>
      <!-- /.row-->

    </div>
  </div>


  <!--Footer-->
  <footer class=" footer-banner" id="about">
    <div class="container text">
      <h1>PETCO SHOP</h1>
      <p>Thank you for Visiting Petco Shop Enjoy An GodBless!</p>
      <br>
      <div class="row">
        <div class="col-sm-3">
          <ul class="follow">
            <h3>FOLLOW US!</h3>
            <p></p><a href="https://www.facebook.com/Udeng13">Facebook <i
                class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13"> About Us<i class="fa-solid fa-table-layout"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Our Service <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Privacy Policy <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13">Facebook <i class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
        <div class="col-sm-3">
          <ul class="company">
            <h3>Company</h3>
            <a href="https://www.facebook.com/Udeng13">Facebook <i class="fa-brands fa-facebook-square"></i></a><br>
            <a href="https://www.facebook.com/messages/t/100008437094309">Messenger <i
                class="fa-brands fa-facebook-messenger"></i></a><br>
            <a href="https://www.facebook.com/Udeng13">Instagram <i class="fa-brands fa-instagram"></i></a>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</body>

</html>
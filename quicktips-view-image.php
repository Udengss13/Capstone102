<?php 
    require("php/connection.php");
    
        $id = $_GET['id'];
        //call all news and announcement
        $queryimage = "SELECT * FROM admin_content_homepage WHERE Image_id = $id"; //You don't need a ; like you do in SQL
        $resultimage = mysqli_query($db_admin_account, $queryimage);
        

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <head>
    <title>PetCo Homepage</title>
    <link rel="icon" href="asset/logopet.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css">

    <style>
      .navbar{
        margin-left: 3px
    }

    .nav-item:hover {
        background-color: rgb(23, 171, 201);
        border-radius: ;

    }
    </style>
  </head>

<body>
  <!--navbar-->
  <nav class="navbar navbar-expand-lg navbar-light ; border-bottom border-secondary" style="background: #1572A1;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="asset/logopet.png" alt="Logo" style="width:100%; height:8vh" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="floa-end me-5">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="index.php">Back</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>


  <section id="#home">
    <div class="container">
      <div class="row">
        <?php while($rowimage =  mysqli_fetch_array($resultimage)){ ?>
        <div class="col-12 d-flex justify-content-center mt-4">
          <img src="asset/homepage/<?php echo $rowimage['image_filename']; ?>" style="width:100%; height:90vh; ">
        </div>

        <div class=" container">
          <div class="info">
            <div class="row">
              <div class="col-md-12 ">
                <!--Name-->
                <h1 class="text-center c-green display-8 " style="color: ; text-shadow: 2px 1px 0px pink">
                  <?php echo $rowimage['Image_title']; ?></h1>
               

              </div>
            </div>
          </div>

          
        </div>
        <?php } ?>
      </div>
  </section>

  </div>




  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">

  </script>

</body>

</html>
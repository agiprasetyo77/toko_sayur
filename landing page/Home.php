<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/Style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Lobster&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/mlijo.png">
  <title>Mlijo.com</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: rgb(255, 255, 255);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="assets/logo.jpg" alt="" width="60" height="20" class="d-inline-block align-text-top">
        Mlijo.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
<<<<<<< HEAD:landing page/Home.php
          <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
          <a class="nav-link" href="Menu.php">Menu</a>
          <a class="nav-link" href="Contact.php">Contact</a>
          <a class="nav-link" href="login user/index.php">Login</a>
=======
          <a class="nav-link active" aria-current="page" href="Home.html">Home</a>
          <a class="nav-link" href="Menu.html">Menu</a>
          <a class="nav-link" href="Contact.html">Contact</a>
          <a class="nav-link" href="Login.html" type="submit"><button>Login</button></a>
>>>>>>> dd349e972fab7b29f80e71a06b361931d649bc92:landing page/Home.html
        </div>
      </div>
    </div>
  </nav>

  <!-- Slide -->
  <section class="carousel" id="home">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="8000">
          <img src="assets/Foto1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h1 class="display-1"><strong>SAYUR-SAYURAN</strong></h1>
            <p class="display-6">Tersedia berbagai macam sayur yang selalu fresh dan terjamin mutunya</p>
            <!-- button -->
            <div class="button">
              <a class="btn btn-outline-light" href="Menu.html" role="button">More</a>
            </div>

          </div>
        </div>

        <div class="carousel-item" data-bs-interval="5000">
          <img src="assets/buah1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h1 class="display-1"><strong>BUAH-BUAHAN</strong></h1>
            <p class="display-6">Tersedia berbagai macam buah-buah dengan kualitas yang terbaik.</p>

            <div class="button">
              <a class="btn btn-outline-light" href="Menu.html" role="button">More</a>
            </div>

          </div>
        </div>

        <div class="carousel-item" data-bs-interval="3000">
          <img src="assets/sayurbox1.jpg" class="d-block w-100" alt="...">
          <div class="carousel-caption">
            <h1 class="display-1"><strong>PAKET SAYUR</strong></h1>
            <p class="display-6">Dengan adanya paket sayur akan mempermudah anda untuk memasak sesuai keinginan anda</p>

            <div class="button">
              <a class="btn btn-outline-light" href="Menu.html" role="button">More</a>
            </div>

          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <!-- Column 2 -->
  <div class="block">
    <div class="about">
      <h2 class="title"><strong>CERITA Mlijo.com</strong></h2>
      <p>Berawal dari sebuah ide seseorang yang kita kembangkan didaerah jember kota. Yang merupakan sebuah bisnis
        dibidang sayur, buah dan lain-lainnya.
        Pada Mlijo.com ini terdapat paket masakan yang nantinya akan mempermudah dikalangan masyarakat dan mahasiswa
        didaerah jember kota,
      </p>
    </div>
  </div>

  <!-- column 3 -->
  <div class="block">
    <div class="about2">
      <h2 class="title" style="color: white;"><strong>KAMI SIAP MELAYANI ANDA!</strong></h2>
      <p style="color:white ;">Dengan berbagai macam sayur, buah dan daging</p>
      <div class="box">
        <div class="col-4">
          <img src="assets/icon sayur.png" alt="" width="100" height="100" class="me-2">
          <h4><strong>Sayuran</strong></h4>
          <p>Mlijo.com menyediakan sayuran yang selalu fresh</p>
        </div>
        <div class="box">
          <div class="col-4">
            <img src="assets/icon buah.png" alt="" width="100" height="100" class="me-2">
            <h4><strong>Buah-Buahan</strong></h4>
            <p>Nikmati buah dengan kuliatas terbaik</p>
          </div>
          <div class="box">
            <div class="col-4">
              <img src="assets/icondaging.png" alt="" width="100" height="100" class="me-2">
              <h4><strong>Daging</strong></h4>
              <p>Tersedia berbagai macam daging yang lebih mengutama kualitas dan terjamin fresh</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>


<!--Footer-->
<footer class="bg-dark p-5">
  <div class="container-fluid">
    <div class="row mt-1">
      <div class="col">
        <p class="text-center" style="color: white;"><img src="assets/mlijo.png" style="width: 40px;">Copyright
          &copy;2023 | Created by Mlijo.com</a></p>
      </div>
    </div>
  </div>
</footer>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</html>
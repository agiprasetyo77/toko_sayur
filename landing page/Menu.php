<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!--My Style-->
    <link rel="stylesheet" href="fontawesome-free-6.1.1-web/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Style.css">
    <link rel="shortcut icon" href="assets/mlijo.png">

    <title>Mlijo.com</title>
  </head>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: rgb(255, 255, 255);">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" >
        <img src="assets/logo.jpg" alt="" width="60" height="20" class="d-inline-block align-text-top">
        Mlijo.com</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link" aria-current="page" href="Home.php">Home</a>
          <a class="nav-link active" href="Menu.php">Menu</a>
          <a class="nav-link" href="Contact.php">Contact</a>
      <a class="nav-link" href="/login user/index.php">Login</a>
        </div>
      </div>
    </div>
  </nav>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb my-2 p-5">
      <li class="breadcrumb-item"><a href="Home.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Menu</li>
    </ol>
  </nav>
  <body>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb my-2 p-5">
        <li class="breadcrumb-item"><a href="Home.html"></a></li>
        <li class="breadcrumb-item active" aria-current="page"></li>
      </ol>
    </nav>
    <!-- Head Menu -->
    <section class="page-section" id="Menu">
      <div class="container p-5">
        <div class="Menu text-center">
          <p class="text"><strong>ASSORTMENT</strong></p>
            <h1 class="judul"><strong>TAMPILAN MENU</strong></h1>
            <p>Berbagai macam sayuran, buah-buahan dan paket sayur hemat dan praktis</p>
            <div class="hestia-search-in-menu">
              <div class="hestia-nav-search-is-focused">
                <form role="search" method="get" class="search-form form-group" action="Home.html">
                  <label class="label-floating is-empty form-group">
                    <span class="screen-reader-text"></span>
                    <label class="control-label"></label>
                    <input type="search" class="search-field form-control" placeholder="Sayur, Buah, Paket Sayur ...">
                  </label>                 
                </form>
              </div>
            </div>
        </div>
      </div>
    <!-- Head Menu -->

    <!-- Coffe -->
      <div class="container p-5">
          <div class="coffe">
              <h1>SAYUR-SAYURAN</h1>
              <p class="deskripsi">Mlijo.com ini menyediakan berbagai macam sayuran yang selalu segar dan fresh.</p>
          </div>
          <div class="row row-mb-2 g-4">
            <div class="col">
              <div class="card border-light h-60">
                <img src="assets/bayam.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Bayam</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block"></a>Order Here</button>
              </div>
            </div>
            <div class="col">
              <div class="card border-light h-60">
                <img src="assets/kangkung1.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Kangkung</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block">Order Here</button>
              </div>
            </div>
            <div class="col">
                <div class="card border-light h-60">
                  <img src="assets/jagung.jpg" class="card-img-top" >
                  <div class="card-body">
                    <h5 class="text-center card-title"><strong>Jagung</strong></h5>
                  </div>
                  <button type="button" class="btn btn-dark center-block">Order Here</button>
                </div>
              </div>
              <div class="col">
                <div class="card border-light h-60">
                  <img src="assets/selada.jpg" class="card-img-top" >
                  <div class="card-body">
                    <h5 class="text-center card-title"><strong>Selada</strong></h5>
                  </div>
                  <button type="button" class="btn btn-dark center-block">Order Here</button>
                </div>
              </div>          
          </div>        
      </div>
    <!-- Coffee -->
 
    <!-- Non Coffe -->
      <div class="container p-5">
        <div class="coffe">
            <h1>BUAH-BUAHAN</h1>
            <p class="deskripsi">Mlijo.com juga menyediakan berbagai macam buah-buahan yang selalu fresh dan terjamin kualitasnya</p>
        </div>
        <div class="row row-mb-2 g-4">
          <div class="col">
            <div class="card border-light h-60 mb-3">
              <img src="assets/apel.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Apel</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
          <div class="col">
            <div class="card border-light h-60 mb-3 mb-3">
              <img src="assets/jeruk.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Jeruk</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
          <div class="col">
              <div class="card border-light h-60 mb-auto">
                <img src="assets/semangka.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Semangka</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block">Order Here</button>
              </div>
            </div>
            <div class="col">
              <div class="card border-light h-60 mb-3">
                <img src="assets/strawberry.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Strawberry</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block">Order Here</button>
              </div>
            </div>
        </div>
    <!-- Non Coffe -->

    <!-- Food & Snack -->
      <div class="container py-5">
        <div class="coffe">
          <h1>PAKET SAYUR</h1>
          <p class="deskripsi">Yang paling utama di Mlijo.com ini merupakan menyediakan paket sayur hemat yang akan memudahkan pembeli untuk mengolah masakan dan tidak perlu ribet</p>
        </div>
        <div class="row row-mb-2 g-4">
          <div class="col">
            <div class="card border-light h-60">
              <img src="assets/sayur soup.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Sayur Soup</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
          <div class="col">
            <div class="card border-light h-60">
              <img src="assets/sayur asem.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Sayur Asem Jakarta</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
          <div class="col">
              <div class="card border-light h-60">
                <img src="assets/cap jay.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Paket Sayur Cap Cay</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block">Order Here</button>
              </div>
            </div>
            <div class="col">
              <div class="card border-light h-60">
                <img src="assets/tumis.jpg" class="card-img-top" >
                <div class="card-body">
                  <h5 class="text-center card-title"><strong>Tumis</strong></h5>
                </div>
                <button type="button" class="btn btn-dark center-block">Order Here</button>
              </div>
            </div>
        </div>
      </div>
    </section>
    <!-- Food & Snack -->
    <div class="container py-5">
      <div class="coffe">
        <h1>PERDAGINGAN</h1>
        <p class="deskripsi">Pada Mlijo.com ini terdapat berbagai macam daging dengan kualitas yang baik dan selalu fresh</p>
      </div>
      <div class="row row-mb-2 g-4">
        <div class="col">
          <div class="card border-light h-60">
            <img src="assets/ayam.jpg" class="card-img-top" >
            <div class="card-body">
              <h5 class="text-center card-title"><strong>Daging Ayam</strong></h5>
            </div>
            <button type="button" class="btn btn-dark center-block">Order Here</button>
          </div>
        </div>
        <div class="col">
          <div class="card border-light h-60">
            <img src="assets/sapi.jpg" class="card-img-top" >
            <div class="card-body">
              <h5 class="text-center card-title"><strong>Daging Sapi</strong></h5>
            </div>
            <button type="button" class="btn btn-dark center-block">Order Here</button>
          </div>
        </div>
        <div class="col">
            <div class="card border-light h-60">
              <img src="assets/salmon.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Ikan Salmon</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
          <div class="col">
            <div class="card border-light h-60">
              <img src="assets/telur.jpg" class="card-img-top" >
              <div class="card-body">
                <h5 class="text-center card-title"><strong>Telur</strong></h5>
              </div>
              <button type="button" class="btn btn-dark center-block">Order Here</button>
            </div>
          </div>
      </div>
    </div>
  </section>
    <!--Footer-->
    <footer class="bg-dark p-4 mt-5">
      <div class="container" id="footer">
        <div class="row mt-2">
          <div class="col">
            <p class="text-center ps-1"><img src="assets/mlijo.png" style="width: 40px;">Copyright @2023| Created by <a href="" class="text-decoration-none text-light fw-bold">Mlijo.com</a> </p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

  </body>
</html>
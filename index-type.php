<?php

  include "config.php";
  session_start();

  if (isset($_GET['bahasa'])) {
    if ($_GET['bahasa'] == "jawa"){
      $_SESSION['bahasa'] = "jawa";
    } elseif ($_GET['bahasa'] == "sunda") {
      $_SESSION['bahasa'] = "sunda";
    } else { 
      $_SESSION['bahasa'] = "bali" ;
    }
  } else { $_SESSION['bahasa'] = "jawa"; }
      
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kuis</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/style-index-type.css" />

  </head>
  <body class="text-white">

    <!-- Navbar -->
    <nav class="navbar navbar-dark navbar-expand-lg">
      <div class="container-fluid mx-5 col-lg-10 mx-auto text-dark py-2">
        <div class="py-3">
          <img src="./img/logo.png" alt="" />
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-5 mb-2 mb-lg-0 text-xl-center">
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" aria-current="page" href="./index.html">Beranda</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-semibold" href="./index-bahasa.php">Kuis</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="./history.php">Riwayat</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="./scoreboard-bahasa.php">Papan Skor</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <main>
        <div class="col-10 mx-auto d-flex justify-content-center align-items-center">
        <section class="me-5 d-flex flex-column justify-content-center text-center" style="width: 350px; height: 350px" id="audio">
          <a href="./index-level.php?tipe=audio" class="text-decoration-none">
            <img src="./img/type/audio.png" alt="" />
            <div class="text-uppercase">audio</div>
          </a>
        </section>
        <section class="ms-5 d-flex flex-column justify-content-center text-center" style="width: 350px; height: 350px" id="gambar">
          <a href="./index-level.php?tipe=gambar" class="text-decoration-none">
            <img src="./img/type/gambar.png" alt="" />
            <div class="text-uppercase">gambar</div>
          </a>
        </section>
      </div>
      <div class="col-10 mx-auto d-flex justify-content-center align-items-center">
        <section class="d-flex flex-column justify-content-center text-center" style="width: 140px; height: 140px" id="bahasa">
          <div class="text-decoration-none">
            <img src="./img/quiz/<?php echo $_SESSION['bahasa']?>.png" width="65" alt="" />
            <div class="text-uppercase mt-2"><?php echo $_SESSION['bahasa']?></div>
          </div>
        </section>
      </div>
    </main>

    <footer></footer>
  </body>
</html>

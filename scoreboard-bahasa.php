<?php

  include "config.php";
  session_start();

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
    <script src="./bootstrap-5.2.2-dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="css/style-index-choose.css" />

  </head>
  <body class="text-light">

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
            <a class="nav-link text-white fw-normal" href="./index-bahasa.php">Kuis</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link text-white fw-normal" href="./history.php">Riwayat</a>
          </li>
          <li class="nav-item me-5">
            <a class="nav-link text-white fw-semibold" href="./scoreboard.php">Papan Skor</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

    <main>
      <div class="col-11 col-lg-10 mx-auto d-flex justify-content-center align-items-center">
        <section class="ms-3 me-4 d-flex flex-column justify-content-center text-center" style="width: 380px; height: 390px" id="jawa">
          <a href="./scoreboard.php?bahasa=jawa" class="py-5 text-decoration-none" <?php $_SESSION['bahasa'] = "jawa"; ?>>
            <img src="./img/quiz/jawa.png" alt="" />
            <div>JAWA</div>
          </a>
        </section>
        <section class="ms-3 me-4 d-flex flex-column justify-content-center text-center" style="width: 380px; height: 390px" id="sunda">
          <a href="./scoreboard.php?bahasa=sunda" class="py-5 text-decoration-none">
            <img src="./img/quiz/sunda.png" alt="" />
            <div>SUNDA</div>
          </a>
        </section>
        <section class="ms-3 me-4 d-flex flex-column justify-content-center text-center" style="width: 380px; height: 390px" id="bali">
          <a href="./scoreboard.php?bahasa=bali" class="text-decoration-none" style="padding: 68px 0px">
            <img src="./img/quiz/jawa.png" alt="" />
            <div>BALI</div>
          </a>
        </section>
      </div>
    </main>

    <footer></footer>
  </body>
</html>

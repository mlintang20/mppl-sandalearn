<?php

  include "config.php";

  session_start();
  $sid = session_id();
  $idq = $_SESSION['id_kuis'];
  
  if(isset($_POST['submit'])){
    $hasil = 0;
    if(!empty($_POST['quizcheck'])){
      $counter = count($_POST['quizcheck']);

      $selected = $_POST['quizcheck'];
      $query = mysqli_query($db, "SELECT * FROM soal WHERE id_kuis = $idq");
      $i = 1;

      while($rows = mysqli_fetch_array($query)){
        if(isset($selected[$i])){
          $checked = $rows['id_kunci'] == $selected[$i];
          if($checked){
            $hasil++;
          }

          if($i == 1){
            $_SESSION['soal-1'] = $selected[1];
          }
          else if($i == 2){
            $_SESSION['soal-2'] = $selected[2];
          }
          else if($i == 3){
            $_SESSION['soal-3'] = $selected[3];
          }
        }
        $i++;
      }
      
      $_SESSION['submit'] = $_POST['submit'];
      $_SESSION['quizcheck'] = $_POST['quizcheck'];
    }

    $score = $hasil * 100;
    mysqli_query($db, "INSERT INTO `sesi` (`id_sesi`, `id_kuis`, `skor`)
    VALUES ('$sid', $idq, $score)");

  }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SANDALEARN</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

  <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="css/style-check.css"></head>
<head>
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
              <a class="nav-link text-white fw-semibold" href="./quiz.php">Kuis</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="./history.php">Riwayat</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="./scoreboard.html">Papan Skor</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <main>
    <div class="container">
      <div class="col-11 mx-auto d-flex flex-column justify-content-center align-items-center" id="container">
        <div class="my-5 col-10 mx-auto d-flex justify-content-center align-items-center text-center fw-bold" style="font-size: 50px">
          Selamat<br />LEVEL 1 Telah Terselesaikan
        </div>
        <div class="my-5 col-10 mx-auto d-flex justify-content-center align-items-center text-center text-primary fw-bold" style="font-size: 50px">
          <?php
          if (!empty($_POST['quizcheck'])) {
            echo "<br>BENAR: " . $hasil . "/" . ($i-1);
            echo "<br>SKOR ANDA " . $score . " ptx";
          } else {
            echo "Anda tidak menjawab 1 soal pun :(";
          }
          ?>
        </div>

        <div class="my-5 col-11 mx-auto d-flex justify-content-center align-items-center">
          <section class="ms-5 me-5 d-flex flex-column justify-content-center" id="left">
            <a href="../../quiz.html" class="text-decoration-none">MENU</a>
          </section>
          <section class="ms-5 me-5 d-flex flex-column justify-content-center" id="mid">
              <a href="pembahasan.php">PEMBAHASAN</a>
          </section>
          <section class="ms-5 me-5 d-flex flex-column justify-content-center" id="right">
            <a href="../quiz-level-gambar.html" class="text-decoration-none">NEXT LEVEL</a>
          </section>
        </div>
      </div>
      </div>
    </main>
</body>
</html>
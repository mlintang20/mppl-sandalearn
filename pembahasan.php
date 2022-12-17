<?php

  include "config.php";

  session_start();
  $idq = $_SESSION['id_kuis'];

  if(isset($_SESSION['submit'])){
    if(!empty($_SESSION['quizcheck'])){
      $counter = count($_SESSION['quizcheck']);

      $selected = $_SESSION['quizcheck'];
      $query = mysqli_query($db, "SELECT * FROM soal WHERE id_kuis = $idq");
      $i = 1;
      $hasil = 0;

      while($rows = mysqli_fetch_array($query)){
        if(isset($selected[$i])){
          $checked = $rows['id_kunci'] == $selected[$i];
          if($checked){
            $hasil++;
          }

          if($i == 1){
            if($checked){
              $soal1 = "benar";
            } else{
              $soal1 = "salah";
            }
          }
          else if($i == 2){
            if($checked){
              $soal2 = "benar";
            } else{
              $soal2 = "salah";
            }
          }
          else if($i == 3){
            if($checked){
              $soal3 = "benar";
            } else{
              $soal3 = "salah";
            }
          }
        }
        $i++;
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pembahasan</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="css/style-pembahasan.css">
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

  <div class="container">
    <div class="col-lg-11 my-5 mx-auto">
      <?php
        $idq = $_SESSION['id_kuis'];
        $i = 1;
        $query = mysqli_query($db, "SELECT * FROM soal WHERE id_kuis = $idq");
        while ($rows = mysqli_fetch_array($query)) {
          $ids = $rows['id_soal'];
      ?>
        <div class="card mb-4 pertanyaan" id="container-<?= $i; ?>">
          <!-- <h4 class="card-header">NO <?= $i . ". " . $rows['pertanyaan']; ?></h4> -->
          <?php if($_SESSION['tipe'] == "gambar"): ?>
            <img src="images/<?php echo $rows['attachment']; ?>" width="300" class="align-self-center" alt="">
          <?php else: ?>
            <audio controls class="align-self-center" style="width: 500px; margin-top: 125px; margin-bottom: 50px;">
              <source src="audio/<?php echo $rows['attachment']; ?>" type="audio/mpeg">
            </audio>
          <?php endif ?>
          <h4 class="mb-4 col-10 mx-auto d-flex justify-content-center align-items-center text-uppercase fw-bold 
            <?php if(isset($selected[$i])){ 
              if($i == 1){echo $soal1;} 
              else if($i == 2){echo $soal2;} 
              else if($i == 3){echo $soal3;} } 
              else{ echo "kosong"; } ?>">
            <?php if(isset($selected[$i])){ 
              if($i == 1){echo $soal1;} 
              else if($i == 2){echo $soal2;} 
              else if($i == 3){echo $soal3;} } 
              else{ echo "TIDAK MENJAWAB"; } ?>
          </h4>
          <h4 class="mb-4 col-10 mx-auto d-flex justify-content-center align-items-center fw-semibold">NO <?= $i . ". " . $rows['pertanyaan']; ?></h4>
          <div class="mb-3 col-11 mx-auto d-flex justify-content-center align-items-center">
            <?php
              $query_jwb = mysqli_query($db, "SELECT * FROM jawaban WHERE id_soal = $ids");

              $j = 1;
              while ($rows_jwb = mysqli_fetch_array($query_jwb)) {
            ?>
            <section class="pilihan ms-3 me-4 d-flex justify-content-center 
              <?php if(isset($selected[$i])){
                    if($rows_jwb['id_jawaban'] == $rows['id_kunci']){
                      echo "benar";
                    } 
                    else{ 
                      if($i == 1 && $rows_jwb['id_jawaban'] == $_SESSION['soal-1']){echo "salah";} 
                      if($i == 2 && $rows_jwb['id_jawaban'] == $_SESSION['soal-2']){echo "salah";} 
                      if($i == 3 && $rows_jwb['id_jawaban'] == $_SESSION['soal-3']){echo "salah";}
                    }
                  } else{
                    if($rows_jwb['id_jawaban'] == $rows['id_kunci']){
                      echo "benar";
                    }
                  }
                ?>"
                id="<?= $i.$j; ?>">
              <div value="<?= $rows_jwb['id_jawaban']; ?>" id="quizcheck[<?= $rows_jwb['id_soal']; ?>]">
                <?= $rows_jwb['jawaban']; ?>
              </div>
            </section>
            <?php
                $j++;
              }
            ?>
          </div>
          <div class="my-3 d-flex flex-column justify-content-center align-items-center">
            <h4 onclick="javascript:
                    if(document.getElementById('detail-pembahasan-<?= $i; ?>').classList.contains('d-none')){
                      document.getElementById('detail-pembahasan-<?= $i; ?>').classList.replace('d-none', 'd-block');
                    } else{
                      document.getElementById('detail-pembahasan-<?= $i; ?>').classList.replace('d-block', 'd-none');
                    }
                  "
                class="mx-auto d-flex justify-content-center align-items-center text-uppercase fw-bold" id="pembahasan">pembahasan</h4>
            <h4 class="col-9 d-none" id="detail-pembahasan-<?= $i; ?>"><?= $rows['detail_pembahasan']; ?></h4>
          </div>
        </div>
      <?php
          $i++;
        }
      ?>

    </div>
  </div>
</body>
</html>
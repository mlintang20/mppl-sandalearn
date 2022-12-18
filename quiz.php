<?php

  include "config.php";
  session_start();

  if (isset($_GET['lvl'])) {
    if ($_GET['lvl'] == "1"){
      $_SESSION['level'] = "1"; 
    } elseif ($_GET['lvl'] == "2") { 
      $_SESSION['level'] = "2" ;
    } else { 
      $_SESSION['level'] = "2" ;
    }
  } else { $_SESSION['lvl'] = "1"; }
  
  $tipe = $_SESSION['tipe'];
  $level = $_SESSION['level'];
  $bahasa = $_SESSION['bahasa'];

  $query = mysqli_query($db, "SELECT * FROM kuis WHERE bahasa = '$bahasa' AND media = '$tipe' AND level = $level");
  while ($rows = mysqli_fetch_array($query)) {
    $_SESSION['id_kuis'] = $rows['id_kuis'];
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

  <link rel="stylesheet" href="css/style-quiz.css">

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
        if (isset($_SESSION['id_kuis'])) {
      ?>
        <form action="check.php" method="POST">
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
                  <h4 class="mb-4 col-10 mx-auto d-flex justify-content-center align-items-center">No <?= $i . ". " . $rows['pertanyaan']; ?></h4>
                  <div class="mb-3 col-11 mx-auto d-flex justify-content-center align-items-center">
                    <?php
                  $query_jwb = mysqli_query($db, "SELECT * FROM jawaban WHERE id_soal = $ids");
                  
                  $j = 1;
                  while ($rows_jwb = mysqli_fetch_array($query_jwb)) {
                    ?>
                    <!-- <div class="card-body">
                      <input type="radio" name="quizcheck[<?= $rows_jwb['id_soal']; ?>]" value="<?= $rows_jwb['id_jawaban']; ?>">
                      <?= $rows_jwb['jawaban']; ?>
                    </div> -->
                    <section class="pilihan ms-2 me-3 d-flex justify-content-center" id="<?= $i.$j; ?>">
                      <input onclick="javascript: 
                            if(<?= $j; ?> == 1){
                              document.getElementById('<?= $i.'1'; ?>').classList.add('soal-checked');
                              document.getElementById('<?= $i.'2'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'3'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'4'; ?>').classList.remove('soal-checked');
                            }
                            if(<?= $j; ?> == 2){
                              document.getElementById('<?= $i.'1'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'2'; ?>').classList.add('soal-checked');
                              document.getElementById('<?= $i.'3'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'4'; ?>').classList.remove('soal-checked');
                            }
                            if(<?= $j; ?> == 3){
                              document.getElementById('<?= $i.'1'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'2'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'3'; ?>').classList.add('soal-checked');
                              document.getElementById('<?= $i.'4'; ?>').classList.remove('soal-checked');
                            }
                            if(<?= $j; ?> == 4){
                              document.getElementById('<?= $i.'1'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'2'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'3'; ?>').classList.remove('soal-checked');
                              document.getElementById('<?= $i.'4'; ?>').classList.add('soal-checked');
                            }
                            "
                        type="radio" name="quizcheck[<?= $i; ?>]" value="<?= $rows_jwb['id_jawaban']; ?>" id="quizcheck[<?= $i; ?>]">
                        <?= $rows_jwb['jawaban']; ?>
                      </section>
                      <?php
                    $j++;
                  }
                ?>
              </div>
            </div>
          <?php
              $i++;
            }
          ?>

          <input type="submit" name="submit" value="Selesai" class="btn btn-success mt-3 mx-auto d-block">
        </form>
        
      <?php 
        } else {
          echo "<h2>Question does not Exist</h2>";
        }
      ?>
    </div>
  </div>
  
</body>
</html>
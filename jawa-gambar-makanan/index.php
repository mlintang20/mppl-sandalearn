<?php

  include "../config.php";

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

  <link rel="stylesheet" href="../bootstrap-5.2.2-dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="../css/style-quiz.css">

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
              <a class="nav-link text-white fw-normal" aria-current="page" href="../index.html">Beranda</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-semibold" href="../quiz.php">Kuis</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="../history.html">Riwayat</a>
            </li>
            <li class="nav-item me-5">
              <a class="nav-link text-white fw-normal" href="../scoreboard.html">Papan Skor</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

  <div class="container">
    <div class="col-lg-12 my-5 mx-auto">
      <form action="check.php" method="POST">
        <?php

          for ($i=1; $i <= 3; $i++) {
            $query = mysqli_query($db, "SELECT * FROM soal_jawa_gambar_makanan WHERE id_soal = $i");
            while ($rows = mysqli_fetch_array($query)) {
        ?>

              <div class="card mb-4 pertanyaan" id="container-<?= $i; ?>">
                <img src="../images/<?php echo $rows['gambar_soal']; ?>" width="300" class="align-self-center" alt="">
                <h4 class="mb-4 col-10 mx-auto d-flex justify-content-center align-items-center">NO <?= $i . ". " . $rows['pertanyaan']; ?></h4>
                <div class="mb-3 col-11 mx-auto d-flex justify-content-center align-items-center">
                  <?php
                    $query_jwb = mysqli_query($db, "SELECT * FROM jawaban_jawa_gambar_makanan WHERE id_soal = $i");

                    $j = 1;
                    while ($rows_jwb = mysqli_fetch_array($query_jwb)) {
                  ?>

                      <section class="pilihan ms-2 me-2 d-flex justify-content-center" id="<?= $i.$j; ?>">
                        <input onclick="javascript: 
                                          if(this.checked !== null){
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
                                          }
                              "
                              type="radio" name="quizcheck[<?= $rows_jwb['id_soal']; ?>]" value="<?= $rows_jwb['id_jawaban']; ?>" id="quizcheck[<?= $rows_jwb['id_soal']; ?>]">
                        <?= $rows_jwb['jawaban']; ?>
                      </section>
                  <?php
                      $j++;
                    }
                  ?>
                </div>
              </div>

        <?php
            }
          }
        ?>

        <input type="submit" name="submit" value="Selesai" class="btn btn-success mt-3 mx-auto d-block">
      </form>
    </div>
  </div>
  


</body>
</html>
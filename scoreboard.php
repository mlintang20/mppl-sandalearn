<?php

    include "config.php";
    if (isset($_GET['bahasa'])) {
        if ($_GET['bahasa'] == "jawa"){
            $bahasa = "jawa" ;
        } elseif ($_GET['bahasa'] == "sunda") {
            $bahasa = "sunda" ;
        } else { 
            $bahasa = "bali" ;
        }
    } else { $bahasa = "jawa"; }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SANDALEARN</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />

    <link rel="stylesheet" href="bootstrap-5.2.2-dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="css/scoreboard.css" />

    <!-- CDN Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"> -->
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
                <a class="nav-link text-white fw-semibold" aria-current="page" href="./index.html">Beranda</a>
              </li>
              <li class="nav-item me-5">
                <a class="nav-link text-white fw-normal" href="./index-bahasa.php">Kuis</a>
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

    <!-- Main -->
    <main>
        <div class="col-10 mx-auto d-flex justify-content-center align-items-center">
            <section class="text-center">
                <?php
                    $sql = "SELECT * FROM kuis k NATURAL JOIN sesi s WHERE bahasa = '$bahasa' ORDER BY skor DESC LIMIT 5";

                    $query = mysqli_query($db, $sql);
                    echo strtoupper($bahasa);
                ?>
                    <table>
                    <tr>
                        <th scope="col">id_sesi</th>
                        <th scope="col">waktu_selesai</th>
                        <th scope="col">skor</th>
                    </tr>
                <?php
                    while($row = mysqli_fetch_array($query)) {
                        $id = $row['id_sesi'];
                        $t = $row['waktu_selesai'];
                        $score = $row['skor'];
                        $tipe = $row['media'];
                        $lvl = $row['level'];
                ?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $t ?></td>
                        <td><?php echo $score ?></td>
                        <td>
                            <section class="d-flex flex-column justify-content-center text-center" style="width: 70px; height: 70px" id="bahasa">
                                <div class="text-decoration-none">
                                    <img src="./img/type/<?php echo $tipe?>.png" width="65" alt="" />
                                </div>
                            </section>
                        </td>
                        <td>
                            <section class="d-flex flex-column justify-content-center text-center" style="width: 70px; height: 70px" id="bahasa">
                                <div class="text-decoration-none">
                                    <img src="./img/level/<?php echo $lvl?>.png" width="65" alt="" />
                                </div>
                            </section>
                        </td>
                    </tr>
                <?php
                    }
                    echo "</table>";
                ?>
            </section>
        </div>
    </main>
    <!-- End Main -->

    <footer></footer>
  </body>
</html>

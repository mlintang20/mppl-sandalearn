<?php

  include "config.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SANDALEARN</title>

    <!-- CDN Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-light">
  <div class="container">
    <div class="col-lg-8 my-5 mx-auto">
      <form action="check.php" method="POST">
        <?php

          for ($i=1; $i <= 3; $i++) { 
            $query = mysqli_query($db, "SELECT * FROM soal WHERE id_soal = $i");
            while ($rows = mysqli_fetch_array($query)) {
        ?>

              <div class="card bg-dark mb-4" style="box-shadow: 4px -4px 8px #FEBB40, -4px 4px 8px #FEBB40, 4px 4px 8px #FEBB40, -4px -4px 8px #FEBB40;">
                <h4 class="card-header">NO <?= $i . ". " . $rows['pertanyaan']; ?></h4>
                <?php
                  $query_jwb = mysqli_query($db, "SELECT * FROM jawaban WHERE id_soal = $i");

                  while ($rows_jwb = mysqli_fetch_array($query_jwb)) {
                ?>
                    <div class="card-body">
                      <input type="radio" name="quizcheck[<?= $rows_jwb['id_soal']; ?>]" value="<?= $rows_jwb['id_jawaban']; ?>">
                      <?= $rows_jwb['jawaban']; ?>
                    </div>
                <?php
                  }
                ?>
              </div>

        <?php
            }
          }
        ?>

        <input type="submit" name="submit" value="Submit" class="btn btn-success mt-3 mx-auto d-block">
      </form>
    </div>
  </div>

</body>
</html>
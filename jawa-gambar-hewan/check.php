<?php

  include "../config.php";

  session_start();

  if(isset($_POST['submit'])){
    if(!empty($_POST['quizcheck'])){
      $counter = count($_POST['quizcheck']);
      echo "Anda berhasil menjawab " . $counter . "/3 soal";

      $selected = $_POST['quizcheck'];
      $query = mysqli_query($db, "SELECT * FROM soal");
      $i = 1;
      $hasil = 0;

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

      echo "<br>Soal yang dijawab dengan benar: " . $hasil . " soal.";
      echo "<br>Skor Anda adalah: " . ($hasil * 100) . " poin.";
      
      $_SESSION['submit'] = $_POST['submit'];
      $_SESSION['quizcheck'] = $_POST['quizcheck'];
    } else{
      echo "Anda tidak menjawab 1 soal pun :(";
    }
    echo '<br /><a href="pembahasan.php">PEMBAHASAN</a>';

  }


?>


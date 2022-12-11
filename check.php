<?php

  include "config.php";

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
        }
        $i++;
      }

      echo "<br>Soal yang dijawab dengan benar: " . $hasil . " soal.";
      echo "<br>Skor Anda adalah: " . ($hasil * 100) . " poin.";
    } else{
      echo "Anda tidak menjawab 1 soal pun :(";
    }
  }

?>


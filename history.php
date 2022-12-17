<?php

    include "config.php";
    $bahasa = $_SESSION['bahasa'];

    $sql = "SELECT * FROM kuis k NATURAL JOIN sesi s WHERE bahasa = '$bahasa'  ORDER BY waktu_selesai DESC LIMIT 10";

    $query = mysqli_query($db, $sql);
    echo "<table>";
    while($row = mysqli_fetch_array($query)) {
        $id   = $row['id_sesi'];
        $t = $row['waktu_selesai'];
        $score = $row['skor'];
        $tipe = $row['media'];
        $level = $row['level'];
        echo "<tr><td>".$id."</td><td>".$t."</td><td>".$score."</td><td>".$tipe."</td><td>".$level."</td></tr>";
    }
    echo "</table>";

?>
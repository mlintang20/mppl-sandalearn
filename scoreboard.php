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

    $sql = "SELECT * FROM kuis k NATURAL JOIN sesi s WHERE bahasa = '$bahasa' ORDER BY skor DESC LIMIT 10";

    $query = mysqli_query($db, $sql);
    echo strtoupper($bahasa);
    echo "<table>";
    while($row = mysqli_fetch_array($query)) {
        $id = $row['id_sesi'];
        $t = $row['waktu_selesai'];
        $score = $row['skor'];
        $tipe = $row['media'];
        $level = $row['level'];
        echo "<tr><td>".$id."</td><td>".$t."</td><td>".$score."</td><td>".$tipe."</td><td>".$level."</td></tr>";
    }
    echo "</table>";

?>
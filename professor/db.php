<?php
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "aulas_atv10";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
?>

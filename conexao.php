<?php
    $hostname = "localhost";
    $bancodedados = "sistema_xerox";
    $usuario = "root";
    $senha = "0909";

    $mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
    if ($mysqli->connect_errno) {
        echo "Falha ao conectar: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    } else {
        // echo "Conectou";
    }
?>
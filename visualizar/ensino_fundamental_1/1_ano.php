<?php
    require "../../conexao.php";

    $sql_total = "SELECT SUM(qtd_copias) AS total_copias_1ano FROM ensino_fundamental_1 WHERE turma = '1º ano'";
    $resultado_total = $mysqli->query($sql_total);
    $row_total = $resultado_total->fetch_assoc();
    $total_copias_1ano = $row_total["total_copias_1ano"];

    echo "Total de cópias da turma 1º ano: " . $total_copias_1ano . "<br><br>";

    $sql = "SELECT id, qtd_copias FROM ensino_fundamental_1 WHERE turma = '1º ano' ORDER BY id DESC";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Quantidade de cópias: " . $row["qtd_copias"] . "<br>";
        }
    }
    else {
        echo "Nenhum dado encontrado para a turma 1º ano.";
    }

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualização de dados</title>
</head>
<body>
    <br>
    <a href="../../index.php">Voltar</a>
</body>
</html>
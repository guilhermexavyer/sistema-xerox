<?php
    require "../../conexao.php";

    $sql_total = "SELECT SUM(qtd_copias) AS total_copias_2ano FROM ensino_fundamental_1 WHERE turma = '2º ano'";
    $resultado_total = $mysqli->query($sql_total);
    $row_total = $resultado_total->fetch_assoc();
    $total_copias_2ano = $row_total["total_copias_2ano"];

    echo "Total de cópias da turma 2º ano: " . $total_copias_2ano . "<br><br>";

    $sql = "SELECT id, qtd_copias FROM ensino_fundamental_1 WHERE turma = '2º ano' ORDER BY id DESC";
    $resultado = $mysqli->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            echo "ID: " . $row["id"] . " - Quantidade de cópias: " . $row["qtd_copias"] . "<br>";
        }
    }
    else {
        echo "Nenhum dado encontrado para a turma 2º ano.";
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
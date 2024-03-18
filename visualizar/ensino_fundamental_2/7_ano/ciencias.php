<?php
    require "../../../conexao.php";

    $sql_total = "SELECT SUM(qtd_copias) AS total_copias_total FROM ensino_fundamental_2 WHERE turma = '7º ano' AND disciplina = 'Ciências/Biologia'";
    $resultado_total = $mysqli->query($sql_total);
    $row_total = $resultado_total->fetch_assoc();
    $total_copias_total = $row_total["total_copias_total"];

    echo "Total de cópias de Ciências da turma 7º ano: " . $total_copias_total . "<br><br>";

    $sql = "SELECT id, SUM(qtd_copias) AS total_copias_7ano 
            FROM ensino_fundamental_2 
            WHERE turma = '7º ano' AND disciplina = 'Ciências/Biologia'
            GROUP BY id";
    $resultado = $mysqli->query($sql);

    $dados = array();
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $dados[] = $row;
        }
        
        $dados = array_reverse($dados);
        
        foreach ($dados as $row) {
            echo "ID: " . $row["id"] . " - Total de cópias de Ciências da turma 7º ano: " . $row["total_copias_7ano"] . "<br>";
        }
    }
    else {
        echo "Nenhum dado encontrado para a turma 7º ano.";
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
    <a href="7_ano.html">Voltar</a>
    <a href="../../../index.php">Início</a>
</body>
</html>
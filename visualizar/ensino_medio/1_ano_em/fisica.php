<?php
    require "../../../conexao.php";

    $sql_total = "SELECT SUM(qtd_copias) AS total_copias_total FROM ensino_medio WHERE turma = '1º ano EM' AND disciplina = 'Física'";
    $resultado_total = $mysqli->query($sql_total);
    $row_total = $resultado_total->fetch_assoc();
    $total_copias_total = $row_total["total_copias_total"];

    echo "Total de cópias de Física da turma 1º ano: " . $total_copias_total . "<br><br>";

    $sql = "SELECT id, SUM(qtd_copias) AS total_copias_1ano 
            FROM ensino_medio 
            WHERE turma = '1º ano EM' AND disciplina = 'Física'
            GROUP BY id";
    $resultado = $mysqli->query($sql);

    $dados = array();
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $dados[] = $row;
        }
        
        $dados = array_reverse($dados);
        
        foreach ($dados as $row) {
            echo "ID: " . $row["id"] . " - Total de cópias de Física da turma 1º ano: " . $row["total_copias_1ano"] . "<br>";
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
    <a href="1_ano_em.html">Voltar</a>
    <a href="../../../index.php">Início</a>
</body>
</html>
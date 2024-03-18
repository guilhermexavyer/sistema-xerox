<?php
    require "../../../conexao.php";

    $sql_total = "SELECT SUM(qtd_copias) AS total_copias_total FROM ensino_medio WHERE turma = '2º ano EM' AND disciplina = 'Inglês'";
    $resultado_total = $mysqli->query($sql_total);
    $row_total = $resultado_total->fetch_assoc();
    $total_copias_total = $row_total["total_copias_total"];

    echo "Total de cópias de Inglês da turma 2º ano: " . $total_copias_total . "<br><br>";

    $sql = "SELECT id, SUM(qtd_copias) AS total_copias_2ano 
            FROM ensino_medio 
            WHERE turma = '2º ano EM' AND disciplina = 'Inglês'
            GROUP BY id";
    $resultado = $mysqli->query($sql);

    $dados = array();
    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $dados[] = $row;
        }
        
        $dados = array_reverse($dados);
        
        foreach ($dados as $row) {
            echo "ID: " . $row["id"] . " - Total de cópias de Inglês da turma 2º ano: " . $row["total_copias_2ano"] . "<br>";
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
    <meta name="viewport" content="width=device-width, initial-scale=2.0">
    <title>Visualização de dados</title>
</head>
<body>
    <br>
    <a href="2_ano_em.html">Voltar</a>
    <a href="../../../index.php">Início</a>
</body>
</html>
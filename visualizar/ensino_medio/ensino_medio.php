<?php
    require "../../conexao.php";

    if (isset($_POST['submit'])) {
        $turma = $_POST['turma'];
        $disciplina = $_POST['disciplina'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        $sql_total = "SELECT SUM(qtd_copias) AS total_copias_turma FROM ensino_medio 
                    WHERE turma = '$turma' AND disciplina = '$disciplina'
                    AND dt BETWEEN '$data_inicio' AND '$data_fim'";

        $resultado_total = $mysqli->query($sql_total);

        $row_total = $resultado_total->fetch_assoc();
        $total_copias_turma = $row_total["total_copias_turma"];

        echo "Total de cópias da turma $turma no período de $data_inicio a $data_fim: " . $total_copias_turma . "<br><br>";

        $sql = "SELECT * FROM ensino_medio WHERE turma = '$turma' AND disciplina = '$disciplina' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Dados da disciplina $disciplina da turma $turma no período de $data_inicio a $data_fim:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Turma</th>
                        <th>Disciplina</th>
                        <th>Quantidade de Cópias</th>
                    </tr>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['dt']."</td>
                        <td>".$row['turma']."</td>
                        <td>".$row['disciplina']."</td>
                        <td>".$row['qtd_copias']."</td>
                    </tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Nenhum resultado encontrado para disciplina $disciplina da turma $turma no período de $data_inicio a $data_fim.";
        }
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
    <a href="../../index.php">Início</a>
    <a href="educacao_infantil.html">Consulta</a>
</body>
</html>
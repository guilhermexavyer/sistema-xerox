<?php
    require "../../conexao.php";

    if (isset($_POST['submit'])) {
        $nome = $_POST['nome'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        $sql_total = "SELECT SUM(qtd_copias) AS total_copias_nome FROM funcionarios 
                    WHERE nome = '$nome' 
                    AND dt BETWEEN '$data_inicio' AND '$data_fim'";

        $resultado_total = $mysqli->query($sql_total);

        $row_total = $resultado_total->fetch_assoc();
        $total_copias_nome = $row_total["total_copias_nome"];

        echo "Total de cópias da nome $nome no período de $data_inicio a $data_fim: " . $total_copias_nome . "<br><br>";

        $sql = "SELECT * FROM funcionarios WHERE nome = '$nome' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Dados da nome $nome no período de $data_inicio a $data_fim:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>nome</th>
                        <th>Quantidade de Cópias</th>
                    </tr>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['dt']."</td>
                        <td>".$row['nome']."</td>
                        <td>".$row['qtd_copias']."</td>
                    </tr>";
            }
            echo "</table>";
        }
        else
        {
            echo "Nenhum resultado encontrado para a nome $nome no período de $data_inicio a $data_fim.";
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
    <a href="../../index.php">Voltar</a>
</body>
</html>
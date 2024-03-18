<?php
    require "../../conexao.php";

    $mensagem = "";

    if (isset($_POST['submit'])) {
        $turma = $_POST['turma'];
        $disciplina = $_POST['disciplina'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        $sql_total = "SELECT SUM(qtd_copias) AS total_copias_turma FROM ensino_fundamental_2 
                    WHERE turma = '$turma' AND disciplina = '$disciplina'
                    AND dt BETWEEN '$data_inicio' AND '$data_fim'";

        $resultado_total = $mysqli->query($sql_total);

        $row_total = $resultado_total->fetch_assoc();
        $total_copias_turma = $row_total["total_copias_turma"];

        echo "Total de cópias da disciplina $disciplina da turma $turma no período de $data_inicio a $data_fim: " . $total_copias_turma . "<br><br>";

        $sql = "SELECT * FROM ensino_fundamental_2 WHERE turma = '$turma' AND disciplina = '$disciplina' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Dados da turma $turma no período de $data_inicio a $data_fim:</h2>";
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
                        <td>".$row['disciplina']."</td>
                        <td>".$row['turma']."</td>
                        <td>".$row['qtd_copias']."</td>
                    </tr>";
            }
            echo "</table>";
        }
        else {
            echo "Nenhum resultado encontrado na disciplina $disciplina da turma $turma no período de $data_inicio a $data_fim.";
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <br>
    <a href="../../index.php">Início</a>
    <a href="ensino_fundamental_2.html">Consulta</a>

    <form id="deleteForm" method="post" action="delete.php">
        <h3>Remover registro</h3>

        <label>ID:</label>
        <input type="number" name="id" id="deleteID" required>

        <input type="submit" value="Deletar">
    </form>

    <div id="mensagem"></div>

    <script>
        $(document).ready(function(){
            $('#deleteForm').submit(function(e){
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function(response){
                        $('#mensagem').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
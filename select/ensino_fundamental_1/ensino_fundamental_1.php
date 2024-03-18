<?php
    require "../../conexao.php";

    $mensagem = "";

    if (isset($_POST['submit'])) {
        $turma = $_POST['turma'];
        $data_inicio = $_POST['data_inicio'];
        $data_fim = $_POST['data_fim'];

        $sql_total = "SELECT SUM(qtd_copias) AS total_copias_turma FROM ensino_fundamental_1 
                    WHERE turma = '$turma' 
                    AND dt BETWEEN '$data_inicio' AND '$data_fim'";

        $resultado_total = $mysqli->query($sql_total);

        $row_total = $resultado_total->fetch_assoc();
        $total_copias_turma = $row_total["total_copias_turma"];

        echo "<h2>Total de cópias do $turma entre $data_inicio e $data_fim: $total_copias_turma</h2>" . "<br>";

        $sql = "SELECT * FROM ensino_fundamental_1 WHERE turma = '$turma' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Cópias do $turma entre $data_inicio e $data_fim:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Data</th>
                        <th>Turma</th>
                        <th>Quantidade de Cópias</th>
                    </tr>";
            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['dt']."</td>
                        <td>".$row['turma']."</td>
                        <td>".$row['qtd_copias']."</td>
                    </tr>";
            }
            echo "</table>";
        }
        else {
            echo "Nenhuma cópia registrada no $turma entre $data_inicio e $data_fim.";
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
    <form id="delete_form" method="post" action="delete.php">
        <h3>Remover registro</h3>

        <label>ID:</label>
        <input type="number" name="id" id="deleteID" required>

        <input type="submit" value="Deletar">
    </form>

    <div id="mensagem"></div>

    <br>
    <a href="../../index.php">Início</a>
    <a href="ensino_fundamental_1.html">Consulta</a>

    <script>
        $(document).ready(function(){
            $('#delete_form').submit(function(e){
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
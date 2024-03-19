<?php
    require "../views/conexao.php";

    $mensagem = "";

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

        echo "<h2>Total de cópias de '$nome' entre $data_inicio e $data_fim: $total_copias_nome</h2>" . "<br>";

        $sql = "SELECT * FROM funcionarios WHERE nome = '$nome' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

        $resultado = $mysqli->query($sql);

        if ($resultado->num_rows > 0) {
            echo "<h2>Cópias de '$nome' entre $data_inicio e $data_fim:</h2>";
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
        else {
            echo "Nenhuma cópia registrada em nome de '$nome' entre $data_inicio e $data_fim.";
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
    <form id="delete_form" method="post" action="../delete/funcionarios.php">
        <h3>Remover registro</h3>

        <label>ID:</label>
        <input type="number" name="id" id="deleteID" required>

        <input type="submit" value="Deletar">
    </form>

    <div id="mensagem"></div>

    <br>
    <a href="../../index.html">Início</a>
    <a href="../consulta.html">Consulta</a>

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
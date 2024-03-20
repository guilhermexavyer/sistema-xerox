<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta - Educação Infantil</title>
    <link rel="stylesheet" href="../assets/css/select.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <nav>
        <a href="../views/index.html">Início</a>
        <a href="../views/consulta.php">Consulta</a>
    </nav>

    <?php
        require "../views/conexao.php";
        
        $mensagem = "";

        if (isset($_POST['submit'])) {
            $turma = $_POST['turma'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $sql_total = "SELECT SUM(qtd_copias) AS total_copias_turma FROM educacao_infantil 
                        WHERE turma = '$turma' 
                        AND dt BETWEEN '$data_inicio' AND '$data_fim'";

            $resultado_total = $mysqli->query($sql_total);

            $row_total = $resultado_total->fetch_assoc();
            $total_copias_turma = $row_total["total_copias_turma"];

            echo "<h3>Total: $total_copias_turma</h3>";
        }
    ?>

    <form id="delete_form" method="post" action="../delete/educacao_infantil.php">
        <h3>Remover registro</h3>
        
        <br><label>ID:</label>
        <input type="number" name="id" id="deleteID" required>

        <input type="submit" value="Deletar">

        <div id="mensagem">RESULTADO</div>
    </form>

    <script src="../assets/js/select.js"></script>

    <?php
        require "../views/conexao.php";
        
        $mensagem = "";

        if (isset($_POST['submit'])) {
            $turma = $_POST['turma'];
            $data_inicio = $_POST['data_inicio'];
            $data_fim = $_POST['data_fim'];

            $sql_total = "SELECT SUM(qtd_copias) AS total_copias_turma FROM educacao_infantil 
                        WHERE turma = '$turma' 
                        AND dt BETWEEN '$data_inicio' AND '$data_fim'";

            $resultado_total = $mysqli->query($sql_total);

            $sql = "SELECT * FROM educacao_infantil WHERE turma = '$turma' AND dt BETWEEN '$data_inicio' AND '$data_fim' ORDER BY id DESC";

            $resultado = $mysqli->query($sql);

            if ($resultado->num_rows > 0) {
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
                echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Data</th>
                    <th>Turma</th>
                    <th>Quantidade de Cópias</th>
                </tr>";
                echo "<tr>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                    <td>NULL</td>
                </tr>
                    </table>";
            }
        }

        $mysqli->close();
    ?>
</body>
</html>
<?php
    require "../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/select.css">
    <title>Consulta</title>
</head>
<body>
    <header>
        <nav class="menu-cabecalho">
            <img src="../assets/img/logo_branca.png" alt="logo" id="icone-sistema" width="45">
            <a href="../views/cadastro_atividade.php">Cadastro Atividade</a>
            <a href="../views/consulta_atividade.php">Consulta Atividade</a>
            <a href="../views/cadastro_funcionario.php">Cadastro Funcionário</a>
            <a href="../views/consulta_funcionario.php">Consulta Funcionário</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Resultado</h3>
            <p>Visualização da consulta</p>
        </div>
    </header>

    <div class="resultado-container">
        <?php
            $turma = $_POST['turma'];
            $disciplina = $_POST['disciplina'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];

            $sql_total = "SELECT SUM(n_copias) AS total_copias_turma FROM atividade
                        WHERE turma = '$turma' AND disciplina = '$disciplina'
                        AND dt BETWEEN '$data_inicial' AND '$data_final'";

            $resultado_total = $mysqli->query($sql_total);

            $sql = "SELECT * FROM atividade WHERE turma = '$turma' AND disciplina = '$disciplina' AND dt BETWEEN '$data_inicial' AND '$data_final' ORDER BY id DESC";

            $resultado = $mysqli->query($sql);

            $row_total = $resultado_total->fetch_assoc();
            $total_copias_turma = $row_total["total_copias_turma"];

            echo "<h3 class='resultado-total'>Total: $total_copias_turma</h3>";
        ?>

        <main>
            <form class="cadastro-form" method="POST" action="delete_atividade.php">
                <h4>REMOVER</h4>
                <input name="id" type="number" placeholder="ID" required>

                <input id="button" type="submit" value="REMOVER">    
            </form>
        </main>

        <?php
            if ($resultado->num_rows > 0) {
                echo "<table class='resultado-table'>
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
                            <td>".$row['n_copias']."</td>
                        </tr>";
                }
                echo "</table>";
            }
            else {
                echo "<p class='no-results'>Nenhum resultado encontrado.</p>";
            }
        ?>
    </div>

    <script src="../assets/js/select.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.cadastro-form').submit(function(event) {
                event.preventDefault();

                var id = $(this).find('input[name="id"]').val();

                $.ajax({
                    type: 'POST',
                    url: 'delete_atividade.php',
                    data: { id: id },
                    success: function(response) {
                        alert(response);
                        // window.location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>
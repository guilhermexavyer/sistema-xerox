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
            <a href="../views/cadastro_atividade.php">Cad. Ativ.</a>
            <a href="../views/consulta_atividade.php">Cons. Ativ.</a>
            <a href="../views/cadastro_funcionario.php">Cad. Func.</a>
            <a href="../views/consulta_funcionario.php">Cons. Func.</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Resultado</h3>
            <p>Visualização da consulta</p>
        </div>
    </header>

    <div class="resultado-container">
        <?php
            $nome = $_POST['nome'];
            $data_inicial = $_POST['data_inicial'];
            $data_final = $_POST['data_final'];

            $sql_total = "SELECT SUM(n_copias) AS total_copias_nome FROM funcionarios
                        WHERE nome = '$nome'
                        AND dt BETWEEN '$data_inicial' AND '$data_final'";

            $resultado_total = $mysqli->query($sql_total);

            $sql = "SELECT * FROM funcionarios WHERE nome = '$nome' AND dt BETWEEN '$data_inicial' AND '$data_final' ORDER BY id DESC";

            $resultado = $mysqli->query($sql);

            $row_total = $resultado_total->fetch_assoc();
            $total_copias_nome = $row_total["total_copias_nome"];

            echo "<h3 class='resultado-total'>Total: $total_copias_nome</h3>";
        ?>

        <main>
            <form class="cadastro-form" method="POST" action="delete_funcionario.php">
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
                            <th>Nome</th>
                            <th>Quantidade de Cópias</th>
                        </tr>";
                while ($row = $resultado->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row['id']."</td>
                            <td>".$row['dt']."</td>
                            <td>".$row['nome']."</td>
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
            // Intercepta o envio do formulário de exclusão
            $('.cadastro-form').submit(function(event) {
                // Impede o comportamento padrão do formulário (recarregar a página)
                event.preventDefault();

                // Obtém o valor do ID a ser excluído
                var id = $(this).find('input[name="id"]').val();

                // Envia uma solicitação AJAX para o script de exclusão
                $.ajax({
                    type: 'POST',
                    url: 'delete_funcionario.php',
                    data: { id: id },
                    success: function(response) {
                        // Exibe a resposta do servidor (mensagem de sucesso ou erro)
                        alert(response);
                        
                        // Recarrega os dados na página, ou faça qualquer outra ação desejada
                        // Por exemplo, atualizar a tabela de visualização após a exclusão
                        // window.location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>


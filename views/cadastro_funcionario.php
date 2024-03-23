<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <?php
        require '../conexao.php';
    ?>

    <header>
        <nav class="menu-cabecalho">
            <img src="../assets/img/logo_branca.png" alt="logo" id="icone-sistema" width="45">
            <a href="cadastro_atividade.php">Cad. Ativ.</a>
            <a href="consulta_atividade.php">Cons. Ativ.</a>
            <a href="cadastro_funcionario.php" class="pagina-ativa">Cad. Func.</a>
            <a href="consulta_funcionario.php">Cons. Func.</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Cadastro</h3>
            <p>Preencha o formulário</p>
        </div>
    </header>

    <main>
        <form class="cadastro-form" method="POST" action="../php/insert_funcionario.php">
            <h4>CÓPIAS DE FUNCIONÁRIO</h4>
            <label for="">Data:</label>
            <input name="dt" type="date" required>

            <label for="">Nome:</label>
            <select name="nome" required>
                <option value=""></option>
                <option value="Ana Clara">Ana Clara</option>
                <option value="Andressa">Andressa</option>
                <option value="Camila">Camila</option>
                <option value="Guilherme">Guilherme</option>
                <option value="Jean Carlos">Jean Carlos</option>
                <option value="Jéssica">Jéssica</option>
            </select>

            <label for="">Nº de cópias:</label>
            <input name="n_copias" type="number" min="1" required>

            <input id="button" type="submit" value="CADASTRAR">
        </form>
    </main>

    <script src="../assets/js/cadastro.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Intercepta o envio do formulário
            $('.cadastro-form').submit(function(event) {
                // Impede o comportamento padrão do formulário (recarregar a página)
                event.preventDefault();

                // Obtém os valores dos campos do formulário
                var dt = $(this).find('input[name="dt"]').val();
                var nome = $(this).find('select[name="nome"]').val();
                var n_copias = $(this).find('input[name="n_copias"]').val();

                // Envia uma solicitação AJAX para o script de inserção
                $.ajax({
                    type: 'POST',
                    url: '../php/insert_funcionario.php',
                    data: { 
                        dt: dt,
                        nome: nome,
                        n_copias: n_copias
                    },
                    success: function(response) {
                        // Exibe o alerta de sucesso
                        alert("Cadastro realizado com sucesso!");
                        // Limpa o formulário após o cadastro bem-sucedido
                        $('.cadastro-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        // Exibe a mensagem de erro
                        alert("Ocorreu um erro: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
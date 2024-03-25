<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>PrintSynk - Cad. Func.</title>
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
            <h3>Cadastro - Funcionário</h3>
            <p>Preencha o formulário</p>
        </div>
    </header>

    <main>
        <form class="cadastro-form" method="POST" action="../php/insert_funcionario.php">
            <h4>CAD. CPS. DE FUNCIONÁRIO</h4>
            <label for="">Data:</label>
            <input name="dt" type="date" required>

            <label for="">Nome:</label>
            <select name="nome" required>
                <option value=""></option>
                <option value="Ana Clara - Direção">Ana Clara - Direção</option>
                <option value="Amanda - Informática">Amanda - Informática</option>
                <option value="Andressa - Ensino Fundamental I">Andressa - Ensino Fundamental I</option>
                <option value="Camila - Ensino Fundamental II">Camila - Ensino Fundamental II</option>
                <option value="Carolyne - Dança">Carolyne - Dança</option>
                <option value="Eliana - Biblioteca">Eliana - Biblioteca</option>
                <option value="Fernanda - RH">Fernanda - RH</option>
                <option value="Guilherme - Xerox">Guilherme - Xerox</option>
                <option value="Jean Carlos - Informática">Jean Carlos - Informática</option>
                <option value="Jéssica - Informática">Jéssica - Informática</option>
                <option value="Luís Paulo - Ensino Médio">Luís Paulo - Ensino Médio</option>
                <option value="Magda - Educação Infantil">Magda - Educação Infantil</option>
                <option value="Mônica - Financeiro">Mônica - Financeiro</option>
                <option value="Regiane - Secretaria">Regiane - Secretaria</option>
                <option value="Saulo - Educação Física">Saulo - Educação Física</option>
                <option value="Sebastiana - Pastoral">Sebastiana - Pastoral</option>
                <option value="Valéria - Educação Física">Valéria - Educação Física</option>
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
            $('.cadastro-form').submit(function(event) {
                event.preventDefault();

                var dt = $(this).find('input[name="dt"]').val();
                var nome = $(this).find('select[name="nome"]').val();
                var n_copias = $(this).find('input[name="n_copias"]').val();

                $.ajax({
                    type: 'POST',
                    url: '../php/insert_funcionario.php',
                    data: { 
                        dt: dt,
                        nome: nome,
                        n_copias: n_copias
                    },
                    success: function(response) {
                        alert("Cadastro realizado com sucesso!");
                        $('.cadastro-form')[0].reset();
                    },
                    error: function(xhr, status, error) {
                        alert("Ocorreu um erro: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>
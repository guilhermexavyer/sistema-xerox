<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/cadastro.css">
    <title>PrintSynk - Cad. Ativ.</title>
</head>
<body>
    <?php
        require '../conexao.php';
    ?>

    <header>
        <nav class="menu-cabecalho">
            <img src="../assets/img/logo_branca.png" alt="logo" id="icone-sistema" width="45">
            <a href="cadastro_atividade.php" class="pagina-ativa">Cad. Ativ.</a>
            <a href="consulta_atividade.php">Cons. Ativ.</a>
            <a href="cadastro_funcionario.php">Cad. Func.</a>
            <a href="consulta_funcionario.php">Cons. Func.</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Cadastro - Atividade</h3>
            <p>Preencha o formulário</p>
        </div>
    </header>

    <main>
        <form class="cadastro-form" method="POST" action="../php/insert_atividade.php">
            <h4>CAD. CPS. DE ATIVIDADE</h4>
            <label for="">Data:</label>
            <input name="dt" type="date" required>

            <label for="">Turma:</label>
            <select name="turma" required>
                <option value=""></option>

                <option value="Maternal I">Maternal I</option>
                <option value="Maternal II">Maternal II</option>
                <option value="Jardim I">Jardim I</option>
                <option value="Jardim II">Jardim II</option>

                <option value="1º ano">1º ano</option>
                <option value="2º ano">2º ano</option>
                <option value="3º ano">3º ano</option>
                <option value="4º ano">4º ano</option>
                <option value="5º ano">5º ano</option>

                <option value="6º ano">6º ano</option>
                <option value="7º ano">7º ano</option>
                <option value="8º ano">8º ano</option>
                <option value="9º ano">9º ano</option>

                <option value="1º ano EM">1º ano EM</option>
                <option value="2º ano EM">2º ano EM</option>
                <option value="3º ano EM">3º ano EM</option>
            </select>

            <label for="">Disciplina:</label>
            <select name="disciplina" id="" required>
                <option value=""></option>
                <option value="EDUCAÇÃO INFANTIL">EDUCAÇÃO INFANTIL</option>
                <option value="ENSINO FUNDAMENTAL I">ENSINO FUNDAMENTAL I</option>
                <option value="Arte">Arte</option>
                <option value="Biologia">Biologia</option>
                <option value="Ciências">Ciências</option>
                <option value="Educação Financeira">Educação Financeira</option>
                <option value="Educação Física">Educação Física</option>
                <option value="Ensino Religioso">Ensino Religioso</option>
                <option value="Espanhol">Espanhol</option>
                <option value="Filosofia">Filosofia</option>
                <option value="Física">Física</option>
                <option value="Geografia">Geografia</option>
                <option value="Gramática">Gramática</option>
                <option value="História">História</option>
                <option value="Inglês">Inglês</option>
                <option value="Literatura">Literatura</option>
                <option value="Matemática">Matemática</option>
                <option value="Matemática Financeira">Matemática Financeira</option>
                <option value="Português">Português</option>
                <option value="Química">Química</option>
                <option value="Redação">Redação</option>
                <option value="Sociologia">Sociologia</option>
                <option value="Tecnologias Digitais">Tecnologias Digitais</option>
                <option value="SAM/SAB">SAM/SAB</option>
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
                var turma = $(this).find('select[name="turma"]').val();
                var disciplina = $(this).find('select[name="disciplina"]').val();
                var n_copias = $(this).find('input[name="n_copias"]').val();

                $.ajax({
                    type: 'POST',
                    url: '../php/insert_atividade.php',
                    data: { 
                        dt: dt,
                        turma: turma,
                        disciplina: disciplina,
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
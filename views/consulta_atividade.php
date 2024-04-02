<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/consulta.css">
    <title>PrintSynk - Cons. Ativ.</title>
</head>
<body>
    <header>
        <nav class="menu-cabecalho">
            <img src="../assets/img/logo_branca.png" alt="logo" id="icone-sistema" width="45">
            <a href="cadastro_atividade.php">Cad. Ativ.</a>
            <a href="consulta_atividade.php" class="pagina-ativa">Cons. Ativ.</a>
            <a href="cadastro_funcionario.php">Cad. Func.</a>
            <a href="consulta_funcionario.php">Cons. Func.</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Consulta - Atividade</h3>
            <p>Preencha o formulário</p>
        </div>
    </header>

    <main>
        <form class="cadastro-form" method="POST" action="../php/select_atividade.php">
            <h4>CONS. CPS. DE ATIVIDADE</h4>
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
            <select id="" name="disciplina" required>
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

            <label for="">Data inicial:</label>
            <input name="data_inicial" type="date" required>

            <label for="">Data final:</label>
            <input name="data_final" type="date" required>

            <input id="button" type="submit" value="CONSULTAR">
        </form>
    </main>

    <script src="../assets/js/consulta.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../assets/img/ícone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/consulta.css">
    <title>Consulta</title>
</head>
<body>
    <header>
        <nav class="menu-cabecalho">
            <img src="../assets/img/logo_branca.png" alt="logo" id="icone-sistema" width="45">
            <a href="cadastro_atividade.php">Cad. Ativ.</a>
            <a href="consulta_atividade.php">Cons. Ativ.</a>
            <a href="cadastro_funcionario.php">Cad. Func.</a>
            <a href="consulta_funcionario.php" class="pagina-ativa">Cons. Func.</a>
        </nav>
        <div class="mensagem-cabecalho">
            <h3>Consulta</h3>
            <p>Preencha o formulário</p>
        </div>
    </header>

    <main>
        <form class="cadastro-form" method="POST" action="../php/select_funcionario.php">
            <h4>CONSULTA DE FUNCIONÁRIO</h4>
            <label for="">Funcionário:</label>
            <select name="nome" required>
                <option value=""></option>
                <option value="Ana Clara">Ana Clara</option>
                <option value="Andressa">Andressa</option>
                <option value="Camila">Camila</option>
                <option value="Guilherme">Guilherme</option>
                <option value="Jean Carlos">Jean Carlos</option>
                <option value="Jéssica">Jéssica</option>
            </select>

            <label for="">Data inicial:</label>
            <input name="data_inicial" type="date">

            <label for="">Data final:</label>
            <input name="data_final" type="date">

            <input id="button" type="submit" value="CONSULTAR   ">
        </form>
    </main>

    <script src="../assets/js/consulta.js"></script>
</body>
</html>
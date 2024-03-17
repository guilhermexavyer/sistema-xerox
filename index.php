<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <?php
        require "conexao.php";
    ?>

    <!-- EDUCAÇÃO INFANTIL -->
    <form action="inserir/educacao_infantil.php" method="POST">
        <h2>Educação Infantil</h2>

        <label>Turma:</label>
        <select id="" name="turma" required>
            <option value=""></option>
            <option value="Maternal I">Maternal I</option>
            <option value="Maternal II">Maternal II</option>
            <option value="Jardim I">Jardim I</option>
            <option value="Jardim II">Jardim II</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="qtd_copias" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>

    <!-- ENSINO FUNDAMENTAL I -->
    <form action="inserir/ensino_fundamental_1.php" method="POST">
        <h2>Ensino Fundamental I</h2>

        <label>Turma:</label>
        <select id="" name="turma" required>
            <option value=""></option>
            <option value="1º ano">1º ano</option>
            <option value="2º ano">2º ano</option>
            <option value="3º ano">3º ano</option>
            <option value="4º ano">4º ano</option>
            <option value="5º ano">5º ano</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="qtd_copias" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>

    <!-- ENSINO FUNDAMENTAL II -->
    <form action="inserir/ensino_fundamental_2.php" method="POST">
        <h2>Ensino Fundamental II</h2>

        <label>Turma:</label>
        <select id="" name="turma" required>
            <option value=""></option>
            <option value="6º ano">6º ano</option>
            <option value="7º ano">7º ano</option>
            <option value="8º ano">8º ano</option>
            <option value="9º ano">9º ano</option>
        </select>

        <label>Disciplina:</label>
        <select id="" name="disciplina" required>
            <option value=""></option>
            <option value="Arte">Arte</option>
            <option value="Ciências/Biologia">Ciências/Biologia</option>
            <option value="Educação Física">Educação Física</option>
            <option value="Ensino Religioso">Ensino Religioso</option>
            <option value="Física">Física</option>
            <option value="Geografia">Geografia</option>
            <option value="História">História</option>
            <option value="Inglês">Inglês</option>
            <option value="Matemática">Matemática</option>
            <option value="Matemática Financeira">Matemática Financeira</option>
            <option value="Português">Português</option>
            <option value="Química">Química</option>
            <option value="Redação">Redação</option>
            <option value="Tecnologias Digitais">Tecnologias Digitais</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="qtd_copias" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>
    
    <!-- ENSINO MÉDIO -->
    <form action="inserir/ensino_medio.php" method="POST">
        <h2>Ensino Médio</h2>

        <label>Turma:</label>
        <select id="" name="turma" required>
            <option value=""></option>
            <option value="1º ano EM">1º ano EM</option>
            <option value="2º ano EM">2º ano EM</option>
            <option value="3º ano EM">3º ano EM</option>
        </select>

        <label>Disciplina:</label>
        <select id="" name="disciplina" required>
            <option value=""></option>
            <option value="Arte">Arte</option>
            <option value="Biologia">Biologia</option>
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
            <option value="Química">Química</option>
            <option value="Redação">Redação</option>
            <option value="Sociologia">Sociologia</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="qtd_copias" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>

    <form action="inserir/funcionarios.php" method="POST">
        <h2>Funcionários</h2>

        <label>Funcionário:</label>
        <select id="" name="nome" required>
            <option value=""></option>
            <option value="Ana Clara - Direção">Ana Clara - Direção</option>
            <option value="Andressa - Ensino Fundamental I">Andressa - Ensino Fundamental I</option>
            <option value="Camila - Ensino Fundamental II">Camila - Ensino Fundamental II</option>
            <option value="Guilherme - Xerox">Guilherme - Xerox</option>
            <option value="Jean Carlos - Sala de Informática">Jean Carlos - Sala de Informática</option>
            <option value="Luís Paulo - Ensino Médio">Luís Paulo - Ensino Médio</option>
            <option value="Magda - Educação Infantil">Magda - Educação Infantil</option>
            <option value="Mônica - Financeiro">Mônica - Financeiro</option>
            <option value="Regiane - Secretaria">Regiane - Secretaria</option>
            <option value="Sebastiana - Pastoral">Sebastiana - Pastoral</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="qtd_copias" id="" required>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
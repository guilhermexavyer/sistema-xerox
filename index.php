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

    <form action="" method="POST">
        <h2>Educação Infantil</h2>

        <label>Turma:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">Maternal I</option>
            <option value="">Maternal II</option>
            <option value="">Jardim I</option>
            <option value="">Jardim II</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>

    <form action="" method="POST">
        <h2>Ensino Fundamental I</h2>

        <label>Turma:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">1º ano</option>
            <option value="">2º ano</option>
            <option value="">3º ano</option>
            <option value="">4º ano</option>
            <option value="">5º ano</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>

    <form action="" method="POST">
        <h2>Ensino Fundamental II</h2>

        <label>Turma:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">6º ano</option>
            <option value="">7º ano</option>
            <option value="">8º ano</option>
            <option value="">9º ano</option>
        </select>

        <label>Disciplina:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">Arte</option>
            <option value="">Ciências/Biologia</option>
            <option value="">Educação Física</option>
            <option value="">Ensino Religioso</option>
            <option value="">Física</option>
            <option value="">Geografia</option>
            <option value="">História</option>
            <option value="">Inglês</option>
            <option value="">Matemática</option>
            <option value="">Matemática Financeira</option>
            <option value="">Português</option>
            <option value="">Química</option>
            <option value="">Redação</option>
            <option value="">Tecnologias Digitais</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="" id="" required>

        <input type="submit" value="Enviar">
    </form>

    <br><br><br>
    
    <form action="" method="POST">
        <h2>Ensino Médio</h2>

        <label>Turma:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">1º ano EM</option>
            <option value="">2º ano EM</option>
            <option value="">3º ano EM</option>
        </select>

        <label>Disciplina:</label>
        <select id="" name="" required>
            <option value=""></option>
            <option value="">Arte</option>
            <option value="">Biologia</option>
            <option value="">Ensino Religioso</option>
            <option value="">Espanhol</option>
            <option value="">Filosofia</option>
            <option value="">Física</option>
            <option value="">Geografia</option>
            <option value="">Gramática</option>
            <option value="">História</option>
            <option value="">Inglês</option>
            <option value="">Literatura</option>
            <option value="">Matemática</option>
            <option value="">Química</option>
            <option value="">Redação</option>
            <option value="">Sociologia</option>
        </select>

        <label>Nº de cópias:</label>
        <input type="number" name="" id="" required>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>
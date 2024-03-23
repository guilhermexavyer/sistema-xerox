<?php
    require "../conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dt = $_POST['dt'];
        $turma = $_POST['turma'];
        $disciplina = $_POST['disciplina'];
        $n_copias = $_POST['n_copias'];

        $sql = "INSERT INTO atividade (dt, turma, disciplina, n_copias) VALUES ('$dt', '$turma', '$disciplina', '$n_copias')";

        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Dados inseridos com sucesso";
            // Definindo a variável para indicar que o cadastro foi realizado com sucesso
            echo "Cadastro Realizado";
        }
        else {
            $mensagem = "Erro ao inserir dados: " . $mysqli->error;
        }
    }

    $mysqli->close();
?>
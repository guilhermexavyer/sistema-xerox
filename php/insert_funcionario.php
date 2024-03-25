<?php
    require "../conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dt = $_POST['dt'];
        $nome = $_POST['nome'];
        $n_copias = $_POST['n_copias'];

        $sql = "INSERT INTO funcionarios (dt, nome, n_copias) VALUES ('$dt', '$nome', '$n_copias')";

        if ($mysqli->query($sql) === TRUE) {
            $mensagem = "Dados inseridos com sucesso";
            echo "Cadastro Realizado";
        }
        else {
            $mensagem = "Erro ao inserir dados: " . $mysqli->error;
        }
    }

    $mysqli->close();
?>
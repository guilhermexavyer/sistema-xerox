<?php
    require "../conexao.php";

    $nome = $_POST['nome'];
    $qtd_copias = $_POST['qtd_copias'];

    $sql = "INSERT INTO funcionarios (nome, qtd_copias) VALUES ('$nome', '$qtd_copias')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso";
    } else {
        echo "Erro ao inserir dados: " . $mysqli->error;
    }

    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados inseridos</title>
</head>
<body>
    <br>
    <a href="../index.php">Voltar</a>
</body>
</html>
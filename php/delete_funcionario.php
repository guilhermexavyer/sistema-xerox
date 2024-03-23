<?php
    // Verifica se o ID foi enviado via POST
    if(isset($_POST['id'])) {
        // Captura o ID enviado via POST
        $id = $_POST['id'];

        // Inclua o arquivo de conexão com o banco de dados
        require "../conexao.php";

        // Prepara e executa a consulta para excluir o registro pelo ID
        $sql = "DELETE FROM funcionarios WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id); // "i" indica que é um valor inteiro
        $stmt->execute();

        // Verifica se a exclusão foi bem-sucedida
        if ($stmt->affected_rows > 0) {
            echo "Registro removido com sucesso.";
        } else {
            echo "O registro não existe.";
        }

        // Fecha a conexão com o banco de dados
        $mysqli->close();
    }
    else {
        // Se o ID não foi enviado via POST, exibe uma mensagem de erro
        echo "ID não fornecido para exclusão.";
    }
?>
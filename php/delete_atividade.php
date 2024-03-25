<?php
    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        require "../conexao.php";

        $sql = "DELETE FROM atividade WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Registro removido com sucesso.";
        } else {
            echo "O registro não existe.";
        }

        $mysqli->close();
    }
    else {
        echo "ID não fornecido para exclusão.";
    }
?>
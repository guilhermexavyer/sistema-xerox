<?php
    require "../views/conexao.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['id'])) {
            $id = $_POST['id'];

            $sql_select = "SELECT * FROM ensino_fundamental_1 WHERE id = '$id'";
            $result = $mysqli->query($sql_select);

            if ($result->num_rows > 0) {
                $sql = "DELETE FROM ensino_fundamental_1 WHERE id = '$id'";
                
                if ($mysqli->query($sql) === TRUE) {
                    echo "Registro removido com sucesso";
                } else {
                    echo "Houve um erro ao remover os dados: " . $mysqli->error;
                }
            } else {
                echo "O ID não existe";
            }
        } else {
            echo "ID não foi fornecido";
        }
    } else {
        // Se o método de requisição não for POST, redirecionar para a página anterior ou fazer alguma outra ação
        // Exemplo de redirecionamento:
        // header("Location: pagina_anterior.php");
    }

    $mysqli->close();
?>

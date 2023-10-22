<?php
require 'conexão.php'; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE nome_usuario = ?"; // Substitua "usuarios" pelo nome da tabela de usuários no seu banco de dados

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Executar a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verificar a senha criptografada
        if (password_verify($password, $row['senha'])) {
            // Login bem-sucedido, redirecione para a página principal
            header("Location: pagina_principal.php");
            exit();
        } else {
            echo "Senha incorreta";
        }
    } else {
        echo "Nome de usuário não encontrado";
    }

    $stmt->close();
}

$conn->close();
?>

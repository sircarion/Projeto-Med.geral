<?php
require 'conexao.php'; // Inclua o arquivo de conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Aplicar criptografia à senha (se sua tabela de usuários tiver uma coluna 'senha' para armazenar senhas criptografadas)
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "SELECT * FROM usuarios WHERE nome_usuario = ?"; // Substitua "usuarios" pelo nome da tabela de usuários no seu banco de dados

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);

    // Executar a consulta
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verificar a senha criptografada (se sua tabela de usuários armazena senhas criptografadas)
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

// Manipulação de entidades (exemplo: inserir um paciente)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome_paciente = $_POST['nome_paciente'];

    $sql = "INSERT INTO paciente (nome) VALUES (?)";

    // Preparar a declaração
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome_paciente);

    // Executar a inserção
    if ($stmt->execute()) {
        echo "Paciente inserido com sucesso.";
    } else {
        echo "Erro ao inserir paciente: " . $conn->error;
    }

    $stmt->close();
}

// Adicione lógica semelhante para outras operações nas demais entidades (Médico, Material, Medicamentos, Fornecedores)

$conn->close();
?>


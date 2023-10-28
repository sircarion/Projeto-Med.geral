<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "hospital";

try {
    $con = new PDO("mysql:host=$SERVIDOR;dbname=$BASE", $USUARIO, $SENHA);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['cadastrar'])) {
            $nome = $_POST["nome"];
            $senha = $_POST["senha"];
            $cpf = $_POST["cpf"];
            $data_nascimento = $_POST["data_nascimento"];
            $email = $_POST["email"];

            // Inserir dados na tabela paciente
            $stmt = $con->prepare("INSERT INTO paciente (nome, senha, cpf, data_nascimento, email) VALUES (:nome, :senha, :cpf, :data_nascimento, :email)");
            
            // Vincular os parâmetros
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':data_nascimento', $data_nascimento);
            $stmt->bindParam(':email', $email);

            // Executar a declaração
            if ($stmt->execute()) {
                echo "Cadastro bem-sucedido";
            } else {
                echo "Erro ao cadastrar.";
            }
        } elseif (isset($_POST['agendar'])) {
            $paciente = $_POST["paciente"];
            $data = $_POST["data"];
            $hora = $_POST["hora"];
            $medico = $_POST["medico"];

            // Certifique-se de validar os dados aqui para evitar SQL injection

            $sql = "INSERT INTO consulta (data, id_pac, crm, carteira) VALUES (:datahora, :paciente, :medico, 'Carteira de Consulta')";

            // Preparar a declaração
            $stmt = $con->prepare($sql);

            // Vincular os parâmetros
            $stmt->bindParam(':datahora', "$data $hora");
            $stmt->bindParam(':paciente', $paciente);
            $stmt->bindParam(':medico', $medico);

            // Executar a declaração
            if ($stmt->execute()) {
                echo "Consulta agendada com sucesso!";
            } else {
                echo "Erro ao agendar a consulta.";
            }
        }
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

// Fechar a conexão quando terminar
$con = null;
?>

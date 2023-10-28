<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Área Médico</title>
    <link rel="stylesheet" type="text/css" href="pagmedico.css" media="screen" />
</head>

<body>
    <main>
        <div class="container">
            <div id="area_medico">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <input type="text" name="crm" placeholder="Digite seu CRM">
                    <input type="text" name="usuario" placeholder="Digite seu nome de usuário">
                    <input type="password" name="senha" placeholder="Digite sua senha">
                    <input type="submit" value="Acessar">
                </form>
            </div>
        </div>
    </main>
    <footer>
        <th>
            <nav>
                <ul>
                    <li>
                        <a href="#">Suporte</a>
                    </li>
                    <li>
                        <a href="#">FAQ - Perguntas Frequentes</a>
                    </li>
                    <li>
                        <a href="#">Telefone:(99)99999-9999</a>
                    </li>
                </ul>
            </nav>
        </th>
    </footer>
</body>

</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crm'])) {
        require 'conexao.php'; 

        // Lógica de login
        $crm = $_POST['crm'];
        $username = $_POST['usuario'];
        $password = $_POST['senha'];

        $sql = "SELECT * FROM medicos WHERE crm = :crm";

        try {
            // Preparar a declaração
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':crm', $crm);

            // Executar a consulta
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                if (password_verify($password, $result['senha'])) {
                    // Login bem-sucedido, redirecione para a página principal
                    header("Location: pagina_principal.php");
                    exit();
                } else {
                    echo "Senha incorreta";
                }
            } else {
                echo "CRM não encontrado";
            }
        } catch(PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }

        // Fechar a conexão
        $conn = null;
    }
}
?>

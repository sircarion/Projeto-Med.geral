<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MED.geral</title>
    <link href="style_pag_usuario.css" rel="stylesheet">
</head>
<body>
    <div>
        <header>
            <div id="cabeçalho" name="cabeçalho">
                <h1>MED.geral</h1>
                <th>
                    <ul id="menu" name="menu">
                        <a href="#"><li>planos de saude</li></a>
                        <a href="#"><li>agendar</li></a>
                        <a href="#"><li>cadastrar</li></a>
                        <a href="#"><li>contatos</li></a>
                        <a href="pagina_medico.php" id="area_medico"><li>area do médico</li></a>
                    </ul>
                </th>
            </div>
        </header>
    </div>
   <main>
        <aside>
            <span>
                <h2>marcar</h2>
                <h2>consulta!</h2>
            </span>
            <h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat exercitationem quo in suscipit iure dignissimos eius eaque similique delectus repudiandae. Nisi, quam blanditiis. Aliquid nam laborum error molestias debitis temporibus!</p>
            </h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="cadastro_cliente">
                <label for="nome"></label>
                <input type="text" id="nome" name="nome" placeholder="Nome Completo">
                <label for="senha"></label>
                <input type="password" id="senha" name="senha" placeholder="Senha">
                <label for="cpf"></label>
                <input type="text" id="cpf" name="cpf" placeholder="ex: 000.000.000.00">
                <label for="data_nascimento"></label>
                <input type="date" id="data_nascimento" name="data_nascimento" placeholder="Data De Nascimento">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Seu Email">
                <input type="submit" name="cadastrar" value="cadastrar">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar'])) {
                $nome = $_POST["nome"];
                $senha = $_POST["senha"];
                $cpf = $_POST["cpf"];
                $data_nascimento = $_POST["data_nascimento"];
                $email = $_POST["email"];

                // Conectar ao banco de dados (substitua com suas configurações)
                $servername = "localhost";
                $username = "root";
                $password = "1234";
                $database = "hospital";

                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar a conexão
                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                // Inserir dados na tabela paciente
                $sql = "INSERT INTO paciente (nome, senha, cpf, data_nascimento, email) VALUES ('$nome', '$senha', '$cpf', '$data_nascimento', '$email')";

                if ($conn->query($sql) === TRUE) {
                    echo "Cadastro bem-sucedido";
                } else {
                    echo "Erro ao cadastrar: " . $conn->error;
                }

                $conn->close();
            }
            ?>
        </aside>
        
        <article>
            <img src="https://i.postimg.cc/jSmW3bV3/3d-Coronavirus-vaccination-blue-syringe-removebg-preview-1.png" alt="agulha">
        </article>
    </main>
    <footer>
        <th>
            <ul id="menu" name="menu">
                <li><a href="#">sobre nos</a></li>
                <li><a href="#">central de atendimento</a></li>
                <li><a href="#">ajuda</a></li>
                <li>onde nos encontrar: rua leopolda 132223</li>
                <li>telefone:(99)99999-9999</li>
            </ul>
        </th>
    </footer>
</body>
</html>

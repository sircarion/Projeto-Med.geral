<?php
$servername = "localhost";
$username = "root";
$password = "sua_senha";
$dbname = "hospital";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Agora você está conectado ao banco de dados e pode executar consultas SQL aqui

// Fechar a conexão quando terminar
$conn->close();
?>

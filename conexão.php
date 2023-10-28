<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

try {
    // Conectar ao banco de dados
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Definir o modo de erro do PDO para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Conexão bem-sucedida";
} catch(PDOException $e) {
    echo "Conexão falhou: " . $e->getMessage();
}

// Agora você está conectado ao banco de dados e pode executar consultas SQL aqui

// Fechar a conexão quando terminar
$conn = null;
?>

<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "hospital";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente = $_POST["paciente"];
    $data = $_POST["data"];
    $hora = $_POST["hora"];
    $medico = $_POST["medico"];

    $con = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);
    
    // Certifique-se de validar os dados aqui para evitar SQL injection
    
    $sql = "INSERT INTO consulta (data, id_pac, crm, carteira) VALUES ('$data $hora', '$paciente', '$medico', 'Carteira de Consulta')";
    
    if (mysqli_query($con, $sql)) {
        echo "Consulta agendada com sucesso!";
    } else {
        echo "Erro ao agendar a consulta: " . mysqli_error($con);
    }
    
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agendar Nova Consulta</title>
    <style>
        /* Estilos CSS existentes */
    </style>
</head>
<body>
<div id="cont">
    <div id="cab">
        <!-- Seu cabeçalho e logotipo -->
    </div>
    <div id="area_medico">
        <h3>Agendar Nova Consulta</h3>
        <form action="agendar_consulta.php" method="POST">
            <label for="paciente">Paciente:</label>
            <select id="paciente" name="paciente">
                <!-- Opções para seleção de pacientes -->
            </select>
            <label for="medico">Médico:</label>
            <select id="medico" name="medico">
                <!-- Opções para seleção de médicos -->
            </select>
            <label for="data">Data da Consulta:</label>
            <input type="date" id="data" name="data">
            <label for="hora">Hora da Consulta:</label>
            <input type="time" id="hora" name="hora">
            <input type="submit" value="Agendar Consulta">
        </form>
    </div>
    <div id="rodape">
        <!-- Rodapé -->
    </div>
</div>
</body>
</html>

<?php
$SERVIDOR = "localhost";
$USUARIO = "root";
$SENHA = "";
$BASE = "hospital";

$con = mysqli_connect($SERVIDOR, $USUARIO, $SENHA, $BASE);

$sql = "SELECT consulta.id_consulta, consulta.data, paciente.nome AS paciente, medico.nome AS medico
        FROM consulta
        JOIN paciente ON consulta.id_pac = paciente.id_pac
        JOIN medico ON consulta.crm = medico.crm";

$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Consulta</th>
                <th>Data</th>
                <th>Paciente</th>
                <th>Médico</th>
            </tr>";

    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>" . $linha['id_consulta'] . "</td>
                <td>" . $linha['data'] . "</td>
                <td>" . $linha['paciente'] . "</td>
                <td>" . $linha['medico'] . "</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Nenhuma consulta encontrada.";
}

mysqli_close($con);
?>

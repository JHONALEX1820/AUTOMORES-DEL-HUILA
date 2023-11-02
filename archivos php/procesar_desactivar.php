<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['desactivar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "automotores";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    $idTecnicoDesactivar = $_POST['inactivo']; // Cambiado a 'inactivoo'
    $idLatoneroDesactivar = $_POST['inactivoo']; // Cambiado a 'inactivo'
    $idPintorDesactivar = $_POST['inactivooo']; // Cambiado a 'inactivo'

    if (!empty($idTecnicoDesactivar)) {
        $sqlDesactivarTecnico = "UPDATE tecnico SET estado = 'Inactivo' WHERE idTecnico = $idTecnicoDesactivar";
        $db->query($sqlDesactivarTecnico);
    }
    if (!empty($idLatoneroDesactivar)) {
        $sqlDesactivarLatonero = "UPDATE trabajadorlatoneria SET estado = 'Inactivo' WHERE idLatonero = $idLatoneroDesactivar";
        $db->query($sqlDesactivarLatonero);
    }
    if (!empty($idPintorDesactivar)) {
        $sqlDesactivarPintor = "UPDATE trabajadorpintor SET estado = 'Inactivo' WHERE idPintor = $idPintorDesactivar";
        $db->query($sqlDesactivarPintor);
    }

    echo "Los trabajadores han sido desactivados correctamente.";
    $db->close();
}

?>

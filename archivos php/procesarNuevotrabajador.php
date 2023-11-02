<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['agregar'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "automotores";

    $db = new mysqli($servername, $username, $password, $dbname);

    if ($db->connect_error) {
        die("Error de conexión a la base de datos: " . $db->connect_error);
    }

    $nuevaEspecializacion = $_POST['nuevaEspecializacion'];
    $idTecniconuevo = $_POST['idTecnico_nuevo'];
    $nombreNuevo = $_POST['nombre_nuevo'];
    $apellidoNuevo = $_POST['apellido_nuevo'];

    $sqlAgregarNuevoTrabajador = "";

    if ($nuevaEspecializacion === "tecnico") {
        $sqlAgregarNuevoTrabajador = "INSERT INTO tecnico (nomTecnico, apeTecnico, idTecnico, estado) VALUES ('$nombreNuevo', '$apellidoNuevo', '$idTecniconuevo', 'Activo')";
    } elseif ($nuevaEspecializacion === "latonero") {
        $sqlAgregarNuevoTrabajador = "INSERT INTO trabajadorlatoneria (nomLatonero, apelliLatonero, estado) VALUES ('$nombreNuevo', '$apellidoNuevo', 'Activo')";
    } elseif ($nuevaEspecializacion === "pintor") {
        $sqlAgregarNuevoTrabajador = "INSERT INTO trabajadorpintor (nomPintor, apelliPintor, estado) VALUES ('$nombreNuevo', '$apellidoNuevo', 'Activo')";
    }

    if ($sqlAgregarNuevoTrabajador !== "") {
        if ($db->query($sqlAgregarNuevoTrabajador) === TRUE) {
            echo "Nuevo trabajador agregado con éxito.";
        } else {
            echo "Error al agregar el nuevo trabajador: " . $db->error;
        }
    }

    $db->close();
}
?>

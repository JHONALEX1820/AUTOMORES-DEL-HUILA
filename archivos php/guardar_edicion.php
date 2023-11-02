<?php
include('../conexion/base.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nomCliente = $_POST["nomCliente"];
    $apeCliente = $_POST["apeCliente"];
    $dirCliente = $_POST["dirCliente"];
    $telCliente = $_POST["telCliente"];
    $emaiCliente = $_POST["emaiCliente"];
    $nomTrabaCliente = $_POST["nomTrabaCliente"];
    $apelliTrabaCliente = $_POST["apelliTrabaCliente"];
    $telTrabaCliente = $_POST["telTrabaCliente"];
    
    // Consulta SQL para actualizar los datos del cliente sin modificar el idCliente
    $sql = "UPDATE cliente SET nomCliente='$nomCliente', apeCliente='$apeCliente', dirCliente='$dirCliente', telCliente='$telCliente', emaiCliente='$emaiCliente', nomTrabaCliente='$nomTrabaCliente', apelliTrabaCliente='$apelliTrabaCliente', telTrabaCliente='$telTrabaCliente'";
    
    if ($db->query($sql) === TRUE) {
        // Mostrar una alerta
        echo "<script>alert('Los datos del cliente han sido actualizados exitosamente. Serás redirigido a la página de búsqueda .Digite nuevamente la cedula para ver los datos del cliente que fueron editados');</script>";
        
        // Redirigir al usuario a la página de búsqueda
        echo "<script>window.location.href = 'busqueda.php';</script>";
    } else {
        echo "Error al editar los datos: " . $db->error;
    }
}

// Cerrar la conexión a la base de datos
$db->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos css/stylesDETALL.css">
    <title>Formulario de registro de nuevo cliente</title>
  
  </head>
<body>
  
<a href="resultadoC.php"  class="boton" >Volver atras</a>

</body>
</html>
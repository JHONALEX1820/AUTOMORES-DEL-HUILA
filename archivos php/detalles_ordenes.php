<?php
include('../conexion/base.php');

if(isset($_GET['idOrden'])){
    $idOrden = $_GET['idOrden'];

    // Consulta para obtener los detalles de la orden y el vehículo relacionado
    $consulta_detalles = "SELECT ordenservicio.idOrden, ordenservicio.fecha, vehiculo.placaVehiculo,vehiculo.chasis,vehiculo.motor,vehiculo.combustible,vehiculo.kilometros,vehiculo.marca, vehiculo.modelo, vehiculo.color,  vehiculo.radio, vehiculo.plumillas, vehiculo.llavesPernos,
     vehiculo.parlantes, vehiculo.espejos,vehiculo.repuestos,vehiculo.antena,vehiculo.tapetes,vehiculo.herramientas,vehiculo.encendedor,vehiculo.copas, vehiculo.gato, vehiculo.mensaje, tecnico.nomTecnico, tecnico.apeTecnico ,trabajadorlatoneria.nomLatonero, trabajadorlatoneria.apelliLatonero,
     trabajadorpintor.nomPintor,trabajadorpintor.apelliPintor 
                          FROM ordenservicio
                          LEFT JOIN vehiculo ON ordenservicio.idVehiculo = vehiculo.idVehiculo
                          LEFT JOIN tecnico ON ordenservicio.idTecnico = tecnico.idTecnico
                          LEFT JOIN trabajadorlatoneria ON ordenservicio.idLatonero  = trabajadorlatoneria.idLatonero 
                          LEFT JOIN trabajadorpintor ON ordenservicio.idPintor  = trabajadorpintor.idPintor 
                          WHERE ordenservicio.idOrden = $idOrden";

    $resultado_detalles = mysqli_query($db, $consulta_detalles);

    if(mysqli_num_rows($resultado_detalles) > 0){
        $fila_detalles = mysqli_fetch_assoc($resultado_detalles);

        // Inicio de la factura con estilos CSS
        echo '
        <html>
        <head>
            <style>
                body {
                    background-image: url("tu_imagen_de_fondo.jpg"); /* Reemplaza "tu_imagen_de_fondo.jpg" con la ruta de tu imagen de fondo */
                    background-size: cover;
                    background-attachment: fixed;
                    background-color: rgba(255, 255, 255, 0.7); /* Fondo semi-transparente blanco */
                    text-align: center; /* Centra el contenido en el medio de la página */
                }

                .invoice {
                    font-family: Arial, sans-serif;
                    border-collapse: collapse;
                    width: 80%;
                    margin: 0 auto;
                    background-color: rgba(255, 255, 255, 0.7); /* Tabla semi-transparente blanco */
                }
                .invoice th {
                    background-color: #f2f2f2;
                }
                .invoice td, .invoice th {
                    border: 1px solid #ddd;
                    text-align: left;
                    padding: 8px;
                }
                .invoice tr:nth-child(even) {
                    background-color: #f2f2f2;
                }
            </style>
        </head>
        <body>
            <h1>Detalles de la Orden ' . $fila_detalles['idOrden'] . '</h1>
            <table class="invoice">
                <tr>
                    <th>Fecha :</th>
                    <td>' . $fila_detalles['fecha'] . '</td>
                </tr>
                <tr>
                    <th>Placa del Vehículo:</th>
                    <td>' . $fila_detalles['placaVehiculo'] . '</td>
                </tr>
                <tr>
                <th>Chasis :</th>
                <td>' . $fila_detalles['chasis'] . '</td>
                </tr>
                <tr>
                <th>Motor :</th>
                <td>' . $fila_detalles['motor'] . '</td>
                 </tr>
                 <tr>
                 <th>kilometros :</th>
                 <td>' . $fila_detalles['kilometros'] . '</td>
                 </tr>
                 <tr>
                 <th>combustible:</th>
                 <td>' . $fila_detalles['combustible'] . '</td>
                 </tr>

                  <tr>
                    <th>Marca :</th>
                    <td>' . $fila_detalles['marca'] . '</td>
                </tr>
                  <tr>
                    <th>Modelo :</th>
                    <td>' . $fila_detalles['modelo'] . '</td>
                </tr>
              
                
               
                  <tr>
                    <th>Color :</th>
                    <td>' . $fila_detalles['color'] . '</td>
                </tr>
                  <tr>
                    <th>Radio :</th>
                    <td>' . $fila_detalles['radio'] . '</td>
                </tr>
                  <tr>
                    <th>Plumillas :</th>
                    <td>' . $fila_detalles['plumillas'] . '</td>
                </tr>
                  <tr>
                    <th>llavesPernos :</th>
                    <td>' . $fila_detalles['llavesPernos'] . '</td>
                </tr>
                  <tr>
                    <th>Parlantes :</th>
                    <td>' . $fila_detalles['parlantes'] . '</td>
                </tr>
                  <tr>
                    <th>Espejos :</th>
                    <td>' . $fila_detalles['espejos'] . '</td>
                </tr>
                  <tr>
                    <th>Repuestos :</th>
                    <td>' . $fila_detalles['repuestos'] . '</td>
                </tr>
                <tr>
                    <th>Antena :</th>
                    <td>' . $fila_detalles['antena'] . '</td>
                </tr>
                <tr>
                    <th>Tapetes :</th>
                    <td>' . $fila_detalles['tapetes'] . '</td>
                </tr>
                <tr>
                <th>Herramientas :</th>
                <td>' . $fila_detalles['herramientas'] . '</td>
                </tr>

                <tr>
                <th>Encendedor :</th>
                <td>' . $fila_detalles['encendedor'] . '</td>
                </tr>
                <tr>
                <th>Copas :</th>
                <td>' . $fila_detalles['copas'] . '</td>
                </tr>

                <tr>
                <th>Gato :</th>
                <td>' . $fila_detalles['gato'] . '</td>
                </tr>
            
                <tr>
                <th>Mensaje :</th>
                <td>' . $fila_detalles['mensaje'] . '</td>
                </tr>



                <tr>
                    <th>Mecanico :</th>
                    <td>' . $fila_detalles['nomTecnico'] . ' ' . $fila_detalles['apeTecnico'] . '</td>
                </tr>

                
                <tr>
                    <th>Latoneria :</th>
                    <td>' . $fila_detalles['nomLatonero'] . ' ' . $fila_detalles['apelliLatonero'] . '</td>
                </tr>

                
                <tr>
                    <th>Pintor :</th>
                    <td>' . $fila_detalles['nomPintor'] . ' ' . $fila_detalles['apelliPintor'] . '</td>
                </tr>
            </table>
        </body>
        </html>';
    } else {
        echo "<p>No se encontraron detalles para la orden seleccionada.</p>";
    }
} else {
    echo "<p>No se proporcionó un ID de orden válido.</p>";
}
?>
<br>

<a href="buscador_orden.php">Volver a Inicio</a>
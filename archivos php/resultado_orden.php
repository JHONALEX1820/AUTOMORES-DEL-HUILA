<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Registro</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #3498db;
        }

        table {
            width: 100%;
            background-color: #fff;
            border-collapse: collapse;
            border-radius: 10px;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }

        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 5px;
            width: 60%;
        }

        /* Estilo para el botón de cerrar el modal */
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de Registro</h1>
        <table id="dataTable" class="display">
            <thead>
                <tr>
                    <th>Sección</th>
                    <th>Datos</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
include('../conexion/base.php');

if (isset($_POST['busquedaa'])) {
    $busqueda = $_POST['busquedaa'];

    // Consulta para obtener información del cliente por cédula o placa
    $consulta_cliente = "SELECT DISTINCT cliente.idCliente, cliente.fecha, cliente.nomCliente, cliente.apeCliente, 
                                 cliente.telCliente, cliente.dirCliente, cliente.emaiCliente,cliente.nomTrabaCliente,cliente.apelliTrabaCliente,cliente.telTrabaCliente,
                                 vehiculo.placaVehiculo
                         FROM cliente
                         LEFT JOIN ordenservicio ON cliente.idCliente = ordenservicio.idCliente
                         LEFT JOIN vehiculo ON ordenservicio.idVehiculo = vehiculo.idVehiculo
                         WHERE cliente.idCliente = '$busqueda' OR vehiculo.placaVehiculo = '$busqueda'";
    $resultado_cliente = mysqli_query($db, $consulta_cliente);

    if (mysqli_num_rows($resultado_cliente) > 0) {
        $fila_cliente = mysqli_fetch_assoc($resultado_cliente); // Obtener la fila del cliente

      
        echo "<tr><th>Parte del cliente</th><td>";
        echo "<tr><th>Nombre:</th><td>" . $fila_cliente['nomCliente'] . "</td></tr>";
        echo "<tr><th>Apellido:</th><td>" . $fila_cliente['apeCliente'] . "</td></tr>";
        echo "<tr><th>Cédula:</th><td>" . $fila_cliente['idCliente'] . "</td></tr>";
        echo "<tr><th>Teléfono:</th><td>" . $fila_cliente['telCliente'] . "</td></tr>";
        echo "<tr><th>Dirección:</th><td>" . $fila_cliente['dirCliente'] . "</td></tr>";
        echo "<tr><th>Correo:</th><td>" . $fila_cliente['emaiCliente'] . "</td></tr>";
        echo "<tr><th>trabajador del cliente</th><td></td></tr>";
        echo "<tr><th>nombre:</th><td>" . $fila_cliente['nomTrabaCliente'] . "</td></tr>";
        echo "<tr><th>apellido:</th><td>" . $fila_cliente['apelliTrabaCliente'] . "</td></tr>";
        echo "<tr><th>telefono:</th><td>" . $fila_cliente['telTrabaCliente'] . "</td></tr>";

        // Consulta para obtener todas las órdenes de servicio relacionadas con el cliente
        $consulta_ordenes = "SELECT ordenservicio.fecha, ordenservicio.idOrden, tecnico.nomTecnico, tecnico.apeTecnico,
                                    vehiculo.placaVehiculo, vehiculo.marca, vehiculo.modelo
                            FROM ordenservicio
                            LEFT JOIN tecnico ON ordenservicio.idTecnico = tecnico.idTecnico
                            LEFT JOIN vehiculo ON ordenservicio.idVehiculo = vehiculo.idVehiculo
                            WHERE ordenservicio.idCliente = '{$fila_cliente['idCliente']}'";
        $resultado_ordenes = mysqli_query($db, $consulta_ordenes);

        if (mysqli_num_rows($resultado_ordenes) > 0) {
            echo "<tr><th>Órdenes de Servicio</th><td></td></tr>";
            while ($fila_orden = mysqli_fetch_assoc($resultado_ordenes)) {
                echo "<tr><th>FECHA:</th><td>" . $fila_orden['fecha'] . "</td></tr>";
                echo "<tr><th>ORDEN:</th><td><a href='detalles_ordenes.php?idOrden=" . $fila_orden['idOrden'] . "'>" . $fila_orden['idOrden'] . "</a></td>";
        
                echo "<tr><th>Placa del Vehículo:</th><td>" . $fila_orden['placaVehiculo'] . "</td></tr>";
            
            }
        } else {
            echo "<tr><td colspan='2'><h3>No se encontraron órdenes de servicio para este cliente o placa.</h3></td></tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>No se encontraron resultados para la búsqueda.</p>";
        echo "<p>No se encuentran en la base de datos.</p>";
    }
} else {
    echo "<p>No se proporcionó ninguna búsqueda.</p>";
}
?>



            </tbody>
        </table>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                "order": [], // Esto desactiva la ordenación por defecto
        "searching": true // Habilitar la búsqueda global
            });
        });
      
    
        
    </script>



</body>
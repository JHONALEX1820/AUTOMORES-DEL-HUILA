<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="estilos css/stylesDETALL.css">
    <title>Resultados de la busqueda </title>
  
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
               
                

                
                if (isset($_POST['busqueda'])) {
                    $busqueda = $_POST['busqueda'];
                    

                    // Consulta SQL para buscar el cliente por cédula
                    $consulta = "SELECT idCliente, nomCliente, apeCliente, telCliente, dirCliente, emaiCliente, nomTrabaCliente, apelliTrabaCliente, telTrabaCliente FROM cliente WHERE idCliente = '$busqueda'";
                    $resultado = mysqli_query($db, $consulta);

                    if (mysqli_num_rows($resultado) > 0) {
                        $fila = mysqli_fetch_assoc($resultado);

                        // Mostrar detalles del cliente
                        echo "<tr><th>Parte del cliente</th><td><button onclick='editarCliente( \"{$fila['nomCliente']}\", \"{$fila['apeCliente']}\", \"{$fila['telCliente']}\", \"{$fila['dirCliente']}\", \"{$fila['emaiCliente']}\" , \"{$fila['nomTrabaCliente']}\" , \"{$fila['apelliTrabaCliente']}\" , \"{$fila['telTrabaCliente']}\")'>Editar</button></td></tr>";
                        echo "<tr><th>Nombre:</th><td>" . $fila['nomCliente'] . "</td></tr>";
                        echo "<tr><th>Apellido:</th><td>" . $fila['apeCliente'] . "</td></tr>";
                        echo "<tr><th>Cédula:</th><td>" . $fila['idCliente'] . "</td></tr>";
                        echo "<tr><th>Teléfono:</th><td>" . $fila['telCliente'] . "</td></tr>";
                        echo "<tr><th>Dirección:</th><td>" . $fila['dirCliente'] . "</td></tr>";
                        echo "<tr><th>Correo:</th><td>" . $fila['emaiCliente'] . "</td></tr>";
                         echo "<tr><th>Trabajador del cliente</th><td>";

                             
                     
                        echo "<tr><th>Nombre:</th><td>" . $fila['nomTrabaCliente'] . "</td></tr>";
                        echo "<tr><th>Apellido:</th><td>" . $fila['apelliTrabaCliente'] . "</td></tr>";
                        echo "<tr><th>Telefono:</th><td>" . $fila['telTrabaCliente'] . "</td></tr>";

                       
                       
                        
                    }
                } else {
                    echo "<p>No se proporcionó ninguna búsqueda.</p>";
                }


                ?>
 </tbody>
        </table>
    </div>

<div id="modalEditarCliente" class="modal">
    <div class="modal-content">
        <span class="close" onclick="cerrarModalEditarCliente()">&times;</span>
        <h2>Editar Cliente</h2>
        <form id="formularioEdicion" action="guardar_edicion.php" method="post" autocomplete='off' onsubmit="recargarPagina()">
            <!-- Campo oculto para almacenar el ID del cliente -->

            <input type="hidden" id="idCliente" name="idCliente">

            <label for="nomCliente">Nombre:</label>
            <input type="text" id="nomCliente" name="nomCliente"><br>

            <label for="apeCliente">Apellido:</label>
            <input type="text" id="apeCliente" name="apeCliente"><br>

            <label for="telCliente">Telefono:</label>
            <input type="text" id="telCliente" name="telCliente"><br>

            <label for="dirCliente">Direccion:</label>
            <input type="text" id="dirCliente" name="dirCliente"><br>

            <label for="emaiCliente">Correo:</label>
            <input type="text" id="emaiCliente" name="emaiCliente"><br>
             <br>
            <label for="nombre">parte del trabajador</label><br>

            <label for="nomTrabaCliente">Nombre:</label>
            <input type="text" id="nomTrabaCliente" name="nomTrabaCliente"><br>

            <label for="apelliTrabaCliente">Apellido:</label>
            <input type="text" id="apelliTrabaCliente" name="apelliTrabaCliente"><br>

            <label for="telTrabaCliente">Telefono:</label>
            <input type="text" id="telTrabaCliente" name="telTrabaCliente"><br>

            <div class="container">
             <input type="submit" class="boton" value="Guardar" >
            <button type="button" class="boton" onclick="cerrarModalEditarCliente()">Cancelar</button>
            </div>
        </form>
    </div>
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
      
        // Función para abrir el modal de edición
        function abrirModalEditarCliente() {
            var modal = document.getElementById("modalEditarCliente");
            modal.style.display = "block";
        }

        // Función para cerrar el modal de edición
        function cerrarModalEditarCliente() {
            var modal = document.getElementById("modalEditarCliente");
            modal.style.display = "none";
        }

        // Función para llenar los campos del formulario de edición
        function editarCliente( nomCliente, apeCliente, telCliente, dirCliente, emaiCliente , nomTrabaCliente, apelliTrabaCliente, telTrabaCliente) {
        
            document.getElementById("nomCliente").value = nomCliente; 
            document.getElementById("apeCliente").value = apeCliente; 
            document.getElementById("telCliente").value = telCliente; 
            document.getElementById("dirCliente").value = dirCliente; 
            document.getElementById("emaiCliente").value = emaiCliente; 
            // parte del trabajador del cliente
            document.getElementById("nomTrabaCliente").value = nomTrabaCliente; 
            document.getElementById("apelliTrabaCliente").value = apelliTrabaCliente; 
            document.getElementById("telTrabaCliente").value = telTrabaCliente; 
            
            abrirModalEditarCliente(); // Abrir el modal
        }
       
    // Función para recargar la página después de enviar el formulario
  
    function recargarPagina() {
    location.href = "resultadoC.php";
}

        
    </script>

<!-- Después de mostrar los detalles del cliente, agrega un enlace a la página de registro de orden -->
<div class="container">
<a href="inicio.php" class="boton" >Volver a Inicio</a>
<a class="boton" href="registro_orden.php?idCliente=<?php echo $fila['idCliente']; ?>">Registrar Orden</a>
</div>

<br>
</body>
</html>

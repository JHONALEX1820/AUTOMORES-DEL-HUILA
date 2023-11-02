

<?php

// bueno este codigo en mi personal lo llame controlador_orden por que en pocas palabras lo que hace la consultas para llamar y guarda en la base de datos 

include('../conexion/base.php');

if (isset($_POST['registrarr'])) {
    

    

        if (
            // Verifica que todos los campos del formulario estén completos

          
            strlen($_POST['placaVehiculo']) >= 1 &&
            strlen($_POST['marca']) >= 1 && 
            strlen($_POST['modelo']) >= 1 &&     
            strlen($_POST['motor']) >= 1 &&            
            strlen($_POST['chasis']) >= 1 &&
            strlen($_POST['kilometros']) >= 1 &&  
            strlen($_POST['color']) >= 1 &&  
            strlen($_POST['estadoLlantaDelanteraIzquierda']) >= 1 &&  
            strlen($_POST['estadoLlantaDelanteraDerecha']) >= 1 &&  
            strlen($_POST['estadoLlantaTraseraIzquierda']) >= 1 &&  
            strlen($_POST['estadoLlantaTraseraDerecha']) >= 1 &&  
            strlen($_POST['combustible']) >= 1 &&  
            strlen($_POST['radio']) >= 1 &&  
            strlen($_POST['plumillas']) >= 1 &&  
            strlen($_POST['llavesPernos']) >= 1 &&  
            strlen($_POST['parlantes']) >= 1 &&  
            strlen($_POST['espejos']) >= 1 &&  
            strlen($_POST['repuestos']) >= 1 &&  
            strlen($_POST['antena']) >= 1 &&  
            strlen($_POST['tapetes']) >= 1 && 
            strlen($_POST['herramientas']) >= 1 && 
            strlen($_POST['encendedor']) >= 1 && 
            strlen($_POST['copas']) >= 1 &&
            strlen($_POST['gato']) >= 1 && 
            strlen($_POST['mensaje']) >= 1 &&
            strlen($_POST['idTecnico']) >= 1  &&
            strlen($_POST['idLatonero']) >= 1 &&
            strlen($_POST['idPintor']) >= 1 
        
        ) { 

           
            
         
             // Captura los valores en variables del formulario respecto al vehículo
             $placa = trim($_POST['placaVehiculo']);
             $marca = trim($_POST['marca']);
             $modelo= trim($_POST['modelo']);
             $motor = trim($_POST['motor']);
             $chasis = trim($_POST['chasis']);
             $kilometros = trim($_POST['kilometros']);
             $color = trim($_POST['color']);
             $estadoLlantaDelanteraIzquierda =trim($_POST['estadoLlantaDelanteraIzquierda']);
             $estadoLlantaDelanteraDerecha =trim($_POST['estadoLlantaDelanteraDerecha']);
             $estadoLlantaTraseraIzquierda =trim($_POST['estadoLlantaTraseraIzquierda']); 
             $estadoLlantaTraseraDerecha =trim($_POST['estadoLlantaTraseraDerecha']);
             $radio = trim($_POST['radio']);
             $plumillas = trim($_POST['plumillas']);
             $combustible = trim($_POST['combustible']);;
             $llave= trim($_POST['llavesPernos']);
             $parlantes = trim($_POST['parlantes']);
             $espejos = trim($_POST['espejos']);
             $repuestos = trim($_POST['repuestos']);
             $antena = trim($_POST['antena']);
             $tapetes = trim($_POST['tapetes']);
             $herramientas= trim($_POST['herramientas']);
             $encendedor = trim($_POST['encendedor']);
             $copas = trim($_POST['copas']);
             $gato = trim($_POST['gato']);
             $mensaje = trim($_POST['mensaje']);
             // Parte del trabajador
             $idPintor = trim($_POST['idPintor']);
             $idLatonero = trim($_POST['idLatonero']);
             $idTecnico = trim($_POST['idTecnico']);
            // Insertar en la tabla "vehiculo"
            $query_vehiculo = "INSERT INTO vehiculo (placaVehiculo, marca, modelo, motor, chasis, kilometros, radio, estadoLlantaDelanteraIzquierda, estadoLlantaDelanteraDerecha, estadoLlantaTraseraIzquierda, estadoLlantaTraseraDerecha, color,plumillas, combustible, llavesPernos, parlantes, espejos, repuestos, antena, tapetes, herramientas, encendedor, copas, gato,mensaje)
            VALUES ('$placa', '$marca', '$modelo', '$motor', '$chasis', '$kilometros', '$color', '$estadoLlantaDelanteraIzquierda','$estadoLlantaDelanteraDerecha',  '$estadoLlantaTraseraIzquierda',  '$estadoLlantaTraseraDerecha', '$radio', '$plumillas', '$combustible', '$llave', '$parlantes','$espejos', '$repuestos', '$antena', '$tapetes', '$herramientas', '$encendedor', '$copas', '$gato','$mensaje' )";
            mysqli_query($db, $query_vehiculo);

            // Obtener el ID del vehículo recién insertado 
            $idVehiculo = mysqli_insert_id($db);

            // Insertar la información en la tabla de órdenes
            $query_insert_orden = "INSERT INTO ordenservicio (idCliente,idTecnico,idLatonero,idPintor, idVehiculo)
            VALUES ( '$idCliente', '$idTecnico','$idLatonero',  '$idPintor' ,'$idVehiculo')";
            
            if (mysqli_query($db, $query_insert_orden)) {
                ?> 
                <h3 class="tp">Tu registro se ha completado</h3>
                <?php
            } else {
                ?>
                <h3>Ocurrió un problema</h3>
                <?php 
            }
        } else { 
            // Mostrar mensaje de error si no se completan todos los campos del formulario
            echo '<h3 class="klo">Se produjo un error <p>Verifique que todos los campos estén completos</p></h3>';
        }
    }

?>


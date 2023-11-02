<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos css/styles.css">
    <title>Formulario de Búsqueda</title>
    <script>
function mostrarMensajeEmergente(mensaje) {
    alert(mensaje);
}
</script>
<body>
    


        


<?php
if (isset($_GET['idCliente'])) {
    $idCliente = $_GET['idCliente'];
} else {
    echo "Error: No se proporcionó el cliente al que asociar la orden.";
    exit;
}
?>
     <div class="contenedor">
        <h1 class="logo">ORDEN DE SERVICIO</h1>
        <div class="agrupacion">
            <div class="contac-form">
             
            
                <form method="post" autocomplete="off"  >
                
                    <p>
                        <label for="placa">PLACA</label>
                        <input type="text"  id="placa     " name="placaVehiculo" required>
                    </p>

                    <p>
                        <label for="marca">MARCA DE CARRO</label>
                        <input type="text" name="marca" required>
                    </p>
                   
                    <p>
                        <label for="modelo">MODELO</label>
                        <input type="text" name="modelo" required>
                    </p>

                    <p>
                        <label for="motor">MOTOR</label>
                        <input type="text" name="motor" required>
                    </p>
                
                    <p>
                        <label for="chasis">CHASIS/SERIE</label>
                        <input type="text" name="chasis" required>
                    </p>


                    <p>
                        <label for="kilometros">KILOMETROS</label>
                        <input type="text" name="kilometros" required>
                    </p>

                   

                    <p>
                        <label for="radio">RADIO</label>
                        <input type="text" name="radio" required>
                    </p>

                    <p>
                        <label for="plumillas">PLUMILLAS</label>
                        <input type="text" name="plumillas" required>
                    </p>

                    <p>
                        <label for="llavesPernos">LLAVES_PERNOS</label>
                        <input type="text" name="llavesPernos" required>
                    </p>

                    <p>
                        <label for="parlantes">PARLANTES</label>
                        <input type="text" name="parlantes" required>
                    </p> 

                    <p>
                        <label for="espejos">ESPEJOS</label>
                        <input type="text" name="espejos" required>
                    </p> 

                    <p>
                        <label for="repuestos">REPUESTOS</label>
                        <input type="text" name="repuestos" required>
                    </p> 

                    <p>
                        <label for="antena">ANTENA</label>
                        <input type="text" name="antena" required>
                    </p>
                    <p>
                        <label for="tapetes">TAPETES</label>
                        <input type="text" name="tapetes" required>
                    </p>
                    <p>
                        <label for="herramientas">HERRAMIENTAS</label>
                        <input type="text" name="herramientas" required>
                    </p>
                    <p>
                        <label for="encendedor">ENCENDEDOR</label>
                        <input type="text" name="encendedor" required>
                    </p>
                    
                    <p>
                        <label for="copas">COPAS</label>
                        <input type="text" name="copas" required>
                    </p>

                    <p>
                        <label for="gato">GATO</label>
                        <input type="text" name="gato" required>
                    </p>
                    <p>
                        <label for="color">COLOR</label>
                        <input type="text" name="color" required>
                    </p>
               
                    <p>
                        <label for="combustible">COMBUSTIBLE</label>
                        <input type="number" name="combustible" min="0" max="100000000000000" required>
                    </p>
                    


                    <p require>
     
        <select name="idTecnico" id="idTecnico" >
        <option value="">SELECCIONAR TRABAJADOR</option>
    <?php
    $db = mysqli_connect("localhost", "root", "", "automotores");
    $consulta = "SELECT idTecnico, nomTecnico, apeTecnico FROM tecnico WHERE estado = 'Activo'";
    $resultado = mysqli_query($db, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $fila['idTecnico'] . "'>" . $fila['nomTecnico'] . " " . $fila['apeTecnico'] . "</option>";
    }

    mysqli_close($db);
    ?>
        </select>
    </p>
    </p>
                   
                   <p require>
                   <select name="idLatonero" id="idLatonero">
    <option value="">SELECCIONAR TRABAJADOR</option>
    <?php
    $db = mysqli_connect("localhost", "root", "", "automotores");
    $consulta = "SELECT idLatonero, nomLatonero, apelliLatonero FROM trabajadorlatoneria WHERE estado = 'Activo'";
    $resultado= mysqli_query($db, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $fila['idLatonero'] . "'>" . $fila['nomLatonero'] . " " . $fila['apelliLatonero'] . "</option>";
    }

    mysqli_close($db);
    ?>
</select>


                   </p> 

                   
                   <p require  >
                   <select name="idPintor" id="idPintor">
    <option value="">SELECCIONAR TRABAJADOR</option>
    <?php
    $db = mysqli_connect("localhost", "root", "", "automotores");
    $consulta = "SELECT idPintor , nomPintor, apelliPintor FROM trabajadorpintor WHERE estado = 'Activo'" ;
    $resultado = mysqli_query($db, $consulta);

    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<option value='" . $fila['idPintor'] . "'>" . $fila['nomPintor'] . " " . $fila['apelliPintor'] . "</option>";
    }

    mysqli_close($db);
    ?>
</select>




                   </p> 



                  
                 <fieldset>
                 <legend>ESTADO DE LAS LLANTAS</legend>
                 <div class="column">
                   <p>
            
           
                 <label for="estadoLlantaDelanteraIzquierda'">LLANTA DELANTERA IZQUIERDA:</label>
                 <select name="estadoLlantaDelanteraIzquierda" required>
                    <option value=""></option>
                  <option value="B">BUEN ESTADO</option>
                 <option value="R">REGULAR</option>
                 <option value="M">MAL ESTADO</option>
                 </select>
                 </p>
        
        
<p>
            <label for="estadoLlantaDelanteraDerecha">LLANTA DELANTERA DERECHA :</label>
            <select name="estadoLlantaDelanteraDerecha" required>
            <option value=""></option>
                <option value="B">BUEN ESTADO</option>
                <option value="R">REGULAR</option>
                <option value="M">MAL ESTADO</option>
            </select>
        </p>
   
    </div>
    <div class="column">
        <p>
            <label for="estadoLlantaTraseraIzquierda"> LLANTA TRASERA IZQUIERDA:</label>
            <select name="estadoLlantaTraseraIzquierda" required>
            <option value=""></option>
                <option value="B">BUEN ESTADO</option>
                <option value="R">REGULAR</option>
                <option value="M">MAL ESTADO</option>
            </select>
        </p>
        <p>
            
           
<label for="estadoLlantaTraseraDerecha">LLANTA TRASERA DERECHA:</label>
            <select name="estadoLlantaTraseraDerecha" required>
            <option value=""></option>
                <option value="B">BUEN ESTADO</option>
                <option value="R">REGULAR</option>
                <option value="M">MAL ESTADO</option>
            </select>
        </p>
       
    </div>
</fieldset>
                 

                   

                    <p class="franja" >
                        <label class="f" for="mensaje">MENSAJE</label>
                        <textarea name="mensaje"  rows="10" required></textarea>
                    </p>


                  
                   


                    <p class="button" >

                        <button   name="registrarr"   >
                            guardar formulario
                        </button>
                    
                    </p>

        
        <div class="botones">
        <a href="inicio.php">VOLVER AL INICIO</a>
        <a href="pagina_reemplazo.php">DESACTIVAR TRABAJADOR</a>
        <a href="nuevotrabajador.php">NUEVO TRABAJADOR</a>
    </div>

                </form>
            </div>
        </div>
    </div>


    <?php
  
  include("controlador_orden.php");
  ?>

</body>
   


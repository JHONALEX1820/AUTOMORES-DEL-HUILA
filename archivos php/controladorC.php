<?php

//este es un mensaje de alexander:  bueno con este codigo puedes registrar datos en la base de datos en la tabla de clientes por que es unico el cliente por cedula




include('../conexion/base.php');

if(isset($_POST['guardar'])){
    if (//este es un condicional que captura todo lo del formulario si el usuario no agrega un valor respecto al formulario le salira un erro que dira verifique todos los campos esten completos
        //si llena todo le salira un mensaje que diga se a registrado su cliente y sino error verifique que los campos esten llenos
   
     
        //a qui esta verificando que este todo lo de formulario  respecto a la cliente

        strlen($_POST['idCliente']) >= 1 &&
        strlen($_POST['nomCliente']) >= 1 &&
        strlen($_POST['apeCliente']) >= 1 &&    
        strlen($_POST['dirCliente']) >= 1 &&
        strlen($_POST['telCliente']) >= 1 &&
        strlen($_POST['emaiCliente']) >= 1 &&
        strlen($_POST['nomTrabaCliente']) >= 1 &&
        strlen($_POST['apelliTrabaCliente']) >= 1 &&
        strlen($_POST['telTrabaCliente']) >= 1 
    ) {       
         //a qui esta caturando los valores de el formulario respecto al cliente

        $cedula = trim($_POST['idCliente']);
        $nombre = trim($_POST['nomCliente']);
        $apellido = trim($_POST['apeCliente']);
        $direccion = trim($_POST['dirCliente']);
        $telefono = trim($_POST['telCliente']);
        $email = trim($_POST['emaiCliente']);
        $nomtraba = trim($_POST['nomTrabaCliente']);
        $apellitraba = trim($_POST['apelliTrabaCliente']);
        $teltraba = trim($_POST['telTrabaCliente']);
        
        // Verificar si el cliente ya está registrado
        $consulta = "SELECT idCliente FROM cliente WHERE idCliente = '$cedula'";
        $resultado = mysqli_query($db, $consulta);
        
        if (mysqli_num_rows($resultado) > 0) {
            // Cliente ya registrado, mostrar mensaje de error
            echo "<script>alert('Este cliente ya está registrado. No es posible registrarse de nuevo.');</script>";
        } else {
            // Cliente no registrado, realizar la inserción
            $cliente = "INSERT INTO cliente (idCliente, nomCliente, apeCliente, dirCliente, telCliente, emaiCliente, nomTrabaCliente, apelliTrabaCliente, telTrabaCliente) VALUES ('$cedula','$nombre','$apellido','$direccion','$telefono','$email','$nomtraba','$apellitraba','$teltraba')";
            
            if (mysqli_query($db, $cliente)) {
                echo "<h3 class='tp'>Tu registro se ha completado</h3>";
            } else {
                echo "<h3>Ocurrió un problema</h3>";
            }
        }
    } else {
        echo "<h3 class='klo'>Se produjo un error <p>Verifique que todos los campos estén completos</p></h3>";
    }
}
?>


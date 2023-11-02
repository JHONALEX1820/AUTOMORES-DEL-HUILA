<html lang="es">
<head>
 
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos css/stylesC.css">
    <title>Formulario de registro de nuevo cliente</title>
  
  </head>


<body>  
  
  <!-- formulario de contacto en html y css -->  

  <div class="contact_form">

    <div class="formulario">      
      <h1>Formulario de contacto</h1>

          <form  method="post">       

            
                <p>
                  <label for="nomCliente" class="colocar_nombre">Nombre 
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="nomCliente" id="nombre" required="obligatorio" placeholder="Escribir  nombre">
                </p>
              
                <p>
                  <label for="apeCliente" class="colocar_email">Apellido
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="apeCliente" id="apellido" required="obligatorio" placeholder="Escribir apellido">
                </p>

                <p>
                  <label for="idCliente" class="colocar_email">Cedula
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="idCliente" id="cedula" required="obligatorio" placeholder="Escribir cedula">
                </p>
                
                <p>
                  <label for="telCliente" class="colocar_telefono">Teléfono
                  </label>
                    <input type="tel" name="telCliente" id="telefono" placeholder="Escribir  teléfono">
                </p>    
              
                <p>
                  <label for="dirCliente" class="colocar_email">Direccion
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="dirCliente" id="direccion" required="obligatorio" placeholder="Escribir direccion">
                </p>
                <p>
                  <label for="emaiCliente" class="colocar_email">Correo
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="email" name="emaiCliente" id="email" required="obligatorio" placeholder="Escribir tu Email">
                </p>
                <p>
                <h1>trabajador del cliente</h1>
                </p>
                <p>
                  <label for="nomTrabaCliente" class="colocar_email">nombre
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="nomTrabaCliente" id="" required="obligatorio" placeholder="Escribir el nombre del trabajador del cliente">
                </p>
                
                <p>
                  <label for="apelliTrabaCliente" class="colocar_email">apellido 
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="apelliTrabaCliente" id="" required="obligatorio" placeholder="Escribir el apellido del trabajador del cliente">
                </p>


                <p>
                  <label for="telTrabaCliente" class="colocar_email">Telefono
                    <span class="obligatorio">*</span>
                  </label>
                    <input type="text" name="telTrabaCliente" id="" required="obligatorio" placeholder="Escribir el telefono del trabajador del cliente">
                </p>
              <p>
                   <button type="submit" name="guardar"><p>Enviar</p></button>
              </p>
             

                <p class="aviso">
                  <span class="obligatorio"> * </span>los campos son obligatorios.    *   <a href="inicio.php" class="volver-inicio" >Volver a Inicio</a>
                </p>          
            
          </form>
    </div>  
  </div>

  


  
  <?php
  include('../conexion/base.php');
  include('controladorC.php');
  ?>
 

</body>
</html>

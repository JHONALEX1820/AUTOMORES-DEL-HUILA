<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos css/stylesREM.css">
    <title>Document</title>
</head>
<body>

<form action="procesar_desactivar.php" method="post">
    <h1>Desactivar Trabajador:</h1>
    
    <!-- Selección de trabajador a desactivar -->
    <p>
        <label for="inactivo">Selecciona al técnico a desactivar:</label>
        <select name="inactivo" id="inactivo" >
        <option value="">Seleccionar trabajador</option>
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

    <p>
        <label for="inactivoo">Selecciona al latonero a desactivar:</label>
        <select name="inactivoo" id="inactivoo" >
    <option value="">Seleccionar trabajador</option>
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

    <p>
        <label for="inactivooo">Selecciona al pintor a desactivar:</label>
        <select name="inactivooo" id="inactivooo" >
    <option value="">Seleccionar trabajador</option>
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

    <p>
        <button type="submit" name="desactivar">Desactivar Trabajador</button>
    </p>

</form>    
</body>
</html>



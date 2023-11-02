
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos css/stylesNUEVOTRAB.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<form action="procesarNuevotrabajador.php" method="post">
    <h3>Agregar Nuevo Trabajador:</h3>
    
    <!-- Agregar nuevo trabajador -->
    <p>
        <label for="nuevaEspecializacion">Selecciona la especialización del nuevo trabajador:</label>
        <select name="nuevaEspecializacion" required>
            <option value="tecnico">Técnico</option>
            <option value="latonero">Latonero</option>
            <option value="pintor">Pintor</option>
        </select>
    </p>

    <p>
        <label for="idTecnico_nuevo">Cédula del nuevo trabajador:</label>
        <input type="text" name="idTecnico_nuevo" required>
    </p>

    <p>
        <label for="nombre_nuevo">Nombre del nuevo trabajador:</label>
        <input type="text" name="nombre_nuevo" required>
    </p>

    <p>
        <label for="apellido_nuevo">Apellido del nuevo trabajador:</label>
        <input type="text" name="apellido_nuevo" required>
    </p>

    <p>
        <button type="submit" name="agregar">Agregar Nuevo Trabajador</button>
    </p>
</form>

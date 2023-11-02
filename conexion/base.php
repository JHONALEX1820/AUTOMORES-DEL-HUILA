<?php

// esta es la Conexión a la base de datos 

$servername = "localhost";
$username = "root"; 
$password = "";   // no contiene contraseña
$dbname = "automotores"; // esto es el nombre de mi base de datos 

// aqui estamos creando la conexion 
$db = new mysqli($servername, $username, $password, $dbname);

//esto Verifica la conexion si se conecto correctamente 
if ($db->connect_error) {
    die("Conexión fallida: " . $db->connect_error);
}

<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Si tienes una contraseña configurada, introdúcela aquí
$database = "bdfallos"; // Reemplaza "nombre_de_tu_base_de_datos" con el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el sector seleccionado
$sectorSeleccionado = $_GET['sector'];

// Consulta SQL para obtener los fallos relacionados con el sector seleccionado
$sql = "SELECT fallo_id, descripcion FROM fallos WHERE sector_id = '$sectorSeleccionado'";
$result = $conn->query($sql);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

// Generar opciones de desplegable para los fallos
$options = "<option></option>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["fallo_id"] . "'>" . $row["descripcion"] . "</option>";
    }
}

// Devolver las opciones como respuesta
echo $options;

// Cerrar la conexión
$conn->close();
    

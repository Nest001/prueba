<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Si tienes una contraseña configurada, introdúcela aquí
$database = "bdfallos"; // Reemplaza "nombre_de_tu_base_de_datos" con el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para obtener las áreas disponibles
$sql = "SELECT area_id, nombre FROM areas";
$result = $conn->query($sql);

// Generar opciones de desplegable para las áreas
$options = "<option></option>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["area_id"] . "'>" . $row["nombre"] . "</option>";
    }
}

// Devolver las opciones como respuesta
echo $options;

// Cierra la conexión
$conn->close();
?>

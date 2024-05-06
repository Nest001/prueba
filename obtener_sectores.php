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

// Obtener el área seleccionada
$areaSeleccionada = $_GET['area'];

// Consulta SQL para obtener los sectores relacionados con el área seleccionada
$sql = "SELECT sector_id, nombre FROM sectores WHERE area_id = '$areaSeleccionada'";
$result = $conn->query($sql);

// Generar opciones de desplegable para los sectores
$options = "<option></option>";
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $options .= "<option value='" . $row["sector_id"] . "'>" . $row["nombre"] . "</option>";
    }
}

// Devolver las opciones como respuesta
echo $options;

// Cerrar la conexión
$conn->close();
?>

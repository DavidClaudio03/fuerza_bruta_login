<?php
// Incluir el archivo de conexión
include('conexion.php');
$con = connection();

// Añadir el encabezado X-Frame-Options para proteger contra clickjacking
header('X-Frame-Options: SAMEORIGIN'); // También puedes usar 'DENY' para mayor seguridad

// Recibir los datos del formulario
$id = null;
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$precio = $_POST['precio'];

// Preparar y ejecutar la consulta SQL
$sql = "INSERT INTO viaje_global VALUES('$id','$nombre','$email','$precio')";
$query = mysqli_query($con, $sql);

// Redirigir basado en el resultado de la consulta
if ($query) {
    Header("Location: crud.php");
} else {
    // Manejo de error si la consulta falla
    echo "Error: No se pudo insertar el registro";
}

?>

<?php
include('conexion.php');
$con = connection();

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];

$sql = "INSERT INTO viaje_global(nombre, descripcion, precio) VALUES (?, ?, ?)";
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $con->error);
}

$stmt->bind_param("ssd", $nombre, $descripcion, $precio);

if ($stmt->execute()) {
    echo "Producto agregado correctamente";
    // Redirigir de vuelta a crud.php o a otra página si es necesario
    header("Location: crud.php");
    exit();
} else {
    echo "Error al insertar el producto: " . $stmt->error;
}

$stmt->close();
$con->close();
?>

<?php
include('conexion.php');
$con = connection();

$username = $_POST['username'];
$password = $_POST['password']; // Guardar la contraseña sin encriptar

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $con->prepare($sql);

if ($stmt === false) {
    die("Error en la preparación de la consulta: " . $con->error);
}

$stmt->bind_param("ss", $username, $password);

if ($stmt->execute()) {
    Header("Location: login.php");
} else {
    echo "Error al insertar el usuario: " . $stmt->error;
}

$stmt->close();
$con->close();
?>

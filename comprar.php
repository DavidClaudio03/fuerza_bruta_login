<?php
include('conexion.php');

function purchaseTicket($package) {
    $conn = connection();

    // Simula el proceso de compra
    $stmt = $conn->prepare("INSERT INTO viaje_global (package) VALUES (?)");
    $stmt->bind_param("s", $package);
    $stmt->execute();
    $result = $stmt->affected_rows > 0;

    $stmt->close();
    $conn->close();

    return $result;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $package = $_POST['package'];

    if (purchaseTicket($package)) {
        echo "Compra realizada con éxito!";
    } else {
        echo "Error en la compra.";
    }
}
?>

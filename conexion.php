<?php
if (!function_exists('connection')) {
    function connection() {
        $servername = "localhost";
        $username = "root"; // tu usuario de la BDD
        $password = ""; // tu contraseña de la BDD
        $dbname = "ventas"; // nombre de tu BDD

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname, 3308);


        // Verificar conexión
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
}

<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../conexion.php';
class ConexionTest extends TestCase
{
    public function testConnection()
    {
        $conn = connection();
        $this->assertInstanceOf(mysqli::class, $conn, "La conexión debería ser una instancia de mysqli");
        if ($conn->connect_error) {
            $this->fail("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connection successful\n";  // Imprime el mensaje en la consola
            $this->assertTrue(true, "Connection successful");
        }
        // Cerrar la conexión después de la prueba
        $conn->close();
    }

    public function testConnectionWithInvalidCredentials()
    {
        $host = "localhost";
        $user = "invalid_user";  // Usuario inválido
        $password = "invalid_password";  // Contraseña inválida
        $database = "ventas";
        try {
            $conn = new mysqli($host, $user, $password, $database);
            if ($conn->connect_errno) {
                throw new mysqli_sql_exception($conn->connect_error, $conn->connect_errno);
            }
            $this->fail("Connection should fail with invalid credentials");
        } catch (mysqli_sql_exception $e) {
            echo "Error esperado: " . $e->getMessage() . "\n";
            $this->assertTrue(true, "Connection failed with invalid credentials as expected");
        }
    }
}
?>

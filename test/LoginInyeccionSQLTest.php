<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../conexion.php';
require_once __DIR__ . '/../login_Inyec.php';
class LoginInyeccionSQLTest extends TestCase
{
    protected function setUp(): void
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    protected function tearDown(): void
    {
        session_unset();
        session_destroy();
    }
    public function testSQLInjection()
    {
        // Entrada maliciosa para la prueba de inyección SQL
        $username = 'david';
        $password = "' OR 1=1 -- ";
        // Llamar a la función loginUser con la entrada maliciosa
        $result = loginUser($username, $password);
        // Verificar si la inyección SQL fue exitosa
        if ($result) {
            echo "Vulnerable a inyección SQL\n";
            $this->assertTrue(true, "La aplicación es vulnerable a inyección SQL.");
        } else {
            echo "No vulnerable a inyección SQL\n";
            $this->assertTrue(false, "La aplicación no es vulnerable a inyección SQL.");
        }
    }
}
?>

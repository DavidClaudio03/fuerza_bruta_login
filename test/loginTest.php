<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../conexion.php';
require_once __DIR__ . '/../login.php';

class LoginTest extends TestCase
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

    public function testLoginSuccess()
    {
        // Suponiendo que tienes un usuario con nombre de usuario 'david' y contraseña '123456789' en tu base de datos
        $username = 'david';
        $password = '123456789';
        $result = loginUser($username, $password);
        $this->assertTrue($result, "El inicio de sesión debe realizarse correctamente con las credenciales correctas.");

        if ($result) {
            echo "Inicio de sesión exitoso para el usuario: $username\n";
        }

        $this->assertEquals($username, $_SESSION['username'], "El nombre de usuario de la sesión debe configurarse después de iniciar sesión correctamente");
    }

    public function testLoginFailure()
    {
        // Prueba con credenciales incorrectas
        $username = 'wronguser';
        $password = 'wrongpassword';
        
        $result = loginUser($username, $password);
        $this->assertFalse($result, "El inicio de sesión debería fallar con credenciales incorrectas");

        if (!$result) {
            echo "Inicio de sesión fallido con credenciales incorrectas\n";
        }

        $this->assertArrayNotHasKey('username', $_SESSION, "El nombre de usuario de la sesión no debe establecerse después de un inicio de sesión fallido");
    }
}

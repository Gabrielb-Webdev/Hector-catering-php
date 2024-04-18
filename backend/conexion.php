<!-- backend/conexion.php -->

<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username = "root";
$password = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database, $db_port);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Establecer el juego de caracteres a UTF-8
$conn->set_charset("utf8");
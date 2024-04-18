<!-- backend/login_process.php -->
<?php
session_start(); // Esta línea debería ser la primera línea del archivo

include 'conexion.php'; // Incluir el archivo de conexión a la base de datos

// Obtener los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consultar la base de datos para verificar las credenciales
$query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
$result = $conn->query($query);

if ($result->num_rows == 1) {
    // Las credenciales son correctas, iniciar sesión
    $_SESSION['logged_in'] = true;
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "Inicio de sesión exitoso";
    
    // Redirigir a index.php
    header("Location: ../index.php");
    exit();
} else {
    // Credenciales incorrectas, mostrar mensaje de error y redirigir al formulario de inicio de sesión
    $_SESSION['error'] = "Correo electrónico o contraseña incorrectos";
    header("Location: ../admin/Login.php");
    exit();
}

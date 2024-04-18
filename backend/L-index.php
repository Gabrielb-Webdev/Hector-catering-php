<?php
session_start(); // Inicia la sesión

// Verifica si se recibió una solicitud POST para iniciar sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario de inicio de sesión
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Realiza la verificación en la base de datos para validar las credenciales
    // Aquí deberías realizar la verificación de manera segura para evitar la inyección de SQL
    $query = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);

    // Si las credenciales son correctas, inicia sesión y redirige al usuario
    if ($result->num_rows == 1) {
        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "Inicio de sesión exitoso";

        // Redirige al usuario a donde quieras después de iniciar sesión
        header("Location: ../index.php");
        exit();
    } else {
        // Si las credenciales son incorrectas, muestra un mensaje de error
        $_SESSION['error'] = "Correo electrónico o contraseña incorrectos";
    }
}
?>

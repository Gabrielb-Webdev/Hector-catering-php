<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si ya hay una sesión iniciada
if(isset($_SESSION['email'])) {
    // Si hay una sesión iniciada, redireccionar al usuario a ../index.php
    header("Location: ../index.php");
    exit(); // Asegurarse de que el script se detenga después de redireccionar
}

// Datos de conexión a la base de datos
$servername = "roundhouse.proxy.rlwy.net";
$username_db = "root";
$password_db = "MKIacdLxZxrjnYHNMGyhQtekMghFKlGq";
$database = "railway";
$db_port = "12331";

// Recuperar los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email']; // Cambiar el nombre del campo a 'email'
    $password = $_POST['password'];

    // Conectar a la base de datos
    $conn = new mysqli($servername, $username_db, $password_db, $database, $db_port);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Consulta para buscar un usuario con el correo electrónico y la contraseña proporcionados
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Verificar si se encontró un usuario
    if ($result->num_rows > 0) {
        // Usuario autenticado correctamente
        // Almacenar el correo electrónico del usuario en la variable de sesión
        $_SESSION['email'] = $email;
        // Redireccionar al usuario a ../index.php
        header("Location: ../index.php");
        exit(); // Asegurarse de que el script se detenga después de redireccionar
    } else {
        // Usuario o contraseña incorrectos
        // Imprimir en la consola del navegador que el inicio de sesión falló
        echo "<script>console.log('Inicio de sesión fallido. Usuario o contraseña incorrectos.');</script>";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

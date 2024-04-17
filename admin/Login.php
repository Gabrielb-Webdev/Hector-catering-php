<!-- admin/Login.php -->

<?php
session_start(); // Iniciar sesión si no está iniciada

include '../backend/estado.php'; // Incluir el archivo de estado de sesión

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    
    <?php
    // Mostrar alerta de éxito si existe
    if(isset($_SESSION['success'])) {
        echo '<div style="color: green;">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']); // Eliminar el mensaje de éxito para evitar que se muestre de nuevo
    }
    
    // Mostrar alerta de error si existe
    if(isset($_SESSION['error'])) {
        echo '<div style="color: red;">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Eliminar el mensaje de error para evitar que se muestre de nuevo
    }
    ?>
    
    <form action="../backend/login_process.php" method="post">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>

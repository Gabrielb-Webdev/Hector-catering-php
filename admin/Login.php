<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/login.css">
</head>
<body>
    <form action="../backend/login_process.php" method="post">
        <h2>Login</h2>
        <label for="email">Correo electrónico:</label> <!-- Cambiar el label a 'Correo electrónico' -->
        <input type="email" id="email" name="email" required> <!-- Cambiar el id y el name a 'email', y cambiar el type a 'email' -->
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>

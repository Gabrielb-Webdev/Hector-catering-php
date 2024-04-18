<!-- admin/Login.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    
    <form action="../backend/login_process.php" method="post">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Iniciar sesión</button>
    </form>
</body>
</html>

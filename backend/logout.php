<!-- logout.php -->

<?php
// Iniciar la sesión si aún no está iniciada
session_start();

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se desea eliminar la sesión, también se debe destruir la cookie de la sesión
// Esto eliminará la sesión y no la información de la sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión
session_destroy();

// Redirigir al usuario a una página de inicio de sesión o a cualquier otra página
header("Location: ../index.php");
exit();


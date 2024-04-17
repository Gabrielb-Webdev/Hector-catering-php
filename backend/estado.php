<?php
// Iniciar la sesión si aún no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está logeado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    $usuarioLogeado = '';
    if (isset($_SESSION['email'])) {
        $usuarioLogeado .= 'Email: ' . $_SESSION['email'];
    }
} else {
    $usuarioLogeado = "Usuario no logeado";
}
?>

<script>
// Crear una variable JavaScript con el estado del usuario
var usuarioLogeado = '<?php echo $usuarioLogeado; ?>';

// Mostrar el estado del usuario en la consola
console.log(usuarioLogeado);
</script>

<?php
// Verificar si hay una sesión iniciada y si el usuario tiene un email definido
if (isset($_SESSION['email'])) {
    // Mostrar los iconos si el usuario tiene un email definido
    $showIcons = true;
} else {
    // No mostrar los iconos si el usuario no cumple con las condiciones
    $showIcons = false;
}
?>

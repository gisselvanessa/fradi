<?php
session_start(); // Iniciar la sesión si no se ha iniciado aún

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión o a cualquier otra página deseada
header("Location: ../index.php"); // Reemplaza "inicio_sesion.php" con la página a la que deseas redirigir al cerrar sesión
exit;
?>
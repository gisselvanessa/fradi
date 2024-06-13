<?php
session_set_cookie_params(0, '/');
session_start();

function verificar_sesion() {
  
    if (!isset($_SESSION['id_usuario'])) {
        header("Location: /notificaciones/login/index.php");
        exit;
    }
    else if(isset($_SESSION['id_usuario'])){

        if($_SESSION['id_rol'] != '2'){
        
            header("Location: /notificaciones/login/index.php");    
            session_destroy();
            exit;
        }
    
    
    }
 }

function obtener_nombre_usuario() {
    if (isset($_SESSION['nombre_usuario'])) {
        return $_SESSION['nombre_usuario'];
    } else {
        return null;
    }
}

// Otros métodos y funciones relacionados con la sesión...

?>

<?php
include_once '../administrator/conexiones/conectiondatos.php';
conectar();
session_set_cookie_params(0, '/');
session_start();

function obtenerDireccionIP() {
    // Verificar si se ha proporcionado la dirección IP desde un encabezado HTTP_X_FORWARDED_FOR
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Verificar si se ha proporcionado la dirección IP desde un encabezado HTTP_CLIENT_IP
    elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // En otros casos, obtener la dirección IP desde la variable REMOTE_ADDR
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
 
    return $ip;
}

$ip = obtenerDireccionIP();
// Verificar si el usuario ya ha iniciado sesión
if (isset($_SESSION['id_usuario'])) {
    header("Location: ../home.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores de usuario y contraseña enviados por el formulario
    $email = $_POST['correo'];
    $password = $_POST['password'];

    // Realizar la validación de los datos de inicio de sesión
    $email = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);
    
    $consulta = mysql_query("SELECT * FROM musuarios WHERE email='$email' AND contrasenaUsuario='$password' AND ipCreacion='$ip'");

   

    if (mysql_num_rows($consulta) === 1) {
        $rowq = mysql_fetch_array($consulta);
        $_SESSION['id_usuario'] = $rowq['idUsuario'];
        $_SESSION['nombre_usuario'] = $rowq['nombreUsuario'];
        $_SESSION['apellidos']= $rowq['apellidos'];
        $_SESSION['nombres']= $rowq['nombres'];
        $_SESSION['id_rol'] = $rowq['idRol'];

        if($_SESSION['id_rol']=='1'){

            header("Location: ../home.php");
            exit;
        }
        if($_SESSION['id_rol']=='2'){
         
            header("Location: ../user/home.php");
            exit;
        }
       
    } else {
        echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal({
                    title: 'Oops!',
                    text: 'USUARIO O CONTRASE\u00D1A INCORRECTOS',
                    icon: 'error',
                    button: 'OK',
                    customClass: {
                        container: 'custom-alert' // Aquí se asigna la clase personalizada
                    }
                }).then(() => {
                    window.location.href = 'index.php';
                });
                var alertContainer = document.querySelector('.swal2-container');
                alertContainer.style.zoom = '2'; // Ajusta este valor según tus necesidades
            });
        </script>";
        exit;
        // echo "<script>window.location.href = 'index.php';</script>";
        // exit;
    }
}
?>

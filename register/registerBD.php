<?php
include_once '../administrator/conexiones/conectiondatos.php';
conectar();

/**
 * Método para obtener la dirección IP
 */
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
// Obtener la dirección MAC del servidor
$MAC = exec('getmac');
$MAC = strtok($MAC, ' ');

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$nombreUsuario = $_POST['nombreUsuario'];
$constrasena = $_POST['password'];
$cedula = $_POST['cedula'];
$rol = $_POST['rol'];
$email = $_POST['email'];
$cargo = $_POST['cargo'];
$departamento = $_POST['departamento'];
$agencia=$_POST['agencia'];
// Comprobar si el usuario ya existe en la base de datos
$consulta = "SELECT * FROM musuarios WHERE email = '$email' OR nombreUsuario='$nombreUsuario' OR cedulaUsuario='$cedula'";
$resultado = mysql_query($consulta);
if (mysql_num_rows($resultado) > 0) {
    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'Oops!',
                text: 'EL USUARIO YA ESTA REGISTRADO',
                icon: 'error',
                button: 'OK'
            }).then(() => {
                window.location.href = '../registro.php';
            });
        });
    </script>";
    exit;
}else {
    // Insertar el nuevo usuario en la base de datos
    $consulta = "INSERT INTO musuarios (idRol, idAgencia, idDepartamento, idCargo, nombres, apellidos, nombreUsuario, contrasenaUsuario, cedulaUsuario, email, direccionMac, ipCreacion) 
    VALUES ($rol, $agencia, $departamento, $cargo, '$nombres', '$apellidos', '$nombreUsuario', '$constrasena', '$cedula', '$email', '$MAC', '$ip')";

    mysql_query($consulta);

    echo "<script src='https://unpkg.com/sweetalert/dist/sweetalert.min.js'></script>";
    echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            swal({
                title: 'CREADO CON EXITO!',
                text: 'El usuario ha sido registrado correctamente',
                icon: 'success',
                button: 'OK'
            }).then(() => {
                window.location.href = '../login/index.php';
            });
        });
    </script>";
    exit;
}
?>
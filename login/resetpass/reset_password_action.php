<?php

include_once '../../administrator/conexiones/conectiondatos.php';
conectar();

$contrasenia=$_POST['nueva_clave'];
$contrasenia = mysql_real_escape_string($contrasenia);
$idUser=$_POST['idUser'];
$idUser = mysql_real_escape_string($idUser);

$sql3 = "UPDATE musuarios SET musertoken = null, mresetpassword = 0, contrasenaUsuario='$contrasenia' WHERE idUsuario=$idUser ";
        mysql_query($sql3);

        header('Location: ../index.php');
        exit();
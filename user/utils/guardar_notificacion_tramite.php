<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nrodetramite'])) {
    // Obtener los valores del formulario
    $nrodetramite = $_POST['nrodetramite'];
    $accion = $_POST['accion'];
    $user=$_POST['user'];
    
    // Convertir 'Devolver' a 'D' y 'Aceptar' a 'A'
    // if ($accion === 'devuelto') {
    //     $accion = 'D';
    // } else if ($accion === 'aceptado') {
    //     $accion = 'A';
    // }

    $observaciones = $_POST['observaciones'];
    $fecha = $_POST['fecha'];
    $fechaSol = $_POST['fechaSol'];

    // Escapar los valores para evitar ataques de SQL injection
    $nrodetramite = mysql_real_escape_string($nrodetramite);
    $accion = mysql_real_escape_string($accion);
    $observaciones = mysql_real_escape_string($observaciones);
    $fecha = mysql_real_escape_string($fecha);
    $fechaSol = mysql_real_escape_string($fechaSol);

    include_once '../conexiones/conectiondatos.php';
    conectar();

    // Actualizar el estado en la tabla "mlistareportes"
    $sql = "UPDATE mlistareportes SET mstatusat = '$accion', mobservacionres = '$observaciones', mprocesocasos = '$fecha', mfechasolucion = '$fechaSol' WHERE midformulariogeneral = '$nrodetramite'";
    $sql2 = "INSERT INTO mseguimiento (midformulariogeneral, midestadocaso, musuarioregistro, mfecharegistro, mobservacion) 
        VALUES ('$nrodetramite', 'T', '$user', '$fecha', '$observaciones')";    

    $result = mysql_query($sql);
    $result2 = mysql_query($sql2);

    if (!$result) {
        die("Error al actualizar el estado en la base de datos: " . mysql_error());
    }

    // Cerrar la conexión
    mysql_close($con);

    // Realizar el proceso para guardar la notificación en la base de datos
    // Aquí debes escribir el código para guardar la información en tu base de datos,
    // por ejemplo, utilizando consultas SQL.

    // Devolver una respuesta (opcional)
    echo "Notificación guardada correctamente";
}
?>

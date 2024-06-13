<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nrodetramite'])) {
    // Obtener los valores del formulario
    $nrodetramite = $_POST['nrodetramite'];
    $accion = $_POST['accion'];
    $user=$_POST['user'];
    // Convertir 'Devolver' a 'D' y 'Aceptar' a 'A'
    if ($accion === 'devuelto') {
        $accion = 'D';
    } else if ($accion === 'aceptado') {
        $accion = 'A';
    }

    $observaciones = $_POST['observaciones'];
    $fecha = $_POST['fecha'];

    // Escapar los valores para evitar ataques de SQL injection
    $nrodetramite = mysql_real_escape_string($nrodetramite);
    $accion = mysql_real_escape_string($accion);
    $observaciones = mysql_real_escape_string($observaciones);
    $fecha = mysql_real_escape_string($fecha);

    include_once '../conexiones/conectiondatos.php';
    conectar();

    // Actualizar el estado y las observaciones en la tabla "mlistareportes" según la acción
    if ($accion === 'A') {
        // Si la acción es 'Aceptar', guardar las observaciones en la columna 'mobservacionpc'
        $sql = "UPDATE mlistareportes SET mstatusat = '$accion', mobservacionpc = '$observaciones', mfrevision = '$fecha' WHERE midformulariogeneral = '$nrodetramite'";
        $sql2 = "INSERT INTO mseguimiento (midformulariogeneral, midestadocaso, musuarioregistro, mfecharegistro, mobservacion) 
        VALUES ('$nrodetramite', 'A', '$user', '$fecha', '$observaciones')";    
    } else {
        // Si la acción es 'Devolver', guardar las observaciones en la columna 'mobservacionrev'
        $sql = "UPDATE mlistareportes SET mstatusat = '$accion', mobservacionrev = '$observaciones', mfrevision = '$fecha' WHERE midformulariogeneral = '$nrodetramite'";
        $sql2 = "INSERT INTO mseguimiento (midformulariogeneral, midestadocaso, musuarioregistro, mfecharegistro, mobservacion) 
        VALUES ('$nrodetramite', 'D', '$user', '$fecha', '$observaciones')";    
    }

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

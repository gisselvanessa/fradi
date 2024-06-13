<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['midformulariogeneral'])) {
    $midformulariogeneral = $_POST['midformulariogeneral'];
    $observaciones = $_POST['observaciones'];
    $fecha= $_POST['fecha'];
    $user=$_POST['user'];
    // Escapar el valor de $midformulariogeneral para evitar ataques de SQL injection
    $midformulariogeneral = mysql_real_escape_string($midformulariogeneral);

    // Realizar la actualización del estado en la base de datos
    include_once '../conexiones/conectiondatos.php';
    conectar();
    
    // Aquí debes ejecutar la consulta para actualizar el estado en la tabla "mlistareportes"
    // Por ejemplo:
    $sql = "UPDATE mlistareportes SET mstatusat = 'R', mobservacionat='$observaciones', mfareatrabajo='$fecha' WHERE midformulariogeneral = '$midformulariogeneral'";
    $sql2 = "INSERT INTO mseguimiento (midformulariogeneral, midestadocaso, musuarioregistro, mfecharegistro, mobservacion) 
    VALUES ('$midformulariogeneral', 'R', '$user', '$fecha', '$observaciones')";    
    $result = mysql_query($sql);
    $result2 = mysql_query($sql2);

    if (!$result || !$result2) {
        die("Error al actualizar el estado en la base de datos: " . mysql_error());
    }

    // Cerrar la conexión
    mysql_close($con);

    // Devolver una respuesta (opcional)
    echo "Estado actualizado correctamente";
}
?>

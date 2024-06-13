<?php
if (isset($_GET['midformulariogeneral']) && isset($_GET['nombrearchivo'])) {
    $nrodetramite = $_GET['midformulariogeneral'];
    $nombreArchivo = $_GET['nombrearchivo'];

    // Realizar una consulta para obtener los datos del archivo desde la base de datos
    include_once '../conexiones/conectiondatos.php';
    conectar();
    
    $nrodetramite = mysql_real_escape_string($nrodetramite);
    $nombreArchivo = mysql_real_escape_string($nombreArchivo);
    $sql = "SELECT tipo_mime, datos FROM archivos_subidos WHERE nro_tramite = '$nrodetramite' AND nombre_archivo = '$nombreArchivo'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener el archivo desde la base de datos: " . mysql_error());
    }

    // Verificar si se encontró el archivo
    if (mysql_num_rows($result) > 0) {
        $row = mysql_fetch_assoc($result);
        $tipoMime = $row['tipo_mime'];
        $datosArchivo = $row['datos'];

        // Configurar las cabeceras para la descarga
        header("Content-Description: File Transfer");
        header("Content-Type: $tipoMime");
        header("Content-Disposition: attachment; filename=" . urlencode($nombreArchivo));
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: must-revalidate");
        header("Pragma: public");
        header("Content-Length: " . strlen($datosArchivo));

        // Enviar el archivo al cliente
        echo $datosArchivo;
        exit;
    } else {
        // Manejar el caso de que el archivo no se encuentre en la base de datos (opcional)
        die("El archivo no se encuentra en la base de datos.");
    }

    // Liberar el resultado
    mysql_free_result($result);

    // Cerrar la conexión
    mysql_close($con);
} else {
    // Manejar el caso de que no se proporcionen los parámetros adecuados (opcional)
    die("Parámetros incorrectos para la descarga.");
}
?>

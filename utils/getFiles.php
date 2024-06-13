<?php

include_once '../administrator/conexiones/conectiondatos.php';
conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['midformulariogeneral'])) {
    $midformulariogeneral = $_POST['midformulariogeneral'];

    // Escapar el valor de $midformulariogeneral para evitar ataques de SQL injection
    $midformulariogeneral = mysql_real_escape_string($midformulariogeneral);

    // Realizar una consulta para obtener los archivos subidos para el "midformulariogeneral"
    $sql = "SELECT nombre_archivo, descripcion FROM archivos_subidos WHERE nro_tramite = '$midformulariogeneral'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener los archivos subidos: " . mysql_error());
    }

    // Construir el contenido HTML para mostrar los archivos subidos
    $archivosHtml = '<ul>';
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $nombreArchivo = $row['nombre_archivo'];
            $descripcionArchivo = $row['descripcion'];
            $archivosHtml .= '<tr>';
            // Enlace para descargar el archivo, pasando el valor de midformulariogeneral a descargar_archivo.php
            $archivosHtml .= '<td><a href="utils/descargar_archivo.php?midformulariogeneral=' . urlencode($midformulariogeneral) . '&nombrearchivo=' . urlencode($nombreArchivo) . '" target="_blank">' . $nombreArchivo . '</a>'.'</td>';
            $archivosHtml .= '<td>' . $descripcionArchivo . '</td>'; // Agregar un salto de línea para separar los enlaces
            $archivosHtml .= '</tr>';
        }
    } else {
        $archivosHtml .= '<tr><td colspan="2">No existen archivos</td></tr>';
    }
    $archivosHtml .= '</ul>';

    // Liberar el resultado
    mysql_free_result($result);

    // Devolver el contenido HTML para mostrar en el modal
    echo $archivosHtml;
}

// Cerrar la conexión
// mysql_close($con);
?>

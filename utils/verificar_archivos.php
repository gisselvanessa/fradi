<?php
// verificar_archivos.php
include_once '../administrator/conexiones/conectiondatos.php';
conectar();

function tieneArchivosSubidos($midformulariogeneral) {
    // Escapar el valor de $midformulariogeneral para evitar ataques de SQL injection
    $midformulariogeneral = mysql_real_escape_string($midformulariogeneral);

    // Realizar una consulta para verificar si existen archivos subidos para el "midformulariogeneral"
    $sql = "SELECT COUNT(*) AS total FROM archivos_subidos WHERE nro_tramite = '$midformulariogeneral'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener los archivos subidos: " . mysql_error());
    }

    $row = mysql_fetch_assoc($result);
    $totalArchivos = $row['total'];

    // Liberar el resultado
    mysql_free_result($result);

    // Devolver true si hay archivos subidos, o false en caso contrario
    return $totalArchivos > 0;
}
?>

<?php

include_once '../administrator/conexiones/conectiondatos.php';
conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['midformulariogeneral'])) {
    $midformulariogeneral = $_POST['midformulariogeneral'];

    // Escapar el valor de $midformulariogeneral para evitar ataques de SQL injection
    $midformulariogeneral = mysql_real_escape_string($midformulariogeneral);

    // Realizar una consulta para obtener los archivos subidos para el "midformulariogeneral"
    $sql = "SELECT mfareatrabajo,
    mobservacionat,
    mfrevision,
    mobservacionrev,
    mprocesocasos,
    mobservacionpc,
    mresolucioncasos,
    mobservacionres,
    mobservacionhis FROM mlistareportes WHERE midformulariogeneral = '$midformulariogeneral'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener los archivos subidos: " . mysql_error());
    }

    // Construir el contenido HTML para mostrar los archivos subidos
    $datosTabla = '<ul>';
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $fechaat = $row['mfareatrabajo'];
          $observacionat = $row['mobservacionat'];
          $fecharev = $row['mfrevision'];
          $observacionrev = $row['mobservacionrev'];
          $fechapc = $row['mprocesocasos'];
          $observacionpc = $row['mobservacionpc'];
          $fecharescaso = $row['mresolucioncasos'];
          $observacionres = $row['mobservacionres'];
          $observacionrhis = $row['mobservacionhis'];

          // ... Código PHP para construir la tabla ...

          // Cada fila debe tener la clase "left-align" para alinear el texto a la izquierda
          $datosTabla .= '<tr class="left-align">';
          $datosTabla .= '<td align="left">'.'CARGA DE DOCUMENTOS'.'</td>';
                    $datosTabla .= '<td align="left">'.$fechaat.'</td>';
          $datosTabla .= '<td align="left">' .'Ingresado'. '</td>';
          $datosTabla .= '<td align="left">' .$observacionat. '</td>';
          $datosTabla .= '</tr>';

          $datosTabla .= '<tr class="left-align">';
          $datosTabla .= '<td align="left">'.'CASO RECIBIDO'.'</td>';
                    $datosTabla .= '<td align="left">'.$fecharev.'</td>';
          $datosTabla .= '<td align="left">' .'Aceptado'. '</td>';
          $datosTabla .= '<td align="left">' .$observacionrev. '</td>';
          $datosTabla .= '</tr>';

          $datosTabla .= '<tr class="left-align">';
          $datosTabla .= '<td align="left">'.'CASO ACEPTADO'.'</td>';
                    $datosTabla .= '<td align="left">'.$fechapc.'</td>';
          $datosTabla .= '<td align="left">' .'En trámite'. '</td>';
          $datosTabla .= '<td align="left">' .$observacionpc. '</td>';
          $datosTabla .= '</tr>';

          $datosTabla .= '<tr class="left-align">';
          $datosTabla .= '<td align="left">'.'RESOLUCIÓN DE CASO'.'</td>';
                    $datosTabla .= '<td align="left">'.$fecharescaso.'</td>';
          $datosTabla .= '<td align="left">' .'Resuelto / Proceso Terminado'. '</td>';
          $datosTabla .= '<td align="left">' .$observacionrhis. '</td>';
          $datosTabla .= '</tr>';
            
          
        }
    } else {
        $datosTabla .= '<tr><td colspan="2">No existen datos</td></tr>';
    }
    $datosTabla .= '</ul>';

    // Liberar el resultado
    mysql_free_result($result);

    // Devolver el contenido HTML para mostrar en el modal
    echo $datosTabla;
}

// Cerrar la conexión
// mysql_close($con);
?>

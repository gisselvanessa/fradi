<?php

include_once '../conexiones/conectiondatos.php';
conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['midformulariogeneral'])) {
    $midformulariogeneral = $_POST['midformulariogeneral'];

    // Escapar el valor de $midformulariogeneral para evitar ataques de SQL injection
    $midformulariogeneral = mysql_real_escape_string($midformulariogeneral);

    // Realizar una consulta para obtener los archivos subidos para el "midformulariogeneral"
    $sql = "SELECT mfecharegistro,
    midestadocaso,
    musuarioregistro,
    mobservacion
     FROM mseguimiento WHERE midformulariogeneral = '$midformulariogeneral'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener los archivos subidos: " . mysql_error());
    }

    // Construir el contenido HTML para mostrar los archivos subidos
    $datosTabla = '<ul>';
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {
            $fecha = $row['mfecharegistro'];
          $estado = $row['midestadocaso'];
          $usuario = $row['musuarioregistro'];
          $observacion= $row['mobservacion'];

          // ... Código PHP para construir la tabla ...
            if($estado=='I'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'INGRESO'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';
            }
            if($estado=='D'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'DEVUELTO'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';
            }
            else if($estado=='R'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'CARGA DE DOCUMENTOS'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';

                
            }
            else if($estado=='A'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'CASOS ACEPTADOS'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';

            }
            else if($estado=='T'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'EN TRAMITE'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';

            }else if($estado=='F' || $estado=='N'){
                $datosTabla .= '<tr class="left-align">';
                $datosTabla .= '<td align="left">'.'RESOLUCION'.'</td>';
                            $datosTabla .= '<td align="left">'.$fecha.'</td>';
                $datosTabla .= '<td align="left">' .$estado. '</td>';
                $datosTabla .= '<td align="left">' .$usuario. '</td>';
                $datosTabla .= '<td align="left">' .$observacion. '</td>';
                $datosTabla .= '</tr>';

            }

          
          
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

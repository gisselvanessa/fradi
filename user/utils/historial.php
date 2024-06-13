<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nrodetramite'])) {
    // Obtener los valores del formulario
    $nrodetramite = $_POST['nrodetramite'];

    // Realizar la consulta para obtener los datos correspondientes
    // Asegúrate de escapar el valor del número de trámite para evitar SQL injection
    // $nrodetramite = mysqli_real_escape_string($con, $nrodetramite);
    $nrodetramite = mysql_real_escape_string($nrodetramite);
    include_once '../conexiones/conectiondatos.php';
    conectar();

    $sql = "SELECT mfregistro, mfareatrabajo, mfrevision, mprocesocasos, mresolucioncasos, mobservacionat, mobservacionrev, mobservacionpc, mobservacionres, mobservacionhis FROM mlistareportes WHERE midformulariogeneral = '$nrodetramite'";
    $result = mysql_query($sql);

    if (!$result) {
        die("Error al obtener los datos de la base de datos: " . mysql_error());
    }

    // Comprobar si se encontraron resultados
    if (mysql_num_rows($result) > 0) {
        // Obtener los datos y almacenarlos en variables
        $row = mysql_fetch_assoc($result);
        $fecha = $row['mfregistro'];
        $estado = $row['mfareatrabajo'];
        $notas = $row['mobservacionrev'];

        // Ahora, podemos asignar los valores a los elementos del modal utilizando JavaScript
        // Primero, enviamos los datos al modal
        echo "<script>
              document.getElementById('nroTramiteLabel').textContent = '$nrodetramite';
              document.getElementById('fechaTd').textContent = '$fecha';
              document.getElementById('estadoTd').textContent = '$estado';
              document.getElementById('notasTd').textContent = '$notas';
              </script>";
    } else {
        echo "No se encontraron datos para el número de trámite: $nrodetramite";
    }

    // Liberar el resultado y cerrar la conexión
    mysql_free_result($result);
    // mysql_close($con);
}
?>

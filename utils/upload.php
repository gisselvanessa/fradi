<?php

include_once '../administrator/conexiones/conectiondatos.php';
conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha enviado un archivo
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        // Incluir el archivo de conexión
        // include_once 'conexiones/conectiondatos.php';

        // // Establecer la conexión a la base de datos
        // $conn = conectar();

        // // Verificar la conexión
        // if (!$conn) {
        //     die("Conexión fallida: " . mysql_error());
        // }

        // Obtener información del archivo
        $nombreArchivo = $_FILES['archivo']['name'];
        $tipoArchivo = $_FILES['archivo']['type'];
        $contenidoArchivo = addslashes(file_get_contents($_FILES['archivo']['tmp_name']));
        $midformulariogeneral = $_POST['midformulariogeneral'];
        $titulo = $_POST['titulo'];
        // Preparar y ejecutar la consulta para insertar el archivo en la base de datos
        $sql = "INSERT INTO archivos_subidos (nro_tramite,nombre_archivo,descripcion, tipo_mime, datos) VALUES ('$midformulariogeneral','$nombreArchivo','$titulo', '$tipoArchivo', '$contenidoArchivo')";
        $resultado = mysql_query($sql);

        if ($resultado) {
            echo "Archivo subido y almacenado correctamente en la base de datos.";
        } else {
            echo "Error al subir el archivo: " . mysql_error();
        }

        // Cerrar la conexión
        // mysql_close($conn);
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

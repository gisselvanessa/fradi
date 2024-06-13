<?php
include_once '../conexiones/conectiondatos.php';
conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtén el código único del formulario
  $codigoFormulario = $_POST['codigoFormulario']; // Ejemplo: Obtén el código del formulario desde los datos enviados por el formulario

  // Procesa el archivo PDF cargado
  $nombreArchivo = $_FILES['archivoPDF']['name']; // Nombre original del archivo cargado
  $rutaTemporal = $_FILES['archivoPDF']['tmp_name']; // Ruta temporal del archivo cargado

  // Genera una ruta única para el archivo PDF
  $rutaPDF = 'ruta/donde/guardar/'.$nombreArchivo; // Ruta donde se guardará el archivo PDF

  // Mueve el archivo cargado a su ubicación final
  if (move_uploaded_file($rutaTemporal, $rutaPDF)) {
    // Inserta la ruta del archivo PDF en la tabla correspondiente
    $consulta = "INSERT INTO mlistareportes (murlpdf) VALUES ('$rutaPDF');";
    $resultado = mysql_query($consulta);

    if ($resultado) {
      echo "El archivo PDF se ha guardado correctamente en la base de datos.";
    } else {
      echo "Hubo un error al guardar el archivo PDF en la base de datos.";
    }
  } else {
    echo "Hubo un error al subir el archivo PDF.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Subir Archivo PDF</title>
</head>
<body>
  <form method="POST" enctype="multipart/form-data">
    <input type="hidden" name="codigoFormulario" value="valor_codigo_formulario">
    <input type="file" name="archivoPDF">
    <input type="submit" value="Guardar PDF" style="display: none;">
  </form>
</body>
</html>
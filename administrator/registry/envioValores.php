
<?php

 $cadenaPrin=$_POST['valor5']; // id del formulario
$cadena_idCuestionario=$_POST['valor3']; //C1 C2 ..
$cadena_idTitulo=$_POST['valor4'];
$cadena_text1_es=$_POST['valor1'];
$cadena_text2_es=$_POST['valor2'];
// echo $cadena_fecha;
// echo $cadena_check;
include_once '../conexiones/conectiondatos.php';
conectar();

 
$consuls1="update mformulariosgenerales set mcamposad1_es='$cadena_text1_es' where midformulariogeneral='$cadenaPrin' and midcuestionario='$cadena_idCuestionario'";
                  mysql_query($consuls1);
 $consuls2="update mformulariosgenerales set mcamposad2_es='$cadena_text2_es' where midformulariogeneral='$cadenaPrin' and midcuestionario='$cadena_idCuestionario'";
                  mysql_query($consuls2);


 
?>
		
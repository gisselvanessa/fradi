

<?php

 $cadenaPrin=$_POST['valor1']; // id del formulario
$comment=$_POST['valor2']; //comment
// $check=$_POST['valor3'];
// $idCuest=$_POST['valor3'];
// $cadena_text2_es=$_POST['valor2'];
// echo $cadena_fecha;
// echo $cadena_check;
include_once '../conexiones/conectiondatos.php';
conectar();

 
 
$consuls1="update mformulariosgenerales set mcamposad1_es='$comment' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16' ;";
                  mysql_query($consuls1);
// if($check ===true){
// 	$consuls2="update mformulariosgenerales set mcamposad2_es='true' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16' ;";
//                   mysql_query($consuls2);
// }

// else{
// 	$consuls3="update mformulariosgenerales set mcamposad2_es='false' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16' ;";
//                   mysql_query($consuls3);
// }


 
?>
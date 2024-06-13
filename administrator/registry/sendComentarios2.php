

<?php

 $cadenaPrin=$_POST['valor1']; // id del formulario
$comment=$_POST['valor2']; //C1 C2 ..

// $cadena_text2_es=$_POST['valor2'];
// echo $cadena_fecha;
// echo $cadena_check;
include_once '../conexiones/conectiondatos.php';
conectar();

 
 
$consuls1="insert into mformcomentarios(midformulario, mcomentarios) values('$cadenaPrin', '$comment');";
                  mysql_query($consuls1);

// if(!$consuls1){
	$consuls2="update mformcomentarios set mcomentarios='$comment' where midformulario='$cadenaPrin';";
                  mysql_query($consuls2);
// }

// $consultaw="insert into mdetallesreclamos (midreclamo, mcomercio, mfechareclamo, mdescripcion, mvalorreclamo) VALUES ('$cadena_id','$cadena_comercio','$cadena_fecha','$cadena_descripcion',$cadena_cantidad);";

// $consuls1="update mformulariosgenerales set mcamposad1_es='$cadena_text1_es' where midformulariogeneral='$cadenaPrin' and midcuestionario='$cadena_idCuestionario'";
//                   mysql_query($consuls1);


 
?>
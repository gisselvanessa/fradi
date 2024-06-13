
<?php

 $cadena_check=$_POST['valor1']; //true or false
 $cadena_check_id =$_POST['valor2']; //opt7_1
 $cadenaPrin=$_POST['valor5']; // id del formulario
 $cadenaOpt=$_POST['valor3']; // OP1, OP2
$cadena_idCuestionario=$_POST['valor4']; //C1 C2 ..
$cadena_idTitulo=$_POST['valor6'];
$cadena_fecha=$_POST['valor7'];
// echo $cadena_fecha;
// echo $cadena_check;
include_once '../conexiones/conectiondatos.php';
conectar();

 
$consuls="update mformulariosgenerales set mfnotificacion='$cadena_fecha' where midformulariogeneral='$cadenaPrin' and midcuestionario='$cadena_idCuestionario'";
                  mysql_query($consuls);
                  


$consultaw="insert into mcheckedopc (idmcheckedopc, midcuestionario, mcheckedopc, mcheckedopcstate, midopcion, midtitulo) values ('$cadenaPrin', '$cadena_idCuestionario', '$cadena_check_id', '$cadena_check', '$cadenaOpt', '$cadena_idTitulo')";
                  mysql_query($consultaw);

if($cadena_check=='true' ){
	// mysql_query("update mcheckedopc set mcheckedopcstate='true' where mcheckedopc='$cadena_check_id'");
	 $consultat="update mcheckedopc set mcheckedopcstate='true' where mcheckedopc='$cadena_check_id' and  idmcheckedopc='$cadenaPrin'";
                  mysql_query($consultat);
	}

else if($cadena_check=='false' ){
	// mysql_query("update mcheckedopc set mcheckedopcstate='false' where mcheckedopc='$cadena_check_id'");
	 $consultaf="update mcheckedopc set mcheckedopcstate='false' where mcheckedopc='$cadena_check_id' and  idmcheckedopc='$cadenaPrin'";
                  mysql_query($consultaf);
}

 
?>
		

<?php

 $cadena_check=$_POST['valor1']; //true or false
 $cadena_check_id =$_POST['valor2']; //id del checkbox_1_1
 $cadenaPrin=$_POST['valor5']; // id del formulario

include_once '../conexiones/conectiondatos.php';
conectar();


// $consuls=mysql_query("update mchecked set mcheckedboxstate='true' where mcheckedn='$cadena_check_id'");

// if(mysql_query($consuls)==true )
// {
//  echo "se ha actualizado";
// }
// else{
// 	echo "error";
// }
// if(mysql_query($consuls['mcheckedboxstate'])==false ){
if($cadena_check==='true' ){
	mysql_query("update mchecked set mcheckedboxstate='true' where midformulariogeneral='$cadenaPrin' and mcheckedn='$cadena_check_id'");
	}

else if($cadena_check==='false' ){
	mysql_query("update mchecked set mcheckedboxstate='false' where midformulariogeneral='$cadenaPrin' and mcheckedn='$cadena_check_id'");
}
 
?>
		
<?php


 $numero_tjt=$_POST['valor1'];

 //echo $cadena_id;

 $tipo_tjt=$_POST['valor2'];
 //echo $cadena_comercio;

  $tarjeta=$_POST['valor3'];
 //echo $cadena_fecha;

  $nombre_plastico1=$_POST['valor4'];
 //echo $cadena_descripcion;

  $nombre_plastico2=$_POST['valor5'];
  $id_formulario=$_POST['valor6'];
// echo $cadena_cantidad;
 $nombre_comp_plastico=$nombre_plastico1.' '.$nombre_plastico2;
  echo $numero_tjt;

include_once '../conexiones/conectiondatos.php';
conectar();

/*$consuls=mysql_query("SELECT * FROM mdetallesreclamos");
	while($rows=mysql_fetch_array($consuls))
	{
	   echo $rows[2];	
	}*/


$consultaw="insert into mcuentas (midformulario, mnombreplastico, mtarjeta, mtipotarjeta, mnumerotarjeta) VALUES ('$id_formulario','$nombre_comp_plastico','$tarjeta', '$tipo_tjt', '$numero_tjt');";
									
mysql_query($consultaw);

?>
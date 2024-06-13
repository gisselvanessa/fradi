<?php
function conectar()
{
	mysql_connect("localhost","root","349hfunckdhefr93")or die("No se pudo abrir el archivo");
	mysql_select_db("dbnotiftarjetas");
}

function desconectar()
{
	mysql_close();
}
?>
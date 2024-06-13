<?php
// Obtener la dirección MAC del cliente desde la solicitud
$macAddress = $_SERVER['HTTP_CLIENT_MAC_ADDR'];

// Devolver la dirección MAC como respuesta

echo $macAddress;
?>

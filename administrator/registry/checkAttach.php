
<?php
$cadenaPrin = $_POST['valor2'];
$check = $_POST['valor1'];
$idCheck=$_POST['valor3'];

include_once '../conexiones/conectiondatos.php';
conectar();

if ($idCheck === 'opt_18_1') {
    $consuls2 = "update mformulariosgenerales set mcamposad2_es='$check' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16';";
    mysql_query($consuls2);
} elseif ($idCheck === 'opt_19_1') {
    $consuls3 = "update mformulariosgenerales set mcamposad3_es='$check' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16';";
    mysql_query($consuls3);
} elseif ($idCheck === 'opt_20_1') {
    $consuls4 = "update mformulariosgenerales set mcamposad4_es='$check' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16';";
    mysql_query($consuls4);
} elseif ($idCheck === 'opt_21_1') {
    $consuls5= "update mformulariosgenerales set mcamposad5_es='$check' where midformulariogeneral='$cadenaPrin' and midcuestionario='C16';";
    mysql_query($consuls5);
} else {
    // Manejar un caso por defecto o mostrar un mensaje de error si es necesario
}
?>


<?php

 $idRadio=$_POST['valor1']; //true or false
 $statusR =$_POST['valor2']; //id del checkbox_1_1
 $idForm=$_POST['valor3']; // id del formulario

include_once '../conexiones/conectiondatos.php';
conectar();

if ($idRadio === 'tjtperdida') {
    $consuls2 = "update mformulariosgenerales set mcamposad1_es='$statusR' where midformulariogeneral='$idForm' and midcuestionario='C1';";
    $consuls3 = "update mformulariosgenerales set mcamposad2_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";
    $consuls4 = "update mformulariosgenerales set mcamposad3_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";

    mysql_query($consuls2);
    mysql_query($consuls3);
    mysql_query($consuls4);

} elseif ($idRadio === 'tjtrobada') {
    $consuls2 = "update mformulariosgenerales set mcamposad1_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";
    $consuls3 = "update mformulariosgenerales set mcamposad2_es='$statusR' where midformulariogeneral='$idForm' and midcuestionario='C1';";
        $consuls4 = "update mformulariosgenerales set mcamposad3_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";
        mysql_query($consuls2);
        mysql_query($consuls3);
        mysql_query($consuls4);
} elseif ($idRadio === 'tjtch') {
    $consuls2 = "update mformulariosgenerales set mcamposad1_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";
    $consuls3 = "update mformulariosgenerales set mcamposad2_es=null where midformulariogeneral='$idForm' and midcuestionario='C1';";
    $consuls4 = "update mformulariosgenerales set mcamposad3_es='$statusR' where midformulariogeneral='$idForm' and midcuestionario='C1';";
    mysql_query($consuls2);
    mysql_query($consuls3);
    mysql_query($consuls4);
}  else {
    // Manejar un caso por defecto o mostrar un mensaje de error si es necesario
}
?>
		
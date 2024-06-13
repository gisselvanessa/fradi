<?php

$variable=$_POST['valor1'];
if (!empty($variable))
{
include_once '../conexiones/conectiondatos.php';
conectar();
$bandera1=0;

$varContador=1;
//echo '<form id="form1" name="form1" method="post" action="administrator/consultas/index_filtro.php">';
echo '<table class="table table-striped table-hover">';
    
$consultas=mysql_query("select * from user where nombre like '%$variable%'");
while($rowq = mysql_fetch_array($consultas))
{
   $bandera1++;
        
        //echo '<tr>'. '<td>'.$bandera1."</td><td><a href=administrator/consultas/index_filtro.php?ParmEnv=$rowq[3]>".$rowq[3]."</a></td><td>".$rowq[5].' '.$rowq[6].' '.$rowq[7].' '.$rowq[8].'</td><td>'.$rowq[12].'/'.$rowq[13].'/'.$rowq[14].'/'.$rowq[15].'</td></tr>';
        echo '<tr>'."<td><input type=submit name='$varContador' id='$varContador' value='$varContador'>"."</td><td>"."<input type=textname=textfield1 id=textfield1 value='$rowq[3]'>"."</td><td>".$rowq[5].' '.$rowq[6].' '.$rowq[7].' '.$rowq[8].'</td><td>'.$rowq[12].'/'.$rowq[13].'/'.$rowq[14].'/'.$rowq[15].'</td></tr>';
        $varContador++;
}
    
    echo '</table>';
//echo '</form>';
    
    
    }
else
{
   // header('Location: ../../index.php');
    //die();
    echo 'No existe valores en los campos solicitados...';
    //header('Location: ../../index.php');
}    
    
?>
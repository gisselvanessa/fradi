
<?php
include_once '../../administrator/conexiones/conectiondatos.php';

  conectar();
  $variable=$_GET['val1'];
$nombre=$_GET['nombre'];
?>

<!doctype html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Prefijos internacionales</title>
<script>
function objetoAjax(){
var xmlhttp=false;
try{
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
}catch(e){
    try{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }catch(E){
        xmlhttp = false;
    }
}
if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
}
return xmlhttp;
}

function RetornoData(pref, pref2, pref3, pref4,pref5){
    // console.log(pref);
    opener.document.formul.prefijo.value = pref
    // opener.document.formul.prefijo2.value = pref2
    // opener.document.formul.prefijo3.value = pref4
    // opener.document.formul.prefijo5.value = pref5
    // opener.document.formul.prefijo4.value = pref3
    opt6=opener.document.formulMasdetalles.iddetalle.value;

    
    opt1=pref;
    opt2=pref2;
    opt3=pref3;
    opt4=pref4;
    opt5=pref5;
    ajax=objetoAjax();
      ajax.open("POST", "../../administrator/registry/registroDatosTjt.php",true);
      //ajax.open("GET", datos);
      ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          opt1.innerHTML = ajax.responseText

        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+opt1+"&valor2="+opt2+"&valor3="+opt3+"&valor4="+opt4+"&valor5="+opt5+"&valor6="+opt6);
      console.log(opt1, opt2, opt3, opt4,opt5,opt6);
      
    window.close()
}


</script>
</head>
    
<body>
<h3>Lista de tarjetas de <?php echo $nombre;?></h3>
<form name=fprefijos>

<?php

// echo $nombre;
if (!empty($variable) && ($variable!='') && ($variable!=' '))
{
    //echo 'Todo Bien';
    $campo_consulta=$variable;    

$PRODUCCION = '(DESCRIPTION =   
	(ADDRESS =
		(PROTOCOL = TCP)
		(HOST = 172.31.100.224)
		(PORT = 1521)
		)
(CONNECT_DATA =
	(SERVER = DEDICATED)
	(SERVICE_NAME = bddanaly)
	)
)';

$USER_OCI = "fitpilahuin";
$PASS_OCI = "fitpilahuin";
$c = oci_connect($USER_OCI, $PASS_OCI, $PRODUCCION);
    
$s=oci_parse($c,"select * from vpttarjetasdebitocredito where cpersona='$campo_consulta'");
//header('Content-Type: text/html; charset=iso-8859-1');
$cadenaRespuesta='';

echo '<table class="table table-striped-columns">';

    
        $cadenaRespuesta.='<tr>';        
        $cadenaRespuesta.='<td><div class="row mb-6">';
            $cadenaRespuesta.='<table>';
                $cadenaRespuesta.='<tr>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="w margin-left: 0.5rem;">Acepto</label>';
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="">CUENTA DE AHORRO</label>';
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="">NOMBRE PLASTICO</label>';
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="">TARJETA</label>';
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="">TIPO DE TARJETA</label>';
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<label class="form-label" style="">NRO DE TARJETA</label>';
                    $cadenaRespuesta.='</td>';
                $cadenaRespuesta.='</tr>';
    
    
oci_execute($s);	 
if(!empty($s))
{
    //echo 'Todo Bien2';
    while($rowq = oci_fetch_array($s))
	{
	  //echo 'Todo Bien3'; 
                $nombre_plastico= explode(' ', $rowq[2]);
                $cadenaRespuesta.='<tr>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class="" ><input type="button" id="tarj" class="form-control"'."value='$rowq[6]'"."onclick=RetornoData('".$rowq[6]."','".$rowq[5]."','".$rowq[3]."','".$nombre_plastico[0]."','".$nombre_plastico[1]."')> </div>";
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class="" ><input style="" type="text" class="form-control" name="cpersona" id="cpersona" readonly '."value='$rowq[1]'> </div>";
                          
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class=""><input style="" type="text" class="form-control" name="cpersona" id="cpersona" readonly '."value='$rowq[2]'> </div>";
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class=""><input style="" type="text" class="form-control" name="cpersona" id="cpersona" readonly '."value='$rowq[3]'> </div>";
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class=""><input style="" type="text" class="form-control" name="cpersona" id="cpersona" readonly '."value='$rowq[5]'> </div>";
                    $cadenaRespuesta.='</td>';
                    $cadenaRespuesta.='<td>';
                    $cadenaRespuesta.='<div class=""><input style="" type="text" class="form-control" name="cpersona" id="cpersona" readonly '."value='$rowq[6]'> </div>";
                    $cadenaRespuesta.='</td>';
                $cadenaRespuesta.='</tr>';
        
    }
}

            $cadenaRespuesta.='</table>';
        $cadenaRespuesta.='</div></td>';
        $cadenaRespuesta.='</tr>';
    
echo $cadenaRespuesta;
echo '</table>';
}
else
{
   // header('Location: ../../index.php');
    //die();
    echo '<p align="center" style="color:#FF0000">No existe valores en los campos solicitados...</p>';
    //header('Location: ../../index.php');
}    
  
?>
</form>

</body>
</html>
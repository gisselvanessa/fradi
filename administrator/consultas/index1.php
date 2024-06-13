<?php

$variable=$_POST['valor1'];
if (!empty($variable))
{
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




/////////////////*************AUTOMATICO************//
    $fdesde =  date('d-m-Y',strtotime('-1 day'));
    $fhasta =  date('d-m-Y',strtotime('-1 day'));
////////*******************************//////////////////


//$fdesde = '31-10-2017';//, strtotime('-1 day'));
//$fhasta = '31-10-2017';//, strtotime('-1 day'));


$s=oci_parse($c,"select * from vptpersonatcyd tper where tper.identificacion = '".$campo_consulta."'");


header('Content-Type: text/html; charset=iso-8859-1');

//$varContador=1;
$cadenaRespuesta='';
echo '<link rel="stylesheet" type="text/css" href="administrator/css/datos.css">';
echo '<div class="container">';

oci_execute($s);     
if(!empty($s))
{
    while($rowq = oci_fetch_array($s))
    {
       
        //echo $rowq[0].' '.$rowq[1].' '.$rowq[2].' '.$rowq[3].' '.$rowq[4].' '.$rowq[5].' '.$rowq[6].' '.$rowq[7].' '.$rowq[8].' '.$rowq[9].' '.$rowq[10].' '.$rowq[11].' '.$rowq[12].' '.$rowq[13].' '.$rowq[14].' '.$rowq[15].' '.$rowq[16].' '.$rowq[17].' '.$rowq[18].' '.$rowq[19].' '.'<br>';
    
       // <!-- 1er cuadro -->
    $cadenaRespuesta.='<div class="first_cont">';  
        $cadenaRespuesta.='<div>';  
            $cadenaRespuesta.='<div class="title">CODIGO PERSONA</div>';  
            // $cadenaRespuesta.='<div class="col-sm-10"><input type="text" class="" name="cpersona" id="cpersona" readonly '."value='$rowq[0]'> </div>";
            // $cadenaRespuesta.='<div class="form-group" name="cpersona" id="cpersona">'.$rowq[0].'</div>';
            $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="cpersona" id="cpersona" readonly '."value='$rowq[0]'>";
                $cadenaRespuesta.='<div class="form-group" >'.$rowq[0].'</div>';

        $cadenaRespuesta.='</div>';  
        $cadenaRespuesta.='<div>';  
            $cadenaRespuesta.='<div class="title">TIPO DE PERSONA</div>';  
            // $cadenaRespuesta.='<div class="col-sm-10"><input type="text" class="" name="ctipopersona" id="ctipopersona" readonly '."value='$rowq[1]'> </div>";
            // $cadenaRespuesta.='<div class="form-group" name="ctipopersona" id="ctipopersona">'.$rowq[1].'</div>';
             $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="ctipopersona" id="ctipopersona" readonly '."value='$rowq[1]'>";
                $cadenaRespuesta.='<div class="form-group" >'.$rowq[1].'</div>';

        $cadenaRespuesta.='</div>';  
        $cadenaRespuesta.='<div>';  
            $cadenaRespuesta.='<div class="title">TIPO DE IDENTIFICACION</div>';  
            // $cadenaRespuesta.='<div class="col-sm-10"><input type="text" class="" name="ctipoidentificacion" id="ctipoidentificacion" readonly '."value='$rowq[2]'> </div>";
            // $cadenaRespuesta.='<div class="form-group" name="ctipoidentificacion" id="ctipoidentificacion" >'.$rowq[2].'</div>';
            $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="ctipoidentificacion" id="ctipoidentificacion" readonly '."value='$rowq[2]'>";
                $cadenaRespuesta.='<div class="form-group" >'.$rowq[2].'</div>';

        $cadenaRespuesta.='</div>';  
    $cadenaRespuesta.='</div>';  

    // <!-- 2do cuadro -->
    $cadenaRespuesta.='<div class="sec_cont">';  
        // <!-- primera col -->
    // '<div class="form-group">'.$rowq[4].'</div>'
        $cadenaRespuesta.='<div class="column">';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">IDENTIFICACION</div>';  
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="identificacion" id="identificacion" readonly '."value='$rowq[3]'>";
                $cadenaRespuesta.='<div class="form-group" >'.$rowq[3].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">NOMBRE LEGAL</div>';  
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="nombrelegal" id="nombrelegal" readonly '."value='$rowq[4]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[4].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">APELLIDO PATERNO</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="apellidopaterno" id="apellidopaterno" readonly '."value='$rowq[5]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="apellidopaterno" id="apellidopaterno">'.$rowq[5].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="apellidopaterno" id="apellidopaterno" readonly '."value='$rowq[5]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[5].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">APELLIDO MATERNO</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="apellidomaterno" id="apellidomaterno" readonly '."value='$rowq[6]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="apellidomaterno" id="apellidomaterno">'.$rowq[6].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="apellidomaterno" id="apellidomaterno" readonly '."value='$rowq[6]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[6].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">PRIMER NOMBRE</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="primernombre" id="primernombre" readonly '."value='$rowq[7]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="primernombre" id="primernombre">'.$rowq[7].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="primernombre" id="primernombre"  readonly '."value='$rowq[7]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[7].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">SEGUNDO NOMBRE</div>';  
                // $cadenaRespuesta.='<div class="form-group "><input type="text" class="formcontrol" name="segundonombre" id="segundonombre" readonly '."value='$rowq[8]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="segundonombre" id="segundonombre">'.$rowq[8].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="segundonombre" id="segundonombre"  readonly '."value='$rowq[8]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[8].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">GENERO</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="genero" id="genero" readonly '."value='$rowq[9]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="genero" id="genero">'.$rowq[9].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="genero" id="genero"  readonly '."value='$rowq[9]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[9].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">ESTADO CIVIL</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="estadocivil" id="estadocivil" readonly '."value='$rowq[10]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="estadocivil" id="estadocivil">'.$rowq[10].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="estadocivil" id="estadocivil" readonly '."value='$rowq[10]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[10].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">FECHA DE NACIMIENTO</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="fechanacimiento" id="fechanacimiento" readonly '."value='$rowq[11]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="fechanacimiento" id="fechanacimiento">'.$rowq[11].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="fechanacimiento" id="fechanacimiento" readonly '."value='$rowq[11]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[11].'</div>';

            $cadenaRespuesta.='</div>';  
        $cadenaRespuesta.='</div>';  
        // <!-- 2da col -->
        $cadenaRespuesta.='<div class="column">';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">PAIS</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name=pais"" id="pais" readonly '."value='$rowq[12]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="pais" id="pais">'.$rowq[12].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name=pais"" id="pais" readonly '."value='$rowq[12]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[12].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">PROVINCIA</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="provincia" id="provincia" readonly '."value='$rowq[13]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="provincia" id="provincia">'.$rowq[13].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="provincia" id="provincia" readonly '."value='$rowq[13]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[13].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">CANTON</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="canton" id="canton" readonly '."value='$rowq[14]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="canton" id="canton">'.$rowq[14].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="canton" id="canton" readonly '."value='$rowq[14]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[14].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">PARROQUIA</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="parroquia" id="parroquia" readonly '."value='$rowq[15]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="parroquia" id="parroquia">'.$rowq[15].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="parroquia" id="parroquia" readonly '."value='$rowq[15]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[15].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">DIRECCION</div>';  
                // $cadenaRespuesta.='<div class="form-group "><input type="text" class="formcontrol" name="direccion" id="direccion" readonly '."value='$rowq[16]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="direccion" id="direccion">'.$rowq[16].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="direccion" id="direccion" readonly '."value='$rowq[16]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[16].'</div>';

           $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">MAS DETALLE DE DIRECCION</div>';  
                // $cadenaRespuesta.='<div class="form-group "><input type="text" class="formcontrol" name="detalledireccion" id="detalledireccion" readonly '."value='$rowq[17]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="detalledireccion" id="detalledireccion">'.$rowq[17].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="detalledireccion" id="detalledireccion" readonly '."value='$rowq[17]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[17].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">EMAIL</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="email" id="email" readonly '."value='$rowq[18]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="email" id="email">'.$rowq[18].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol" name="email" id="email" readonly '."value='$rowq[18]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[18].'</div>';

            $cadenaRespuesta.='</div>';  
            $cadenaRespuesta.='<div class="raw">';  
                $cadenaRespuesta.='<div class="title">CELULAR</div>';  
                // $cadenaRespuesta.='<div class="form-group"><input type="text" class="formcontrol" name="celular" id="celular" readonly '."value='$rowq[19]'> </div>";
                // $cadenaRespuesta.='<div class="form-group" name="celular" id="celular">'.$rowq[19].'</div>';
                $cadenaRespuesta.='<input type="hidden" class="formcontrol"  name="celular" id="celular" readonly '."value='$rowq[19]'>";
                $cadenaRespuesta.='<div class="form-group"">'.$rowq[19].'</div>';

            $cadenaRespuesta.='</div>';  
        $cadenaRespuesta.='</div>';  
    $cadenaRespuesta.='</div>';  
    $cadenaRespuesta.='<div class="form_btn">';
                           $cadenaRespuesta.=' <input  class="button" type="submit" name="submit" id="submit" value="Enviar al Formulario">';
                          
                        $cadenaRespuesta.='</div>';
        
    }
}

echo $cadenaRespuesta;
echo '</div>';
    
    
}
else
{
   // header('Location: ../../index.php');
    //die();
    echo '<p align="center">No existe valores en los campos solicitados...</p>';
    //header('Location: ../../index.php');
}    
    


?>
<?php
  include_once 'administrator/conexiones/conectiondatos.php';
  include_once 'login/session_helper.php';
  
  conectar();
  verificar_sesion();

$cadena=$_POST['cpersona'];

$idUsuario=$_SESSION['id_usuario'];
// $nombrelegal=$_POST['nombrelegal'];
$tipo_persona=$_POST['ctipopersona'];
$tipo_ident=$_POST['ctipoidentificacion'];
$identifit=$_POST['identificacion'];
$nombre_legal=$_POST['nombrelegal'];
$apellido_paterno=$_POST['apellidopaterno'];
$apellido_materno=$_POST['apellidomaterno'];
$primer_nombre=$_POST['primernombre'];
$segundo_nombre=$_POST['segundonombre'];
$genero=$_POST['genero'];
$estado_civil=$_POST['estadocivil'];
$fecha_nacimiento=$_POST['fechanacimiento'];
$pais1=$_POST['pais'];

$provincia=$_POST['provincia'];
$ciudad=$_POST['canton'];
$parroquia=$_POST['parroquia'];
$direccion=$_POST['direccion'];
$masdireccion=$_POST['detalledireccion'];
$email=$_POST['email'];
$phone=$_POST['celular'];
$fecha=date('Y-m-d');

date_default_timezone_set('America/Guayaquil');
$fecha_generado=date('YmdHis').'-'.$cadena;

session_start();

if (!isset($_SESSION['id_usuario'])) {
    // El usuario no ha iniciado sesión, redirigir al formulario de inicio de sesión
    header("Location: login/index.php");
    exit;
} 


if(empty($cadena))
{
  header('Location: index.php'); 
}
else
{


$consulta="insert into mdatospersona values($cadena, '$tipo_persona','$tipo_ident','$identifit','$nombre_legal', '$apellidopaterno', '$apellidomaterno', '$primer_nombre','$segundo_nombre','$genero', '$estadocivil', '$fecha_nacimiento','$pais1','$provincia','$ciudad','$parroquia', '$direccion', '$masdireccion','$email',$phone);";
                  mysql_query($consulta);


  $consultaw="insert into mformulariosgenerales (midformulariogeneral,midcliente,midcuestionario)
select '$fecha_generado','$cadena',midcuestionario from mcuestionarios where mestado='ACT';";
                  mysql_query($consultaw);


                 $consultaw2="insert into mchecked
select '$fecha_generado', midcuestionario, midmcheckedfrm, mestado from mcheckedfrm where mestatus='ACT';";
mysql_query($consultaw2);
}
/**
 * Inserta en la base de datos para usarlo posteriormente en la lista de reportes
 */
//   $consultaw3= "INSERT INTO mlistareportes (mcodigoperson, midformulariogeneral, mfregistro,mnombresComp)
//   SELECT t1.mcodigoperson, t2.midformulariogeneral, t2.mfregistro, t1.mnombrelegal
//   FROM mdatospersona AS t1
//   INNER JOIN mformulariosgenerales AS t2 ON t1.mcodigoperson = t2.midcliente
//   LIMIT 1;";
// mysql_query($consultaw3);

//------------------------------------------------------------------
?>

<!doctype html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <title>FORMULARIO DE RECLAMO</title>
  <link rel="stylesheet" type="text/css" href="administrator/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="administrator/css/style.css">
  <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Incluye el plugin jQuery Mask -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="administrator/js/bootstrap.bundle.min.js"></script>
    <script src="administrator/dc_ajax/dc-ajax.js" language="javascript"></script>

      <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="script.js"></script> -->
</head>

<body class=" m-0 border-0 bd-example bg-body-secondary">
<nav class="nav-form ">
      <a href="home.php"><img src="administrator/images/LOGO  PTIO ILUSTRADOR.png" alt="pilahuin_tio_logo.png"
     width="150"></a>
     
     <?php 
    $consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M7'"); 
    $rowq = mysql_fetch_array($consultaTitulos1)
    ?>
    <!-- <h6 class="form-title"><?php echo $rowq['mprincipal']; ?></h6> -->
    <div class="nav-top-right">
    <!-- <span class="form-title">HOME</span> -->
    <button  type="button" onclick="cerrarSesion()" class="btn btn-dark">Cerrar sesi&oacute;n</button>
    </div>

  </nav>
  <div class="nav_menu_header3">
      FORMULARIO DE RECLAMO
    
      <div class="nav-user">
      <i class='bx bxs-user-circle'></i>
        <?php 
        $user=$_SESSION['nombre_usuario'];
      $consulta= mysql_query("SELECT t2.nombreRol
      FROM musuarios AS t1
      INNER JOIN mroles AS t2 ON t1.idRol = t2.idRol where t1.nombreUsuario='$user'");
      $rowq = mysql_fetch_array($consulta);
      //  echo $rowq['nombreRol'];

        echo ' '. $_SESSION['nombre_usuario'].': '.$rowq['nombreRol'];
        ?>
      </div>
  </div>
  

  

  <div class="form-header">
    
    <div class="form-header-left" >
      <div class="form-data-client">
          <div class="form-data-client-title">Datos del cliente / Client data</div>
          <?php 
            $consultaTitulos1=mysql_query("select * from mtitulosformularios where midmtitulo='M2'"); 
            $rowq = mysql_fetch_array($consultaTitulos1)
            ?>
            <span class="form-header-title"><?php echo $rowq['mprincipal']; ?></span>
            <span><?php echo $nombre_legal; ?></span>
            <br>
            <?php 
           $consultaTitulos1=mysql_query("select * from mtitulosformularios where midmtitulo='M7'"); 
            $rowq = mysql_fetch_array($consultaTitulos1)
            ?>
    <!-- <span class="form-title"><?php echo $rowq['mprincipal']; ?></span> -->
           <span><?php echo $rowq['mprincipal']; ?></span>
            <span><?php echo $identifit; ?></span>
      </div>

    <form  name=formul>
      <table  class="formul_table">
        
        <tr>
          <td>
           <!-- <br> -->
           <span><?php 
            $consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M20'"); 
            $rowq = mysql_fetch_array($consultaTitulos3);
            echo $rowq['mprincipal'];
            ?></span>
          </td>
        <!-- </tr>
        <tr> -->
        <td>
          <div class="d-flex align-items-center">
            <input class="text-center form-control col-md-10" id="numbertjt" type="text" name="prefijo" readonly placeholder="Seleccione una tarjeta / Select a card" size="32" maxlength="3">
            <input class="btn btn-dark ms-2" type="button" value="Select" onclick="abreVentana(<?php echo $cadena; ?>, '<?php echo $nombre_legal; ?>');">
          </div>
        </td>
         
       </tr>
     </table>
   </form>

   
   <div class="container">
    <div class="row">
        <div class="cntr col-md-3">
            <label>
                <!-- <input type="checkbox" name="tjtperdida" id="tjtperdida"> -->
                <?php 
                $consultaTitulos3 = mysql_query("SELECT * FROM mtitulosformularios WHERE midmtitulo='M23'"); 
                $rowq = mysql_fetch_array($consultaTitulos3);
                echo $rowq['mprincipal'];
                ?>
            </label>
        </div>
        <div class="cntr col-md-3">
            <label>
                <input onclick="statusTjt(id)" type="radio" name="statustjt" id="tjtperdida">
                <?php 
                $consultaTitulos3 = mysql_query("SELECT * FROM mtitulosformularios WHERE midmtitulo='M24'"); 
                $rowq = mysql_fetch_array($consultaTitulos3);
                echo $rowq['mprincipal'];
                ?>
            </label>
        </div>
        <div class="cntr col-md-3">
            <label>
                <input onclick="statusTjt(id)" type="radio" name="statustjt" id="tjtrobada">
                <?php 
                $consultaTitulos3 = mysql_query("SELECT * FROM mtitulosformularios WHERE midmtitulo='M25'"); 
                $rowq = mysql_fetch_array($consultaTitulos3);
                echo $rowq['mprincipal'];
                ?>
            </label>
        </div>
        <div class="cntr col-md-3">
            <label>
                <input onclick="statusTjt(id)" type="radio" name="statustjt" id="tjtch">
                <?php 
                $consultaTitulos3 = mysql_query("SELECT * FROM mtitulosformularios WHERE midmtitulo='M26'"); 
                $rowq = mysql_fetch_array($consultaTitulos3);
                echo $rowq['mprincipal'];
                ?>
            </label>
        </div>
    </div>
</div>





  </div>

<div class="form-header-tramit">
    <?php 
    $consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M6'"); 
    $rowq = mysql_fetch_array($consultaTitulos1)
    ?>
     <div ><?php echo $rowq['mprincipal'].' '.$fecha; ?></div>
     <!-- <div align="center"><?php echo $fecha; ?></div> -->

      <?php 
    $consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M9'"); 
    $rowq = mysql_fetch_array($consultaTitulos1)
    ?>
    <span  class=""><?php echo $rowq['mprincipal']; ?></span>
    <span ><?php echo $fecha_generado ?></span>
    
    
    </div>

  </div>


  
    <!-- <h4>Formulario de reclamo</h4> -->
    <!-- <table class="table"><tr><td> -->
    <div class="form_claim">
      <div >
      <h6 align="center" class="form_claim_title"><?php 
          $consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M19'"); 
          $rowq = mysql_fetch_array($consultaTitulos3);
          echo $rowq['mprincipal'];
         ?></h6>
        
       </div>
 <!-- </td></tr></table> -->

<!-- <script type="text/javascript">getNumtjt();</script> -->
<!--#region main  -->

<table class="formtable">

  <tr>
    <td>
    <form name="formulMasdetalles">
    <table class="table" style="border: transparent;">
        <tr>
            <td class="form_claim_subtitle" align="right">Numero de tramite / Tramit number:</td>
            <td align="center">
                <input class="form-control" name="iddetalle" type="text" value="<?=$fecha_generado; ?>" size="40" maxlength="10" readonly="readonly">
            </td>
        </tr>
        <tr>
            <td class="form_claim_subtitle" align="right">Comercio / Merchant:</td>
            <td align="center">
                <input class="form-control" value="" type="text" name="comerce" size="40" maxlength="10" placeholder="Comercio / Merchant">
            </td>
        </tr>
        <tr>
            <td class="form_claim_subtitle" align="right">Fecha / Date:</td>
            <td>
                <input class="form-control" value="" type="date" name="fechaReg" size="20" maxlength="10" placeholder="Fecha / Date">
            </td>
        </tr>
        <tr>
            <td class="form_claim_subtitle" align="right">Descripcion / Description:</td>
            <td>
                <textarea class="form-control" value="" type="text" name="description" size="100" maxlength="250" style="height: 90px" placeholder="Descripcion / Description"></textarea>
            </td>
        </tr>
        <tr>
        <td class="form_claim_subtitle" align="right">Monto / Amount:</td>
        <td>
          <input value="" class="form-control" type="number" name="amount" size="20" maxlength="10" step="0.01" placeholder="Monto / Amount" lang="en">
        </td>
      </tr>

        <tr>
            <td></td>
            <td align="right">
                <input class="btn_insert" type="button" value="Insertar" onclick="RegistrarDetalleReclamoUser(); return false">
            </td>
        </tr>
    </table>
</form>


    </td>
  </tr>
</table>
    </div>



<div>
            <!-- <h3>Detalle reclamos</h3> -->

           
            <div class="content_report" >
               
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td>
                                 <div id="reportegrabars"></div>
                               </td>
                        </tr>
                      </tbody>
                    </table>
                 
              </div>
      </div>
<!--#endregion -->
<!-- <script type="text/javascript">enviarCod();</script> -->



<!--#region main  --> 
<body>
<div>
<div class="accordion-title"><?php 
    $consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M27'"); 
    $rowq = mysql_fetch_array($consultaTitulos3);
    echo $rowq['mprincipal'];
    ?></div>


<!--#endregion -->

 <!--Inciar--->
 <form  class="d-flex justify-content-center"name="frmpri" id="frmpri" action="administrator/registry/registry_save.php" method="post">

  <div class="accordion accordion-flush w-75 p-3 " id="accordionFlushExample">







<!--1-->
<?php
$condiciones=1;
$condicionesTitulo=1;
$condicionesTitulo2=2;
$condicionesTitulo3=3;
$condicionesTitulo4=4;
$condicionesTitulo5=5;


$opcionNumeracion1=1;
$opcionNumeracion2=2;
$opcionNumeracion3=3;
$opcionNumeracion4=4;

$opcionNumeracion5=5;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_1" aria-expanded="false" aria-controls="flush-collapse_1">
      <input type="text" name="textField_1_1" id="textField_1_1" readonly class="form-control-plaintext fw-bold" size="100%"
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>      
      >
    </button>        
  </h2>
  <div id="flush-collapse_1" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">          
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10px">
              <input type="radio" onClick="envioCheckDB(id)" name="radioc1" id="checkbox_1_1" class="form-check-input align-middle"
                            >

              <input type="hidden" name="hiddenField_1_1" id="hiddenField_1_1" 
                <?php
                $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                while($rowq = mysql_fetch_array($consultas))
                {
                  echo 'value="'.$rowq['midcuestionario'].'"';
                }
                ?>
              >
            </td>
            <td>              
                <?php
                $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                while($rowq = mysql_fetch_array($consultas))
                {
                echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                }
                ?>     
            </td>
          </tr>
          <tr>
            <td width="10px">
              <input type="radio" onClick="envioCheckDB(id)" name="radioc1"  id="checkbox_2_1" class="form-check-input align-middle">
              <input type="hidden" name="hiddenField_2_1" id="hiddenField_2_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=2");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
                <?php
                $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=2");
                while($rowq = mysql_fetch_array($consultas))
                {
                echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                }
                ?> 
            </td>
          </tr>
        </tbody>
      </table>          
    </div>
  </div>
</div>
<!--#endregion -->









<!--3-->
<?php
$condiciones=3;
?>
<!--#region main  -->
<div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_3" aria-expanded="false" aria-controls="flush-collapse_3">
        <input type="text" name="textField_3_1" id="textField_3_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        />
      </button>
    </h2>
  <div id="flush-collapse_3" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10px">
              <input type="checkbox" onClick="validar_checkbox(id)" name="checkbox_3_1" id="checkbox_3_1" class="form-check-input align-middle checkbox">
              <input class="hiddenField" type="hidden" name="hiddenField_3_1" id="hiddenField_3_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_3_2" id="hiddenField_3_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_3" id="datetime_3" readonly onClick="abrirCalendarioGen('datetime_3')" placeholder="Select a date / Seleccione una fecha" 

                          
                              >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_3_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input3 align-middle" type="checkbox" id="opt_3_1" name="opt_3_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_3_1" id="textOp_3_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input3 align-middle" type="checkbox" id="opt_3_2" name="opt_3_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_3_2" id="textOp_3_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_3_3" name="opt_3_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_3_3" id="textOp_3_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_3_4" name="opt_3_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_3_4" id="textOp_3_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->




<!--4-->
<?php
$condiciones=4;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_4" aria-expanded="false" aria-controls="flush-collapse_4">
      <input type="text" name="textField_4_1" id="textField_4_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_4" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_4_1" id="checkbox_4_1">
              <input class="hiddenField" type="hidden" name="hiddenField_4_1" id="hiddenField_4_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en  from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_4_2" id="hiddenField_4_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_4" id="datetime_4" readonly onClick="abrirCalendarioGen('datetime_4')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_4_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_4_1" name="opt_4_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_4_1" id="textOp_4_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_4_2" name="optopt_4_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_4_2" id="textOp_4_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input4 align-middle" type="checkbox" id="opt_4_3" name="opt_4_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_4_3" id="textOp_4_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input4 align-middle" type="checkbox" id="opt_4_4" name="opt_4_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_4_4" id="textOp_4_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->






<!--5-->
<?php
$condiciones=5;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_5" aria-expanded="false" aria-controls="flush-collapse_5">      
      <input type="text" name="textField_5_1" id="textField_5_1" readonly class="form-control-plaintext fw-bold" size="100%"
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
      >
    </button>
  </h2>
  <div id="flush-collapse_5" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_5_1" id="checkbox_5_1">
              <input class="hiddenField" type="hidden" name="hiddenField_5_1" id="hiddenField_5_1" 
                <?php
                $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                while($rowq = mysql_fetch_array($consultas))
                {
                echo 'value="'.$rowq['midcuestionario'].'"';
                }
                ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop1_es'];
                          }
                          ?>    
                        </td>
                        <td>
                          <input class="form-control" type="number" name="textField_5_2" id="textField_5_2" onInput="actualizarValor(id)">    
                        </td>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop2_es'];
                          }
                          ?>    
                        </td>
                        <td>
                          <input class="form-control" type="number" name="textField_5_3" id="textField_5_3" onInput="actualizarValor(id)" >    
                        </td>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop3_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop3_es'];
                          }
                          ?>    
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <tr>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop1_en'];
                          }
                          ?>    
                        </td>
                        <td>
                          <input class="form-control" type="number" name="textField_5_4" id="textField_5_4" onInput="actualizarValor2(id)">    
                        </td>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop2_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop2_en'];
                          }
                          ?>    
                        </td>
                        <td>
                          <input class="form-control" type="number" name="textField_5_5" id="textField_5_5" onInput="actualizarValor2(id)">    
                        </td>
                        <td>
                          <?php
                          $consultas=mysql_query("select mcuestionariop3_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                          echo $rowq['mcuestionariop3_en'];
                          }
                          ?>    
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_5_2" id="hiddenField_5_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_5" id="datetime_5" readonly onClick="abrirCalendarioGen('datetime_5')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_5_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_5_1" name="opt_5_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_5_1" id="textOp_5_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_5_2" name="opt_5_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_5_2" id="textOp_5_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input5 align-middle" type="checkbox" id="opt_5_3" name="opt_5_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_5_3" id="textOp_5_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input5 align-middle" type="checkbox" id="opt_5_4" name="opt_5_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_5_4" id="textOp_5_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->







<!--6-->
<?php
$condiciones=6;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_6" aria-expanded="false" aria-controls="flush-collapse_6">
      <input type="text" name="textField_6_1" id="textField_6_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
      >
    </button>
  </h2>
  <div id="flush-collapse_6" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" type="checkbox" onClick="validar_checkbox(id)" name="checkbox_6_1" id="checkbox_6_1">
              <input class="hiddenField" type="hidden" name="hiddenField_6_1" id="hiddenField_6_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                             <?php
                              $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcuestionariop1_es'];
                              }
                              ?>
                          </td>
                          <td>
                            <input class="form-control" type="number" name="textField_6_2" id="textField_6_2" onInput="actualizarValor3(id)">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                             <?php
                              $consultas=mysql_query("select mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcuestionariop1_en'];
                              }
                              ?>
                          </td>
                          <td>
                            <input class="form-control" type="number" name="textField_6_3" id="textField_6_3" onInput="actualizarValor4(id)">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_6_2" id="hiddenField_6_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_6" id="datetime_6" readonly onClick="abrirCalendarioGen('datetime_6')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">

                              <tbody>
                                <tr  class ="checkbox_6_1_opts">
                                  <td>
                                    <input class="form-check-input6 align-middle"  type="checkbox" id="opt_6_1" name="opt_6_1" onClick="checkFather(id)"
                                      <?php

                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>

                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_6_1" id="textOp_6_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input6 align-middle" type="checkbox" id="opt_6_2" name="opt_6_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_6_2" id="textOp_6_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input6 align-middle" type="checkbox" id="opt_6_3" name="opt_6_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_6_3" id="textOp_6_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input6 align-middle" type="checkbox" id="opt_6_4" name="opt_6_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_6_4" id="textOp_6_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->






<!--7-->
<?php
$condiciones=7;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_7" aria-expanded="false" aria-controls="flush-collapse_7">
      <input type="text" name="textField_7_1" id="textField_7_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_7" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_7_1" id="checkbox_7_1">
              <input class="hiddenField" type="hidden" name="hiddenField_7_1" id="hiddenField_7_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop1_es'];
                            }
                            ?>    
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop2_es'];
                            }
                            ?> 
                            <input  class="form-check-input align-middle radio" onClick="radioParalelo(id)" type="radio" name="radio7_1" id="rad_7_1">
                            &nbsp
                            &nbsp
                            &nbsp
                            <?php
                            $consultas=mysql_query("select mcuestionariop3_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop3_es'];
                            }
                            ?> 
                            <input  class="form-check-input align-middle radio" onClick="radioParalelo2(id)" type="radio" name="radio7_1" id="rad_7_2">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop1_en'];
                            }
                            ?>    
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop2_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop2_en'];
                            }
                            ?> 
                            <input  class="form-check-input align-middle radio" onClick="radioParalelo(id)" type="radio" name="radio7_2" id="rad_7_3">
                            &nbsp
                            &nbsp
                            &nbsp
                            <?php
                            $consultas=mysql_query("select mcuestionariop3_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop3_en'];
                            }
                            ?> 
                            <input  class="form-check-input align-middle radio" onClick="radioParalelo2(id)" type="radio" name="radio7_2" id="rad_7_4">
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_7_2" id="hiddenField_7_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_7" id="datetime_7" readonly onClick="abrirCalendarioGen('datetime_7')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_7_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input7 align-middle" type="checkbox" id="opt_7_1" name="opt_7_1"  onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_7_1" id="textOp_7_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input7 align-middle" type="checkbox" id="opt_7_2" name="opt_7_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_7_2" id="textOp_7_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input7 align-middle" type="checkbox" id="opt_7_3" name="opt_7_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_7_3" id="textOp_7_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input7 align-middle" type="checkbox" id="opt_7_4" name="opt_7_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_7_4" id="textOp_7_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>       
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->



<!--8-->
<?php
$condiciones=8;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_8" aria-expanded="false" aria-controls="flush-collapse_8">
      <input type="text" name="textField_8_1" id="textField_8_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_8" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_8_1" id="checkbox_8_1">
              <input  class="hiddenField" type="hidden" name="hiddenField_8_1" id="hiddenField_8_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_8_2" id="hiddenField_8_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_8" id="datetime_8" readonly onClick="abrirCalendarioGen('datetime_8')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_8_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input8 align-middle" type="checkbox" id="opt_8_1" name="opt_8_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_8_1" id="textOp_8_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input8 align-middle"  type="checkbox" id="opt_8_2" name="opt_8_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_8_2" id="textOp_8_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input8 align-middle" type="checkbox" id="opt_8_3" name="opt_8_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_8_3" id="textOp_8_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input8 align-middle" type="checkbox" id="opt_8_4" name="opt_8_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_8_4" id="textOp_8_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->




<!--9-->
<?php
$condiciones=9;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_9" aria-expanded="false" aria-controls="flush-collapse_9">
      <input type="text" name="textField_9_1" id="textField_9_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_9" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_9_1" id="checkbox_9_1">
              <input class="hiddenField" type="hidden" name="hiddenField_9_1" id="hiddenField_9_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <?php
                              $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcuestionariop2_es'];
                              }
                              ?>
                          </td>
                          <td>
                            <input class="form-control datetime9" type="text" name="datetime_9_1" id="datetime_9_1" readonly onClick="abrirCalendarioGen('datetime_9_1')" placeholder="Select a date / Seleccione una fecha" >
                              
                          </td>
                          <td>
                            <?php
                              $consultas=mysql_query("select mcuestionariop3_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcuestionariop3_es'];
                              }
                              ?>
                          </td>

                          <td>
                            <input class="form-control datetime9" type="text" name="datetime_9_2" id="datetime_9_2" readonly onClick="abrirCalendarioGen('datetime_9_2')" placeholder="Select a date / Seleccione una fecha" >
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_9_2" id="hiddenField_9_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_9" id="datetime_9" readonly onClick="abrirCalendarioGen('datetime_9')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_9_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input9 align-middle" type="checkbox" id="opt_9_1" name="opt_9_1" onClick="checkFather3(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_9_1" id="textOp_9_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input9 align-middle" type="checkbox" id="opt_9_2" name="opt_9_2" onClick="checkFather3(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_9_2" id="textOp_9_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input9 align-middle" type="checkbox" id="opt_9_3" name="opt_9_3" onClick="checkFather3(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_9_3" id="textOp_9_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input9 align-middle" type="checkbox" id="opt_9_4" name="opt_9_4" onClick="checkFather3(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_9_4" id="textOp_9_4" 
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->



<!--10-->
<?php
$condiciones=10;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_10" aria-expanded="false" aria-controls="flush-collapse_10">
      <input type="text" name="textField_10_1" id="textField_10_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_10" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_10_1" id="checkbox_10_1">
              <input class="hiddenField" type="hidden" name="hiddenField_10_1" id="hiddenField_10_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_10_2" id="hiddenField_10_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_10" id="datetime_10" readonly onClick="abrirCalendarioGen('datetime_10')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody class ="checkbox_10_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input10 align-middle" type="checkbox" id="opt_10_1" name="opt_10_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_10_1" id="textOp_10_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input10 align-middle" type="checkbox" id="opt_10_2" name="opt_10_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_10_2" id="textOp_10_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input class="form-check-input10 align-middle" type="checkbox" id="opt_10_3" name="opt_10_3" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_10_3" id="textOp_10_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input10 align-middle" type="checkbox" id="opt_10_4" name="opt_10_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_10_4" id="textOp_10_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->





<!--11-->
<?php
$condiciones=11;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_11" aria-expanded="false" aria-controls="flush-collapse_11">
      <input type="text" name="textField_11_1" id="textField_11_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_11" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_11_1" id="checkbox_11_1">
              <input class="hiddenField" type="hidden" name="hiddenField_11_1" id="hiddenField_11_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_11_2" id="hiddenField_11_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_11" id="datetime_11" readonly onClick="abrirCalendarioGen('datetime_11')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody>
                                <tr>
                                  <td>
                                    <input class="form-check-input11 align-middle" type="checkbox" id="opt_11_1" name="opt_11_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_11_1" id="textOp_11_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input11 align-middle" type="checkbox" id="opt_11_2" name="opt_11_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_11_2" id="textOp_11_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input class="form-check-input11 align-middle" type="checkbox" id="opt_11_3" name="opt_11_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_11_3" id="textOp_11_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input11 align-middle" type="checkbox" id="opt_11_4" name="opt_11_4" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_11_4" id="textOp_11_4"
                                    <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                    ?>
                                    >
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->


<!--12-->
<?php
$condiciones=12;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_12" aria-expanded="false" aria-controls="flush-collapse_12">
      <input type="text" name="textField_12_1" id="textField_12_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
      >
    </button>
  </h2>
  <div id="flush-collapse_12" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
     <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_12_1" id="checkbox_12_1">
              <input class="hiddenField" type="hidden" name="hiddenField_12_1" id="hiddenField_12_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop2_es, mcuestionariop1_en, mcuestionariop2_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].' '.$rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'].' '.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_12_2" id="hiddenField_12_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_12" id="datetime_12" readonly onClick="abrirCalendarioGen('datetime_12')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody>
                                <tr>
                                  <td>
                                    <input class="form-check-input12 align-middle" type="checkbox" id="opt_12_1" name="opt_12_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_12_1" id="textOp_12_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input12 align-middle" type="checkbox" id="opt_12_2" name="opt_12_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_12_2" id="textOp_12_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input12 align-middle" type="checkbox" id="opt_12_3" name="opt_12_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_12_3" id="textOp_12_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input12 align-middle" type="checkbox" id="opt_12_4" name="opt_12_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                    </td>
                                    <td>
                                      <input type="text" name="textOp_12_4" id="textOp_12_4"
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                      >
                                    </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->








<!--13-->
<?php
$condiciones=13;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_13" aria-expanded="false" aria-controls="flush-collapse_13">
      <input type="text" name="textField_13_1" id="textField_13_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_13" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
     <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_13_1" id="checkbox_13_1">
              <input class="hiddenField" type="hidden" name="hiddenField_13_1" id="hiddenField_13_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
                      }
                      ?>
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField" type="hidden" name="hiddenField_13_2" id="hiddenField_13_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_13" id="datetime_13" readonly onClick="abrirCalendarioGen('datetime_13')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody>
                                <tr>
                                  <td>
                                    <input class="form-check-input13 align-middle" type="checkbox" id="opt_13_1" name="opt_13_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_13_1" id="textOp_13_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input13 align-middle" type="checkbox" id="opt_13_2" name="opt_13_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_13_2" id="textOp_13_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input class="form-check-input13 align-middle" type="checkbox" id="opt_13_3" name="opt_13_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_13_3" id="textOp_13_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input13 align-middle" type="checkbox" id="opt_13_4" name="opt_13_4" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_13_4" id="textOp_13_4"
                                    <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                    ?>
                                    >
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          

        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->


<!--14-->
<?php
$condiciones=14;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_14" aria-expanded="false" aria-controls="flush-collapse_14">
      <input type="text" name="textField_14_1" id="textField_14_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_14" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_14_1" id="checkbox_14_1">
              <input class="hiddenField" type="hidden" name="hiddenField_14_1" id="hiddenField_14_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop1_es'];
                            }
                            ?>
                          </td>
                          <td>
                            <input class="form-control" type="text" onInput="actualizarValor14_1(id)" name="textField_14_2" id="textField_14_2">
                          </td>
                        </tr>
                      </tbody>
                    </table>                     
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <tbody>
                        <tr>
                          <td>
                            <?php
                            $consultas=mysql_query("select mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                            while($rowq = mysql_fetch_array($consultas))
                            {
                            echo $rowq['mcuestionariop1_en'];
                            }
                            ?>
                          </td>
                          <td>
                            <input class="form-control" type="text" onInput="actualizarValor14_2(id)"  name="textField_14_3" id="textField_14_3">
                          </td>
                        </tr>
                      </tbody>
                    </table>                     
                  </td>
                </tr>
                <tr>
                  <td>
                    <table>
                      <thead>
                        <th>
                          <?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <input class="hiddenField"x type="hidden" name="hiddenField_14_2" id="hiddenField_14_2" 
                          <?php
                          $consultas=mysql_query("select midmtitulo from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                          while($rowq = mysql_fetch_array($consultas))
                          {
                            echo 'value="'.$rowq['midmtitulo'].'"';
                          }
                          ?>
                          >
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <div class="form-group col-md-5">
                              <input class="form-control datetime" type="text" name="datetime_14" id="datetime_14" readonly onClick="abrirCalendarioGen('datetime_14')" placeholder="Select a date / Seleccione una fecha" >
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <table class="table table-sm">
                              <tbody>
                                <tr>
                                  <td>
                                    <input class="form-check-input14 align-middle" type="checkbox" id="opt_14_1" name="opt_14_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_14_1" id="textOp_14_1" readonly
                                      <?php
                                        $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion1'");
                                        while($rowq = mysql_fetch_array($consultas))
                                        {
                                          echo 'value="'.$rowq['mdescripcion'].'"';
                                        }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="form-check-input14 align-middle" type="checkbox" id="opt_14_2" name="opt_14_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_14_2" id="textOp_14_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input
                                    class="form-check-input14 align-middle" type="checkbox" id="opt_14_3" name="opt_14_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                    ?>
                                    >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_14_3" id="textOp_14_3" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion3'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                    >
                                  </td>
                                  <td>
                                      <input class="form-check-input14 align-middle" type="checkbox" id="opt_14_4" name="opt_14_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                                  <td>
                                    <input type="text" name="textOp_14_4" id="textOp_14_4"
                                    <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                    ?>
                                    >
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->


<!--15-->
<?php
$condiciones=15;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_15" aria-expanded="false" aria-controls="flush-collapse_15">
      <input type="text" name="textField_15_1" id="textField_15_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_15" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
     <table class="table table-bordered">
        <tbody>
          <tr>
            <td width="10">
              <input  class="form-check-input align-middle checkbox" onClick="validar_checkbox(id)" type="checkbox" name="checkbox_15_1" id="checkbox_15_1">
              <input class="hiddenField" type="hidden" name="hiddenField_15_1" id="hiddenField_15_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
            </td>
            <td>
              <table class="table table-hover">
                <tr>
                  <td>
                      <?php
                      $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop1_es'];
                      }
                      ?>                      
                  </td>
                </tr>
                <tr>
                  <td>
                    <?php
                      $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop2_es'];
                      }
                      ?> 
                    <input  class="form-check-input15 align-middle radio" onClick="checkFather2(id)" type="radio" name="radio_15" id="opt_15_1">
                    &nbsp
                    &nbsp
                    &nbsp
                    <?php
                      $consultas=mysql_query("select mcuestionariop3_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mcuestionariop3_es'];
                      }
                      ?> 
                    <input  class="form-check-input15 align-middle radio" onClick="checkFather2(id)" type="radio" name="radio_15" id="opt_15_2">
                  </td>
                </tr>
              </table>
            </td>
          </tr>          
        </tbody>
      </table>
    </div>
  </div>
</div>
<!--#endregion -->




<!--16-->
<?php
$condiciones=16;
?>
<!--#region main  -->
<div class="accordion-item">
  <h2 class="accordion-header">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse_16" aria-expanded="false" aria-controls="flush-collapse_16">
      <input type="text" name="textField_16_1" id="textField_16_1" readonly class="form-control-plaintext fw-bold" 
        <?php
        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
        while($rowq = mysql_fetch_array($consultas))
        {
          echo 'value="'.$rowq['ncabecera'].'"';
        }
        ?>
        size="100%"
        >
    </button>
  </h2>
  <div id="flush-collapse_16" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
    <div class="accordion-body">
     <table class="table table-bordered">
      <tbody>
        <tr>
          <td width="10">
            <input  class="form-check-input align-middle" onClick="envioCheckDB(id)" type="checkbox" name="checkbox_16_1" id="checkbox_16_1">
            <input type="hidden" name="hiddenField_16_1" id="hiddenField_16_1" 
              <?php
              $consultas=mysql_query("select midcuestionario from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
              while($rowq = mysql_fetch_array($consultas))
              {
                echo 'value="'.$rowq['midcuestionario'].'"';
              }
              ?>
              >
          </td>
          <td>
            <?php
            $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
            while($rowq = mysql_fetch_array($consultas))
            {
            echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
            }
            ?>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</div>
<!--#endregion -->


<br>

<!--#region main  -->
<table class="table table-hover">
  <thead>
    <tr>
      <th>
        <?php
        $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo2");
        while($rowq = mysql_fetch_array($consultas))
        {
        echo $rowq['mprincipal'];
        }
        ?>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="form-floating">
        <!-- <textarea class="" onChange="sendComment(id)" placeholder="Leave a comment here" id="floatingTextarea1" style="height: 130px"></textarea>
       -->
       <textarea class="commentbox" onChange="sendComment(id)" placeholder="Proporciona informacion detallada y precisa sobre los eventos o circunstancias que son el motivo central del reclamo /Provide detailed and accurate information about the events or circumstances that are the central reason for the claim" id="floatingTextarea1" style="height: 130px; width: 100%;"></textarea>

        <!-- <label for="floatingTextarea2">Proporciona información detallada y precisa sobre los eventos o circunstancias que son el motivo central del reclamo. 
          /Provide detailed and accurate information about the events or circumstances that are the central reason for the claim.</label> -->
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!--#endregion -->


<!--#region main  -->
<table class="table table-hover">
  <tbody>
    <tr>
      <th>
        <?php
        $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='OPC' and mcondicion=$condicionesTitulo3");
        while($rowq = mysql_fetch_array($consultas))
        {
        echo $rowq['mprincipal'];
        }
        ?>
      </th>
    </tr>
    
    <tr>
      <td>        
        <div class="">
          <table style="border: transparent" class=" table">
            <tbody>
              <tr>
                <td width="10px">
                  <input class="form-check-input align-middle" type="checkbox" id="opt_18_1" name="opt_18_1" onClick="checkAttachDocs(id)"
                    <?php
                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion5'");
                    while($rowq = mysql_fetch_array($consultas))
                    {
                      echo 'value="'.$rowq['midopcion'].'"';
                    }
                    ?>
                  >
                </td>
                
                <td>        
              <?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion5'");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>    
        </div>
      </td>
    </tr>

    <tr>
      <td>        
        <div class="">
          <table style="border: transparent" class=" table">
            <tbody>
              <tr>
                <td width="10px">
                  <input class="form-check-input align-middle" type="checkbox" id="opt_19_1" name="opt_19_1" onClick="checkAttachDocs(id)"
                    <?php
                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='6'");
                    while($rowq = mysql_fetch_array($consultas))
                    {
                      echo 'value="'.$rowq['midopcion'].'"';
                    }
                    ?>
                  >
                </td>
                
                <td>        
              <?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='6'");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>    
        </div>
      </td>
    </tr>

    <tr>
      <td>        
        <div class="">
          <table style="border: transparent" class=" table">
            <tbody>
              <tr>
                <td width="10px">
                  <input class="form-check-input align-middle" type="checkbox" id="opt_20_1" name="opt_20_1" onClick="checkAttachDocs(id)"
                    <?php
                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='7'");
                    while($rowq = mysql_fetch_array($consultas))
                    {
                      echo 'value="'.$rowq['midopcion'].'"';
                    }
                    ?>
                  >
                </td>
                
                <td>        
              <?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='7'");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>    
        </div>
      </td>
    </tr>

    <tr>
      <td>        
        <div class="">
          <table style="border: transparent" class=" table">
            <tbody>
              <tr>
                <td width="10px">
                  <input class="form-check-input align-middle" type="checkbox" id="opt_21_1" name="opt_21_1" onClick="checkAttachDocs(id)"
                    <?php
                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='8'");
                    while($rowq = mysql_fetch_array($consultas))
                    {
                      echo 'value="'.$rowq['midopcion'].'"';
                    }
                    ?>
                  >
                </td>
                
                <td>        
              <?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='8'");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
                </td>
              </tr>
            </tbody>
          </table>    
        </div>
      </td>
    </tr>
  </tbody>
</table>
<!--#endregion -->    



<br>
<!--#region main  -->
<table class="table table-hover">
  <thead>
    <tr>
      <th>
        <?php
        $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo4");
        while($rowq = mysql_fetch_array($consultas))
        {
        echo $rowq['mprincipal'];
        }
        ?>
      </th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>
        <div class="form-floating">
        <textarea class="commentbox" onChange="sendComment2(id)" placeholder="Detalle los documentos que adiciona / Detail the added documents" id="floatingTextarea2" style="height: 130px;width:100%;"></textarea>
        <!-- <label for="floatingTextarea2">Comments</label> -->
        </div>
      </td>
    </tr>
  </tbody>
</table>

<!--#endregion -->


<br>
<!--#region main  -->
<table class="table table-hover">
  <tbody>
    <tr>
      <td>
        <tr>
          <th>
            <?php
            $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='NOTE' and mcondicion=$condicionesTitulo5");
            while($rowq = mysql_fetch_array($consultas))
            {
            echo $rowq['mprincipal'];
            }
            ?>
          </th>
        </tr>
      </td>
    </tr>
  </tbody>
</table>
<!--#endregion -->


<!--#region main  -->
<?php
$condicionesTitulo6=6;
?>
<table class="table table-hover">
  <tbody>
   <!--  <tr>
      <td> -->
        <tr>
          <th>
            <?php
            $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='NOTE' and mcondicion=$condicionesTitulo6");
            while($rowq = mysql_fetch_array($consultas))
            {

          echo $rowq['mprincipal'].' '. $fecha=date('Y-m-d');
            }
            ?>
          </th>
        </tr>
    <!--   </td>
    </tr> -->
  </tbody>
</table>
<!--#endregion -->


<!--#region main  -->
<?php
// $condicionesTitulo6=6;
?>
<table class="table table-hover">
  <tbody>
   <!--  <tr>
      <td> -->
        <tr>
          <th>
            <?php
            $consultas=mysql_query("select * from mtitulosformularios where midmtitulo='M2'");
            while($rowq = mysql_fetch_array($consultas))
            {
            echo $rowq['mprincipal'].' '.$nombre_legal;
            }
            ?>
          </th>
        </tr>
    <!--   </td>
    </tr> -->
  </tbody>
</table>
<!--#endregion -->
<!--#region main  -->
<?php
// $condicionesTitulo6=6;
?>
<table class="table table-hover">
  <tbody>
   <!--  <tr>
      <td> -->
        <tr>
          <th>
            <?php
            $consultas=mysql_query("select * from mtitulosformularios where midmtitulo='M7'");
            while($rowq = mysql_fetch_array($consultas))
            {
            echo $rowq['mprincipal'].' '.$identifit;
            }
            ?>
          </th>
        </tr>
    <!--   </td>
    </tr> -->
  </tbody>
</table>
<!--#endregion -->

<!--#region main  -->
<?php
// $condicionesTitulo6=6;
?>
<table class="table table-hover">
  <tbody>
   <!--  <tr>
      <td> -->
        <tr>
          <th>
            <?php
            $consultas=mysql_query("select * from mtitulosformularios where midmtitulo='M29'");
            while($rowq = mysql_fetch_array($consultas))
            {
            echo $rowq['mprincipal'];
            }
            ?>
          </th>
        </tr>
    <!--   </td>
    </tr> -->
  </tbody>
</table>
<!--#endregion -->


<!-- <script type="text/javascript">enviarCod();</script> -->

<!--#region main  -->

<!-- <input type="submit"  value="Registrar" > -->
<!-- onClick="validacion()" -->
<!--#endregion -->
</div>
</form>
<div class="form_btn_container">
  <button id="generatereport" name="generatereport" class="btn btn-dark" onclick="redirigir()">
    Enviar
  </button>
</div>

<!---Fin--->
<script>

function redirigir() {
  const fechaGenerado = "<?php echo $fecha_generado ?>";
  const cadena = "<?php echo $cadena ?>";
  const idUsuario = "<?php echo $idUsuario ?>"; // Assuming $idUsuario is defined in your PHP code
  const url = `reportespdf.php?valor1=${fechaGenerado}&valor2=${cadena}&valor3=${idUsuario}`;

  // Open the report in a new tab

  // Show an alert
  alert("Formulario enviado");

  // Redirect to client.php
  // window.location.href = "client.php";
  // window.open(url, '_blank');
  window.location.href = url;

}
function statusTjt(id){
  // console.log(id);

  statusR= document.getElementById(id).value;

 idForm=document.formulMasdetalles.iddetalle.value;

   ajax=objetoAjax();
   ajax.open("POST", "administrator/registry/statusTjt.php",true);


   ajax.onreadystatechange=function() 
     {
       if (ajax.readyState==4) 
       {
        //  option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
       }
     }
     ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
     ajax.send("valor1="+id+"&valor2="+statusR+"&valor3="+idForm);
  
     console.log('envioCheckDB'+id+','+statusR);
   


}

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

    var miPopup
    function abreVentana(cadena, nombre)
    {
      var w=800;
      var h=260;
      var left = (screen.width/2)-(w/2);
      var top = (screen.height/2)-(h/2);
      miPopup = window.open("administrator/consultas/formulariosec.php?val1=" + cadena + "&nombre=" + encodeURIComponent(nombre), "PopUp",'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);

      miPopup.focus()
    }

    var Popup_Gen
    function abrirCalendarioGen(NameFechas)
    {
      var w=580;
      var h=360;
      var left = (screen.width/2)-(w/2);
      var top = (screen.height/2)-(h/2);
      var Popup_Gen = window.open("administrator/consultas/calendario_v1.php?val1="+NameFechas,"Calendario v1",'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left)
      // Popup_Gen.focus()
      // console.log(Popup_Gen)
    }
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

   function sendComment2(id){
    comment= document.getElementById(id).value
  console.log(comment);
  option=id;
    option5=document.formulMasdetalles.iddetalle.value;

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/sendComentarios2.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option5+"&valor2="+comment);
   
      console.log('envioCheckDB'+id+','+option);
    }

function sendComment(id){
    comment= document.getElementById(id).value;
  console.log(comment);
  option=id;
    option5=document.formulMasdetalles.iddetalle.value;

    ajax=objetoAjax();
    ajax.open("POST", "administrator/registry/sendComentarios.php",true);


    ajax.onreadystatechange=function() 
      {
        if (ajax.readyState==4) 
        {
          option.innerHTML = '<font color="#000000" style="text-align:center"><h4>'+ajax.responseText+'</h4></font>';
        }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      ajax.send("valor1="+option5+"&valor2="+comment);
   
      console.log('envioCheckDB'+id+','+option);
    }

  </script>

</body>
<script>
  function cerrarSesion() {
      window.location.href = "logout.php";
    }
</script>
<footer class="form_footer">
   <img src="administrator/images/jakay logo.png" alt="pilahuin_tio_logo.png"
     width="120">
</footer>
</html>
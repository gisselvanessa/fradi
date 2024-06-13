<?php
include_once 'conexiones/conectiondatos.php';
include_once '../login/session_helper_user.php';
  conectar();
  verificar_sesion();

$fecha_generado1=date('Y-m-d');
$codigo_form= $_GET['valor1'];
$codigo_persona=$_GET['valor2'];
$idUsuario= $_GET['valor3'];


	$consulta=mysql_query("select mnombrelegal, midentificacion from mdatospersona where mcodigoperson='$codigo_persona'"); 
$rowq = mysql_fetch_array($consulta);
$nombreComp= $rowq['mnombrelegal']; 
$identificacion=$rowq['midentificacion'];

$consulta2=mysql_query("select * from musuarios where idUsuario='$idUsuario'"); 
$rowq2 = mysql_fetch_array($consulta2);
$usuario= $rowq2['nombreUsuario']; 
$idAgencia= $rowq2['idAgencia'];
// $consultaw3= "INSERT INTO mlistareportes (mcodigoperson, midformulariogeneral, mfregistro,mnombresComp)
//   SELECT t1.mcodigoperson, t2.midformulariogeneral, t2.mfregistro, t1.mnombrelegal
//   FROM mdatospersona AS t1
//   INNER JOIN mformulariosgenerales AS t2 ON t1.mcodigoperson = t2.midcliente
//   LIMIT 1;";
// mysql_query($consultaw3);
$consultaw3= "INSERT INTO mlistareportes (mcodigoperson, midformulariogeneral, mfregistro,mnombresComp,mcreador,magencia)
  VALUES ('$codigo_persona', '$codigo_form', '$fecha_generado1', '$nombreComp', $idUsuario,'$idAgencia');";
mysql_query($consultaw3);

$consultaw4 = "INSERT INTO mseguimiento (midformulariogeneral, midestadocaso, musuarioregistro, mfecharegistro) 
        VALUES ('$codigo_form', 'I', '$usuario', '$fecha_generado1')"; 
mysql_query($consultaw4);

?>

<!doctype html>
<html lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
        <link rel="stylesheet" type="text/css" href="../administrator/css/bootstrap.css">
        <link rel="" type="" href="formulario.php">
        <link rel="stylesheet" type="text/css" href="../administrator/css/formulario.css">
        <link rel="shortcut icon" href="../administrator/images/jakay LOGOTIPO.png" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="dc_ajax/dc-ajax.js" language="javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
<style>
  .page-break {
    page-break-after: always;
  }
</style>
<!-- <form id="myForm" action="sendCod.php" method="post">
  <input type="hidden" name="codigoFormulario" value="<?php echo $codigo_form; ?>">
</form>

<script>
  // En JavaScript, envía el formulario automáticamente
  document.getElementById("myForm").submit();
</script> -->

<div class="container">
	<img src="../administrator/images/PILAHUIN TIO LOGO_.png" alt="pilahuin_tio_logo.png"
     width="250">
	<!-- inicio -->
	<div>
		<?php 
		$consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M7'"); 
		$rowq = mysql_fetch_array($consultaTitulos1)
		?>
		<span class="form-title"><?php echo $rowq['mprincipal']; ?></span>
		<hr>
		<div class="form-info">
			<div>
				<?php 
				$consultaTitulos2=mysql_query("select * from mtitulos where midmtitulo='M6'"); 
				$rowq = mysql_fetch_array($consultaTitulos2)
				?>
				<span><?php echo $rowq['mprincipal']; ?></span>

				<span class="form-client-data"><?php echo $fecha_generado1 ?></span>
			</div>
			
			<div>
				<?php 
				$consultaTitulos3=mysql_query("select * from mtitulos where midmtitulo='M9'"); 
				$rowq = mysql_fetch_array($consultaTitulos3)
				?>
				<span><?php echo $rowq['mprincipal']; ?></span>

				
				<span class="form-client-data"><?php echo $codigo_form ?></span>

			</div>
		</div>
	</div>
	<hr>
	<div>
	
		<div class="form-subtitle"><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M1'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></div>
		<div class="form-container">
		<!-- <div> -->
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M2'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mprimernombre, msegundonombre  from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprimernombre'].' '.$rowq['msegundonombre'];
				?>
				</div>
			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M3'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mapellidopaterno from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mapellidopaterno'];
				?>
				</div>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M4'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mapellidomaterno from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mapellidomaterno'];
				?>
				</div>

			</div>
		<!-- </div> -->
		<!-- <div> -->
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M5'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mgenero from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mgenero'];
				?>
				</div>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M6'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div></div>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M7'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select midentificacion from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['midentificacion'];
				?>
				</div>
			</div>
				
			
		</div>

	</div>
	<hr>
	<div>
		<div class="form-subtitle"><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M8'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></div>
		<div class="form-container">
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M9'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mprovincia from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprovincia'];
				?>
				</div>
			</div>
			<div>
				<span><?php 
					$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M10'"); 
					$rowq = mysql_fetch_array($consultaTitulos3);
					echo $rowq['mprincipal'];
					?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mcanton from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mcanton'];
				?>
				</div>
			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M11'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mparroquia from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mparroquia'];
				?>
				</div>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M12'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mdireccion from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mdireccion'];
				?>
				</div>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M13'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<p></p>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M15'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mmasdetalledireccion from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mmasdetalledireccion'];
				?>
				</div>

			</div>
			<div>
					<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M16'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<p></p>

			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M17'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select mcelular from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo '0'.$rowq['mcelular'];
				?>
				</div>	

			</div>
			
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M18'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<div class="form-client-data">
					<?php 
				$consultaTitulos3=mysql_query("select memail from mdatospersona where mcodigoperson=$codigo_persona"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['memail'];
				?>
				</div>				
			</div>
		</div>
	</div>
	<hr>
	<div>
		<div class="form-subtitle"><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M19'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></div>
		<div class="form-container">
			<span><?php 
			$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M20'"); 
			$rowq = mysql_fetch_array($consultaTitulos3);
			echo $rowq['mprincipal'];
			?></span>

			<span class="form-client-data"><?php 
			$consultaTitulos3=mysql_query("select mnumerotarjeta from mcuentas where midformulario='$codigo_form'"); 
			$rowq = mysql_fetch_array($consultaTitulos3);
			echo $rowq['mnumerotarjeta'];
			?></span>



			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M21'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<input type="checkbox" name=""
				<?php
			                $consultas=mysql_query("select mtipotarjeta from mcuentas where midformulario='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mtipotarjeta']==='CRE')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

				>
			</div>
			<div>
				<span><?php 
				$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M22'"); 
				$rowq = mysql_fetch_array($consultaTitulos3);
				echo $rowq['mprincipal'];
				?></span>
				<input type="checkbox" name=""

				<?php
			                $consultas=mysql_query("select mtipotarjeta from mcuentas where midformulario='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mtipotarjeta']==='DEB')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

				>

			</div>
		</div>
		
	</div>
	<hr>
	
      <!-- <form  name=formulMasdetalles> -->
        <table class="table" >
          <tr class="table-header">
            <td>ID</td> 
            <td>Comercio</td>
            <td>Fecha </td>
            <td>Descripcion </td>
            <td>Monto </td>

          </tr>
          
         <tbody>
         	<?php
                              $consultas=mysql_query("select * from mdetallesreclamos where mestado='ACT' and midreclamo='$codigo_form'");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                              	?>
                                <tr>
                                  
                                
                                <td><?php echo $rowq['midreclamo']?></td>
                                <td><?php echo $rowq['mcomercio']?></td>
                                <td><?php echo $rowq['mfechareclamo']?></td>
                                <td><?php echo $rowq['mdescripcion']?></td>
                                <td><?php echo $rowq['mvalorreclamo']?></td>



                                </tr>
                             <?php
                           	 }
                             ?> 
      
	         </tbody>
	               
	       </table>
	     <!-- </form> -->
	    
	<div>

			
		<span><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M23'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></span>

		<input class="ms-3" type="checkbox" name="tjtperdida" id="tjtperdida"
		<?php
			                $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C1';");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad1_es']==='on')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		
		>
		<span><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M24'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></span>
		<input class="ms-3" type="checkbox" name="tjtrobada" id="tjtrobada"
		<?php
			                $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C1';");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad2_es']==='on')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		
		>
		<span><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M25'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></span>
		<input class="ms-3" type="checkbox" name="tjtch" id="tjtch"
		<?php
			                $consultas=mysql_query("select mcamposad3_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C1';");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad3_es']==='on')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		>
		<span><?php 
		$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M26'"); 
		$rowq = mysql_fetch_array($consultaTitulos3);
		echo $rowq['mprincipal'];
		?></span>

	</div>
	<hr>
	<div >
		<div >
			<p><?php 
			$consultaTitulos3=mysql_query("select * from mtitulosformularios where midmtitulo='M27'"); 
			$rowq = mysql_fetch_array($consultaTitulos3);
			echo $rowq['mprincipal'];
			?></p>

		
		<div>
			
				<table class="form-details">
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
					<tr class="tr-odd">
						<td><input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C1' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p >
					        <?php
					        // $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        // while($rowq = mysql_fetch_array($consultas))
					        // {
					        //   echo $rowq['ncabecera'];
					        // }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<td></td>
					</tr>
					<?php
					$condiciones=2;
					$cuest2='C2';
					?>
					<tr class="tr-even page-break">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C2' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p >
					        <?php
					        // $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        // while($rowq = mysql_fetch_array($consultas))
					        // {
					        //   echo $rowq['ncabecera'];
					        // }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<td></td>
					</tr>
					<?php
					$condiciones=3;
					$cuest3='C3';
					?>
					<tr class="tr-odd ">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C3' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 3:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C3'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>
                          <table class="">
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

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C3' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C3' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
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
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_3_3" name="opt_3_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C3' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C3' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
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

					<?php
					$condiciones=4;
					$cuest4='C4';
					?>
					<tr class="tr-even ">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C4' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>

						</td>
						<td class="form-text-box">
							<p class="form-detail-tiltle" >
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>

                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C4'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>
                          <table class="">
                              <tbody class ="checkbox_3_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_4_1" name="opt_4_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C4' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_4_1" id="textOp_4_1" readonly
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
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_4_2" name="opt_4_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C4' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_4_2" id="textOp_4_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_4_3" name="opt_4_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C4' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_4_3" id="textOp_4_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_4_4" name="opt_4_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C4' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_4_4" id="textOp_4_4"
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

					<?php
					$condiciones=5;
					$cuest5='C5';
					?>
					<tr class="tr-odd">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C5' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<table>
								<tr>
									

					  		<td class="align-baseline">
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es  from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</td>	

					  		<td class="c5-space form-client-data align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C5'");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcamposad1_es'];
					        }
					        ?>       
					  		</td>
							
					  		<td class="align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop2_es'].'<br>'.$rowq['mcuestionariop2_en'];
					        }
					        ?>       
					  		</td>
					  		<td class="c5-space form-client-data align-baseline">
					        <?php
					        $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C5'");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcamposad2_es'];
					        }
					        ?>       
					  		</td>
							
					  		<td class="align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcuestionariop3_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop3_es'].'<br>'.$rowq['mcuestionariop3_en'];
					        }
					        ?>       
					  		</td>
								</tr>


							<!-- ingles -->

							<tr>
									

					  		<td class="align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_en  from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</td>	

					  		<td class="c5-space form-client-data align-middle" >
					        <?php
					        $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C5'");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcamposad1_es'];
					        }
					        ?>       
					  		</td>
							
					  		<td class="align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcuestionariop2_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop2_es'].'<br>'.$rowq['mcuestionariop2_en'];
					        }
					        ?>       
					  		</td>
					  		<td class="c5-space form-client-data align-middle">
					        <?php
					        $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C5'");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcamposad2_es'];
					        }
					        ?>       
					  		</td>
							
					  		<td class="align-baseline" >
					        <?php
					        $consultas=mysql_query("select mcuestionariop3_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop3_es'].'<br>'.$rowq['mcuestionariop3_en'];
					        }
					        ?>       
					  		</td>
								</tr>
							</table>
					  		

						</td>
						<!-- notificado al comercio 5:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C5'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                          <table class="">
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

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C5' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_5_1" id="textOp_5_1" readonly
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
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_5_2" name="opt_5_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C5' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_5_2" id="textOp_5_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_5_3" name="opt_5_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C5' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_5_3" id="textOp_5_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_5_4" name="opt_5_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C5' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_5_4" id="textOp_5_4"
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

				<?php
					$condiciones=6;
					$cuest6='C6';
					?>
					<tr class="tr-even">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C6' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle" >
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
							<table>
								<tr>
									<span >
									<?php
									$consultas=mysql_query("select mcuestionariop1_es  from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
									while($rowq = mysql_fetch_array($consultas))
									{
									echo $rowq['mcuestionariop1_es'];
									}
									?>       
									</span>
									<span class="form-client-data">
										<?php
									$consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C6'");
									while($rowq = mysql_fetch_array($consultas))
									{
									echo $rowq['mcamposad1_es'];
									}
									?> 
									</span>
								</tr>
								<tr>
									<br>
									<span >
									<?php
									$consultas=mysql_query("select mcuestionariop1_en  from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
									while($rowq = mysql_fetch_array($consultas))
									{
									echo $rowq['mcuestionariop1_en'];
									}
									?>       
									</span>
									<span class="form-client-data">
										<?php
									$consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C6'");
									while($rowq = mysql_fetch_array($consultas))
									{
									echo $rowq['mcamposad1_es'];
									}
									?> 
									</span>
								</tr>
							</table>
					  		
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C6'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>
                           <table class="">
                              <tbody class ="checkbox_6_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_6_1" name="opt_6_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C6' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_6_1" id="textOp_6_1" readonly
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
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_6_2" name="opt_6_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C6' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_6_2" id="textOp_6_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_6_3" name="opt_6_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C6' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_6_3" id="textOp_6_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_6_4" name="opt_6_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C6' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_6_4" id="textOp_6_4"
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
				<?php
					$condiciones=7;
					$cuest7='C7';
					?>
					<tr class="tr-odd">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C7' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
					  		<table>
					  			<tr>
		                          <td>
		                            <?php
		                            $consultas=mysql_query("select mcuestionariop2_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
		                            while($rowq = mysql_fetch_array($consultas))
		                            {
		                            echo $rowq['mcuestionariop2_es'];
		                            }
		                            ?> 
		                            <input  class="form-check-input align-middle" type="radio" name="radio7_1" id="rad_7_1"

		                             <?php
			                $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midcuestionario='C7' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad1_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

				                    

		                            >
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
		                            <input  class="form-check-input align-middle"  type="radio" name="radio7_1" id="rad_7_2"

		                            <?php
			                $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midcuestionario='C7' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad2_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		                            >
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
		                            <input  class="form-check-input align-middle"  type="radio" name="radio7_2" id="rad_7_1"
		                            <?php
			                $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midcuestionario='C7' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad1_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		                            >
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
		                            <input  class="form-check-input align-middle"  type="radio" name="radio7_2" id="rad_7_2"
		                            <?php
			                $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midcuestionario='C7' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad2_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		                            >
		                          </td>
		                        </tr>
					  		</table>
					  		
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C7'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>


                           <table class="">
                              <tbody class ="checkbox_7_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input7 align-middle" type="checkbox" id="opt_7_1" name="opt_7_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C7' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_7_1" id="textOp_7_1" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C7' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_7_2" id="textOp_7_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_7_3" name="opt_7_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C7' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_5_3" id="textOp77_3" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C7' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_7_4" id="textOp_7_4"
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

					<?php
					$condiciones=8;
					$cuest8='C8';
					?>
					<tr class="tr-even">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C8' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C8'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                           <table class="">
                              <tbody class ="checkbox_8_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_8_1" name="opt_8_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C8' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_8_1" id="textOp_8_1" readonly
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
                                    <input class="form-check-input4 align-middle" type="checkbox" id="opt_8_2" name="opt_8_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C8' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_8_2" id="textOp_8_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input8 align-middle" type="checkbox" id="opt_8_3" name="opt_8_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C8' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_8_3" id="textOp_8_3" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C8' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_8_4" id="textOp_8_4"
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

					<?php
					$condiciones=9;
					$cuest9='C9';
					?>
					<tr class="tr-odd">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C9' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>

					  		<table>
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
                            <?php
                              $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where  midformulariogeneral='$codigo_form' and midcuestionario='C9'");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcamposad1_es'];
                              }
                              ?>
                              
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
                            <?php
                              $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where  midformulariogeneral='$codigo_form' and midcuestionario='C9'");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                                echo $rowq['mcamposad2_es'];
                              }
                              ?>
                              
                          </td>
                        </tr>
						</table>
						</td>

						

						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C9'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                           <table class="">
                              <tbody class ="checkbox_9_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input9 align-middle" type="checkbox" id="opt_9_1" name="opt_9_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C9' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_9_1" id="textOp_9_1" readonly
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
                                    <input class="form-check-input9 align-middle" type="checkbox" id="opt_9_2" name="opt_9_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C9' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_9_2" id="textOp_9_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input3 align-middle" type="checkbox" id="opt_9_3" name="opt_9_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C9' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_9_3" id="textOp_9_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_9_4" name="opt_9_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C9' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_9_4" id="textOp_9_4"
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
					<?php
					$condiciones=10;
					$cuest10='C10';

					?>
					<tr class="tr-even page-break" >
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C10' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>

						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C10'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                           <table class="">
                              <tbody class ="checkbox_10_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_10_1" name="opt_10_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C10' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_10_1" id="textOp_10_1" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C10' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_10_2" id="textOp_10_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input10 align-middle" type="checkbox" id="opt_10_3" name="opt_10_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C10' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_10_3" id="textOp_10_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_10_4" name="opt_10_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C10' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_5_4" id="textOp_5_4"
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

					<?php
					$condiciones=11;
					$cuest11='C11';

					?>
					<tr class="tr-odd">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C11' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C11'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                          <table class="">
                              <tbody class ="checkbox_11_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input1 align-middle" type="checkbox" id="opt_11_1" name="opt_11_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C11' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_11_1" id="textOp_11_1" readonly
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
                                    <input class="form-check-input10 align-middle" type="checkbox" id="opt_11_2" name="opt_11_2" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C11' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_11_2" id="textOp_11_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input10 align-middle" type="checkbox" id="opt_11_3" name="opt_11_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C11' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_11_3" id="textOp_11_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_11_4" name="opt_11_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C11' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_11_4" id="textOp_11_4"
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

					<?php
					$condiciones=12;
					$cuest12='C12';

					?>
					<tr class="tr-even">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C12' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date"><?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C12'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?></p>

                          <table class="">
                              <tbody class ="checkbox_12_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_12_1" name="opt_12_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C12' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_10_1" id="textOp_12_1" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C12' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_12_2" id="textOp_12_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input10 align-middle" type="checkbox" id="opt_12_3" name="opt_12_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C12' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_12_3" id="textOp_12_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_12_4" name="opt_12_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C12' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_12_4" id="textOp_12_4"
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

					<?php
					$condiciones=13;
					$cuest13='C13';

					?>
					<tr class="tr-odd  ">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C13' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<!-- notificado al comercio 4:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C13'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>

                          <table class="">
                              <tbody class ="checkbox_13_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_13_1" name="opt_13_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C13' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_13_1" id="textOp_13_1" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C13' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_13_2" id="textOp_13_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input13 align-middle" type="checkbox" id="opt_13_3" name="opt_13_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C13' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_13_3" id="textOp_13_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_13_4" name="opt_13_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C13' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_13_4" id="textOp_13_4"
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

					<?php
					$condiciones=14;
					$cuest14='C14';

					?>
					<tr class="tr-even  ">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C14' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							
					  		<span >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'];
					        }
					        ?>       
					  		</span>
					  		<span class="form-client-data">
					  			<?php
		                           $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C14'");
		                           while($rowq = mysql_fetch_array($consultas))
		                           {
		                            echo $rowq['mcamposad1_es'];
		                            }
		                          ?>
					  		</span>
									<br>
							  <span >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</span>
					  		<span class="form-client-data">
					  			<?php
		                           $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C14'");
		                           while($rowq = mysql_fetch_array($consultas))
		                           {
		                            echo $rowq['mcamposad1_es'];
		                            }
		                          ?>
					  		</span>

						</td>
						<!-- notificado al comercio 14:... -->
						<td> 
							<?php
                           $consultas=mysql_query("select mprincipal from vtitulos where mcategoria='FORM' and mcondicion=$condicionesTitulo");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mprincipal'];
                            }
                          ?>
                          <p class="form-detail-date">
                          	<?php
                           $consultas=mysql_query("select mfnotificacion from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C14'");
                           while($rowq = mysql_fetch_array($consultas))
                           {
                            echo $rowq['mfnotificacion'];
                            }
                          ?>
                          </p>


                          <table class="">
                              <tbody class ="checkbox_14_1_opts">
                                <tr>
                                  <td>
                                    <input class="form-check-input5 align-middle" type="checkbox" id="opt_14_1" name="opt_14_1" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion1'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }

                                      
						                $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C14' and idmcheckedopc='$codigo_form' and midopcion='OP1'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>

                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_14_1" id="textOp_14_1" readonly
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
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C14' and idmcheckedopc='$codigo_form' and midopcion='OP2'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>                          
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_14_2" id="textOp_14_2" readonly
                                      <?php
                                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion2'");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['mdescripcion'].'"';
                                      }
                                      ?>
                                      >
                                  </td>
                              </tr>
                              <tr>
                                  <td>
                                    <input
                                    class="form-check-input10 align-middle" type="checkbox" id="opt_14_3" name="opt_14_3" onClick="checkFather(id)"
                                    <?php
                                    $consultas=mysql_query("select midopcion from vopciones where mcondicion='$opcionNumeracion3'");
                                    while($rowq = mysql_fetch_array($consultas))
                                    {
                                      echo 'value="'.$rowq['midopcion'].'"';
                                    }
                                     $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C14' and idmcheckedopc='$codigo_form' and midopcion='OP3'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                    >
                                  </td>
                                  <td>
                                    <input class="check_text" type="text" name="textOp_14_3" id="textOp_14_3" readonly
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
                                      <input class="form-check-input3 align-middle" type="checkbox" id="opt_14_4" name="opt_14_4" onClick="checkFather(id)"
                                      <?php
                                      $consultas=mysql_query("select midopcion from vopciones where mcondicion=$opcionNumeracion4");
                                      while($rowq = mysql_fetch_array($consultas))
                                      {
                                        echo 'value="'.$rowq['midopcion'].'"';
                                      }
                                       $consultaw=mysql_query("select mcheckedopcstate from mcheckedopc where midcuestionario='C14' and idmcheckedopc='$codigo_form' and midopcion='OP4'");
						               $row = mysql_fetch_array($consultaw);
						                 if($row['mcheckedopcstate']==='true')
								        {?>
						                  
						                checked
						                <?php
						            	}
						                ?>
                                      >
                                    </td>
                                    <td>
                                      <input class="check_text" type="text" name="textOp_14_4" id="textOp_14_4"
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

					<!-- 15 -->
					<?php
					$condiciones=15;
					$cuest15='C15';

					?>
					<tr class=" tr-odd">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C15' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
							<table >
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
				                    <input  class="form-check-input15 align-middle radio" onClick="checkFather2(id)" type="radio" name="radio_15" id="opt_15_1"
				                    <?php
			                $consultas=mysql_query("select mcamposad1_es from mformulariosgenerales where midcuestionario='C15' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad1_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

				                    >
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
				                    <input  class="form-check-input15 align-middle radio" onClick="checkFather2(id)" type="radio" name="radio_15" id="opt_15_2"
				                    <?php
			                $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midcuestionario='C15' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad2_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
				                    >
				                  </td>
				                </tr>
				              </table>
								</td>
								<!-- notificado al comercio 4:... -->
								<td></td>
					</tr>
					<?php
					$condiciones=16;
					$cuest15='C16';

					?>
					<tr class="tr-even">
						<td>
							<input class="checkbox" type="checkbox" name=""
							<?php
			                $consultas=mysql_query("select mcheckedboxstate from mchecked where midcuestionario='C16' and midformulariogeneral='$codigo_form'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcheckedboxstate']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>

							>
						</td>
						<td class="form-text-box">
							<p  class="form-detail-tiltle">
					        <?php
					        $consultas=mysql_query("select ncabecera from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['ncabecera'];
					        }
					        ?>       
					  		</p>
					  		<p >
					        <?php
					        $consultas=mysql_query("select mcuestionariop1_es, mcuestionariop1_en from vcuestionarios where mcategoria='QUEST' and mcondicion=$condiciones");
					        while($rowq = mysql_fetch_array($consultas))
					        {
					          echo $rowq['mcuestionariop1_es'].'<br>'.$rowq['mcuestionariop1_en'];
					        }
					        ?>       
					  		</p>
						</td>
						<td></td>

					</tr>

			</table>
		</div>



	</div>
	</div>

	<div>
		<?php 
		$consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M2'"); 
		$rowq = mysql_fetch_array($consultaTitulos1)
		?>
		<p class="form-description"><?php echo $rowq['mprincipal']; ?></p>
		<?php 
		$consultaTitulos1=mysql_query("select mcamposad1_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C16'"); 
		$rowq = mysql_fetch_array($consultaTitulos1);

		?>
		<p><?php echo $rowq['mcamposad1_es']; ?> </p>
	</div>
	<hr>

	<div class="page-break">
		<?php 
		$consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M3'"); 
		$rowq = mysql_fetch_array($consultaTitulos1)
		?>
		<p class="form-description"><?php echo $rowq['mprincipal']; ?></p>

		<input type="checkbox" name=""

		<?php
			                $consultas=mysql_query("select mcamposad2_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C16'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad2_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		>
		<span>
			<?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion='$opcionNumeracion5'");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
		</span>
		<br>
		<!-- 2 -->
		<input type="checkbox" name=""

		<?php
			                $consultas=mysql_query("select mcamposad3_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C16'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad3_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		>
		<span>
			<?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=6");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
		</span>
		<br>
		<!-- 3 -->
		<input type="checkbox" name=""

		<?php
			                $consultas=mysql_query("select mcamposad4_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C16'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad4_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		>
		<span>
			<?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=7");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
		</span>
		<br>
		<!-- 4 -->
		<input type="checkbox" name=""

		<?php
			                $consultas=mysql_query("select mcamposad5_es from mformulariosgenerales where midformulariogeneral='$codigo_form' and midcuestionario='C16'");
			               $rowq = mysql_fetch_array($consultas);
			                 if($rowq['mcamposad5_es']==='true')
					        {?>
			                  
			                checked
			                <?php
			            	}
			                ?>
		>
		<span>
			<?php
                      $consultas=mysql_query("select mdescripcion from vopciones where mcondicion=8");
                      while($rowq = mysql_fetch_array($consultas))
                      {
                        echo $rowq['mdescripcion'];
                      }
                    ?>
		</span>


	</div>
	<div>
		<?php 
		$consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M4'"); 
		$rowq = mysql_fetch_array($consultaTitulos1)
		?>
		<p class="form-description"><?php echo $rowq['mprincipal']; ?></p>
		<?php 
		$consultaTitulos1=mysql_query("select mcomentarios from mformcomentarios where midformulario='$codigo_form' "); 
		$rowq = mysql_fetch_array($consultaTitulos1);

		?>
		<p><?php echo $rowq['mcomentarios']; ?> </p>
		
	</div>
	<hr>
	<div>
		<div>
		<?php 
		$consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M5'"); 
		$rowq = mysql_fetch_array($consultaTitulos1)
		?>
		<p class="form-autor"><?php echo $rowq['mprincipal']; ?></p>
		<!-- <p> comments2</p> -->
		</div>

				<div class="form-client-data">
					<div>
					<?php 
					$consultaTitulos2=mysql_query("select * from mtitulos where midmtitulo='M6'"); 
					$rowq = mysql_fetch_array($consultaTitulos2)
					?>
					<span class="form-client-data"><?php echo $rowq['mprincipal'].' '.$fecha_generado1; ?></span>
					<!-- <input class="form_input_client" type="text" name="" size="30"> -->
				</div>

				

				<div class="form-client-data">
					<?php 
					$consultaTitulos2=mysql_query("select * from mtitulosformularios where midmtitulo='M2'"); 
					$rowq = mysql_fetch_array($consultaTitulos2)
					?>
					<span class="form-client-data"><?php echo $rowq['mprincipal'].' '.$nombreComp; ?></span>
				<!-- <input class="form_input_client" type="text" name="" size="30"> -->
				</div>

				<div class="form-client-data">
					<?php 
					$consultaTitulos2=mysql_query("select * from mtitulosformularios where midmtitulo='M7'"); 
					$rowq = mysql_fetch_array($consultaTitulos2)
					?>
						<span class="form-client-data"><?php echo $rowq['mprincipal'].' '.$identificacion; ?></span>
				<!-- <input class="form_input_client" type="text" name="" size="30"> -->
				</div>
				<br>
				
				<div class="form-client-data">
					<?php 
					$consultaTitulos2=mysql_query("select * from mtitulosformularios where midmtitulo='M29'"); 
					$rowq = mysql_fetch_array($consultaTitulos2)
					?>
					<span class="form-client-data"><?php echo $rowq['mprincipal']; ?></span>
					<input class="form_input_client" type="text" name="" size="">

					<!-- <span class="form-client-data"><?php echo $fecha_generado1 ?></span> -->
				</div>
				</div>
	</div>


	
</div>



</body>
</html>

<!-- 
<?php
//$html=ob_get_clean();
?> -->
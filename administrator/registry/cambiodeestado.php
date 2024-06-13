<?php


 $cadena_idp=$_POST['valor1'];
 $cadena_id=$_POST['valor2'];
 // echo $cadena_id;


// echo $cadena_cantidad;


include_once '../conexiones/conectiondatos.php';
conectar();

/*$consuls=mysql_query("SELECT * FROM mdetallesreclamos");
	while($rows=mysql_fetch_array($consuls))
	{
	   echo $rows[2];	
	}*/


$consultaw="update mdetallesreclamos set mestado='DES' where middetallereclamo=$cadena_idp";
										
if(mysql_query($consultaw)==true)
{
	

	    ?>
      <head>
          <link rel="stylesheet" type="text/css" href="../administrator/css/bootstrap.css">
          <script src="../administrator/js/bootstrap.bundle.min.js"></script>

      </head>
	    <h4>Detalle de reclamos registrados</h4>
      <div class="row py-4">
                <div >
                    <table class="table table-sm table-bordered table-striped">
                          <thead>
                            <th class="sort asc">id reclamo</th>
                            <th class="sort asc">Comercio</th>
                            <th class="sort asc">Fecha</th>
                            <th class="sort asc">Descripcion</th>
                            <th class="sort asc">Valor reclamo</th>
                            <th></th>
                            
                        </thead>
	    <?php
                              $consultas=mysql_query("select * from mdetallesreclamos where midreclamo='$cadena_id' and mestado='ACT' ");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                              	?>
                                <tr>
                                  
                                
                                <td><?php echo $rowq['midreclamo']?></td>
                                <td><?php echo $rowq['mcomercio']?></td>
                                <td><?php echo $rowq['mfechareclamo']?></td>
                                <td><?php echo $rowq['mdescripcion']?></td>
                                <td><?php echo $rowq['mvalorreclamo']?></td>
                                <td><input type="button" class="btn btn-info" value="Eliminar" id="<?php echo $rowq['middetallereclamo']; ?>" onClick="actualizarEstado(<?php echo $rowq['middetallereclamo']; ?>)" name="<?php echo $rowq['middetallereclamo']; ?>"></td>
                                <td><?php echo $rowq['mestado']?></td>



                                </tr>
                                <?php
                            }
                                ?>
                            </table>
                          </div>
                        </div>



      

<?php
}
else
{
	echo 'Error al actualizar estado:'.$cadena_id;
}


?>
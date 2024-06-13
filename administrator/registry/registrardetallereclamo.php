<?php


 $cadena_id=$_POST['valor5'];

 //echo $cadena_id;

 $cadena_comercio=$_POST['valor1'];
 //echo $cadena_comercio;

  $cadena_fecha=$_POST['valor2'];
 //echo $cadena_fecha;

  $cadena_descripcion=$_POST['valor3'];
 //echo $cadena_descripcion;

  $cadena_cantidad=$_POST['valor4'];
// echo $cadena_cantidad;


include_once '../conexiones/conectiondatos.php';
conectar();

/*$consuls=mysql_query("SELECT * FROM mdetallesreclamos");
	while($rows=mysql_fetch_array($consuls))
	{
	   echo $rows[2];	
	}*/


$consultaw="insert into mdetallesreclamos (midreclamo, mcomercio, mfechareclamo, mdescripcion, mvalorreclamo) VALUES ('$cadena_id','$cadena_comercio','$cadena_fecha','$cadena_descripcion',$cadena_cantidad);";
									
if(mysql_query($consultaw)==true )
{
	

	    ?>

      <h5>Detalle reclamos registrados</h5>
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
                              $consultas=mysql_query("select * from mdetallesreclamos where midreclamo='$cadena_id' and mestado='ACT'");
                              while($rowq = mysql_fetch_array($consultas))
                              {
                              	?>
                                <tr>
                                  
                                
                                <td><?php echo $rowq['midreclamo']?></td>
                                <td><?php echo $rowq['mcomercio']?></td>
                                <td><?php echo $rowq['mfechareclamo']?></td>
                                <td><?php echo $rowq['mdescripcion']?></td>
                                <td><?php echo $rowq['mvalorreclamo']?></td>
                                <td><input type="button" value="Eliminar" id="<?php echo $rowq['middetallereclamo']; ?>" onClick="actualizarEstado(<?php echo $rowq['middetallereclamo']; ?>)" name="<?php echo $rowq['middetallereclamo']; ?>"></td>
                                



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
	echo 'Error';
}


?>
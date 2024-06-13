<?php
$nombreCampos=$_GET['val1'];
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Calendario v1</title>
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <link rel="stylesheet" href="../css/style.css">
     <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <script src="../js/jquery-3.6.0.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker(
		$.extend(
		$.datepicker.regional['es'],
		{
		dateFormat:"yy-mm-dd"
		}
		)
		);
  } );
  </script>
    
    
    <script>
<?php        
echo 'function RetornoCalendarioGen()
{
    pref=document.form1.datepicker.value;
    opener.document.frmpri.'.$nombreCampos.'.value = pref
    
    
    window.close()
}';
        ?>
</script>
</head>
<body>
 
<p>&nbsp;</p>
 <style>
.date-input-calen{
  color:gray;
  background-color:#F8F8FF
}
.date-input-calen:hover{
  cursor: pointer;
}
 </style>
 
<table width="44%" height="102" border="0" align="center">
  <tbody>
    <tr>
      <td><form name="form1" method="post" action="">
        <p style="text-align: center"><label for="datetime">Seleccione la Fecha:</label></p>
          
         
              
              
               <div class=" mb-3">
                              
                                  <input type="text" name="datepicker" id="datepicker" class="form-control text-center btn btn-light" placeholder="Seleccione una fecha">
                              <!-- <label class="date-input-calen" for="floatingInput">Seleccione una fecha</label> -->
                                  </div>
              
          <div class="d-grid gap-2 col-6 mx-auto">
        <input class="btn btn-primary active" type="button" value="Enviar Fecha" onclick="RetornoCalendarioGen()">
          </div>
      </form>
    </td>
    </tr>
  </tbody>
</table>
<p>&nbsp;</p>
</body>
</html>
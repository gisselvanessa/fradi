<?php
 include_once 'administrator/conexiones/conectiondatos.php';
 include_once 'login/session_helper.php';
//  include_once 'page.php';
 conectar();
 verificar_sesion();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA DE REPORTES</title>
    <link rel="stylesheet" type="text/css" href="administrator/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/index.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/datos.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/listaReportes.css">
    <script src="administrator/css/style.js" language="javascript"></script>

    <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="administrator/dc_ajax/dc-ajax.js" language="javascript"></script>
    <!-- <script src="page.js" language="javascript"></script> -->
</head>
<body>
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
    <button  type="button" onclick="cerrarSesion()" class="btnList">Cerrar sesi&oacute;n</button>
    </div>

  </nav>
  <div class="nav_menu_header3">
    LISTA DE REPORTES GENERADOS
    
      <div class="nav_user">
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
    <!-- <h6 class="form-title"><?php echo $rowq['mprincipal']; ?></h6> -->
  <!-- </nav> -->
  <div class="menuside" id="menuside">
    <div  id="hamburger" class="hamburger">
      <!-- <div class="_layer -top"></div>
      <div class="_layer -mid"></div>
      <div class="_layer -bottom"></div> -->
      <div onClick="menu()"><i class='bx bx-menu'></i></div>
        </div>
    <nav class="menuppal" id="menuppal">
    <ul>
    
      <li><span class="route" onClick="abreVentana2()">Formulario de reclamo</span></li>
      <li><a class="route" href="listaReportes.php" target="">Reportes generados</a></li>
      <li><a class="route" href="areatrabajo.php" target="">Carga de documentos</a></li>
      <li><a class="route" href="revision.php" target="">Casos Recibidos</a></li>
      <li><a class="route" href="procesocasos.php" target="">Casos Aceptados</a></li>
      <li><a class="route" href="resolucionescasos.php" target="">Resolucion de caso</a></li>
      <li><a class="route" href="historialcasos.php" target="">Historial de casos</a></li>
      <li><a class="route" href="seguimientocasos.php" target="">Seguimiento</a></li>

      <!-- <li><a class="route" href="registro.php">Registrar</a></li> -->
      <!-- <li><a class="route" href="client.php" target="_blank">Formulario de reclamo</a></li> -->
      <!-- <li><a class="route" href="login/index.php">Login</a></li> -->
      <!-- <li><a class="route" href="register/register.php">Register</a></li> -->
      
    </ul>
  </nav>
  </div>
  <?php
// Aquí debes incluir tu archivo de conexión a la base de datos y realizar la consulta para obtener los datos necesarios

// Obtener el valor de búsqueda enviado por el formulario
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Construir la consulta SQL con el filtro de búsqueda
$consulta = "SELECT m.mcodigoperson, m.midformulariogeneral, m.mnombresComp, m.mfregistro, m.mcreador, t1.midentificacion AS nombre_identificacion
FROM mlistareportes AS m
LEFT JOIN mdatospersona AS t1 ON m.mcodigoperson = t1.mcodigoperson
WHERE ";

if (!empty($busqueda)) {
  $consulta .= "(m.midformulariogeneral LIKE '%$busqueda%' OR m.mnombresComp LIKE '%$busqueda%' OR t1.midentificacion LIKE '%$busqueda%') AND m.mstatus = 1";
} else {
  $consulta .= "m.mstatus = 1";
}

$resultado = mysql_query($consulta);

// Obtener los datos en un array
$datos = array();
while ($fila = mysql_fetch_assoc($resultado)) {
  $datos[] = $fila;
}

// Configuración de la paginación
$elementosPorPagina = 8;
$totalElementos = count($datos);
$totalPaginas = ceil($totalElementos / $elementosPorPagina);

// Obtener el número de página actual
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$inicio = ($paginaActual - 1) * $elementosPorPagina;
$fin = $inicio + $elementosPorPagina;
$elementosPagina = array_slice($datos, $inicio, $elementosPorPagina);
?>

<!-- Reemplaza el siguiente código HTML en el lugar correspondiente dentro de tu página -->
<div class="containerlista">
<form action="listaReportes.php" method="GET" class="mb-3" onsubmit="limpiarEspacios()">
  <div class="cntr">
    <div class="col-md-5">
      <input type="text" name="busqueda" class="form-control" placeholder="Ingrese nombre / Número de trámite / Cédula" value="<?php echo $busqueda; ?>">
    </div>
    <div class="">
      <button type="submit" class="btn btn-info">Buscar</button>
    </div>
  </div>
</form>

<table class="table table-striped">
  <thead class="text-center">
    <tr>
    <th>Fecha</th>
      <th>Nro. de Trámite</th>
      <th>Nombre Completo</th>
      <th>Agencia Ingresada</th>
      <th>Cedula</th>
      <th>Creado por</th>
      <th>Formulario</th>
      <!-- <th>Editar</th> -->

    </tr>
  </thead>
  <tbody class="text-center">
    <?php foreach ($elementosPagina as $elemento): ?>
    <tr>
      <td><?php echo $elemento['mfregistro']; ?></td>

      <td><?php $idform= $elemento['midformulariogeneral'] ; echo $elemento['midformulariogeneral']; ?></td>
      <td><?php echo $elemento['mnombresComp']; ?></td>
      <td><?php 
      // echo $elemento['mcreador']; 
      $consulta = mysql_query("SELECT t1.nombreAgencia
      FROM magencias AS t1
      INNER JOIN mlistareportes AS t2 ON t1.idAgencia = t2.magencia WHERE t2.midformulariogeneral='$idform';");
      $rowq = mysql_fetch_array($consulta);
      echo $rowq['nombreAgencia'];
      ?>
      </td>
      <td><?php 
      // echo $elemento['mcreador']; 
      $consulta = mysql_query("SELECT t1.midentificacion
      FROM mdatospersona AS t1
      INNER JOIN mlistareportes AS t2 ON t1.mcodigoperson = t2.mcodigoperson WHERE t2.midformulariogeneral='$idform';");
      $rowq = mysql_fetch_array($consulta);
      echo $rowq['midentificacion'];
      ?></td>


      <td><button class="btn"> <?php 
      // echo $elemento['mcreador']; 
      $consulta = mysql_query("SELECT t1.nombreUsuario
      FROM musuarios AS t1
      INNER JOIN mlistareportes AS t2 ON t1.idUsuario = t2.mcreador WHERE t2.midformulariogeneral='$idform';");
      $rowq = mysql_fetch_array($consulta);
      echo $rowq['nombreUsuario'];
      ?>
      </button></td>
      
      <td>
        <button class="btn btn-info" style="background-color: rgb(247, 150, 70); color: white; border:1px solid rgb(247, 150, 70);" onclick="redirigirPDF('<?php echo $elemento['midformulariogeneral']; ?>', '<?php echo $elemento['mcodigoperson']; ?>')">PDF</button>
      </td>
      <!-- <td>
        <button class="btn btn-info" style="background-color: red; color: white; border:1px solid rgb(247, 150, 70);" >Editar</button>
      </td> -->

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- Agrega los botones de página anterior y página siguiente -->
<div class="d-flex justify-content-center">
  <ul class="pagination">
    <?php if ($paginaActual > 1): ?>
      <li class="page-item">
        <a class="page-link" style="background-color: #17a2b8; color: white;" href="listaReportes.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $paginaActual - 1; ?>">Anterior</a>
      </li>
    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
      <?php if ($paginaActual > 3): ?>
        <li class="page-item">
          <a class="page-link" style=" color: #17a2b8;" href="listaReportes.php?busqueda=<?php echo $busqueda; ?>&pagina=1">1</a>
        </li>
        <li class="page-item disabled" >
          <a class="page-link" style="color: #17a2b8;" >...</a>
        </li>
      <?php endif; ?>

      <?php for ($i = max(1, $paginaActual - 1); $i <= min($paginaActual + 1, $totalPaginas); $i++): ?>
        <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
          <a class="page-link" style="color: #17a2b8; background-color: white; " href="listaReportes.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($paginaActual < $totalPaginas - 2): ?>
        <li class="page-item disabled">
          <a class="page-link"  style="color: #17a2b8;">...</a>
        </li>
        <li class="page-item">
          <a class="page-link" style=" color: #17a2b8;" href="listaReportes.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $totalPaginas; ?>"><?php echo $totalPaginas; ?></a>
        </li>
      <?php endif; ?>
    <?php endif; ?>

    <?php if ($paginaActual < $totalPaginas): ?>
      <li class="page-item">
        <a class="page-link" style="background-color: #17a2b8; color: white;" href="listaReportes.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
      </li>
    <?php endif; ?>
  </ul>
</div>

</div>

<script>

function abreVentana2()
    {
      var w=880;
      var h=660;
      var left = (screen.width/2)-(w/2);
      var top = (screen.height/2)-(h/2);
      // miPopup = window.open("client.php","ventana1","width=880,height=660,scrollbars=NO,toolbar=YES,location=YES,directories=YES,menubar=YES,titlebar=CONSULTA,copyhistory=yes,top="+top+",left="+left);



      // miPopup = window.open("client.php","PopUp",'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left)

      window.open("client.php","width=880,height=660,scrollbars=NO,toolbar=YES,location=YES,directories=YES,menubar=YES,titlebar=CONSULTA,copyhistory=yes,top="+top+",left="+left);

        menu();

      // miPopup.focus()
    }
function redirigirPDF(valor1, valor2) {
  var url = 'reportespdf.php?valor1=' + valor1 + '&valor2=' + valor2;
  window.open(url, '_blank');
}

function limpiarEspacios() {
    var input = document.querySelector('input[name="busqueda"]');
    input.value = input.value.trim();
  }
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
  function cerrarSesion() {
      window.location.href = "logout.php";
    }
</script>
</body>
</html>
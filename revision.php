<?php
 include_once 'administrator/conexiones/conectiondatos.php';
 include_once 'login/session_helper.php';
//  include_once 'page.php';
 conectar();
 verificar_sesion();
 function is_page_active($page_name) {
  // Obtenemos el nombre de la página actual sin la ruta
  $current_page = basename($_SERVER['PHP_SELF']);

  // Comparamos la página actual con la página del enlace
  if ($current_page === $page_name) {
    return "class='active'";
  }

  return ""; // Si no coincide, no agregamos la clase "active"
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AREA DE REVISION</title>
    <link rel="stylesheet" type="text/css" href="administrator/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/index.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/datos.css">
    <link rel="stylesheet" type="text/css" href="administrator/css/listaReportes.css">
    <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />
    <script src="administrator/css/style.js" language="javascript"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <script src="administrator/dc_ajax/dc-ajax.js" language="javascript"></script>
    <!-- <script src="page.js" language="javascript"></script> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
    <!-- <h6 class="form-title"><?php echo $rowq['mprincipal']; ?></h6> -->
  <!-- </nav> -->
  <div class="nav_menu_header3">
    <div class="nav_menu_header4">
      <lu><a <?php echo is_page_active('areatrabajo.php'); ?> href="areatrabajo.php">Carga de documentos</a></lu>
      <lu><a <?php echo is_page_active('revision.php'); ?> href="revision.php">Casos Recibidos</a></lu>
      <lu><a <?php echo is_page_active('procesocasos.php'); ?> href="procesocasos.php">Casos Aceptados</a></lu>
      <lu><a <?php echo is_page_active('resolucionescasos.php'); ?> href="resolucionescasos.php">Resolucion de caso</a></lu>
      <lu><a <?php echo is_page_active('historialcasos.php'); ?> href="historialcasos.php">Historial de caso</a></lu>
    </div>


      
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



$userRegister=$_SESSION['nombre_usuario'];

// Obtener el valor de búsqueda enviado por el formulario
// $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// // Construir la consulta SQL con el filtro de búsqueda
// $consulta = "SELECT mcodigoperson, midformulariogeneral, mnombresComp, mfregistro, mcreador,mstatusat, mobservacionat FROM mlistareportes WHERE ";

// if (!empty($busqueda)) {
//   $consulta .= "(midformulariogeneral LIKE '%$busqueda%' OR mnombresComp LIKE '%$busqueda%') AND mstatusat = 'R'";
// } else {
//   $consulta .= "mstatusat = 'R'";
// }
$busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : '';

// Construir la consulta SQL con el filtro de búsqueda
$consulta = "SELECT m.mcodigoperson, m.midformulariogeneral, m.mnombresComp,m.mstatusat, m.mfregistro, m.mcreador,m.mobservacionat, t1.midentificacion AS nombre_identificacion
FROM mlistareportes AS m
LEFT JOIN mdatospersona AS t1 ON m.mcodigoperson = t1.mcodigoperson
WHERE ";

if (!empty($busqueda)) {
  $consulta .= "(m.midformulariogeneral LIKE '%$busqueda%' OR m.mnombresComp LIKE '%$busqueda%' OR t1.midentificacion LIKE '%$busqueda%') AND m.mstatusat = 'R'";
} else {
  $consulta .= "m.mstatusat = 'R'";
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
<form action="revision.php" method="GET" class="mb-3" onsubmit="limpiarEspacios()">
  <div class="cntr">
    <div class="col-md-5">
      <input type="text" name="busqueda" class="form-control" placeholder="Ingrese nombre / Número de trámite / Cédula" value="<?php echo $busqueda; ?>">
    </div>
    <div class="">
      <button type="submit" class="btn btn-info">Buscar</button>
    </div>
  </div>
</form>
<!-- Modal para subir archivos -->


<table class="table table-striped">
  <thead>
    <tr>
    <th>Fecha</th>
      <th>Nro. de Trámite</th>
      <th>Nombre Completo</th>
      <th class="text-center">Formulario</th>
      <th class="text-center">Documentos Adjuntos</th>
      <th class="text-center">Estado Actual</th>

      <!-- <th class="text-center">Subir documentos</th> -->
      
      <th class="text-center">Acci&oacute;n</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($elementosPagina as $elemento): ?>
      <tr>
      <td><?php echo $elemento['mfregistro']; ?></td>

        <td><?php echo $elemento['midformulariogeneral']; ?></td>
        <td><?php echo $elemento['mnombresComp']; ?></td>
        <td class="text-center">
        <button class="btn btn-info" style="background-color: rgb(247, 150, 70); color: white; border:1px solid rgb(247, 150, 70);" onclick="redirigirPDF('<?php echo $elemento['midformulariogeneral']; ?>', '<?php echo $elemento['mcodigoperson']; ?>')">PDF</button>
      </td>
        <td class="text-center">
        <button class="btn btn-secondary btn-ver-doc" data-toggle="modal" data-target="#verArchivosModal" data-id="<?php echo $elemento['midformulariogeneral']; ?>">
            Ver
        </button>
        </td>
        <td class="text-center">
            <?php
            // echo  $elemento['mstatusat'];
            if ($elemento['mstatusat'] === 'R') {
                // Si el estado es 'D', mostramos el botón para abrir el modal con los detalles del trámite
                echo '<button class="btn btn-outline-info" onclick="mostrarDetalleTramite(\'R\', \'' . $elemento['midformulariogeneral'] . '\', \'' . $elemento['mobservacionat'] . '\')">En revisión</button>';
            } else {
                // Si el estado no es 'D', mostramos el botón para enviar la notificación (como en el código anterior)
                echo '-';
            }
            ?>
        </td>


        <!-- <td class="text-center">
          <button class="btn btn-secondary btn-subir-doc" data-toggle="modal" data-target="#myModal" data-id="<?php echo $elemento['midformulariogeneral']; ?>">
            Upload
          </button>
        </td> -->
        <td class="text-center">
        <button class="btn btn-info" data-toggle="modal" data-target="#notificarModal" data-id="<?php echo $elemento['midformulariogeneral']; ?>" onclick="mostrarNroTramite('<?php echo $elemento['midformulariogeneral']; ?>')">
            Enviar
            </button>

        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<!-- <div class="alert-container">
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Revision de caso</strong> <br>
    <lu>Revision de documentos</lu> <br>
    <lu>Revision de carga de documentos y envios</lu>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
</div> -->

<div class="modal fade" id="verArchivosModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Archivos Subidos</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <table class="table text-center" style="border:transparent;">
        <thead>
          <tr>
            <th>Nombre de Archivo</th>
            <th>Descripcion</th>
          </tr>
        </thead>
        <tbody id="archivosSubidosContent">
          <!-- Aquí se mostrarán los archivos subidos -->
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Agregar el modal para el botón "Notificar" -->
<div class="modal fade" id="notificarModal" tabindex="-1" role="dialog" aria-labelledby="notificarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="notificarModalLabel">Notificaciones - Número de Trámite: <span id="nroTramiteLabel"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Formulario para notificar -->
        <form id="notificarForm">
          <!-- Campo oculto para almacenar el nrodetramite -->
          <input type="hidden" id="nrodetramiteNotificar" name="nrodetramite" value="">
          <input type="hidden" id="userRegistro" name="userRegistro" value="<?php echo $userRegister; ?>">

          <div class="form-group">
            <label for="estadoSelect">Acción:</label>
            <select class="form-select" id="estadoSelect" name="estado">
              <option value="devuelto">Devolver</option>
              <option value="aceptado">Aceptar</option>
            </select>
          </div>
          <div class="form-group">
            <label for="observacionesTextarea">Observaciones:</label>
            <textarea class="form-control" id="observacionesTextarea" name="observaciones" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="fechaInput">Fecha:</label>
            <input type="date" class="form-control" id="fechaInput" name="fecha" readonly>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="guardarNotificacion()">Guardar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal para mostrar detalles del trámite -->
<div class="modal fade" id="detalleTramiteModal" tabindex="-1" role="dialog" aria-labelledby="detalleTramiteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detalleTramiteModalLabel">Estado Trámite</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="estadoActualModal">Estado Actual:</label>
          <input type="text" id="estadoActualModal" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="nroTramiteModal">Número de Trámite:</label>
          <input type="text" id="nroTramiteModal" class="form-control" readonly>
        </div>
        <div class="form-group">
          <label for="observacionesModal">Observaciones:</label>
          <textarea class="form-control" id="observacionesModal" rows="3" readonly></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Agrega los botones de página anterior y página siguiente -->
<div class="d-flex justify-content-center">
  <ul class="pagination">
    <?php if ($paginaActual > 1): ?>
      <li class="page-item">
        <a class="page-link" style="background-color: #17a2b8; color: white;" href="revision.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $paginaActual - 1; ?>">Anterior</a>
      </li>
    <?php endif; ?>

    <?php if ($totalPaginas > 1): ?>
      <?php if ($paginaActual > 3): ?>
        <li class="page-item">
          <a class="page-link" style=" color: #17a2b8;" href="revision.php?busqueda=<?php echo $busqueda; ?>&pagina=1">1</a>
        </li>
        <li class="page-item disabled" >
          <a class="page-link" style="color: #17a2b8;" >...</a>
        </li>
      <?php endif; ?>

      <?php for ($i = max(1, $paginaActual - 1); $i <= min($paginaActual + 1, $totalPaginas); $i++): ?>
        <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
          <a class="page-link" style="color: #17a2b8; background-color: white; " href="revision.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
        </li>
      <?php endfor; ?>

      <?php if ($paginaActual < $totalPaginas - 2): ?>
        <li class="page-item disabled">
          <a class="page-link"  style="color: #17a2b8;">...</a>
        </li>
        <li class="page-item">
          <a class="page-link" style=" color: #17a2b8;" href="revision.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $totalPaginas; ?>"><?php echo $totalPaginas; ?></a>
        </li>
      <?php endif; ?>
    <?php endif; ?>

    <?php if ($paginaActual < $totalPaginas): ?>
      <li class="page-item">
        <a class="page-link" style="background-color: #17a2b8; color: white;" href="revision.php?busqueda=<?php echo $busqueda; ?>&pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
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
</script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script>
  function cerrarSesion() {
      window.location.href = "logout.php";
    }
</script>
<script>
function objetoAjax() {
  var xmlhttp = false;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function enviarDatos() {
  // Obtener el formulario y los datos del archivo seleccionado
  var form = document.getElementById("uploadForm");
  var formData = new FormData(form);

  // Obtener el valor de "midformulariogeneral"
  var midformulariogeneralValue = document.getElementById("filaId").value;
  var titulo = document.getElementById("titulo").value;

  // Agregar el valor de "midformulariogeneral" al objeto FormData
  formData.append("midformulariogeneral", midformulariogeneralValue);
  formData.append("titulo", titulo);

  // Crear el objeto AJAX
  var ajax = objetoAjax();

  // Configurar la función de respuesta
  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        // Manejar la respuesta del servidor (opcional)
        alert(ajax.responseText);
      } else {
        // Manejar el error (opcional)
        alert("Error al subir el archivo: " + ajax.statusText);
      }
    }
  };

  // Enviar la solicitud AJAX
  ajax.open("POST", "utils/upload.php", true);
  ajax.send(formData);
}

// Asignar el valor de "midformulariogeneral" al campo oculto antes de abrir el modal
$(".btn-subir-doc").click(function() {
  var midformulariogeneral = $(this).data("id");
  $("#filaId").val(midformulariogeneral);
});

// Función para obtener y mostrar los archivos subidos en el modal
function mostrarArchivosSubidos(midformulariogeneral) {
  // Crear el objeto AJAX
  var ajax = objetoAjax();

  // Configurar la función de respuesta
  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        // Manejar la respuesta del servidor
        var response = ajax.responseText;
        document.getElementById("archivosSubidosContent").innerHTML = response;
      } else {
        // Manejar el error (opcional)
        alert("Error al obtener los archivos subidos: " + ajax.statusText);
      }
    }
  };

  // Realizar una solicitud AJAX para obtener los archivos subidos para el "midformulariogeneral"
  var url = "utils/getFiles.php"; // Reemplaza "getFiles.php" con el archivo que obtiene los archivos subidos desde la base de datos.
  var params = "midformulariogeneral=" + midformulariogeneral;
  ajax.open("POST", url, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send(params);
}

// Asignar el valor de "midformulariogeneral" al botón "Ver" antes de abrir el modal
$(".btn-ver-doc").click(function() {
  var midformulariogeneral = $(this).data("id");
  mostrarArchivosSubidos(midformulariogeneral);
});

function mostrarNroTramite(nroTramite) {
  document.getElementById("nroTramiteLabel").textContent = nroTramite;
}

function guardarNotificacion() {
  // Obtener los valores del formulario
//   var nrodetramite = document.getElementById("nrodetramiteNotificar").value;
    var nrodetramite = document.getElementById("nroTramiteLabel").textContent;
    var usuario= document.getElementById("userRegistro").value;

  console.log(nrodetramite);
  var accion = document.getElementById("estadoSelect").value;
  var observaciones = document.getElementById("observacionesTextarea").value;
  var fecha = document.getElementById("fechaInput").value;

  // Crear el objeto AJAX
  var ajax = objetoAjax();

  // Configurar la función de respuesta
  ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        // Manejar la respuesta del servidor (opcional)
        alert("Notificación guardada correctamente");
        location.reload();
        // Aquí podrías hacer algo más, como actualizar la interfaz o mostrar un mensaje al usuario
      } else {
        // Manejar el error (opcional)
        alert("Error al guardar la notificación: " + ajax.statusText);
      }
      // Cerrar el modal después de procesar la respuesta
      $("#notificarModal").modal("hide");
    }
  };

  // Realizar una solicitud AJAX para guardar la notificación en la base de datos
  var url = "utils/guardar_notificacion.php"; // Reemplaza "guardar_notificacion.php" con el archivo que procesa los datos en el servidor.
  var params = "nrodetramite=" + nrodetramite + "&accion=" + accion + "&observaciones=" + observaciones + "&fecha=" + fecha+ "&user=" + usuario;
  ajax.open("POST", url, true);
  ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  ajax.send(params);
}


function mostrarDetalleTramite(estado, nroTramite, observaciones) {
  var modal = document.getElementById("detalleTramiteModal");
  var estadoActualInput = document.getElementById("estadoActualModal");
  var nroTramiteInput = document.getElementById("nroTramiteModal");
  var observacionesInput = document.getElementById("observacionesModal");
  console.log(estadoActualInput.value);
  // Establecer los valores en el modal
  estadoActualInput.value = estado === 'R' ? 'En revision' : '-';
  
  nroTramiteInput.value = nroTramite;
  observacionesInput.value = observaciones;

  // Mostrar el modal
  $(modal).modal("show");
}

const fechaActual = new Date().toISOString().split("T")[0];

// Asignar la fecha actual al campo de entrada
document.getElementById("fechaInput").value = fechaActual;


function limpiarEspacios() {
    var input = document.querySelector('input[name="busqueda"]');
    input.value = input.value.trim();
  }
  window.addEventListener('load', function() {
  var alertElement = document.querySelector('.alert');
  alertElement.classList.add('fade-in'); // Agregar la clase para el efecto de fade
});

</script>




</body>
</html>
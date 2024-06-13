<?php
 include_once 'administrator/conexiones/conectiondatos.php';
 include_once 'login/session_helper.php';
 conectar();
 verificar_sesion();

?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>JAKAY</title>
        <link rel="stylesheet" type="text/css" href="administrator/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="administrator/css/index.css">
        <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="dc_ajax/dc-ajax.js" language="javascript"></script>
    <script src="administrator/css/style.js" language="javascript"></script>
    
    <script type="text/javascript">

    var miPopup
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


    </script>
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
    <button  type="button" onclick="cerrarSesion()" class="btn btn-dark">Cerrar sesi&oacute;n</button>
    </div>

  </nav>
  <div class="nav_menu_user">
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
      <li><a class="route" href="registro.php" target="">Registrar</a></li>
      <!-- <li><a class="route" href="registro.php">Registrar</a></li> -->
      <!-- <li><a class="route" href="client.php" target="_blank">Formulario de reclamo</a></li> -->
      <!-- <li><a class="route" href="login/index.php">Login</a></li> -->
      <!-- <li><a class="route" href="register/register.php">Register</a></li> -->
      
    </ul>
  </nav>
  </div>
  

</body>
<div class="bg fade-in-image">
   <img src="administrator/images/jakay LOGOTIPO.png" alt="jakay_tio_logo.png"width="520">
  
</div>
<script>
  function cerrarSesion() {
      window.location.href = "logout.php";
    }
</script>
<footer class="form_footer">
   <img src="administrator/images/jakay logo.png" alt="pilahuin_tio_logo.png"

     width="60">
     <div class="footer_text">
       <i class='bx bx-copyright'></i>
     <span>Developed by Jakay</span>
     </div>
     
</footer>
</html>
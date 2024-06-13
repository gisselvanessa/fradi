<?php
/**
 * Este include once me trae la funcion conectar() que realiza la conexion a la base de datos 'dbnotiftarjetas'
 */
 include_once 'administrator/conexiones/conectiondatos.php';
  conectar();

/**
 * Esta funcion propio de php verifica si el usuario ha realizado un inicio de sesión.
 *  Si el usuario esta loggeado lo envia a la pagina home.php y si no lo esta lo envia al index, donde puede realizar el inicio de sesión
 */
session_start();

if (isset($_SESSION['id_usuario'])) {
    $currentURL = $_SERVER['REQUEST_URI'];
    $homeURL = '/notificaciones/home.php';
    header("Location: home.php");
    exit;
}


?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>INICIO</title>
        <link rel="stylesheet" type="text/css" href="administrator/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="administrator/css/index.css">
        <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="administrator/dc_ajax/dc-ajax.js" language="javascript"></script>
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
    <div class="center">
    <button type="button" onclick="iniciarSesion()" class="btn btn-dark">Iniciar sesion</button>


    <!-- <h6 class="form-title">HOME</h6> -->
    </div>

  </nav>
  <div class="nav_menu_header">
  
  </div>
  
  

</body>
<div class="bg fade-in-image">
   <img src="administrator/images/jakay LOGOTIPO.png" alt="jakay_tio_logo.png"width="520">
  
</div>
<script>
    function iniciarSesion() {
        window.location.href = "login/index.php";
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
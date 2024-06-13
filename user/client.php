<?php
 include_once 'conexiones/conectiondatos.php';
 include_once '../login/session_helper_user.php';
 conectar();
 verificar_sesion();
  

?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>CONSULTA CLIENTE</title>
        <link rel="stylesheet" type="text/css" href="../administrator/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../administrator/css/index.css">
        <link rel="stylesheet" type="text/css" href="../administrator/css/datos.css">
        <link rel="shortcut icon" href="../administrator/images/jakay LOGOTIPO.png" />


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <script src="dc_ajax/dc-ajax.js" language="javascript"></script>
    <!-- <script src="administrator/css/style.js" language="javascript"></script> -->
 
</head>

<body>
  <!-- <nav class="nav-form ">
      <a href="index.php"><img src="administrator/images/LOGO  PTIO ILUSTRADOR.png" alt="pilahuin_tio_logo.png"
     width="150"></a>
 -->    <!-- 
     <?php 
    $consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M7'"); 
    $rowq = mysql_fetch_array($consultaTitulos1)
    ?> -->

<nav class="nav-form ">
      <a href="home.php"><img src="../administrator/images/LOGO  PTIO ILUSTRADOR.png" alt="pilahuin_tio_logo.png"
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
    <div class="nav_menu_header3">
    CONSULTA DE CLIENTE
    
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
  </nav>
    <!-- <h6 class="form-title"><?php echo $rowq['mprincipal']; ?></h6> -->
  <!-- </nav> -->
  <div class="nav_menu_header1">
    <?php 
    $consultaTitulos1=mysql_query("select * from mtitulos where midmtitulo='M7'"); 
    $rowq = mysql_fetch_array($consultaTitulos1)
    ?>
    <h6 class="form-title"><?php echo $rowq['mprincipal']; ?></h6> 
    
  </div>

  
  <!-- <div  id="hamburger" class="hamburger">
      <div onClick="menu(id)"><i class='bx bx-menu'></i></div>
</div> -->

<!-- <nav class="menuppal">
    <ul>
      <li><a href="#">Opcion 1</a></li>
      <li><a href="#">Opcion 2</a></li>
      <li><a href="#">Opcion 3</a></li>
      <li><a href="#">Opcion 4</a></li>
    </ul>
  </nav> -->
<div class="body_container">
  
<table  class="index_table"  border="1" align="center">
  <tbody>
                     <tr>
                       <!-- <td> -->
                    
                              <form class="form1" id="form1" name="form1" method="post" action="" >
                                <div class="form1_bg">
                                  <div class="form1_container">
                                    <div class="">
                                  
                                      <input type="text" name="textfield" id="textfield"  autofocus class=" text-center form1_input" placeholder="Ingrese la identificacion a consultar">
                                      <!-- <label for="floatingInput">Ingrese la identificación a consultar</label> -->
                                    </div>
                                    <div class="">
                                      <!-- <button  class="button form1_input2 " type="button" name="submit2" id="submit2" value="Enviar" onClick="BuscadorRegistros();" >Consultar</button> -->

                                      <button  class="button form1_input2 " type="button" name="submit2" id="submit2" value="Enviar" onClick="BuscadorRegistrosUser();" >Consultar</button>

                                     <!--  <button  class="button form1_input2 " type="button" name="submit2" id="submit2" value="Enviar"><a href="client.php">Consultar</a></button> -->
                                      
                                    </div>
                                    
                                  </div>
                                      <div id="consultares" ></div>
                                  <div class="" align="center">
                                      <a href="client.php">Limpiar1</a>
                                  </div>
                                </div>
                                  
                              </form>
                           
                         <!-- </td> -->
                     </tr>
                  
  </tbody>
</table>
    <div class="client_data_container">
      <form id="form3" class="form3" name="form3" method="post" action="formulario.php">
                
                      <div  class=" client_data" id="consultapersonas"></div>

                        <!-- <div class="form_btn">
                            <input  class="button" type="submit" name="submit" id="submit" value="Enviar al Formulario">
                          
                        </div> -->
        </form>
    </div>
</div>
</body>
<script>
  function cerrarSesion() {
      window.location.href = "logout.php";
    }
</script>
<!-- <footer class="form_footer">
   <img src="administrator/images/jakay logo.png" alt="pilahuin_tio_logo.png"
     width="120">
</footer> -->
</html>
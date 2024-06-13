<?php
include_once '../administrator/conexiones/conectiondatos.php';
conectar();

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Controversias | Registrar</title>
  <script src="https://kit.fontawesome.com/0c967d4f4f.js" crossorigin="anonymous"></script>
  <!-- <script src="administrator/js/bootstrap.bundle.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">


  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><link rel="stylesheet" href="register.css">
 
</head>
<body class="">
    <div class="">
    
        <div class="contenido-login">
        <div class="logo-pilahuin">
                <a href="home.php"><img src="../images/jakay LOGOTIPO.png" alt="Logo Pilahuin Tio"  width="150px"></a>
                
            </div>
        
            <div class="login-pilahuin">
                <div class="titulo">
                    <h1>Regístrate</h1>
                </div>
                
                <form action="registerBD.php" method="post">
                    <div class="informacion">

                        <input id="ip" name="ip" type="hidden" <?php echo 'value="'.$ipCliente.'"'; ?>>

                        <div class="form-group">
                            <label for="correo">Nombres:</label>
                            <span class="p-float-label">
                                <input class="form-control" id="nombres" value="Gissel V" name="nombres" type="text" required>
                                <!-- <label for=" correo">Correo</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="correo">Apellidos:</label>
                            <span class="p-float-label">
                                <input class="form-control" id="apellidos" value="Cabasc Anr" name="apellidos" type="text" required>
                                <!-- <label for=" correo">Correo</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="clave">Cedula:</label>
                            
                            <span class="p-float-label">
                                <input class="form-control" id="cedula" value="17162479" name="cedula" type="text" required >
                                <!-- <label for="float-input clave">Clave</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="correo">Nombre de usuario:</label>
                            <span class="p-float-label">
                                <input class="form-control" id="nombreUsuario" value="gessa" name="nombreUsuario" type="text" required>
                                <!-- <label for=" correo">Correo</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            
                            <span class="p-float-label">
                                <input class="form-control" id="email" value="gisse@gmail.com" name="email" type="email" required >
                                <!-- <label for="float-input clave">Clave</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="clave">Contraseña:</label>
                            
                            <span class="p-float-label">
                                <input class="form-control" id="password" value="123456789" name="password" type="password" required>
                                <!-- <label for="float-input clave">Clave</label> -->
                            </span>
                        </div>
                        
                        
                        <div class="form-group">
                            <!-- <label for="clave">Rol:</label>
                            
                            <span class="p-float-label">
                                <input id="rol" name="rol" type="text" >
                            </span> -->
                            <label for="select">Rol:</label>
                            <select class="form-select" name="rol">
                                <?php
                                $consulta = "SELECT * FROM mroles WHERE status = 1";
                                $resultado = mysql_query($consulta);
                                
                                while ($rowq = mysql_fetch_array($resultado)) {
                                    if($rowq['idRol']!= 1){
                                        $idRol = $rowq['idRol'];
                                        $descripcionRol = $rowq['descripcionRol'];
                                        $selected = ($idRol == 2) ? 'selected' : ''; // Establecer el atributo selected si corresponde
                                        
                                        echo '<option value="'.$idRol.'" '.$selected.'>'.$descripcionRol.'</option>';
                                        }
                                }
                                ?>
                            </select>


                        </div>
                        <!-- departamentos -->
                        <div class="form-group">
                           
                            <label for="select">Departamento:</label>
                            <select class="form-select"  name="departamento">
                                <?php
                                $consulta = "SELECT * FROM mdepartamentos WHERE status = 1";
                                $resultado = mysql_query($consulta);
                                
                                while ($rowq = mysql_fetch_array($resultado)) {
                                    $idDepartamento = $rowq['idDepartamentos'];
                                    $nombreDepartamento = $rowq['nombreDepartamento'];
                                    $selected = ($idDepartamento == 1) ? 'selected' : ''; // Establecer el atributo selected si corresponde
                                    
                                    echo '<option value="'.$idDepartamento.'" '.$selected.'>'.$nombreDepartamento.'</option>';
                                }
                                // echo '<input type="text" value="'.$idDepartamento.'" '.$selected.'" '.$nombreDepartamento.'>';
                                ?>
                                
                            </select>
                        </div>

                         <!-- cargos  -->
                        <div class="form-group">
                       
                            <label for="select">Cargo:</label>
                            <select class="form-select" name="cargo">

                                <?php
                                $consulta = "SELECT a.idCargos, a.nombreCargo FROM mcargos AS a INNER JOIN mdepartamentos AS b ON a.idDepartamentos = b.idDepartamentos WHERE a.status = 1";
                                $resultado = mysql_query($consulta);
                                
                                while ($rowq = mysql_fetch_array($resultado)) {
                                    $idCargo = $rowq['idCargos'];
                                    $nombreCargo = $rowq['nombreCargo'];
                                    $selected = ($idCargo == $_POST['cargo']) ? 'selected' : ''; // Compara con el valor previamente seleccionado
                                    
                                    echo '<option value="'.$idCargo.'" '.$selected.'>'.$nombreCargo.'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        
                        <div class="button">
                            <button class="button-sesion"  type="submit">Sign Up</button>
                        </div>
                        <div class="login">
                            <span>Ya tienes una cuenta?</span>
                            <a  href="../login/index.php">Ingresa</a>
                            
                        </div>
                      
                    </div>
                </form>
            </div>
        </div>
        <!-- <p-toast position="top-right"></p-toast> -->
    </div>
    <!-- <script src="obtener_mac.js"></script> -->
    
<!-- // Función para obtener la dirección MAC utilizando JavaScript -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script>
</body>

</html>
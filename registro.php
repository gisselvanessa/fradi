<?php
include_once 'administrator/conexiones/conectiondatos.php';
include_once 'login/session_helper.php';
conectar();
verificar_sesion();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Controversias | Registrar</title>
  <script src="https://kit.fontawesome.com/0c967d4f4f.js" crossorigin="anonymous"></script>
  <!-- <script src="administrator/js/bootstrap.bundle.min.js"></script> -->
  <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <!-- <script src="administrador/js/sweetalert2.all.min.js"></script> -->
    <script src="
https://cdn.jsdelivr.net/npm/sweetalert2@11.7.16/dist/sweetalert2.all.min.js
"></script>
<link rel="stylesheet" href="administrator/css/sweetalert2.min.css">
    <script src="administrator/js/sweetalert2.min.js"></script>

  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"><link rel="stylesheet" href="register/register.css">
 
</head>
<body class="alert-container" id="alert-container" name="alert-container">
    <div class="">
    
        <div class="contenido-login">
            <div class="logo-pilahuin">
                <a href="home.php"><img src="administrator/images/jakay LOGOTIPO.png" alt="Logo Pilahuin Tio"  width="150px"></a>
                
            </div>
        
            <div class="login-pilahuin">
                <div class="titulo">
                    <h1>Regístrate</h1>
                </div>
                
                <form action="register/registerBD.php" method="post">
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
                        
                         <!-- cargos  -->
                         <div class="form-group">
                            <label for="select">Agencia:</label>
                            <select class="form-select" name="agencia" required>
                                <option value="" disabled selected>Selecciona una agencia</option>
                                <?php
                                $consulta = "SELECT * FROM magencias WHERE status = 1";
                                $resultado = mysql_query($consulta);

                                while ($rowq = mysql_fetch_array($resultado)) {
                                    $idAgencia = $rowq['idAgencia'];
                                    $nombreAgencia = $rowq['nombreAgencia'];
                                    echo '<option value="' . $idAgencia . '">' . $nombreAgencia . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        
                   <div class="form-group">
                        <label for="select">Rol:</label>
                        <select class="form-select" name="rol" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            <?php
                            $consulta = "SELECT * FROM mroles WHERE status = 1";
                            $resultado = mysql_query($consulta);

                            while ($rowq = mysql_fetch_array($resultado)) {
                                $idRol = $rowq['idRol'];
                                $descripcionRol = $rowq['descripcionRol'];
                                echo '<option value="' . $idRol . '">' . $descripcionRol . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                        <!-- departamentos -->
                        <div class="form-group">
                            <label for="select">Departamento:</label>
                            <select class="form-select" name="departamento" required>
                                <option value="" disabled selected>Selecciona un departamento</option>
                                <?php
                                $consulta = "SELECT * FROM mdepartamentos WHERE status = 1";
                                $resultado = mysql_query($consulta);

                                while ($rowq = mysql_fetch_array($resultado)) {
                                    $idDepartamento = $rowq['idDepartamentos'];
                                    $nombreDepartamento = $rowq['nombreDepartamento'];
                                    echo '<option value="' . $idDepartamento . '">' . $nombreDepartamento . '</option>';
                                }
                                ?>
                            </select>
                        </div>


                         <!-- cargos  -->
                         <div class="form-group">
                            <label for="select">Cargo:</label>
                            <select class="form-select" name="cargo" required>
                                <option value="" disabled selected>Selecciona un cargo</option>
                                <?php
                                $consulta = "SELECT a.idCargos, a.nombreCargo FROM mcargos AS a INNER JOIN mdepartamentos AS b ON a.idDepartamentos = b.idDepartamentos WHERE a.status = 1";
                                $resultado = mysql_query($consulta);

                                while ($rowq = mysql_fetch_array($resultado)) {
                                    $idCargo = $rowq['idCargos'];
                                    $nombreCargo = $rowq['nombreCargo'];
                                    echo '<option value="' . $idCargo . '">' . $nombreCargo . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        
                       
                        <!-- <div class="login">
                            <span>Ya tienes una cuenta?</span>
                            <a  href="../login/index.php">Ingresa</a>
                            
                        </div> -->
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
                            <label for="password">Ingresa la contraseña:</label>
                            <div class="input-group">
                                <input class="form-control" id="password" name="password" type="password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="verContrasena('password')">
                                        <i class="fa fa-eye" id="icono_nueva_clave2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password2">Ingresa nuevamente la contraseña:</label>
                            <div class="input-group">
                                <input class="form-control" id="password2" name="password2" type="password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="verContrasena('password2')">
                                        <i class="fa fa-eye" id="icono_nueva_clave2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div id="error-mensaje" style="color: red;"></div>
                            
                        <div class="button">
                            <button class="button-sesion"  type="submit">Sign Up</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        <!-- <p-toast position="top-right"></p-toast> -->
    </div>
    <!-- <script src="obtener_mac.js"></script> -->
    
<!-- // Función para obtener la dirección MAC utilizando JavaScript -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/js/bootstrap.min.js"></script> -->
    <script>
    document.querySelector("form").addEventListener("submit", function(event) {
        var nueva_clave = document.getElementById("password").value;
        var nueva_clave2 = document.getElementById("password2").value;
        var errorMensaje = document.getElementById("error-mensaje");

        if (nueva_clave !== nueva_clave2) {
            errorMensaje.textContent = "Las contraseñas no coinciden.";
            event.preventDefault(); // Evita que se envíe el formulario
        } else {
            errorMensaje.textContent = ""; // Limpia el mensaje de error si las contraseñas coinciden
        }
    });
    function verContrasena(inputId) {
        var inputElement = document.getElementById(inputId);
        var iconoElement = document.getElementById("icono_" + inputId);

        if (inputElement.type === "password") {
            inputElement.type = "text";
            iconoElement.classList.remove("fa-eye");
            iconoElement.classList.add("fa-eye-slash");
        } else {
            inputElement.type = "password";
            iconoElement.classList.remove("fa-eye-slash");
            iconoElement.classList.add("fa-eye");
        }
    }
</script>
</body>

</html>
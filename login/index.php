<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Controversias | Login</title>
  <script src="https://kit.fontawesome.com/0c967d4f4f.js" crossorigin="anonymous"></script>
  <!-- <script src="administrator/js/bootstrap.bundle.min.js"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="shortcut icon" href="administrator/images/jakay LOGOTIPO.png" />



  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="login.css" rel="stylesheet">

</head>
<body class="">
    <div class="">
        <div class="contenido-login">
        <div class="logo-pilahuin">
                <a href="../home.php"><img src="../administrator/images/jakay LOGOTIPO.png" alt="Logo Jakay"  width="150px"></a>
                
            </div>
        
            <div class="login-pilahuin">
                <div class="titulo">
                    <h1>Iniciar Sesión</h1>
                </div>
                <form action="auth.php" method="post">
                    <div class="informacion">
                        <div class="oficina">
                            <!-- <label for="oficina">Oficina:</label> -->
                            
                            
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <span class="p-float-label">
                                <input class="form-control" id="correo" name="correo" type="text" value="gisse888@gmail.com" >
                                <!-- <label for=" correo">Correo</label> -->
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="idUser" value="<?php echo $idUsuario ?>">
                            <label for="clave">Contraseña:</label>
                            <div class="input-group">
                                <input class="form-control" id="clave" value="123456" name="password" type="password" required>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-secondary" onclick="verContrasena('clave')">
                                        <i class="fa fa-eye" id="icono_nueva_clave"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="button">
                            <button class="button-sesion"  type="submit">Aceptar</button>
                        </div>
                        <!-- <div class="login">
                            <span>No tienes una cuenta?</span>
                            <a href="../register/register.php">Regístrate</a>
                        </div> -->
                    </div>
                </form>
                <div>
                    <a href="resetpass/forgot_password.php">¿Has olvidado tu contraseña?</a>
                </div>
            </div>
        </div>
        <!-- <p-toast position="top-right"></p-toast> -->
    </div>
<!-- <script src="index.js"></script> -->
<script>
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
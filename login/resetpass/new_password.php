<?php
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $correo = $_POST['correo'];
    include_once '../../administrator/conexiones/conectiondatos.php';
    conectar();

//     // Evitar SQL injection utilizando prepared statements (MySQLi)
//     $correo = mysql_real_escape_string($correo);

//     // Consulta para verificar si el correo existe y tiene mresetpassword igual a 1
//     $sql = "SELECT * FROM musuarios WHERE email = '$correo' AND mresetpassword = 1";
//     $result = mysql_query($sql);

//     if (!$result) {
//         die("Error al obtener id de usuario: " . mysql_error($con));
//     }

//     // Verificar si se encontraron resultados
//     if (mysql_num_rows($result) > 0) {
//         // Si el correo existe y tiene mresetpassword igual a 1, mostrar formulario para cambiar la contraseña
        
        if( isset($_GET['jvab'])){
            $token=$_GET['jvab'];
            $fechaActual= date('Y-m-d H:i:s');
            $sql = "SELECT * FROM musuarios WHERE musertoken = '$token' AND mresetpassword = 1";
                $result = mysql_query($sql);

                $sql2= "SELECT fechaModificacion FROM musuarios WHERE musertoken = '$token' AND mresetpassword = 1";
                $result2= mysql_query($sql2);
                // echo $fechaDB;
                
                if (!$result) {
                    die("Error al obtener id de usuario: " . mysql_error());
                    
                }
                if (mysql_num_rows($result) > 0) 
                {
                    if (mysql_num_rows($result2) > 0) 
                    {
                        // Fetch the row and access the fechaModificacion value
                        $row = mysql_fetch_assoc($result2);
                        $fechaDB = $row['fechaModificacion'];

                        $rowUser = mysql_fetch_assoc($result);
                        $idUsuario = $rowUser['idUsuario'];

                        $fechaDB_timestamp = strtotime($fechaDB);

                        // Get the current timestamp
                        $current_timestamp = time();

                        // Calculate the difference in seconds between the current timestamp and database timestamp
                        $time_difference = $current_timestamp - $fechaDB_timestamp;

                        // Check if the difference is less than 2 minutes (120 seconds)
                        if ($time_difference <= 3600) {
                            
                                                        
                    
        ?>
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
    <link rel="shortcut icon" href="../../administrator/images/jakay LOGOTIPO.png" />


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../login.css" rel="stylesheet">
</head>

<body class="">
<div class="contenido-login">
    <div class="logo-pilahuin">
      <a href="../../home.php">
        <img src="../../administrator/images/jakay LOGOTIPO.png" alt="Logo Jakay" width="150px">
      </a>
    </div>

  
  <div class="login-pilahuin">
    <div class="titulo">
        <h3>Crear nueva contraseña</h3>
    </div>

    <form action="reset_password_action.php" method="post">
        <div class="form-group">
            <input type="hidden" name="idUser" value="<?php echo $idUsuario ?>">
            <label for="nueva_clave">Nueva contraseña:</label>
            <div class="input-group">
                <input class="form-control" id="nueva_clave" name="nueva_clave" type="password" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="verContrasena('nueva_clave')">
                        <i class="fa fa-eye" id="icono_nueva_clave"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="nueva_clave2">Ingresa nuevamente la contraseña:</label>
            <div class="input-group">
                <input class="form-control" id="nueva_clave2" name="nueva_clave2" type="password" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" onclick="verContrasena('nueva_clave2')">
                        <i class="fa fa-eye" id="icono_nueva_clave2"></i>
                    </button>
                </div>
            </div>
        </div>

        <button class="button-sesion" type="submit">Cambiar contraseña</button>
    </form>

    <div id="error-mensaje" style="color: red;"></div>
</div>

<script>
    document.querySelector("form").addEventListener("submit", function(event) {
        var nueva_clave = document.getElementById("nueva_clave").value;
        var nueva_clave2 = document.getElementById("nueva_clave2").value;
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </body>
    <?php
    } else {//else del tiempo
        $rowUser = mysql_fetch_assoc($result);
        $idUsuario = $rowUser['idUsuario'];
       
        $sql3 = "UPDATE musuarios SET musertoken = null, mresetpassword = 0 WHERE idUsuario=$idUsuario ";
        mysql_query($sql3);
        header('Location: ../index.php');
        exit();
        
        // echo "The difference is more than 2 minutes.";
    }        
                }//if de fecha
    } else {// if(isset)
        // Si el correo no existe o mresetpassword no es igual a 1, mostrar mensaje de error
        header('Location: ../index.php');
        exit();
    }

    // No olvides cerrar la conexión a la base de datos al finalizar
    mysql_close();
}
?>

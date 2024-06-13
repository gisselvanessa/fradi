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

    <!-- reset_password_form.php -->

    <div class="login-pilahuin">
                <div class="titulo">
                    <h3>Verificar correo</h3>
                </div>
                <!-- forgot_password.php -->
                <form action="new_password.php" method="post">

                    <div class="form-group">
                        <label for="correo">Correo electrónico:</label>
                        <input class="form-control" id="correo" name="correo" type="email" required>
                    </div>
                    <button type="submit" class="button-sesion" >Verificar correo</button>
                    
                </form>
            </div>
    
  </div>

  <!-- <script src="index.js"></script> -->

    
</body>

</html>

<style>
        body {
            background-color: #ffffff;
            background-repeat: no-repeat;
            background-position: top left;
            background-attachment: fixed;
        }

        h1 {
            text-align: center;
            font-family: Helvetica, sans-serif;
            color: #000000;
            background-color: #ffffff;
        }

        p {
            text-align: center;

            font-family: Georgia, serif;
            font-size: 14px;
            font-style: normal;
            font-weight: normal;
            color: #000000;
            background-color: #ffffff;
        }
        .container{
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: center;
            justify-content: center;
            align-items: center;
        }
    </style>
<?php

include_once '../../administrator/conexiones/conectiondatos.php';
conectar();

$correo=$_POST['correo'];
$correo = mysql_real_escape_string($correo);
// echo $correo;
$fecha=date('Y-m-d H:i:s');
$sql = "SELECT * FROM musuarios WHERE email = '$correo'";
$result = mysql_query($sql);

if (!$result) {
    die("Error al obtener id de usuario: " . mysql_error($con));
}

$row = mysql_fetch_assoc($result);
if ($row) {
    if ($row['mresetpassword']!= 1) {

    // echo $row['nombreUsuario'];
    // echo "Solicitud enviada!";
    $length = 32; // Longitud del token
    $token = '';
    
    // Caracteres permitidos para el token
    $caracteresPermitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Obtenemos el número de caracteres permitidos
    $numCaracteres = strlen($caracteresPermitidos);

    for ($i = 0; $i < $length; $i++) {
        // Generamos un número aleatorio entre 0 y el número de caracteres permitidos - 1
        $indiceAleatorio = rand(0, $numCaracteres - 1);
    
        // Agregamos el caracter correspondiente al token
        $token .= $caracteresPermitidos[$indiceAleatorio];
    }
    



    $consuls1 = "UPDATE musuarios SET mresetpassword=1, musertoken='$token', fechaModificacion='$fecha' WHERE email='$correo'";
                  mysql_query($consuls1);
                  try{
                    $accessToken = 'eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJhbmRyZXMucXVpbmNoZWUiLCJpYXQiOjE2OTA1NTg4OTEsImV4cCI6MTY5MDU3Njg5MX0.87gVN5084KByvbokZaAVAuZJ98PpYpykKiDYfmLycTcpH6s9YLBVcSh0L15CStPUBCK5G8VAAAnRBM4xKY1rPg';


                    //////// nuevo codigo

                    
    // Datos para el objeto JSON
    $data = array(
    "token" => $token // Asegúrate de definir $token con el valor correcto
    );

    // Construir el JSON
    $jsonData = json_encode($data);

    // URL del servicio
    // $correo = '...'; // Asegúrate de definir $correo con el valor correcto
    $url = 'http://jakaysa-boto-qa-env.eba-mfbqqmgn.us-east-1.elasticbeanstalk.com/api/v1/venviopdf/enviarreset/' . $correo;

    // Cabeceras de la solicitud
    $headers = array(
        'Content-Type: application/json',
    );

    // Configurar el contexto para la solicitud
    $opts = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => implode("\r\n", $headers),
            'content' => $jsonData,
        ),
    );

    $context = stream_context_create($opts);

    // Realizar la solicitud y obtener la respuesta
    $result = file_get_contents($url, false, $context);

    // Verificar si hubo algún error en la solicitud
    if ($result === false) {
        $error = error_get_last();
        echo 'Error en la solicitud: ' . $error['message'];
        
    } else {
        // Manejar la respuesta del servicio
        // ...
        // echo "ok";
        echo '<body>';
        // echo '<div class="container>"';
            echo '<h1>Solicitud enviada!</h1>';
            echo '<p>Por favor revise su correo electronico.</p>';
            // echo '</div>';
            echo '</body>';
        }
    

                    }
                    catch(Exception $e){
                        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    }
                }
                else{
                            echo '<body>';
                    // echo '<div class="container>"';
                    echo '<h1>La solicitud ya ha sido enviada</h1>';
                    echo '<p>Por favor revise su correo electronico.</p>';
                    //  echo '</div>';

                     echo '</body>';
                }

} else {
    echo "Usuario no encontrado";
}
?>

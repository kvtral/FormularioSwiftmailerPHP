<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/145ed40320.js" crossorigin="anonymous"></script>

    <meta http-equiv="Refresh" content="4; URL=index.php">
    <title>Enviando...</title>
    <!-- .
    /********************************************************
    **            Programación I 'PHP' de IACC             **
    **              Angélica Carrasco Ángel                **
    **             acarrascoangel@gmail.com                **
    **               Santiago - Mayo 2020                  **
    ********************************************************/
    -->

</head>



<body onload="$('#resultado').modal('show')">

    <div class="modal fade" id="resultado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Respuesta del Servidor:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                <?php

                  require_once 'vendor/autoload.php';

                  function validar_email(string $texto): bool
                  {
                    return (filter_var($texto, FILTER_VALIDATE_EMAIL) === false) ? false : true;
                  }

                  $email_to = "CorreoParaRecibirLosDato@SuCorreo.com"; // Poner el correo receptor de los mensajes del formulario
                  $email_from = 'Formulario@tupagina.com'; // Dirección que se incluira en el header
                  $email_subject = "Información Formulario Control Semana 7"; // Asunto

                  // Chequeo de valores vacios y se eliminan los espacios antes y al final del texto recibido.
                  $nombre = isset($_POST['nom']) ? trim($_POST['nom']) : null;
                  $mail = isset($_POST['nom']) ? trim($_POST['mail']) : "";
                  $fono = isset($_POST['fono']) ? trim($_POST['fono']) : null;
                  $ciu = isset($_POST['ciu']) ? trim($_POST['ciu']) : null;
                  $pai = isset($_POST['pai']) ? $_POST['pai'] : null;
                  $data = isset($_POST['data']) ? trim($_POST['data']) : null;

                  /* Primero se valida con un la función validar_mail si es correcto, si es true, envia correo, 
                  si no, genera un msg de error */
                  if (validar_email($mail)) {

                    /* Aqui establecemos los datos obtenido por POST desde el formulario
                    como una concatenación en una variable que será el mensaje */

                    $email_message = "Detalles del formulario de contacto:\n\n"; // \n se usa para saltar una linea
                    $email_message .= "Nombre: " . $nombre . "\n";
                    $email_message .= "E-mail: " . $mail . "\n";
                    $email_message .= "Teléfono: " . $fono . "\n";
                    $email_message .= "Ciudad: " . $ciu . "\n";
                    $email_message .= "País: " . $pai . "\n";
                    $email_message .= "Comentarios: " . $data . "\n\n";

                    /* Creamos el objeto "Transporte SMTP" en donde "ingresamos" al servidor
                    con las credenciales de dicho servidor (en este caso gmail)*/
                    $transporte = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                      ->setUsername('iacc.programacion.I.php')
                      ->setPassword('iacc2020');

                    // Se crea el objeto que enviara el correo, usando la conexion del objeto $transporte
                    $mailer = new Swift_Mailer($transporte);

                    // Se crea un objeto que es el mensaje, y le pasamos las variables obtenidas con POST
                    $mensaje = (new Swift_Message($email_subject))
                        ->setFrom([$email_from => 'Formulario Web'])
                        ->setTo([$email_to => 'Un compañero'])
                        ->setBody($email_message);

                    // Enviar el mensaje con el objeto $mailer con el objeto $mensaje.
                    $result = $mailer->send($mensaje);
                ?>
                    <span style="font-size: 30px; color: green; text-align: center">
                      <i class="far fa-check-circle"></i>
                    </span>
                    Estimado : <?php echo " ".$nombre."<br>"; ?>
                    Se ha enviado su mensaje de forma correcta<br>
                    ¡Gracias por contactarnos!
                <?php } else {?>
                    <span style="font-size: 30px; color: red; text-align: center">
                      <i class="fa fa-exclamation-circle"></i>
                    </span>
                    Estimado : <?php echo " ".$nombre."<br>"; ?>
                    Se ha generado un error con su dirección de correo electronico,<br>
                    No se ha enviado el formulario, revise sus datos.
                <?php } ?>
                    <br>
                    <p class="text-center"><strong> >> ... Redirigiendo a la página anterior ... << </strong> </p></div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>



</body>

</html>
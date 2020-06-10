<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="favicon.ico">
    <script src="https://kit.fontawesome.com/145ed40320.js" crossorigin="anonymous"></script>
    <title> Formulario de Contacto</title>
        <!-- .
    /********************************************************
    **            Programación I 'PHP' de IACC             **
    **              Angélica Carrasco Ángel                **
    **             acarrascoangel@gmail.com                **
    **               Santiago - Mayo 2020                  **
    ********************************************************/
    -->
</head>

<body>

    <div class="col-md-6 align-self-center shadow-lg p-2 m-5">

        <div class="row pl-4">
            <h5 class="font-weight-bold" style="color: orange"> Formulario de Contacto</h5>
        </div>
        <div class="row pl-4 pr-4">
            <p> Si deseas ponerte en contacto con nosotros, rellena el formulario y te responderemos lo antes posible
            </p>
        </div>
        <div class="dropdown-divider"></div>
        <p class="small text-right text-muted">Los campos con * son obligatorios</p>
        <div class="row">
            <div class="col-md-12">
            <form method="post" action="enviarForm.php"> 
                <div class="form-row">         
                    <div class="col-sm-4">
                        <span style="font-size: 110px; color: black;">
                            <p class="text-right"> <i class="fas fa-user-friends"></i></p>
                        </span>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                        
                            <input type="input" minlength="5" maxlength="40" pattern="[A-Za-z ]+" class="form-control"title="Sólo Letras (Nombre Apellido) // Caracteres: min(5) max(40)"   name="nom"    placeholder="Nombre: (ej: Cosme Fulanito) (*)" required><br>
                            <input type="email" class="form-control"  name= "mail" placeholder="E-mail (*) Usuario@mail.com" required><br>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">+56 (9) </div>
                                </div>
                            <input type="input" class="form-control"  name= "fono" placeholder="Teléfono" minlength="8" maxlength="8" pattern="[0-9]+" title="Número de 8 dígitos" ><br>
                            </div>

                    </div>
                </div>
                <div class="form-row">

                    <div class="col-sm-4">
                        <span style="font-size: 110px; color: black;">
                        <p class="text-right"><i class="fas fa-home"></i></p>
                        </span>
                    </div>
                    <div class="col-sm-1"></div>
                    <div class="col-sm-7">
                            <?php include "listboxpaises.php"; ?>
                            <br> <input type="input" class="form-control" name ="ciu" placeholder="Ciudad">
                    </div>
                </div>
                <div class="form-row pr-2 pl-3 ">
                    
                    <textarea class="form-control shadow" width="100%" type="textarea" minlength="4" maxlength="500" pattern="[A-Za-z0-9]+" name="data" rows="5"></textarea>
                </div>
                <div class="form-row pl-2">
                    <div class="form-check ml-4 mt-1 mb-2">
                        <input class="form-check-input" type="checkbox" value="yes" id="enviarCC">
                        <label class="form-check-label text-muted ml-1" for="enviarCC">
                            <p class="small"> Enviarme una copia</p>
                        </label>
                    </div>
                </div>
                <div class="form-row pr-3 pb-2 mb-2">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        <input type="submit" class="btn btn-danger" value="Enviar mensaje">
                    </div>
                </div>
            </form>
            </div>
        </div>
</body>

</html>
<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <link href="https://fonts.googleapis.com/css?family=Marck+Script|Montserrat|Poiret+One" rel="stylesheet">
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/veterinaria.js"></script>

    <title>Vironchi - Veterinaria</title>
</head>
<body>
    <div class="container">        
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="divLogin">
                    <div class="divLoginHeader">
                        Inicio de sesión
                    </div>
                    <div class="">
                        Usuario
                    </div>
                    <div class="">
                        <input type="text" id="tbUsuario" class="form-control"/>
                    </div>
                    <div class="">
                        Contraseña
                    </div>
                    <div class="">
                        <input type="password" id="tbPassword" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <?php 
                    echo phpversion();
                ?>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#aIndex").addClass("currentPage");
        $("#tbUsuario").focus();
    });
    $(document).ready(function() {
        $("#tbUsuario").keyup(function(event) {
            if (event.keyCode === 13) {
                userLogin();
            }
        });
        $("#tbPassword").keyup(function(event) {
            if (event.keyCode === 13) {
                userLogin();
            }
        });
    });
</script>
</html>
<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/veterinaria.js"></script>
    <script src="js/nuevaventa.js"></script>
    <script src="js/jquery-ui.min.js"></script>

    <title>Veterinaria Vironchi - Nueva Cita</title>
</head>
<body>
    <div class="container mainContainer">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>
        <div class="">
            <div class="menuContainer">
                <?php
                    require_once('php/menu.php');
                    echo menu();
                ?>
            </div>
        </div>
        <div class="row divMargin divBackgroundOrange divCenter">
            <div class="col-12">
                Buscar artículo
            </div>            
        </div>
        <div class="row divMargin divCenter">
            <div class="col-12">
                <input type="text" class="form-control" id="tbBusqueda" />
            </div>
        </div>
        <div class="row divMargin" id="divVenta">

        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Veterinaria Vironchi</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        $("#aVentas").addClass("currentPage");
        $("#tbBusqueda").focus();
        $(function() {     
            $("#tbBusqueda").autocomplete({
                source: "php/obtenerArticulosJSON.php",
                minLength: 2,
                select: function(event, ui) {
                    agregarArticuloVenta(ui.item.id, ui.item.value, ui.item.precio);
                    this.value = '';
                    return false;
                }
            });
        });
    });
</script>
</html>
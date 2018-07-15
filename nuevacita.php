<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/veterinaria.js"></script>

    <title>Veterinaria Vironchi - Nueva Cita</title>
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
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
        <div class="row divMargin divBackgroundOrange">
            <div class="col-12">
                Nueva Cita
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                Tipo de cita
            </div>
            <div class="col-2">
                <select id="selTipoCita" class="form-control">
                    <option value="ESTETICA">Estética</option>
                    <option value="MEDICA">Médica</option>
                </select>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                Cliente
            </div>
            <div class="col-8">
                <input class="form-control" type="text" id="tbCliente"></input>
            </div>
            <div class="col-2">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarCliente'>
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                Mascota
            </div>
            <div class="col-8" id="divMascotasCliente">

            </div>
            <div class="col-2">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarMascota'>
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="row divMargin" id="divDatosCitaEstetica">
            <div class="col-2">
                Total
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="tbTotal"></input>
            </div>
            <div class="col-2">
                Anticipo
            </div>
            <div class="col-2">
                <input type="text" class="form-control" id="tbTotal"></input>
            </div>
        </div>
        <div class="row divMargin" id="divDatosCitaMedica">

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
        $("#aCitas").addClass("currentPage");
    });
</script>
</html>
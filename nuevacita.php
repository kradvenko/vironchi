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
    <script src="js/nuevacita.js"></script>

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
        <div class="row divMargin divBackgroundOrange divCenter">
            <div class="col-12">
                Nueva Cita
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">

            </div>
            <div class="col-2">
                <button class="btn btn-success" onclick="agregarCita()">Guardar</button>
            </div>
            <div class="col-2">
                <button class="btn btn-success" onclick="limpiarCamposNuevaCita()">Limpiar campos</button>
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-2">
                Tipo de cita
            </div>
            <div class="col-3   ">
                <select id="selTipoCita" class="form-control" onchange="mostrarInfoCita()">
                    <option value="NO" selected>Elija un tipo de cita</option>
                    <option value="ESTETICA">Estética</option>
                    <option value="MEDICA">Médica</option>
                </select>
            </div>
        </div>
        <div class="row divMargin divCenter">
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
        <div class="row divMargin divCenter">
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
        <div class="row divMargin divBackgroundOrange divCenter">
            <div class="col-12">
                Datos de la cita
            </div>
        </div>
        <div class="row divMargin divCenter" id="divDatosCita">
            <div class="col-2">
                Fecha de la cita
            </div>
            <div class="col-2">
                Día
            </div>
            <div class="col-2">
                Mes
            </div>
            <div class="col-2">
                Año
            </div>
            <div class="col-4">
                
            </div>
            <div class="col-2">
                
            </div>
            <div class="col-2">
                <select id="selDia" class="form-control">
                    <option value="01">01</option>
                    <option value="02">02</option>
                    <option value="03">03</option>
                    <option value="04">04</option>
                    <option value="05">05</option>
                    <option value="06">06</option>
                    <option value="07">07</option>
                    <option value="08">08</option>
                    <option value="09">09</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                </select>
            </div>
            <div class="col-2">
                <select id="selMes" class="form-control">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div class="col-2">
                <input type="text" id="tbAño" class="form-control"></input>
            </div>
            <div class="col-4">
                
            </div>
        </div>
        <div class="row divMargin divCenter">
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
        <div class="row divMargin divCenter" id="divDatosCitaEstetica" style="display: none;">
            <div class="col-12 divBackgroundOrange">
                Cita Estética
            </div>
            <div class="col-2">
                Corte
            </div>
            <div class="col-3">
                <select id="selCorte" class="form-control">
                    <option value="NO">No</option>
                    <option value="CORTE_GENERAL">Corte general</option>
                </select>
            </div>
            <div class="col-2">
                Baño
            </div>
            <div class="col-3">
                <select id="selBaño" class="form-control">
                    <option value="NO">No</option>
                    <option value="NORMAL">Normal</option>
                    <option value="MEDICADO">Medicado</option>
                </select>
            </div>
        </div>
        <div class="row divMargin divCenter" id="divDatosCitaMedica" style="display: none;">
            <div class="col-12 divBackgroundOrange">
                Cita Médica
            </div>
            <div class="col-2 divMargin">
                Peso
            </div>
            <div class="col-4 divMargin">
                <input type="text" id="tbPeso" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Temperatura
            </div>
            <div class="col-4 divMargin">
                <input type="text" id="tbTemperatura" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Aparencia general
            </div>
            <div class="col-3 divMargin">
                <select id="selAparienciaGeneral" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbAparienciaGeneral" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Piel
            </div>
            <div class="col-3 divMargin">
                <select id="selPiel" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbPiel" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Musculosqueleto
            </div>
            <div class="col-3 divMargin">
                <select id="selMusculosqueleto" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbMusculosqueleto" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Circulatorio
            </div>
            <div class="col-3 divMargin">
                <select id="selCirculatorio" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbCirculatorio" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Digestivo
            </div>
            <div class="col-3 divMargin">
                <select id="selDigestivo" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbDigestivo" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Respiratorio
            </div>
            <div class="col-3 divMargin">
                <select id="selRespiratorio" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbRespiratorio" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Genitourinario
            </div>
            <div class="col-3 divMargin">
                <select id="selGenitourinario" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbGenitourinario" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Ojos
            </div>
            <div class="col-3 divMargin">
                <select id="selOjos" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbOjos" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Oidos
            </div>
            <div class="col-3 divMargin">
                <select id="selOidos" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbOidos" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Sistema nervioso
            </div>
            <div class="col-3 divMargin">
                <select id="selSistemaNervioso" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbSistemaNervioso" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Ganglios
            </div>
            <div class="col-3 divMargin">
                <select id="selGanglios" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbGanglios" class="form-control"></input>
            </div>
            <div class="col-2 divMargin">
                Mucosas
            </div>
            <div class="col-3 divMargin">
                <select id="selMucosas" class="form-control">
                    <option value="NORMAL">Normal</option>
                    <option value="ANORMAL">Anormal</option>
                </select>
            </div>
            <div class="col-7 divMargin">
                <input type="text" id="tbMucosas" class="form-control"></input>
            </div>
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
        limpiarCamposNuevaCita();
        $("#aCitas").addClass("currentPage");
    });
</script>
</html>
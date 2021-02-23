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
    <script src="js/agenda.js"></script>

    <title>Vironchi - Veterinaria</title>
</head>
<body>
    <div class="container mainContainer">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>
        <button onclick="topFunction()" id="btnTop" title="Ir arriba">Arriba</button> 
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
                Revisar citas
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-6">
                Fecha de las citas
            </div>
            <div class="col-3">
                
            </div>
            <div class="col-3">
                
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
            <div class="col-3">
                
            </div>
            <div class="col-3">
                
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
                <input type="text" id="tbAño" class="form-control" />
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" value="Buscar Citas" onclick="buscarCitasBoton()" />
            </div>
            
            <div class="col-12 divMargin">

            </div>

            <div class="col-6 divAgenda">

            <!--MAÑANA-->
            <div class="col-12 divBackgroundOrange2">
                Mañana
            </div>
            <div class="col-4 divBackgroundGrey3">
                Hora
            </div>
            <div class="col-4 divBackgroundGrey3">
                Nombre
            </div>
            <div class="col-4 divBackgroundGrey3">
                Observación
            </div>


            <div class="col-2 divBackgroundGrey">
                Antes de las 6
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio1" onclick="agregarAsistenciaCita('1')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre1" onkeyup="return agregarCita(event, '1')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion1" onkeyup="return agregarCita(event, '1')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                09:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio2" onclick="agregarAsistenciaCita('2')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre2" onkeyup="return agregarCita(event, '2')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion2" onkeyup="return agregarCita(event, '2')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                09:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio3" onclick="agregarAsistenciaCita('3')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre3" onkeyup="return agregarCita(event, '3')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion3" onkeyup="return agregarCita(event, '3')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                09:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio4" onclick="agregarAsistenciaCita('4')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre4" onkeyup="return agregarCita(event, '4')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion4" onkeyup="return agregarCita(event, '4')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                09:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio5" onclick="agregarAsistenciaCita('5')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre5" onkeyup="return agregarCita(event, '5')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion5" onkeyup="return agregarCita(event, '5')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                10:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio6" onclick="agregarAsistenciaCita('6')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre6" onkeyup="return agregarCita(event, '6')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion6" onkeyup="return agregarCita(event, '6')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                10:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio7" onclick="agregarAsistenciaCita('7')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre7" onkeyup="return agregarCita(event, '7')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion7" onkeyup="return agregarCita(event, '7')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                10:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio8" onclick="agregarAsistenciaCita('8')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre8" onkeyup="return agregarCita(event, '8')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion8" onkeyup="return agregarCita(event, '8')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                11:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio9" onclick="agregarAsistenciaCita('9')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre9" onkeyup="return agregarCita(event, '9')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion9" onkeyup="return agregarCita(event, '9')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                11:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio10" onclick="agregarAsistenciaCita('10')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre10" onkeyup="return agregarCita(event, '10')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion10" onkeyup="return agregarCita(event, '10')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                11:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio11"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre11" onkeyup="return agregarCita(event, '11')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion11" onkeyup="return agregarCita(event, '11')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                11:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio12"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre12" onkeyup="return agregarCita(event, '12')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion12" onkeyup="return agregarCita(event, '12')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                12:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio13"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre13" onkeyup="return agregarCita(event, '13')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion13" onkeyup="return agregarCita(event, '13')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                12:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio14"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre14" onkeyup="return agregarCita(event, '14')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion14" onkeyup="return agregarCita(event, '14')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                12:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio15"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre15" onkeyup="return agregarCita(event, '15')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion15" onkeyup="return agregarCita(event, '15')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                12:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio16"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre16" onkeyup="return agregarCita(event, '16')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion16" onkeyup="return agregarCita(event, '16')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                13:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio17"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre17" onkeyup="return agregarCita(event, '17')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion17" onkeyup="return agregarCita(event, '17')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                13:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio18"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre18" onkeyup="return agregarCita(event, '18')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion18" onkeyup="return agregarCita(event, '18')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                13:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio19"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre19" onkeyup="return agregarCita(event, '19')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion19" onkeyup="return agregarCita(event, '19')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                13:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio20"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre20" onkeyup="return agregarCita(event, '20')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion20" onkeyup="return agregarCita(event, '20')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                14:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio21"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre21" onkeyup="return agregarCita(event, '21')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion21" onkeyup="return agregarCita(event, '21')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            </div>

<!--TARDE-->
            <div class="col-12 divBackgroundGreen">
                Tarde
            </div>
            <div class="col-4 divBackgroundGrey3">
                Hora
            </div>
            <div class="col-4 divBackgroundGrey3">
                Nombre
            </div>
            <div class="col-4 divBackgroundGrey3">
                Observación
            </div>

            <div class="col-2 divBackgroundGrey2">
                04:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio22"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre22" onkeyup="return agregarCita(event, '22')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion22" onkeyup="return agregarCita(event, '22')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                04:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio23"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre23" onkeyup="return agregarCita(event, '23')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion23" onkeyup="return agregarCita(event, '23')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                04:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio24"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre24" onkeyup="return agregarCita(event, '24')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion24" onkeyup="return agregarCita(event, '24')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                04:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio25"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre25" onkeyup="return agregarCita(event, '25')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion25" onkeyup="return agregarCita(event, '25')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                05:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio26"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre26" onkeyup="return agregarCita(event, '26')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion26" onkeyup="return agregarCita(event, '26')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                05:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio27"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre27" onkeyup="return agregarCita(event, '27')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion27" onkeyup="return agregarCita(event, '27')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                05:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio28"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre28" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion28" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                06:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio29"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre29" onkeyup="return agregarCita(event, '29')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion29" onkeyup="return agregarCita(event, '29')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                06:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio30"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre30" onkeyup="return agregarCita(event, '30')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion30" onkeyup="return agregarCita(event, '30')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                06:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio31"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre31" onkeyup="return agregarCita(event, '31')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion31" onkeyup="return agregarCita(event, '31')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                06:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio32"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre32" onkeyup="return agregarCita(event, '32')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion32" onkeyup="return agregarCita(event, '32')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                07:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio33"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre33" onkeyup="return agregarCita(event, '33')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion33" onkeyup="return agregarCita(event, '33')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                07:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio34"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre34" onkeyup="return agregarCita(event, '34')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion34" onkeyup="return agregarCita(event, '34')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                07:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio35"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre35" onkeyup="return agregarCita(event, '35')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion35" onkeyup="return agregarCita(event, '35')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                07:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio36"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre36" onkeyup="return agregarCita(event, '36')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion36" onkeyup="return agregarCita(event, '36')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                08:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio37"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre37" onkeyup="return agregarCita(event, '37')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion37" onkeyup="return agregarCita(event, '37')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                08:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio38"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre38" onkeyup="return agregarCita(event, '38')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion38" onkeyup="return agregarCita(event, '38')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                08:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio39"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre39" onkeyup="return agregarCita(event, '39')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion39" onkeyup="return agregarCita(event, '39')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                08:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio40"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre40" onkeyup="return agregarCita(event, '40')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion40" onkeyup="return agregarCita(event, '40')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                09:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio41"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre41" onkeyup="return agregarCita(event, '41')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion41" onkeyup="return agregarCita(event, '41')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                09:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio42"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre42" onkeyup="return agregarCita(event, '42')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion42" onkeyup="return agregarCita(event, '42')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                09:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio43"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre43" onkeyup="return agregarCita(event, '43')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion43" onkeyup="return agregarCita(event, '43')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                09:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio44"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre44" onkeyup="return agregarCita(event, '44')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion44" onkeyup="return agregarCita(event, '44')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                10:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio45"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre45" onkeyup="return agregarCita(event, '45')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion45" onkeyup="return agregarCita(event, '45')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                10:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio46"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre46" onkeyup="return agregarCita(event, '46')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion46" onkeyup="return agregarCita(event, '46')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                10:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio47"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre47" onkeyup="return agregarCita(event, '47')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion47" onkeyup="return agregarCita(event, '47')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                10:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio48"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre48" onkeyup="return agregarCita(event, '48')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion48" onkeyup="return agregarCita(event, '48')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                11:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio49"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre49" onkeyup="return agregarCita(event, '49')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion49" onkeyup="return agregarCita(event, '49')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                11:15
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio50"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre50" onkeyup="return agregarCita(event, '50')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion50" onkeyup="return agregarCita(event, '50')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                11:30
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio51"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre51" onkeyup="return agregarCita(event, '51')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion51" onkeyup="return agregarCita(event, '51')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey2">
                11:45
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio52" onclick="agregarAsistenciaCita('52')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre52" onkeyup="return agregarCita(event, '52')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion52" onkeyup="return agregarCita(event, '52')" />
            </div>

            <div class="col-12 divMargin">

            </div>

            <div class="col-2 divBackgroundGrey">
                00:00
            </div>
            <div class="col-2">
                <label><input type="checkbox" class="cbAgenda" id="cbAgendaAsistio53" onclick="agregarAsistenciaCita('53')"> ASISTIÓ</label>
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaNombre53" onkeyup="return agregarCita(event, '53')" />
            </div>
            <div class="col-4">
                <input type="text" class="form-control tbagenda" id="tbAgendaObservacion53" onkeyup="return agregarCita(event, '53')" />
            </div>

            <div class="col-12 divMargin">

            </div>


        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#aCitas").addClass("currentPage");        
    });
    $(document).ready(function() {
        //agregarCita('1');
        cargarFecha();
        obtenerCitas();
    });
</script>
</html>
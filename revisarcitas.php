<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <link rel="stylesheet" type="text/css" href="css/slider.css" />
    <link rel="stylesheet" type="text/css" href="css/jsgrid.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jsgrid-theme.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/veterinaria.js"></script>
    <script src="js/revisarcitas.js"></script>
    <script src="js/jsgrid.min.js"></script>

    <title>Veterinaria Vironchi - Revisar citas</title>
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
                Revisar citas
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-6">
                Fecha de las citas
            </div>
            <div class="col-3">
                Tipo de cita
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
                    <option value="%">Todos</option>
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
                    <option value="%">Todos</option>
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
                <select id="selTipoCita" class="form-control">
                    <option value="%" selected>Todas</option>
                    <option value="ESTETICA">Estética</option>
                    <option value="MEDICA">Médica</option>
                </select>
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" value="Buscar por fecha" onclick="buscarCitas('Fecha')" />
            </div>
            <div class="col-12 divMargin">

            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-6">
                Nombre del cliente o mascota
            </div>
            <div class="col-6">
                
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="tbNombreBusqueda" />
            </div>
            <div class="col-3">
                
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" value="Buscar por nombre" onclick="buscarCitas('Nombre')" />
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-12 divBackgroundOrange">
                Opciones de búsqueda
            </div>
            <div class="col-4">
                <label class="switch">
                    <input id="cbFinalizados" type="checkbox" />
                    <span class="slider round">
                        Incluir finalizadas
                    </span>
                </label>
            </div>
            <div class="col-4">
                <label class="switch">
                    <input id="cbNoPagadas" type="checkbox" />
                    <span class="slider round">
                        Solo no pagadas
                    </span>
                </label>
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-12 divBackgroundOrange">
                Citas
            </div>
        </div>
        <button onclick="topFunction()" id="btnTop" title="Go to top">Top</button> 
        <div class="row divMargin" id="divCitas">
            
        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Veterinaria Vironchi</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
     <!--Ventana modal para ver los detalles de una cita médica-->
     <div class="modal fade" id="modalCitaMedica" tabindex="-1" role="dialog" aria-labelledby="modalCitaMedica" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información de la Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12 divBackgroundOrange">
                            Cita Médica
                        </div>
                        <div class="row divMargin divCenter">
                            <div class="col-2">
                                Total
                            </div>
                            <div class="col-2">
                                <!--<input type="text" class="form-control" id="tbTotal" onchange="verificarTotales()"></input>-->
                                <label id="lblTotalMedica">$</label>
                            </div>
                            <div class="col-2">
                                Costos Extra
                            </div>
                            <div class="col-2">
                                <label id="lblExtrasM">$</label>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#modalVerCostosExtra' onclick="cargarCostosExtra()">Ver Costos Extra</button>
                            </div>
                            <div class="col-2">
                                Anticipo
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" id="tbAnticipo" onchange="verificarTotales()"></input>
                            </div>
                            <div class="col-2">
                                Total de Cita
                            </div>
                            <div class="col-2">
                                <label id="lblTotalCitaMedica">$</label>
                            </div>
                            <div class="col-2">
                                Restan
                            </div>
                            <div class="col-2">
                                <label id="lblRestan">$</label>
                            </div>
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
                        <div class="col-12 divMargin">
                            Diagnóstico
                        </div>
                        <div class="col-12 divMargin">
                            <textarea id="taDiagnostico" maxlength="250" class="form-control"></textarea> 
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
                        <div class="col-12">
                            Lista de problemas (temporal)
                        </div>
                        <div class="col-12">
                            <textarea id="taListaProblemas" class="form-control" maxlength="500"></textarea>
                        </div>
                        <div class="col-12">
                            Planes diagnosticos
                        </div>
                        <div class="col-12">
                            <textarea id="taPlanesDiagnosticos" class="form-control" maxlength="500"></textarea>
                        </div>
                        <div class="col-12">
                            Planes terapeuticos
                        </div>
                        <div class="col-12">
                            <textarea id="taPlanesTerapeuticos" class="form-control" maxlength="500"></textarea>
                        </div>
                        <div class="col-12">
                            Instrucciones clientes
                        </div>
                        <div class="col-12">
                            <textarea id="tbInstruccionesCliente" class="form-control" maxlength="500"></textarea>
                        </div>
                        <div class="col-12">
                            Notas
                        </div>
                        <div class="col-12">
                            <textarea id="taNotasMedicas" class="form-control" maxlength="500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="actualizarCitaMedica()">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposCitaMedica()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para ver los detalles de una cita estética-->
    <div class="modal fade" id="modalCitaEstetica" tabindex="-1" role="dialog" aria-labelledby="modalCitaEstetica" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información de la cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12 divBackgroundOrange">
                            Cita Estética
                        </div>
                        <div class="row divMargin divCenter">
                            <div class="col-2">
                                Total
                            </div>
                            <div class="col-2">
                                <!--<input type="text" class="form-control" id="tbTotalEstetica" onchange="verificarTotales()"></input>-->
                                <label id="lblTotalEstetica">$</label>
                            </div>
                            <div class="col-2">
                                Costos Extra
                            </div>
                            <div class="col-2">
                                <label id="lblExtrasE">$</label>
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-secondary" data-toggle='modal' data-target='#modalVerCostosExtra' onclick="cargarCostosExtra()">Ver Costos Extra</button>
                            </div>
                            <div class="col-2">
                                Anticipo
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" id="tbAnticipoEstetica" onchange="verificarTotales()"></input>
                            </div>
                            <div class="col-2">
                                Total de Cita
                            </div>
                            <div class="col-2">
                                <label id="lblTotalCitaEstetica">$</label>
                            </div>
                            <div class="col-2">
                                Restan
                            </div>
                            <div class="col-2">
                                <label id="lblRestanEstetica">$</label>
                            </div>
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
                        <div class="col-12">
                            Notas
                        </div>
                        <div class="col-12">
                            <textarea id="taNotasEsteticas" class="form-control" maxlength="500"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="actualizarCitaEstetica()">Guardar cambios</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposCitaMedica()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para ver la información del cliente-->
    <div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalCliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información del cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Nombre
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNombreCliente" maxlength="300"></input>
                        </div>
                        <div class="col-12">
                            Dirección
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbDireccionCliente" maxlength="100"></input>
                        </div>
                        <div class="col-12">
                            Colonia
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbColoniaCliente" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Municipio
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbMunicipioCliente" maxlength="45" value="TEPIC"></input>
                        </div>
                        <div class="col-12">
                            Teléfono 1
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefono1" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Teléfono 2
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefono2" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Correo electrónico
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbCorreo" maxlength="45"></input>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="">Cerrar</button>
                    <!--<button type="button" class="btn btn-primary" onclick="agregarNuevoCliente()">Guardar cambios</button>-->
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para ver la información de la mascota-->
    <div class="modal fade" id="modalMascota" tabindex="-1" role="dialog" aria-labelledby="modalMascota" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información de la mascota</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Nombre
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNombreMascota" maxlength="300"></input>
                        </div>
                        <div class="col-12">
                            Especie
                        </div>
                        <div class="col-11" id="divEspecies">
                            No existen especies para esta especie, por favor agregue una.
                        </div>
                        <div class="col-12">
                            Raza
                        </div>
                        <div class="col-11" id="divRazas">
                            No existen razas para esta especie, por favor agregue una.
                        </div>
                        <div class="col-12">
                            Fecha de nacimiento
                        </div>
                        <div class="col-4">
                            Día
                        </div>
                        <div class="col-4">
                            Mes
                        </div>
                        <div class="col-4">
                            Año
                        </div>
                        <div class="col-4">
                            <select id="selDiaMascota" class="form-control">
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
                        <div class="col-4">
                            <select id="selMesMascota" class="form-control">
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
                        <div class="col-4">
                            <input type="text" id="tbAñoMascota" class="form-control" />
                        </div>
                        <div class="col-12">
                            Edad
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbEdadMascota" />
                        </div>
                        <div class="col-12">
                            Género
                        </div>
                        <div class="col-12">
                            <select id="selGeneroMascota" class="form-control">
                                <option value="MACHO">Macho</option>
                                <option value="HEMBRA">Hembra</option>
                            </select>
                        </div>
                        <div class="col-12">
                            Características especiales
                        </div>
                        <div class="col-12">
                            <textarea id="taCaracteristicasMascota" class="form-control" maxlength="400"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposMascota()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para ver la información de los pagos-->
    <div class="modal fade" id="modalPagos" tabindex="-1" role="dialog" aria-labelledby="modalPagos" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Información de los pagos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-2">
                            Total
                        </div>
                        <div class="col-2">
                            <label id="lblTotalPagos">$</label>
                        </div>
                        <div class="col-2">
                            Extras
                        </div>
                        <div class="col-2">
                            <label id="lblExtrasPagos">$</label>
                        </div>
                        <div class="col-2">
                            Anticipo
                        </div>
                        <div class="col-2">
                            <label id="lblAnticiposPagos">$</label>
                        </div>
                        <div class="col-2">
                            Restan
                        </div>
                        <div class="col-2">
                            <label id="lblRestanPagos">$</label>
                        </div>
                        <div class="col-12">
                            <input type="text" class="btn btn-success" value="Nuevo pago" onclick="nuevoPago()" />
                        </div>
                    </div>
                    <div class="row divMargin" id="divListaPagos">
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposPagos()">Cerrar</button>
                    <!--<button type="button" class="btn btn-primary" onclick="agregarNuevaMascota()">Guardar cambios</button>-->
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo pago-->
    <div class="modal fade" id="modalNuevoPago" tabindex="-1" role="dialog" aria-labelledby="modalNuevoPago" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nuevo pago</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-4">
                            Cantidad
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="tbCantidadPago" />
                        </div>
                        <div class="col-4">
                            
                        </div>
                        <div class="col-12">
                            Notas
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" maxlength="200" id="taNotasPago"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevoPago()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoPago()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para verificar si se va a finalizar una cita-->
    <div class="modal fade" id="modalFinalizarCita" tabindex="-1" role="dialog" aria-labelledby="modalFinalizarCita" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Finalizar cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12">
                            ¿Desea finalizar la cita?
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="finCita()">Finalizar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para ver los costos extra-->
    <div class="modal fade" id="modalVerCostosExtra" tabindex="-1" role="dialog" aria-labelledby="modalVerCostosExtra" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Costos Extra de la Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12 divMargin">
                            Elija un costo extra
                        </div>
                        <!--
                        <div class="col-4 divMargin">
                            <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarNuevoCostoExtra'>
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>-->
                        <div class="col-4" id="divCostosExtra">

                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" id="tbCostoExtraCosto"></input>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary" onclick="agregarCostoExtraACita()">Agregar a cita</button>
                        </div>
                        <div class="col-12" id="divCitaCostosExtra">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo costo extra-->
    <div class="modal fade" id="modalAgregarNuevoCostoExtra" tabindex="-1" role="dialog" aria-labelledby="modalAgregarNuevoCostoExtra" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Costos Extra de la Cita</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-7 divMargin">
                            Nombre del costo extra
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" id="tbNuevoCostoExtraNombre"></input>
                        </div>
                        <div class="col-7 divMargin">
                            Costo
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" id="tbNuevoCostoExtraCosto"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoCostoExtra()">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        $("#aCitas").addClass("currentPage");
        limpiarCamposRevisarCita();
    });
    $('#modalNuevoPago').on('shown.bs.modal', function() {
        $('#tbCantidadPago').focus();
    });
    $('#modalVerCostosExtra').on('shown.bs.modal', function() {
        obtenerCostosExtraCita();
    });
    $('#modalVerCostosExtra').on('hidden.bs.modal', function() {
        $('#modalCitaMedica').css('overflow', 'scroll');
    });

    window.onscroll = function() {scrollFunction()};

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("btnTop").style.display = "block";
        } else {
            document.getElementById("btnTop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    } 
</script>
</html>
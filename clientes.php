<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.structure.min.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/veterinaria.js"></script>
    <script src="js/clientes.js"></script>

    <title>Veterinaria Vironchi - Clientes</title>
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
                Control de Clientes
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-2">
                <button class="btn btn-success" onclick="limpiarCamposClientes()">Limpiar campos</button>
            </div>
            <div class="col-2">
                <button class="btn btn-success" onclick="editarCliente()">Editar datos Cliente</button>
            </div>
            <div class="col-2">
                <button class="btn btn-success" onclick="editarMascota()">Editar datos Mascota</button>
            </div>
            <div class="col-6">

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
        <div class="row divMargin divBackgroundOrange divCenter">
            <div class="col-12">
                Mascotas
            </div>
        </div>
        <div class="row divMargin divCenter" id="divMascotas">
            <div class="col-2">
                Mascota
            </div>
            <div class="col-8" id="divMascotasCliente">

            </div>
            <div class="col-2">
                <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarMascota' onclick="cargarDatosNuevaMascota()">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Veterinaria Vironchi</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo cliente-->
    <div class="modal fade" id="modalAgregarCliente" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo cliente</h5>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevoCliente()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoCliente()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modificar un cliente-->
    <div class="modal fade" id="modalModificarCliente" tabindex="-1" role="dialog" aria-labelledby="modalModificarCliente" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar cliente</h5>
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
                            <input type="text" class="form-control" id="tbNombreClienteModificar" maxlength="300"></input>
                        </div>
                        <div class="col-12">
                            Dirección
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbDireccionClienteModificar" maxlength="100"></input>
                        </div>
                        <div class="col-12">
                            Colonia
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbColoniaClienteModificar" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Municipio
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbMunicipioClienteModificar" maxlength="45" value="TEPIC"></input>
                        </div>
                        <div class="col-12">
                            Teléfono 1
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefono1Modificar" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Teléfono 2
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbTelefono2Modificar" maxlength="45"></input>
                        </div>
                        <div class="col-12">
                            Correo electrónico
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbCorreoModificar" maxlength="45"></input>
                        </div>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposModificarCliente()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificarCliente()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva mascota-->
    <div class="modal fade" id="modalAgregarMascota" tabindex="-1" role="dialog" aria-labelledby="modalAgregarMascota" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva mascota</h5>
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
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarEspecie'>
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="col-12">
                            Raza
                        </div>
                        <div class="col-11" id="divRazas">
                            No existen razas para esta especie, por favor agregue una.
                        </div>
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarRaza' onclick="cargarEspecieRaza()">
                            <i class="fas fa-plus"></i>
                        </button>
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
                            Características especiales
                        </div>
                        <div class="col-12">
                            <textarea id="taCaracteristicasMascota" class="form-control" maxlength="400"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevaMascota()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaMascota()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modificar una nueva mascota-->
    <div class="modal fade" id="modalModificarMascota" tabindex="-1" role="dialog" aria-labelledby="modalModificarMascota" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar mascota</h5>
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
                            <input type="text" class="form-control" id="tbNombreMascotaModificar" maxlength="300"></input>
                        </div>
                        <div class="col-12">
                            Especie
                        </div>
                        <div class="col-11" id="divEspeciesModificar">
                            No existen especies para esta especie, por favor agregue una.
                        </div>
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarEspecie'>
                            <i class="fas fa-plus"></i>
                        </button>
                        <div class="col-12">
                            Raza
                        </div>
                        <div class="col-11" id="divRazasModificar">
                            No existen razas para esta especie, por favor agregue una.
                        </div>
                        <button class="btn btn-success" data-toggle='modal' data-target='#modalAgregarRaza' onclick="cargarEspecieRaza()">
                            <i class="fas fa-plus"></i>
                        </button>
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
                            <select id="selDiaMascotaModificar" class="form-control">
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
                            <select id="selMesMascotaModificar" class="form-control">
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
                            <input type="text" id="tbAñoMascotaModificar" class="form-control" />
                        </div>
                        <div class="col-12">
                            Edad
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbEdadMascotaModificar" />
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
                            <textarea id="taCaracteristicasMascotaModificar" class="form-control" maxlength="400"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposModificarMascota()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificarMascota()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva especie-->
    <div class="modal fade" id="modalAgregarEspecie" tabindex="-1" role="dialog" aria-labelledby="modalAgregarEspecie" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva especie</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Especie
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaEspecie" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevaEspecie()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaEspecie()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva raza-->
    <div class="modal fade" id="modalAgregarRaza" tabindex="-1" role="dialog" aria-labelledby="modalAgregarRaza" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva raza</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Especie
                        </div>
                        <div class="col-12" id="divNuevaRazaEspecie">
                            
                        </div>
                        <div class="col-12">
                            Raza
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaRaza" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevaRaza()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaRaza()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        $("#aClientes").addClass("currentPage");
        limpiarCamposClientes();

        $("#tbCliente").autocomplete({
            source: "php/obtenerClientesJSON.php",
            minLength: 2,
            select: function(event, ui) {
                elegirCliente(ui.item.id);
            }
        });
        $("#tbCliente").focus();
    });
    $('#modalAgregarCliente').on('shown.bs.modal', function() {
        $('#tbNombreCliente').focus();
    });
    $('#modalAgregarMascota').on('shown.bs.modal', function() {
        $('#tbNombreMascota').focus();
    });
    $('#modalAgregarEspecie').on('shown.bs.modal', function() {
        $('#tbNuevaEspecie').focus();
    });
    $('#modalAgregarRaza').on('shown.bs.modal', function() {
        $('#tbNuevaRaza').focus();
    });
</script>
</html>
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

    <title>Veterinaria Vironchi - Nueva venta</title>
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
                Nueva venta
            </div>            
        </div>
        <div class="row divMargin divCenter">
            <div class="col-12">
                Buscar artículo
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="tbBusqueda" />
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <label class="labelType01">Descuento Porcentaje</label>
            </div>
            <div class="col-3">
                <label class="labelType01">Descuento Cantidad</label>
            </div>
            <div class="col-3">
                <label class="labelType01">SubTotal</label>
            </div>
            <div class="col-3">
                <label class="labelType01">Total</label>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-3">
                <input type="text" id="tbDescuentoPorcentajeVenta" class="form-control textbox-center" value="0" onchange="cambiarDescuentoPorcentajeVenta()"></input>
            </div>
            <div class="col-3">
                <input type="text" id="tbDescuentoCantidadVenta" class="form-control textbox-center" value="0" onchange="cambiarDescuentoCantidadVenta()"></input>
            </div>
            <div class="col-3">
                <label class="labelType02" id="lblSubTotal">-</label>
            </div>
            <div class="col-3">
                <label class="labelType02" id="lblTotal">-</label>
            </div>
        </div>
        <div class="row divMargin">
            <div class="col-2">
                
            </div>
            <div class="col-1">
                
            </div>
            <div class="col-3">
            
            </div>
            <div class="col-3">

            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary btn-success" onclick="mostrarPantallaVenta()">Realizar venta</button>
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
    <!--Ventana modal de la pantalla de venta-->
    <div class="modal fade" id="modalPantallaVenta" tabindex="-1" role="dialog" aria-labelledby="modalPantallaVenta" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Venta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                        
                        <div class="col-12">
                            Tipo
                        </div>
                        <div class="col-12">
                            <select class="form-control" id="selTipoVenta">
                                <option value="EFECTIVO">Efectivo</option>
                                <option value="TARJETA">Tarjeta</option>
                            </select>
                        </div>
                        <div class="col-12">
                            Efectivo
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbEfectivo" onchange="calcularCambio();" value="0"></input>
                        </div>
                        <div class="col-12">
                            Cambio
                        </div>
                        <div class="col-12">
                            <label id="lblCambio">0</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposPantallaVenta()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="realizarVenta()">Realizar venta</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        limpiarCamposNuevaVenta();
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
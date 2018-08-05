<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/veterinaria.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/veterinaria.js"></script>
    <script src="js/articulos.js"></script>

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
                Control de artículos
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalAgregarCategoria' value="Agregar categoría"  />
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalModificarCategoria' onclick='obtenerCategoriasModificar()' value="Modificar categoría"  />
            </div>
            <div class="col-3">
                <input type="button" class="btn btn-success" data-toggle='modal' data-target='#modalAgregarArticulo' onclick='obtenerCategoriasNuevoArticulo()' value="Agregar Artículo"  />
            </div>
        </div>
        <div class="row divMargin divBackgroundOrange divCenter">
            <div class="col-12">
                Inventario
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3">
                Categorías
            </div>
            <div class="col-9">
                Artículos
            </div>
        </div>
        <div class="row divMargin divCenter">
            <div class="col-3" id="divCategorias">
                
            </div>
            <div class="col-9">
                
            </div>
        </div>
        <div class="row divBackgroundBlack">
            <div class="col-12 mainFooter">
                <b>Veterinaria Vironchi</b> © Derechos Reservados 2018.
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar una nueva categoría-->
    <div class="modal fade" id="modalAgregarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAgregarCategoria" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nueva categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12">
                            Categoría
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control" id="tbNuevaCategoria"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevaCategoria()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevaCategoria()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para modifcar una categoría-->
    <div class="modal fade" id="modalModificarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalModificarCategoria" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modificar categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12">
                            Elija una categoría
                        </div>
                        <div class="col-12 divMargin" id="divCategoriasModificar">
                
                        </div>
                        <div class="col-12">
                            Nuevo nombre
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbModificarCategoria"></input>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposModificarCategoria()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificarCategoria()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
    <!--Ventana modal para agregar un nuevo artículo-->
    <div class="modal fade" id="modalAgregarArticulo" tabindex="-1" role="dialog" aria-labelledby="modalAgregarArticulo" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar nuevo artículo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row divMargin divCenter">
                        <div class="col-12 divMargin">
                            Nombre
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArtículoNombre"></input>
                        </div>
                        <div class="col-12 divMargin">
                            Categoría
                        </div>
                        <div class="col-12 divMargin" id="divCategoriasNuevoArticulo">
                            
                        </div>
                        <div class="col-12 divMargin">
                            Clave
                        </div>
                        <div class="col-12 divMargin">
                            <input type="text" class="form-control" id="tbNuevoArtículoClave"></input>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="limpiarCamposNuevoArticulo()">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="agregarNuevoArticulo()">Guardar cambios</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
        checkSession();
        obtenerCategoriasSelect();
        $("#aArticulos").addClass("currentPage");
    });
    $('#modalAgregarCategoria').on('shown.bs.modal', function() {
        $('#tbNuevaCategoria').focus();
    });
    $('#modalAgregarArticulo').on('shown.bs.modal', function() {
        $('#tbNuevoArtículoNombre').focus();
    });
</script>
</html>
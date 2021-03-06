//Variables para el módulo de articulos
var a_IdCategoriaSeleccionadaModificar = 0;
var a_IdArticuloSeleccionado = 0;
//Funciones para el módulo de artículos
function agregarNuevaCategoria() {
    var categoria = $("#tbNuevaCategoria").val();
    if (categoria.length == 0) {
        alert("No ha ingresado el nombre de la categoría.");
        return;
    }
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    $.ajax({url: "php/agregarCategoria.php", async: false, type: "POST", data: { categoria: categoria, fechaCaptura: fechaCaptura }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado la categoría.");
            $('#modalAgregarCategoria').modal('hide');
            limpiarCamposNuevaCategoria();
            obtenerCategoriasSelect();
        } else {
            alert(res);
        }
    }});
}

function limpiarCamposNuevaCategoria() {
    $("#tbNuevaCategoria").val("");
}

function obtenerCategoriasSelect() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategorias', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategorias").html(res);
        $("#selCategorias").change(obtenerArticulosInventario);
    }});
}

function obtenerCategoriasModificar() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategoriasModificar', estado: '%' }, success: function(res) {
        $("#divCategoriasModificar").html(res);
        $("#tbModificarCategoria").val($("#selCategoriasModificar option:selected").text());
        a_IdCategoriaSeleccionadaModificar = $("#selCategoriasModificar").val();
        $("#selCategoriasModificar").change(cambioCategoriaModificar);
    }});
}

function cambioCategoriaModificar() {
    $("#tbModificarCategoria").val($("#selCategoriasModificar option:selected").text());
    a_IdCategoriaSeleccionadaModificar = $("#selCategoriasModificar").val();
}

function limpiarCamposModificarCategoria() {
    $("#tbModificarCategoria").val("");
    a_IdCategoriaSeleccionadaModificar = 0;
}

function modificarCategoria() {
    var nuevoNombre = $("#tbModificarCategoria").val();
    if (nuevoNombre.length == 0) {
        alert("No ha escrito el nuevo nombre de la categoría.")
        return;
    }
    $.ajax({url: "php/modificarCategoria.php", async: false, type: "POST", data: { idCategoria: a_IdCategoriaSeleccionadaModificar, nuevoNombre: nuevoNombre }, success: function(res) {
        if (res == "OK") {
            alert("Se ha modificado la categoría.");
            $('#modalModificarCategoria').modal('hide');
            limpiarCamposModificarCategoria();
            obtenerCategoriasSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerCategoriasNuevoArticulo() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategoriasNuevoArticulo', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategoriasNuevoArticulo").html(res);
    }});
}

function limpiarCamposNuevoArticulo() {
    $("#divCategoriasNuevoArticulo").val("");
    $("#tbNuevoArticuloClave").val("");
    $("#tbNuevoArticuloDescripcion").val("");
    $("#tbNuevoArticuloCantidad").val("0");
    $("#tbNuevoArticuloPrecioPublico").val("0");
    $("#tbNuevoArticuloCantidadMinima").val("0");
    $("#tbNuevoArtículoPrecioCompra").val("0");
    a_IdArticuloSeleccionado = 0;
}

function agregarNuevoArticulo() {
    var nombre = $("#tbNuevoArticuloNombre").val();
    var idCategoria = $("#selCategoriasNuevoArticulo").val();
    var clave = $("#tbNuevoArticuloClave").val();
    var descripcion = $("#tbNuevoArticuloDescripcion").val();
    var cantidad = $("#tbNuevoArticuloCantidad").val();
    var precioPublico = $("#tbNuevoArticuloPrecioPublico").val();
    var cantidadMinima = $("#tbNuevoArticuloCantidadMinima").val();
    var precioCompra = $("#tbNuevoArtículoPrecioCompra").val();
    if (nombre.length == 0) {
        alert("No ha ingresado el nombre del artículo.");
        return;
    }
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    $.ajax({url: "php/agregarArticulo.php", async: false, type: "POST", data: { nombre: nombre, idCategoria: idCategoria, clave: clave, descripcion: descripcion,
        cantidad: cantidad, precioPublico: precioPublico, cantidadMinima: cantidadMinima, precioCompra: precioCompra, fechaCaptura: fechaCaptura }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado el artículo.");
            $('#modalAgregarArticulo').modal('hide');
            limpiarCamposNuevoArticulo();
            obtenerArticulosInventario();
        } else {
            alert(res);
        }
    }});
}

function obtenerArticulosInventario() {
    var idCategoria = $("#selCategorias").val();
    if (idCategoria.length == 0) {
        return;
    }
    $.ajax({url: "php/obtenerArticulosInventario.php", async: false, type: "POST", data: { idCategoria: idCategoria, estado: '%' }, success: function(res) {
        $("#divArticulosInventario").html(res);
    }});
}

function modificarArticulo() {
    var nombre = $("#tbModificarArticuloNombre").val();
    var idCategoria = $("#selCategoriasModificarArticulo").val();
    var clave = $("#tbModificarArticuloClave").val();
    var descripcion = $("#tbModificarArticuloDescripcion").val();
    var cantidad = $("#tbModificarArticuloCantidad").val();
    var precioPublico = $("#tbModificarArticuloPrecioPublico").val();
    var cantidadMinima = $("#tbModificarArticuloCantidadMinima").val();
    var precioCompra = $("#tbModificarArtículoPrecioCompra").val();
    if (nombre.length == 0) {
        alert("No ha ingresado el nombre del artículo.");
        return;
    }
    $.ajax({url: "php/modificarArticulo.php", async: false, type: "POST", data: { idArticulo: a_IdArticuloSeleccionado, nombre: nombre, idCategoria: idCategoria, clave: clave, descripcion: descripcion,
        cantidad: cantidad, precioPublico: precioPublico, cantidadMinima: cantidadMinima, precioCompra: precioCompra }, success: function(res) {
        if (res == "OK") {
            alert("Se ha modificado el artículo.");
            $('#modalModificarArticulo').modal('hide');
            limpiarCamposModificarArticulo();
            obtenerArticulosInventario();
        } else {
            alert(res);
        }
    }});
}

function obtenerDatosArticulo(id) {
    a_IdArticuloSeleccionado = id;
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategoriasModificarArticulo', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategoriasModificarArticulo").html(res);
    }});

    $.ajax({url: "php/obtenerArticuloXML.php", async: false, type: "POST", data: { idArticulo: id, estado: 'ACTIVO' }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbModificarArticuloNombre").val($(this).find("nombre").text());
            $("#selCategoriasModificarArticulo").val($(this).find("idcategoria").text());
            $("#tbModificarArticuloClave").val($(this).find("clave").text());
            $("#tbModificarArticuloDescripcion").val($(this).find("descripcion").text());
            $("#tbModificarArticuloCantidad").val($(this).find("cantidad").text());
            $("#tbModificarArticuloPrecioPublico").val($(this).find("preciopublico").text());
            $("#tbModificarArticuloCantidadMinima").val($(this).find("cantidadminima").text());
            $("#tbModificarArtículoPrecioCompra").val($(this).find("preciocompra").text());
        });
    }});
    $('#modalModificarArticulo').modal('show');
}

function limpiarCamposModificarArticulo() {
    a_IdArticuloSeleccionado = 0;
    $("#tbModificarArticuloNombre").val("");
    $("#tbModificarArticuloClave").val("");
    $("#tbModificarArticuloDescripcion").val("");
    $("#tbModificarArticuloCantidad").val("0");
    $("#tbModificarArticuloPrecioPublico").val("0");
    $("#tbModificarArticuloCantidadMinima").val("0");
    $("#tbModificarArtículoPrecioCompra").val("0");
}
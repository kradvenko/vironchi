//Variables para el módulo de articulos
a_IdCategoriaSeleccionadaModificar = 0;
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
    alert(a_IdCategoriaSeleccionadaModificar);
}

function obtenerCategoriasNuevoArticulo() {
    $.ajax({url: "php/obtenerCategoriasSelect.php", async: false, type: "POST", data: { idSelect: 'selCategoriasNuevoArticulo', estado: 'ACTIVO' }, success: function(res) {
        $("#divCategoriasNuevoArticulo").html(res);
    }});
}

function limpiarCamposNuevoArticulo() {
    
}
//Variables para el módulo de nueva venta
var nv_Articulos = [];
var nv_Articulo;
var nv_DescuentoPorcentaje = 0;
var nv_DescuentoCantidad = 0;
var nv_SubTotal = 0;
var nv_Total = 0;
//Funciones para el módulo de nueva venta
function agregarArticuloVenta(id, nombre, precio) {
    nv_Articulo = { id : id, nombre : nombre, precio : precio, cantidad : '1',  descuentoporcentaje : '0', descuentocantidad : '0', subtotal: precio, total : precio };
    nv_Articulos[nv_Articulos.length] = nv_Articulo;
    mostrarVenta();
    calcularTotal();
}

function mostrarVenta() {
    $("#divVenta").html("");
    for (i = 0; i <= nv_Articulos.length - 1; i++) {
        nv_Articulo = nv_Articulos[i];
        var div;
        //Nombre
        div = '<div class="col-12 divBackgroundBlue2 divMargin">' + nv_Articulo.nombre + '</div>';
        //Cantidad Precio Descuento P Descuento C
        div = div + '<div class="col-3"><label class="labelType01">Cantidad</label></div>';
        div = div + '<div class="col-1"><label class="labelType01">Precio</label></div>';        
        div = div + '<div class="col-3"><label class="labelType01">Descuento Porcentaje</label></div>';
        div = div + '<div class="col-3"><label class="labelType01">Descuento Cantidad</label></div>';
        div = div + '<div class="col-2"><label class="labelType01"></label></div>';

        div = div + '<div class="col-3">' + '<input id="tbCantidad_' + i + '" type="text" class="form-control textbox-center" onchange="cambiarCantidad(' + i + ')" value="' + nv_Articulo.cantidad + '"</input></div>';
        div = div + '<div class="col-1">$ ' + nv_Articulo.precio + '</div>';        
        div = div + '<div class="col-3">' + '<input id="tbDescuentoPorcentaje_' + i + '" type="text" class="form-control textbox-center" onchange="cambiarDescuentoPorcentaje(' + i + ')" value="' + nv_Articulo.descuentoporcentaje + '"</input></div>';
        div = div + '<div class="col-3">' + '<input id="tbDescuentoCantidad_' + i + '" type="text" class="form-control textbox-center" onchange="cambiarDescuentoCantidad(' + i + ')" value="' + nv_Articulo.descuentocantidad + '"</input></div>';
        div = div + '<div class="col-2 divMargin">' + '<button type="button" class="btn btn-primary btn-danger" onclick="borrarArticulo(' + i + ')">Borrar</button></div>';

        div = div + '<div class="col-12 divBackgroundBlue3 divMargin">SubTotal: $ ' + nv_Articulo.subtotal + '</div>';
        div = div + '<div class="col-12 divBackgroundBlue3 divMargin">Total: $ ' + nv_Articulo.total + '</div>';
        //Total
        $("#divVenta").html($("#divVenta").html() + div);
    }
}

function calcularTotal() {
    var total = 0;
    var descuentoPorcentaje = $("#tbDescuentoPorcentajeVenta").val();
    var descuentoCantidad = $("#tbDescuentoCantidadVenta").val();
    nv_DescuentoPorcentaje = descuentoPorcentaje;
    nv_DescuentoCantidad = descuentoCantidad;
    for (i = 0; i <= nv_Articulos.length - 1; i++) {
        nv_Articulo = nv_Articulos[i];
        total = Number(total) + Number(nv_Articulo.total);
    }
    $("#lblSubTotal").text("$ " + total);
    nv_SubTotal = total;
    total = total - (total * (descuentoPorcentaje/100));
    total = total - descuentoCantidad;
    if ($("#cbIva").is(":checked")) {
        nv_Iva = (total * 1.16) - total;
        total = total * 1.16;
        nv_Iva = parseFloat(nv_iva).toFixed(2);         
        total = parseFloat(total).toFixed(2);        
    } else {
        nv_Iva = 0;
    }
    nv_Total = total;
    $("#lblTotal").text("$ " + total);
}

function borrarArticulo(index) {
    nv_Articulos.splice(index, 1);
    mostrarVenta();
    calcularTotal();
}

function cambiarCantidad(index) {
    if (isNaN($("#tbCantidad_" + index).val())) {
        alert("No ha escrito un número válido.");
        $("#tbCantidad_" + index).val("1");
        return;
    }
    nv_Articulo = nv_Articulos[index];
    nv_Articulo.cantidad = $("#tbCantidad_" + index).val();
    calcularCostoArticulo(index);
    mostrarVenta();
}

function calcularCostoArticulo(index) {
    nv_Articulo = nv_Articulos[index];
    nv_Articulo.total = nv_Articulo.cantidad * nv_Articulo.precio;
    nv_Articulo.subtotal = nv_Articulo.total;
    nv_Articulo.total = nv_Articulo.total - (nv_Articulo.total * (nv_Articulo.descuentoporcentaje/100));
    nv_Articulo.total = nv_Articulo.total - nv_Articulo.descuentocantidad;
    calcularTotal();
}

function cambiarDescuentoPorcentaje(index) {
    if (isNaN($("#tbDescuentoPorcentaje_" + index).val())) {
        alert("No ha escrito un número válido.");
        $("#tbDescuentoPorcentaje_" + index).val("0");
        return;
    }
    nv_Articulo = nv_Articulos[index];
    nv_Articulo.descuentoporcentaje = $("#tbDescuentoPorcentaje_" + index).val();
    calcularCostoArticulo(index);
    mostrarVenta();
}

function cambiarDescuentoCantidad(index) {
    if (isNaN($("#tbDescuentoCantidad_" + index).val())) {
        alert("No ha escrito un número válido.");
        $("#tbDescuentoCantidad_" + index).val("0");
        return;
    }
    nv_Articulo = nv_Articulos[index];
    nv_Articulo.descuentocantidad = $("#tbDescuentoCantidad_" + index).val();
    calcularCostoArticulo(index);
    mostrarVenta();
}

function cambiarDescuentoPorcentajeVenta() {
    if (isNaN($("#tbDescuentoPorcentajeVenta").val())) {
        alert("No ha escrito un número válido.");
        $("#tbDescuentoPorcentajeVenta").val("0")
    }
    calcularTotal();
}

function cambiarDescuentoCantidadVenta() {
    if (isNaN($("#tbDescuentoCantidadVenta").val())) {
        alert("No ha escrito un número válido.");
        $("#tbDescuentoCantidadVenta").val("0")
    }
    calcularTotal();
}

function limpiarCamposNuevaVenta() {
    //$("#cbIva").prop("checked", false);
    $("#divVenta").html("");
    $("#tbDescuentoPorcentajeVenta").val("0");
    $("#tbDescuentoCantidadVenta").val("0");
    $("#lblSubTotal").text("-");
    $("#lblTotal").text("-");
}

function mostrarPantallaVenta() {
    if (nv_Articulos.length == 0) {
        alert("No hay artículos en la venta.");
        return;
    }
    $('#modalPantallaVenta').modal('show');
}

function realizarVenta() {

    var fecha = obtenerFechaHoraActual('FULL');
    var subTotal = nv_SubTotal;
    var descuentoPorcentaje = nv_DescuentoPorcentaje;
    var descuentoCantidad = nv_DescuentoCantidad;
    var total = nv_Total;
    var tipo = $("#selTipoVenta").val();
    var cambio = $("#lblCambio").text();
    var iva = 0;
    var articulos = nv_Articulos;

    $.ajax({url: "php/agregarVenta.php", async: false, type: "POST", data: { fecha: fecha, subTotal: subTotal, descuentoPorcentaje: descuentoPorcentaje,
            descuentoCantidad: descuentoCantidad, total: total, tipo: tipo, cambio: cambio, iva: iva, articulos: articulos }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado la venta.");
            $('#modalPantallaVenta').modal('hide');
            limpiarCamposPantallaVenta();
        } else {
            alert(res);
        }
    }});
}

function limpiarCamposPantallaVenta() {

}

function calcularCambio() {

}

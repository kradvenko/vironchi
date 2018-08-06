//Variables para el módulo de nueva venta
var nv_Articulos = [];
var nv_Articulo;
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
        div = div + '<div class="col-2">' + '<button type="button" class="btn btn-primary btn-danger" onclick="borrarArticulo(' + i + ')">Borrar</button></div>';

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
    nv_descuentoPorcentaje = descuentoPorcentaje;
    nv_descuentoCantidad = descuentoCantidad;
    for (i = 0; i <= nv_Articulos.length - 1; i++) {
        nv_Articulo = nv_Articulos[i];
        total = Number(total) + Number(nv_Articulo.total);
    }
    $("#lblSubTotal").text("$ " + total);
    nv_subTotal = total;
    total = total - (total * (descuentoPorcentaje/100));
    total = total - descuentoCantidad;
    if ($("#cbIva").is(":checked")) {
        nv_iva = (total * 1.16) - total;
        total = total * 1.16;
        nv_iva = parseFloat(nv_iva).toFixed(2);         
        total = parseFloat(total).toFixed(2);        
    } else {
        nv_iva = 0;
    }
    nv_total = total;
    $("#lblTotal").text("$ " + total);
}

function borrarArticulo(index) {
    nv_Articulos.splice(index, 1);
    mostrarVenta();
    calcularTotal();
}
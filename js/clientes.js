//Variables para el módulo de clientes.
var c_IdClienteElegido = 0;
var c_IdMascotaElegida = 0;
//Funciones para el módulo de clientes.
function limpiarCamposClientes() {
    $("#tbCliente").val("");
    $("#divMascotasCliente").html("");
    c_IdClienteElegido = 0;
}

function elegirCliente(id) {
    c_IdClienteElegido = id;
    obtenerMascotasCliente();
}

function limpiarCamposNuevoCliente() {
    $("#tbNombreCliente").val("");
    $("#tbDireccionCliente").val("");
    $("#tbColoniaCliente").val("");
    $("#tbMunicipioCliente").val("TEPIC");
    $("#tbTelefono1").val("");
    $("#tbTelefono2").val("");
    $("#tbCorreo").val("");
}

function agregarNuevoCliente() {
    var nombre = $("#tbNombreCliente").val();
    if (nombre.length == 0) {
        alert("No ha escrito el nombre del cliente.")
        return;
    }
    var direccion = $("#tbDireccionCliente").val();
    var colonia = $("#tbColoniaCliente").val();
    var municipio = $("#tbMunicipioCliente").val();
    var telefono1 = $("#tbTelefono1").val();
    var telefono2 = $("#tbTelefono2").val();
    var correo = $("#tbCorreo").val();
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    var estado = "ACTIVO";

    $.ajax({url: "php/agregarCliente.php", async: false, type: "POST", data: { nombre: nombre, direccion: direccion, colonia: colonia, municipio: municipio, telefono1: telefono1, telefono2: telefono2, correo: correo, fechaCaptura: fechaCaptura, estado: estado }, success: function(res) {
        if (res > 0) {
            alert("Se ha ingresado el cliente.");
            $('#modalAgregarCliente').modal('hide');
            c_IdClienteElegido = res;
            $("#tbCliente").val($("#tbNombreCliente").val());
        } else {
            alert(res);
        }
    }});
}

function limpiarCamposModificarCliente() {
    $("#tbNombreClienteModificar").val("");
    $("#tbDireccionClienteModificar").val("");
    $("#tbColoniaClienteModificar").val("");
    $("#tbMunicipioClienteModificar").val("TEPIC");
    $("#tbTelefono1Modificar").val("");
    $("#tbTelefono2Modificar").val("");
    $("#tbCorreoModificar").val("");
}

function modificarCliente() {
    var nombre = $("#tbNombreClienteModificar").val();
    if (nombre.length == 0) {
        alert("No ha escrito el nombre del cliente.")
        return;
    }
    var idCliente = c_IdClienteElegido;
    var direccion = $("#tbDireccionClienteModificar").val();
    var colonia = $("#tbColoniaClienteModificar").val();
    var municipio = $("#tbMunicipioClienteModificar").val();
    var telefono1 = $("#tbTelefono1Modificar").val();
    var telefono2 = $("#tbTelefono2Modificar").val();
    var correo = $("#tbCorreoModificar").val();
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    var estado = "ACTIVO"; 

    $.ajax({url: "php/modificarCliente.php", async: false, type: "POST", data: { idCliente: idCliente, nombre: nombre, direccion: direccion, colonia: colonia, municipio: municipio, telefono1: telefono1, telefono2: telefono2, correo: correo, fechaCaptura: fechaCaptura, estado: estado }, success: function(res) {
        if (res == "OK") {
            alert("Se ha modificado el cliente.");
            $('#modalModificarCliente').modal('hide');            
        } else {
            alert(res);
        }
    }});
}

function obtenerMascotasCliente() {
    var idCliente = c_IdClienteElegido;
    if (idCliente == 0) {
        return;
    }
    $.ajax({url: "php/obtenerMascotasSelect.php", async: false, type: "POST", data: { idCliente: idCliente, idSelect: "selMascotas" }, success: function(res) {
        $("#divMascotasCliente").html(res);
    }});
}

function editarCliente() {
    if (c_IdClienteElegido <= 0) {
        alert("No ha elegido un cliente.");
    } else {
        $('#modalModificarCliente').modal('show');
        var idCliente = c_IdClienteElegido;
        $.ajax({url: "php/obtenerClienteXML.php", async: false, type: "POST", data: { idCliente: idCliente }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#tbNombreClienteModificar").val($(this).find("nombre").text());
                $("#tbDireccionClienteModificar").val($(this).find("direccion").text());
                $("#tbColoniaClienteModificar").val($(this).find("colonia").text());
                $("#tbMunicipioClienteModificar").val($(this).find("municipio").text());
                $("#tbTelefono1Modificar").val($(this).find("telefono1").text());
                $("#tbTelefono2Modificar").val($(this).find("telefono2").text());
                $("#tbCorreoModificar").val($(this).find("correo").text());
            });
        }});
    }
}

function agregarNuevaMascota() {
    var idCliente = c_IdClienteElegido;
    var nombre = $("#tbNombreMascota").val();
    if (nombre.length == 0) {
        alert("No ha escrito el nombre de la mascota.")
        return;
    }
    var idEspecie = $("#selEspecies").val();
    var idRaza = $("#selRazas").val();
    var fechaNacimiento = $("#selDiaMascota").val() + "/" + $("#selMesMascota").val() + "/" + $("#tbAñoMascota").val();
    var edad = $("#tbEdadMascota").val();
    var caracteristicas = $("#taCaracteristicasMascota").val();
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    var estado = "ACTIVO";

    $.ajax({url: "php/agregarMascota.php", async: false, type: "POST", data: { idCliente: idCliente, idEspecie: idEspecie, idRaza: idRaza, nombre: nombre, fechaNacimiento: fechaNacimiento,
     edad: edad, caracteristicas: caracteristicas, fechaCaptura: fechaCaptura, estado: estado }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado la mascota.");
            $('#modalAgregarMascota').modal('hide');
            limpiarCamposNuevaMascota();
            obtenerMascotasCliente();
        } else {
            alert(res);
        }
    }});
}

function limpiarCamposNuevaMascota() {
    $("#tbNombreMascota").val("");
    $("#selDiaMascota").val("01")
    $("#selMesMascota").val("01")
    $("#tbAñoMascota").val("")
    $("#tbEdadMascota").val("");
    $("#taCaracteristicasMascota").val("");
}

function agregarNuevaEspecie() {
    var especie = $("#tbNuevaEspecie").val();
    if (especie.length == 0) {
        alert("No ha escrito un nombre de especie.")
        return;
    }
    $.ajax({url: "php/agregarEspecie.php", async: false, type: "POST", data: { especie: especie }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado la especie.");
            $('#modalAgregarEspecie').modal('hide');
            $("#tbNuevaEspecie").val("");
            obtenerEspeciesSelect();
        } else {
            alert(res);
        }
    }});
}

function cargarDatosNuevaMascota() {
    obtenerEspeciesSelect();
    obtenerRazasSelect();
}

function obtenerEspeciesSelect() {
    $.ajax({url: "php/obtenerEspeciesSelect.php", async: false, type: "POST", data: { idSelect: "selEspecies" }, success: function(res) {
        $("#divEspecies").html(res);
    }});
}

function cargarEspecieRaza() {
    if ($("#selEspecies").val() == null) {
        $('#modalAgregarRaza').modal('hide');
        return;
    }
    $.ajax({url: "php/obtenerEspeciesSelect.php", async: false, type: "POST", data: { idSelect: "selEspeciesRaza" }, success: function(res) {
        $("#divNuevaRazaEspecie").html(res);
        $("#selEspeciesRaza").val($("#selEspecies").val());
    }});
}

function agregarNuevaRaza() {
    var raza = $("#tbNuevaRaza").val();
    if (raza.length == 0) {
        alert("No ha escrito un nombre de raza.")
        return;
    }
    var idEspecie = $("#selEspecies").val();
    $.ajax({url: "php/agregarRaza.php", async: false, type: "POST", data: { idEspecie: idEspecie, raza: raza }, success: function(res) {
        if (res == "OK") {
            alert("Se ha ingresado la raza.");
            $('#modalAgregarRaza').modal('hide');
            $("#tbNuevaRaza").val("");
            obtenerRazasSelect();
        } else {
            alert(res);
        }
    }});
}

function obtenerRazasSelect() {
    var idEspecie = $("#selEspecies").val();
    if ($("#selEspecies").val() == null) {
        return;
    }
    $.ajax({url: "php/obtenerRazasSelect.php", async: false, type: "POST", data: { idEspecie: idEspecie, idSelect: "selRazas" }, success: function(res) {
        $("#divRazas").html(res);
    }});
}

function limpiarCamposNuevaEspecie() {
    $("#tbNuevaEspecie").val("");
}

function limpiarCamposNuevaRaza() {
    $("#tbNuevaRaza").val("");
}

function editarMascota() {
    c_IdMascotaElegida = $("#selMascotas").val();

    if (c_IdMascotaElegida > 0) {
        $('#modalModificarMascota').modal('show');
        obtenerEspeciesSelectModificar();
        obtenerRazasSelectModificar();
    } else {
        alert("No ha elegido una mascota.");
    }
}

function modificarMascota() {

}

function obtenerEspeciesSelectModificar() {
    $.ajax({url: "php/obtenerEspeciesSelect.php", async: false, type: "POST", data: { idSelect: "selEspeciesModificar" }, success: function(res) {
        $("#divEspeciesModificar").html(res);
    }});
}

function obtenerRazasSelectModificar() {
    var idEspecie = $("#selEspeciesModificar").val();
    if ($("#selEspeciesModificar").val() == null) {
        return;
    }
    $.ajax({url: "php/obtenerRazasSelect.php", async: false, type: "POST", data: { idEspecie: idEspecie, idSelect: "selRazasModificar" }, success: function(res) {
        $("#divRazasModificar").html(res);
    }});
}
//Variables para el módulo de nueva cita
var nc_IdClienteElegido = 0;
var nc_Restan = 0;
//Funciones para el módulo de nueva cita
function mostrarInfoCita() {
    var tipoCita = $("#selTipoCita").val();
    if (tipoCita == "ESTETICA") {
        $("#divDatosCita").show();
        $("#divDatosCitaTotales").show();
        $("#divDatosCitaEstetica").show();
        $("#divDatosCitaMedica").hide();
    } else if (tipoCita == "MEDICA") {
        $("#divDatosCita").show();
        $("#divDatosCitaTotales").show();
        $("#divDatosCitaEstetica").hide();
        $("#divDatosCitaMedica").show();
    } else {
        $("#divDatosCita").hide();
        $("#divDatosCitaTotales").hide();
        $("#divDatosCitaEstetica").hide();
        $("#divDatosCitaMedica").hide();
    }
}

function limpiarCamposNuevaCita() {
    $("#selTipoCita").val("NO");
    $("#tbCliente").val("");
    nc_IdClienteElegido = 0;
    $("#divMascotasCliente").html("");
    $("#selDia").val(obtenerFechaHoraActual("DAY"));
    $("#selMes").val(obtenerFechaHoraActual("MONTH"));
    $("#tbAño").val(obtenerFechaHoraActual("YEAR"));
    $("#tbTotal").val("0");
    $("#tbAnticipo").val("0");
    $("#lblRestan").text("$");
    $("#selCorte").val("NO");
    $("#selBaño").val("NO");
    $("#tbPeso").val("");
    $("#tbTemperatura").val("");
    $("#selAparienciaGeneral").val("NORMAL");
    $("#tbAparienciaGeneral").val("");
    $("#selPiel").val("NORMAL");
    $("#tbPiel").val("");
    $("#selMusculosqueleto").val("NORMAL");
    $("#tbMusculosqueleto").val("");
    $("#selCirculatorio").val("NORMAL");
    $("#tbCirculatorio").val("");
    $("#selDigestivo").val("NORMAL");
    $("#tbDigestivo").val("");
    $("#selRespiratorio").val("NORMAL");
    $("#tbRespiratorio").val("");
    $("#selGenitourinario").val("NORMAL");
    $("#tbGenitourinario").val("");
    $("#selOjos").val("NORMAL");
    $("#tbOjos").val("");
    $("#selOidos").val("NORMAL");
    $("#tbOidos").val("");
    $("#selSistemaNervioso").val("NORMAL");
    $("#tbSistemaNervioso").val("");
    $("#selGanglios").val("NORMAL");
    $("#tbGanglios").val("");
    $("#selMucosas").val("NORMAL");
    $("#tbMucosas").val("");
    $("#taListaProblemas").val("");
    $("#taPlanesDiagnosticos").val("");
    $("#taPlanesTerapeuticos").val("");
    $("#tbInstruccionesCliente").val("");
    $("#divDatosCita").hide();
    $("#divDatosCitaTotales").hide();
    $("#divDatosCitaEstetica").hide();
    $("#divDatosCitaMedica").hide();
    $("#lblRestan").text("$ 0");
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
        if (res == "OK") {
            alert("Se ha ingresado el cliente.");
            $('#modalAgregarCliente').modal('hide');
        } else {
            alert(res);
        }
    }});
}

function elegirCliente(id) {
    nc_IdClienteElegido = id;
    obtenerMascotasCliente();
}

function obtenerMascotasCliente() {
    
}

function verificarTotales() {
    var total = $("#tbTotal").val();
    var anticipo = $("#tbAnticipo").val();
    if (isNaN(total)) {
        alert("No ha escrito un número válido para el total.");
        $("#tbTotal").val("0");
        return;
    }
    if (isNaN(anticipo)) {
        alert("No ha escrito un número válido para el anticipo.");
        $("#tbAnticipo").val("0");
        return;
    }
    if (total < anticipo) {
        alert("El anticipo es mayor que el total de la cita.");
        $("#tbAnticipo").val("0");
        return;
    }
    nc_Restan = total - anticipo;
    $("#lblRestan").text(nc_Restan);
}
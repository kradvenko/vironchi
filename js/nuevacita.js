var nc_IdClienteElegido = 0;
//Funciones para el módulo de nueva cita
function mostrarInfoCita() {
    var tipoCita = $("#selTipoCita").val();
    if (tipoCita == "ESTETICA") {
        $("#divDatosCitaEstetica").show();
        $("#divDatosCitaMedica").hide();
    } else if (tipoCita == "MEDICA") {
        $("#divDatosCitaEstetica").hide();
        $("#divDatosCitaMedica").show();
    } else {
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
    $("#divDatosCitaEstetica").hide();
    $("#divDatosCitaMedica").hide();
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
}
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
}

function limpiarCamposNuevoCliente() {
    $("#tbNombreCliente").val("");
    $("#tbDireccionCliente").val("");
    $("#tbColoniaCliente").val("");
    $("#tbMunicipioCliente").val("");
    $("#tbTelefono1").val("");
    $("#tbTelefono2").val("");
    $("#tbCorreo").val("");
}
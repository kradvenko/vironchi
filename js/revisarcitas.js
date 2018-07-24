//Variables para el módulo para revisar citas


//Funciones para el módulo para revisar citas
function limpiarCamposRevisarCita() {
    $("#selDia").val(obtenerFechaHoraActual("DAY"));
    $("#selMes").val(obtenerFechaHoraActual("MONTH"));
    $("#tbAño").val(obtenerFechaHoraActual("YEAR"));
}

function buscarCitas() {
    var diaCita = $("#selDia").val();
    var mesCita = $("#selMes").val();
    var añoCita = $("#tbAño").val();

    $.ajax({url: "php/obtenerCitas.php", async: false, type: "POST", data: { diaCita: diaCita, mesCita: mesCita, anoCita: añoCita }, success: function(res) {
           $("#divCitas").html(res);
    }});
}

function detallesCita(idcita, tipocita) {
    if (tipocita == "MEDICA") {
        $('#modalCitaMedica').modal('show');
        obtenerDatosCita(idcita, tipocita);
    } else if (tipocita == "ESTETICA") {
        $('#modalCitaEstetica').modal('show');
        obtenerDatosCita(idcita, tipocita);
    }
}

function obtenerDatosCita(idcita, tipocita) {
    $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idcita, tipoCita: tipocita }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            document.cookie = "v_idusuario=" + $(this).find("idusuario").text() + "; Path=/;";
        });
    }});
}
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

function detallesCita(idcita) {
    
}
//Variables para el módulo para revisar citas


//Funciones para el módulo para revisar citas
function limpiarCamposRevisarCita() {
    $("#selDia").val(obtenerFechaHoraActual("DAY"));
    $("#selMes").val(obtenerFechaHoraActual("MONTH"));
    $("#tbAño").val(obtenerFechaHoraActual("YEAR"));
}

function buscarCitas() {
    
}
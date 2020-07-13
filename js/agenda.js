function cargarFecha() {
    $("#selDia").val(obtenerFechaHoraActual("DAY"));
    $("#selMes").val(obtenerFechaHoraActual("MONTH"));
    $("#tbAño").val(obtenerFechaHoraActual("YEAR"));
}
function agregarCita(e, segmento) {

    var keynum;

    if(window.event) {                
      keynum = e.keyCode;
    } else if(e.which){ 
      keynum = e.which;
    }

    //alert(String.fromCharCode(keynum));
    //alert(keynum);
    if (keynum == 13) {
        var diaCita = $("#selDia").val();
        var mesCita = $("#selMes").val();
        var añoCita = $("#tbAño").val();

        var nombre = $("#tbAgendaNombre" + segmento).val();
        var observaciones = $("#tbAgendaObservacion" + segmento).val();

        var fechaCaptura = obtenerFechaHoraActual('FULL');

        $.ajax({url: "php/agregarCitaAgenda.php", async: false, type: "POST", data: { diaCita: diaCita, mesCita: mesCita, anoCita: añoCita,
            fechaCaptura: fechaCaptura, nombre: nombre, observaciones: observaciones, segmento: segmento
            }, success: function(res) {
            if (res == "OK") {
                            
            } else {
                alert(res);
            }
        }});
    }
}

function obtenerCitas() {
    var diaCita = $("#selDia").val();
    var mesCita = $("#selMes").val();
    var añoCita = $("#tbAño").val();

    $.ajax({url: "php/obtenerCitasAgendaXML.php", async: false, type: "POST", data: { diaCita: diaCita, mesCita: mesCita, anoCita: añoCita }, success: function(res) {
        $('cita', res).each(function(index, element) {

            var segmento = $(this).find("segmento").text();

            $("#tbAgendaNombre" + segmento).val($(this).find("nombre").text());            
            $("#tbAgendaObservacion" + segmento).val($(this).find("observaciones").text());

            var asistio = $(this).find("asistio").text();

            if (asistio == "SI") {
                $("#cbAgendaAsistio" + segmento).prop("checked", true);
            }
            
        });
    }});
}

function agregarAsistenciaCita(segmento) {

    
    var diaCita = $("#selDia").val();
    var mesCita = $("#selMes").val();
    var añoCita = $("#tbAño").val();

    var fechaCaptura = obtenerFechaHoraActual('FULL');

    var asistio = "NO";

    //alert($("#cbAgendaAsistio" + segmento + ":checked").val());
    if ($("#cbAgendaAsistio" + segmento + ":checked").val() == "on") {
        asistio = "SI";
    }

    $.ajax({url: "php/agregarAsistenciaCita.php", async: false, type: "POST", data: { diaCita: diaCita, mesCita: mesCita, anoCita: añoCita,
        fechaCaptura: fechaCaptura, segmento: segmento, asistio: asistio
        }, success: function(res) {
        if (res == "OK") {
                        
        } else {
            alert(res);
        }
    }});
}

function buscarCitasBoton() {
    limpiarCampos();    
    obtenerCitas();
}

function limpiarCampos() {
    $(".tbagenda").val("");
    $(".cbAgenda").prop("checked", false);
}
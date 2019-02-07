//Variables para el módulo para revisar citas
var rc_IdCitaElegida = 0;
var rc_CitaResta = 0;
var rc_TipoBusqueda;
//Funciones para el módulo para revisar citas
function limpiarCamposRevisarCita() {
    $("#selDia").val(obtenerFechaHoraActual("DAY"));
    $("#selMes").val(obtenerFechaHoraActual("MONTH"));
    $("#tbAño").val(obtenerFechaHoraActual("YEAR"));
    $("#tbNombreBusqueda").val("");
    $("#cbFinalizados").prop("checked", false);
    $("#cbNoPagadas").prop("checked", false);
}

function buscarCitas(tipo) {
    rc_TipoBusqueda = tipo;
    var incluirFinalizadas = "NO";
    var noPagadas = "NO";
        
    if ($("#cbFinalizados").prop("checked") == true) {
        incluirFinalizadas = "SI";
    }
    if ($("#cbNoPagadas").prop("checked") == true) {
        noPagadas = "SI";
    }
    if (tipo == 'Fecha') {
        var diaCita = $("#selDia").val();
        var mesCita = $("#selMes").val();
        var añoCita = $("#tbAño").val();
        var tipoCita = $("#selTipoCita").val();

        $.ajax({url: "php/obtenerCitas.php", async: false, type: "POST", data: { diaCita: diaCita, mesCita: mesCita, anoCita: añoCita, tipoCita: tipoCita, tipoBusqueda: tipo, incluirFinalizadas: incluirFinalizadas, noPagadas: noPagadas }, success: function(res) {
            $("#divCitas").html(res);
        }});
    } else if (tipo == "Nombre") {
        var nombre = $("#tbNombreBusqueda").val();
        if (nombre.length == 0) {
            return;
        }
        $.ajax({url: "php/obtenerCitas.php", async: false, type: "POST", data: { nombre: nombre, tipoBusqueda: tipo, incluirFinalizadas: incluirFinalizadas, noPagadas: noPagadas }, success: function(res) {
            $("#divCitas").html(res);
        }});
    }
}

function detallesCita(idcita, tipocita) {
    if (tipocita == "MEDICA") {
        obtenerDatosCita(idcita, tipocita);
        $('#modalCitaMedica').modal('show');
    } else if (tipocita == "ESTETICA") {
        obtenerDatosCita(idcita, tipocita);
        $('#modalCitaEstetica').modal('show');
    }
}

function obtenerDatosCita(idcita, tipocita) {
    if (tipocita == 'MEDICA') {
        $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idcita, tipoCita: tipocita }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#tbTotal").val($(this).find("total").text());
                $("#tbAnticipo").val($(this).find("anticipo").text());
                $("#lblRestan").text("$ " + $(this).find("restan").text());
                $("#tbPeso").val($(this).find("cm_peso").text());
                $("#tbTemperatura").val($(this).find("cm_temperatura").text());
                $("#selAparienciaGeneral").val($(this).find("cm_aparienciageneral").text());
                $("#tbAparienciaGeneral").val($(this).find("cm_aparienciageneralnotas").text());
                $("#selPiel").val($(this).find("cm_piel").text());
                $("#tbPiel").val($(this).find("cm_pielnotas").text());
                $("#selMusculosqueleto").val($(this).find("cm_muscoesqueleto").text());
                $("#tbMusculosqueleto").val($(this).find("cm_muscoesqueletonotas").text());
                $("#selCirculatorio").val($(this).find("cm_circulatorio").text());
                $("#tbCirculatorio").val($(this).find("cm_circulatorionotas").text());
                $("#selDigestivo").val($(this).find("cm_digestivo").text());
                $("#tbDigestivo").val($(this).find("cm_digestivonotas").text());
                $("#selRespiratorio").val($(this).find("cm_respiratorio").text());
                $("#tbRespiratorio").val($(this).find("cm_respiratorionotas").text());
                $("#selGenitourinario").val($(this).find("cm_genitourinario").text());
                $("#tbGenitourinario").val($(this).find("cm_genitourinarionotas").text());
                $("#selOjos").val($(this).find("cm_ojos").text());
                $("#tbOjos").val($(this).find("cm_ojosnotas").text());
                $("#selOidos").val($(this).find("cm_oidos").text());
                $("#tbOidos").val($(this).find("cm_oidosnotas").text());
                $("#selSistemaNervioso").val($(this).find("cm_sistemanervioso").text());
                $("#tbSistemaNervioso").val($(this).find("cm_sistemanerviosonotas").text());
                $("#selGanglios").val($(this).find("cm_ganglios").text());
                $("#tbGanglios").val($(this).find("cm_gangliosnotas").text());
                $("#selMucosas").val($(this).find("cm_mucosas").text());
                $("#tbMucosas").val($(this).find("cm_mucosasnotas").text());
                $("#taListaProblemas").val($(this).find("cm_listaproblemas").text());
                $("#taPlanesDiagnosticos").val($(this).find("cm_planesdiagnosticos").text());
                $("#taPlanesTerapeuticos").val($(this).find("cm_planesterapeuticos").text());
                $("#tbInstruccionesCliente").val($(this).find("cm_instruccionescliente").text());
                $("#taNotasMedicas").val($(this).find("cm_notas").text());
                $("#taDiagnostico").val($(this).find("cm_diagnostico").text());
            });
        }});
    } else if (tipocita == "ESTETICA") {
        $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idcita, tipoCita: tipocita }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#tbTotalEstetica").val($(this).find("total").text());
                $("#tbAnticipoEstetica").val($(this).find("anticipo").text());
                $("#lblRestanEstetica").text("$ " + $(this).find("restan").text());
                $("#selCorte").val($(this).find("ce_corte").text());
                $("#selBaño").val($(this).find("ce_bano").text());
                $("#taNotasEsteticas").val($(this).find("ce_notas").text());
            });
        }});
    }
}

function limpiarCamposCitaMedica() {
    $("#tbCliente").val("");
    $("#divMascotasCliente").html("");
    $("#tbTotal").val("0");
    $("#tbAnticipo").val("0");
    $("#lblRestan").text("$");
    $("#selCorte").val("NO");
    $("#selBaño").val("NO");
    $("#tbPeso").val("");
    $("#tbTemperatura").val("");
    $("#taNotasEsteticas").val("");
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
    $("#taNotasMedicas").val("");
    $("#lblRestan").text("$ 0");
    $("#taDiagnostico").val("");
}

function finalizarCita(idCita) {
    rc_IdCitaElegida = idCita;
    $('#modalFinalizarCita').modal('show');
}

function finCita() {
    var fechaFinalizado = obtenerFechaHoraActual('FULL');
    $.ajax({url: "php/finalizarCita.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, fechaFinalizado: fechaFinalizado }, success: function(res) {
        if (res == "OK") {
            alert("Se ha finalizado la cita.");
            buscarCitas(rc_TipoBusqueda);
            $('#modalFinalizarCita').modal('hide');
        } else {
            alert("No se ha podido finalizar la cita: " + res);
        }
    }});    
}

function cargarDatosCliente(idCliente) {
    $('#modalCliente').modal('show');
    $.ajax({url: "php/obtenerClienteXML.php", async: false, type: "POST", data: { idCliente: idCliente }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbNombreCliente").val($(this).find("nombre").text());
            $("#tbDireccionCliente").val($(this).find("direccion").text());
            $("#tbColoniaCliente").val($(this).find("colonia").text());
            $("#tbMunicipioCliente").val($(this).find("municipio").text());
            $("#tbTelefono1").val($(this).find("telefono1").text());
            $("#tbTelefono2").val($(this).find("telefono2").text());
            $("#tbCorreo").val($(this).find("correo").text());
        });
    }});
}

function cargarDatosMascota(idMascota) {
    $('#modalMascota').modal('show');
    $.ajax({url: "php/obtenerMascotaXML.php", async: false, type: "POST", data: { idMascota: idMascota }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#tbNombreMascota").val($(this).find("nombre").text());
            obtenerEspeciesSelect();
            $("#selEspecies").val($(this).find("idespecie").text());
            obtenerRazasSelect();
            $("#selRazas").val($(this).find("idraza").text());
            $("#selDiaMascota").val($(this).find("fechanacimiento").text().substr(0, 2));
            $("#selMesMascota").val($(this).find("fechanacimiento").text().substr(3, 2));
            $("#tbAñoMascota").val($(this).find("fechanacimiento").text().substr(6, 4));
            $("#tbEdadMascota").val($(this).find("edad").text());
            $("#taCaracteristicasMascota").val($(this).find("caracteristicas").text());
            $("#selGeneroMascota").val($(this).find("genero").text());
        });
    }});
}

function verPagos(idCita) {
    rc_IdCitaElegida = idCita;
    $('#modalPagos').modal('show');
    $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idCita, tipoCita: "%" }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#lblTotalPagos").text("$ " + $(this).find("total").text());
            $("#lblAnticiposPagos").text("$ " + $(this).find("anticipo").text());
            $("#lblRestanPagos").text("$ " + $(this).find("restan").text());
            rc_CitaResta = $(this).find("restan").text();
        });
    }});
    $.ajax({url: "php/obtenerPagos.php", async: false, type: "POST", data: { idCita: idCita }, success: function(res) {
        $("#divListaPagos").html(res);
    }});
}
function obtenerEspeciesSelect() {
    $.ajax({url: "php/obtenerEspeciesSelect.php", async: false, type: "POST", data: { idSelect: "selEspecies" }, success: function(res) {
        $("#divEspecies").html(res);
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

function limpiarCamposMascota() {

}

function limpiarCamposPagos() {
    rc_IdCitaElegida = 0;
    rc_CitaResta = 0;
    $("#divListaPagos").html("");
    $("#lblTotalPagos").text("$ " + $(this).find("total").text());
    $("#lblAnticiposPagos").text("$ ");
    $("#lblRestanPagos").text("$ ");
}

function limpiarCamposNuevoPago() {
    $("#tbCantidadPago").val("");
    $("#taNotasPago").val("");
}

function nuevoPago() {
    $('#modalNuevoPago').modal('show');
}

function agregarNuevoPago() {
    var cantidad = $("#tbCantidadPago").val();
    if (isNaN(cantidad)) {
        alert("No ha escrito una cantidad válida.");
        return;
    }
    
    if (parseFloat(cantidad) > parseFloat(rc_CitaResta)) {
        alert("La cantidad a pagar es mayor que lo que resta por pagar.");
        return;
    }
    if (cantidad == 0) {
        alert("La cantidad a pagar es 0.");
        return;
    }
    if (rc_CitaResta == 0) {
        alert("No es posible realizar pagos a esta cita. No hay adeudo.");
        return;
    }
    var fechaPago = obtenerFechaHoraActual('FULL');
    var notas = $("#taNotasPago").val();
    $.ajax({url: "php/agregarPago.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, cantidad: cantidad, fechaPago: fechaPago, notas: notas }, success: function(res) {
        if (res == "OK") {
            limpiarCamposNuevoPago();
            $('#modalNuevoPago').modal('hide');
            $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, tipoCita: "%" }, success: function(res) {
                $('resultado', res).each(function(index, element) {
                    $("#lblTotalPagos").text("$ " + $(this).find("total").text());
                    $("#lblAnticiposPagos").text("$ " + $(this).find("anticipo").text());
                    $("#lblRestanPagos").text("$ " + $(this).find("restan").text());
                    rc_CitaResta = $(this).find("restan").text();
                });
            }});
            $.ajax({url: "php/obtenerPagos.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida }, success: function(res) {
                $("#divListaPagos").html(res);
            }});
            alert("Se ha agregado el pago.");
        } else {
            alert(res);
        }
    }});
}
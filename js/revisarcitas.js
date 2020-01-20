//Variables para el módulo para revisar citas
var rc_IdCitaElegida = 0;
var rc_Total = 0;
var rc_CitaResta = 0;
var rc_Extras = 0;
var rc_Anticipo = 0;
var rc_TotalCita = 0; 
var rc_TipoBusqueda;
var rc_CostosExtraCita = [];
var rc_IdClienteElegido = 0;
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
        rc_IdCitaElegida = idcita;
    } else if (tipocita == "ESTETICA") {
        obtenerDatosCita(idcita, tipocita);
        $('#modalCitaEstetica').modal('show');
        rc_IdCitaElegida = idcita;
    }
}

function obtenerDatosCita(idcita, tipocita) {
    if (tipocita == 'MEDICA') {
        $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idcita, tipoCita: tipocita }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#divSeguimientoHeader").html($(this).find("fechacaptura").text());
                rc_IdClienteElegido = $(this).find("idcliente").text();
                rc_IdMascota = $(this).find("idmascota").text();
                $("#lblTotalMedica").text("$ " + $(this).find("total").text());
                rc_Total = $(this).find("total").text();
                $("#lblExtrasM").text("$ " + $(this).find("costoextra").text());
                rc_Extras = $(this).find("costoextra").text();
                $("#tbAnticipo").val($(this).find("anticipo").text());
                rc_Anticipo = $(this).find("anticipo").text();
                $("#lblRestan").text("$ " + $(this).find("restan").text());
                rc_CitaResta = $(this).find("restan").text();                
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
                total = parseFloat($(this).find("total").text()) + parseFloat($(this).find("costoextra").text());
                $("#lblTotalCitaMedica").text("$ " + total);

                $("select").each(function( index ) {
                    if ($(this).val() == 'ANORMAL') {
                        $(this).css("background-color", "#FE0000");
                        $(this).css("color", "#FFFFFF");
                    }
                    $(this).change(function() {
                        if ($(this).val() == 'ANORMAL') {
                            $(this).css("background-color", "#FE0000");
                            $(this).css("color", "#FFFFFF");
                        } else {
                            $(this).css("background-color", "#FFFFFF");
                            $(this).css("color", "#000000");
                        }
                    });
                });

                $.ajax({url: "php/obtenerSeguimientoCita.php", async: false, type: "POST", data: { idCita: idcita }, success: function(res) {
                    $("#divSeguimiento").html(res);
                }});
            });
        }});
    } else if (tipocita == "ESTETICA") {
        $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idcita, tipoCita: tipocita }, success: function(res) {
            $('resultado', res).each(function(index, element) {
                $("#lblTotalEstetica").text("$ " + $(this).find("total").text());
                rc_Total = $(this).find("total").text();
                $("#lblExtrasE").text("$ " + $(this).find("costoextra").text());
                rc_Extras = $(this).find("costoextra").text();
                $("#tbAnticipoEstetica").val($(this).find("anticipo").text());
                rc_Anticipo = $(this).find("anticipo").text();
                $("#lblRestanEstetica").text("$ " + $(this).find("restan").text());
                rc_CitaResta = $(this).find("restan").text();
                $("#selCorte").val($(this).find("ce_corte").text());
                $("#selBaño").val($(this).find("ce_bano").text());
                $("#taNotasEsteticas").val($(this).find("ce_notas").text());
                total = parseFloat($(this).find("total").text()) + parseFloat($(this).find("costoextra").text());
                $("#lblTotalCitaEstetica").text("$ " + total);
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
            $("#lblExtrasPagos").text("$ " + $(this).find("costoextra").text());
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

function actualizarCitaMedica() {
    if (rc_IdCitaElegida > 0) {
        var peso = $("#tbPeso").val();
        var temperatura = $("#tbTemperatura").val();
        var aparienciaGeneral = $("#selAparienciaGeneral").val();
        var aparienciaGeneralNotas = $("#tbAparienciaGeneral").val();
        var piel = $("#selPiel").val();
        var pielNotas = $("#tbPiel").val();
        var musculosqueleto = $("#selMusculosqueleto").val();
        var musculosqueletoNotas = $("#tbMusculosqueleto").val();
        var circulatorio = $("#selCirculatorio").val();
        var circulatorioNotas = $("#tbCirculatorio").val();
        var digestivo = $("#selDigestivo").val();
        var digestivoNotas = $("#tbDigestivo").val();
        var respiratorio = $("#selRespiratorio").val();
        var respiratorioNotas = $("#tbRespiratorio").val();
        var genitourinario = $("#selGenitourinario").val();
        var genitourinarioNotas = $("#tbGenitourinario").val();
        var ojos = $("#selOjos").val();
        var ojosNotas = $("#tbOjos").val();
        var oidos = $("#selOidos").val();
        var oidosNotas = $("#tbOidos").val();
        var sistemaNervioso = $("#selSistemaNervioso").val();
        var sistemaNerviosoNotas = $("#tbSistemaNervioso").val();
        var ganglios = $("#selGanglios").val();
        var gangliosNotas = $("#tbGanglios").val();
        var mucosas = $("#selMucosas").val();
        var mucosasNotas = $("#tbMucosas").val();
        var listaProblemas = $("#taListaProblemas").val();
        var planesDiagnosticos = $("#taPlanesDiagnosticos").val();
        var planesTerapeuticos = $("#taPlanesTerapeuticos").val();
        var instruccionesCliente = $("#tbInstruccionesCliente").val();
        var notasMedicas = $("#taNotasMedicas").val();        
        var diagnostico = $("#taDiagnostico").val();

        $.ajax({url: "php/actualizarCitaMedica.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, peso: peso, temperatura: temperatura, aparienciaGeneral: aparienciaGeneral, aparienciaGeneralNotas: aparienciaGeneralNotas, piel: piel, pielNotas: pielNotas,
        musculosqueleto: musculosqueleto, musculosqueletoNotas: musculosqueletoNotas, circulatorio: circulatorio, circulatorioNotas: circulatorioNotas, digestivo: digestivo,
        digestivoNotas: digestivoNotas, respiratorio: respiratorio, respiratorioNotas: respiratorioNotas, genitourinario: genitourinario, genitourinarioNotas: genitourinarioNotas,
        ojos: ojos, ojosNotas: ojosNotas, oidos: oidos, oidosNotas: oidosNotas, sistemaNervioso: sistemaNervioso, sistemaNerviosoNotas: sistemaNerviosoNotas,
        ganglios: ganglios, gangliosNotas: gangliosNotas, mucosas: mucosas, mucosasNotas: mucosasNotas, listaProblemas: listaProblemas, planesDiagnosticos: planesDiagnosticos,
        planesTerapeuticos: planesTerapeuticos, instruccionesCliente: instruccionesCliente, notasMedicas: notasMedicas, diagnostico: diagnostico }, success: function(res) {
            if (res == "OK") {
                alert("Se ha actualizado la cita.");
            } else {
                alert(res);
            }
        }});
    } else {
        alert("Elija una cita.");
    }
}

function actualizarCitaEstetica() {
    if (rc_IdCitaElegida > 0) {
        var corte = $("#selCorte").val();
        var bano = $("#selBaño").val();
        var notasEstetica = $("#taNotasEsteticas").val();

        $.ajax({url: "php/actualizarCitaEstetica.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, corte: corte, bano: bano, notasEstetica: notasEstetica }, success: function(res) {
            if (res == "OK") {
                alert("Se ha actualizado la cita.");
            } else {
                alert(res);
            }
        }});
    } else {
        alert("Elija una cita.");
    }
}
//Funciones para los costos extra
function agregarCostoExtraACita() {
    var costoExtra = { id: $("#selCostosExtra").val(), Razon: $("#selCostosExtra option:selected").text(), Costo: $("#tbCostoExtraCosto").val() };
    rc_CostosExtraCita[rc_CostosExtraCita.length] = costoExtra;
    mostrarCostosExtraCita();
    verificarTotales();
    actualizarCostosExtra();
}

function cargarCostosExtra() {
    obtenerCostosExtra();
}

function obtenerCostosExtra() {
    $.ajax({url: "php/obtenerCostosExtraSelect.php", async: false, type: "POST", data: { idSelect: "selCostosExtra" }, success: function(res) {
        $("#divCostosExtra").html(res);
        $("#tbCostoExtraCosto").val('');
    }});
}

function obtenerCostosExtraCita() {
    rc_CostosExtraCita = [];
    if (rc_IdCitaElegida > 0) {
        $.ajax({url: "php/obtenerCostosExtraCitaXML.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida }, success: function(res) {
            $('c', res).each(function(index, element) {
                var costoExtra;
                costoExtra = { id: $(this).find("idcostoextra").text(), Razon: $(this).find("razon").text(), Costo: $(this).find("costo").text() };
                rc_CostosExtraCita[rc_CostosExtraCita.length] = costoExtra;                
            });
        }});
        mostrarCostosExtraCita();
    }
}

function mostrarCostosExtraCita() {
    $("#divCitaCostosExtra").jsGrid({
        width: "100%",
        height: "100%",
 
        inserting: false,
        editing: false,
        sorting: false,
        paging: false,
        deleting: false,
 
        data: rc_CostosExtraCita,

        deleteConfirm: "¿Desea borrar el costo extra?",

        onItemDeleted: function (args) {
            verificarTotales();
            actualizarCostosExtra();
        },

        rowClick: function(args) {
            //elegirArticulo(args.item.id, args.item.idMatriz);
        },
 
        fields: [
            { name: "Razon", type: "text", width: 50, validate: "required" },
            { name: "Costo", type: "text", width: 20, validate: "required" },
            { type: "control" }
        ]
    });
}

function elegirCostoExtra(costo) {
    $("#tbCostoExtraCosto").val(costo);
}

function verificarTotales() {
    var total = 0;
    var extras = 0;

    if (rc_CostosExtraCita.length > 0) {
        for (i = 0; i < rc_CostosExtraCita.length; i++) {
            extras = parseFloat(extras) + parseFloat(rc_CostosExtraCita[i].Costo);
        }
    }
    total = parseFloat(rc_Total) + parseFloat(extras);
    
    rc_TotalCita = total;
    rc_Extras = extras;
    rc_CitaResta = total - rc_Anticipo;

    $("#lblTotalCitaMedica").text("$ " + rc_TotalCita);
    $("#lblTotalCitaEstetica").text("$ " + rc_TotalCita);
    $("#lblExtrasM").text("$ " + rc_Extras);
    $("#lblExtrasE").text("$ " + rc_Extras);
    $("#lblRestan").text("$ " + rc_CitaResta);
    $("#lblRestanEstetica").text("$ " + rc_CitaResta);
}

function actualizarCostosExtra() {
    if (rc_IdCitaElegida > 0) {
        $.ajax({url: "php/actualizarCostosExtraCita.php", async: false, type: "POST", data: { idCita: rc_IdCitaElegida, costosExtra: rc_CostosExtraCita, costoExtra: rc_Extras, restan: rc_CitaResta }, success: function(res) {
            
        }});
    }
}

function agregarCitaSeguimiento() {
    
    if (rc_IdClienteElegido == 0) {
        alert("No ha elegido un cliente para la cita.");
        return;
    }
    var idCliente = rc_IdClienteElegido;
    var idMascota = rc_IdMascota;
    if (idMascota == null) {
        alert("No ha elegido una mascota para la cita.");
        return;
    }
    var idCita = rc_IdCitaElegida;
    var tipoCita = "MEDICA";
    var diaCita = "";
    var mesCita = "";
    var añoCita = "";
    var totalCita = "0";
    var extraCita = "0";
    var anticipoCita = "0";
    var restanCita = "0";
    var corte = "0";
    var baño = "";
    var notasEstetica = "";
    var peso = $("#tbPeso").val();
    var temperatura = $("#tbTemperatura").val();
    var aparienciaGeneral = $("#selAparienciaGeneral").val();
    var aparienciaGeneralNotas = $("#tbAparienciaGeneral").val();
    var piel = $("#selPiel").val();
    var pielNotas = $("#tbPiel").val();
    var musculosqueleto = $("#selMusculosqueleto").val();
    var musculosqueletoNotas = $("#tbMusculosqueleto").val();
    var circulatorio = $("#selCirculatorio").val();
    var circulatorioNotas = $("#tbCirculatorio").val();
    var digestivo = $("#selDigestivo").val();
    var digestivoNotas = $("#tbDigestivo").val();
    var respiratorio = $("#selRespiratorio").val();
    var respiratorioNotas = $("#tbRespiratorio").val();
    var genitourinario = $("#selGenitourinario").val();
    var genitourinarioNotas = $("#tbGenitourinario").val();
    var ojos = $("#selOjos").val();
    var ojosNotas = $("#tbOjos").val();
    var oidos = $("#selOidos").val();
    var oidosNotas = $("#tbOidos").val();
    var sistemaNervioso = $("#selSistemaNervioso").val();
    var sistemaNerviosoNotas = $("#tbSistemaNervioso").val();
    var ganglios = $("#selGanglios").val();
    var gangliosNotas = $("#tbGanglios").val();
    var mucosas = $("#selMucosas").val();
    var mucosasNotas = $("#tbMucosas").val();
    var listaProblemas = $("#taListaProblemas").val();
    var planesDiagnosticos = $("#taPlanesDiagnosticos").val();
    var planesTerapeuticos = $("#taPlanesTerapeuticos").val();
    var instruccionesCliente = $("#tbInstruccionesCliente").val();
    var notasMedicas = $("#taNotasMedicas").val();
    var estado = "ACTIVO";
    var fechaCaptura = obtenerFechaHoraActual('FULL');
    var diagnostico = $("#taDiagnostico").val();

    $.ajax({url: "php/agregarCitaSeguimiento.php", async: false, type: "POST", data: { idCita: idCita, idCliente: idCliente, tipoCita: tipoCita, idMascota: idMascota, diaCita: diaCita,
    mesCita: mesCita, anoCita: añoCita, totalCita: totalCita, extraCita: extraCita, anticipoCita: anticipoCita, restanCita: restanCita, corte: corte, bano: baño, notasEstetica: notasEstetica,
    peso: peso, temperatura: temperatura, aparienciaGeneral: aparienciaGeneral, aparienciaGeneralNotas: aparienciaGeneralNotas, piel: piel, pielNotas: pielNotas,
    musculosqueleto: musculosqueleto, musculosqueletoNotas: musculosqueletoNotas, circulatorio: circulatorio, circulatorioNotas: circulatorioNotas, digestivo: digestivo,
    digestivoNotas: digestivoNotas, respiratorio: respiratorio, respiratorioNotas: respiratorioNotas, genitourinario: genitourinario, genitourinarioNotas: genitourinarioNotas,
    ojos: ojos, ojosNotas: ojosNotas, oidos: oidos, oidosNotas: oidosNotas, sistemaNervioso: sistemaNervioso, sistemaNerviosoNotas: sistemaNerviosoNotas,
    ganglios: ganglios, gangliosNotas: gangliosNotas, mucosas: mucosas, mucosasNotas: mucosasNotas, listaProblemas: listaProblemas, planesDiagnosticos: planesDiagnosticos,
    planesTerapeuticos: planesTerapeuticos, instruccionesCliente: instruccionesCliente, notasMedicas: notasMedicas, estado: estado, fechaCaptura: fechaCaptura,diagnostico: diagnostico }, success: function(res) {
        if (res == "OK") {
            alert("Se ha guardado el seguimiento.");
            //limpiarCamposNuevaCita();
            $.ajax({url: "php/obtenerSeguimientoCita.php", async: false, type: "POST", data: { idCita: idCita }, success: function(res) {
                $("#divSeguimiento").html(res);
            }});
        } else {
            alert(res);
        }
    }});
}

function obtenerDatosSeguimiento(idCita) {
    $.ajax({url: "php/obtenerDatosCitaXML.php", async: false, type: "POST", data: { idCita: idCita, tipoCita: "MEDICA" }, success: function(res) {
        $('resultado', res).each(function(index, element) {
            $("#divSeguimientoHeader").html($(this).find("fechacaptura").text());
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
    $("select").each(function( index ) {
        if ($(this).val() == 'ANORMAL') {
            $(this).css("background-color", "#FE0000");
            $(this).css("color", "#FFFFFF");
        } else {
            $(this).css("background-color", "#FFFFFF");
            $(this).css("color", "#000000");
        }
        $(this).change(function() {
            if ($(this).val() == 'ANORMAL') {
                $(this).css("background-color", "#FE0000");
                $(this).css("color", "#FFFFFF");
            } else {
                $(this).css("background-color", "#FFFFFF");
                $(this).css("color", "#000000");
            }
        });
    });
}
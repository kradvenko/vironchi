//Variables para el módulo de nueva cita
var nc_IdClienteElegido = 0;
var nc_Total = 0;
var nc_Restan = 0;
var nc_Extras = 0;
var nc_CostosExtraCita = [];
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
            nc_IdClienteElegido = res;
            $("#tbCliente").val($("#tbNombreCliente").val());
        } else {
            alert(res);
        }
    }});
}

function elegirCliente(id) {
    nc_IdClienteElegido = id;
    obtenerMascotasCliente();
}

function verificarTotales() {
    var total = $("#tbTotal").val();
    var extras = 0;
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
    if (nc_CostosExtraCita.length > 0) {
        for (i = 0; i < nc_CostosExtraCita.length; i++) {
            extras = parseFloat(extras) + parseFloat(nc_CostosExtraCita[i].Costo);
        }
    }
    total = parseFloat(total) + parseFloat(extras);
    if (total < anticipo) {
        alert("El anticipo es mayor que el total de la cita.");
        $("#tbAnticipo").val("0");
        return;
    }
    nc_Total = total;
    nc_Extras = extras;
    nc_Restan = total - anticipo;

    $("#lblTotal").text("$ " + nc_Total);
    $("#lblExtras").text("$ " + nc_Extras);
    $("#lblRestan").text("$ " + nc_Restan);
}

function obtenerMascotasCliente() {
    var idCliente = nc_IdClienteElegido;
    if (idCliente == 0) {
        return;
    }
    $.ajax({url: "php/obtenerMascotasSelect.php", async: false, type: "POST", data: { idCliente: idCliente, idSelect: "selMascotas" }, success: function(res) {
        $("#divMascotasCliente").html(res);
    }});
}

function agregarNuevaMascota() {
    var idCliente = nc_IdClienteElegido;
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
    var genero = $("#selGeneroMascota").val();

    $.ajax({url: "php/agregarMascota.php", async: false, type: "POST", data: { idCliente: idCliente, idEspecie: idEspecie, idRaza: idRaza, nombre: nombre, fechaNacimiento: fechaNacimiento,
     edad: edad, caracteristicas: caracteristicas, fechaCaptura: fechaCaptura, estado: estado, genero: genero }, success: function(res) {
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

function agregarCita() {
    if (nc_IdClienteElegido == 0) {
        alert("No ha elegido un cliente para la cita.");
        return;
    }
    var idCliente = nc_IdClienteElegido;
    var idMascota = $("#selMascotas").val();
    if (idMascota == null) {
        alert("No ha elegido una mascota para la cita.");
        return;
    }
    var tipoCita = $("#selTipoCita").val();
    var diaCita = $("#selDia").val();
    var mesCita = $("#selMes").val();
    var añoCita = $("#tbAño").val();
    var totalCita = $("#tbTotal").val();
    var extraCita = nc_Extras;
    var anticipoCita = $("#tbAnticipo").val();
    var restanCita = nc_Restan;
    var corte = $("#selCorte").val();
    var baño = $("#selBaño").val();
    var notasEstetica = $("#taNotasEsteticas").val();
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

    $.ajax({url: "php/agregarCita.php", async: false, type: "POST", data: { idCliente: idCliente, tipoCita: tipoCita, idMascota: idMascota, diaCita: diaCita,
    mesCita: mesCita, anoCita: añoCita, totalCita: totalCita, extraCita: extraCita, anticipoCita: anticipoCita, restanCita: restanCita, corte: corte, bano: baño, notasEstetica: notasEstetica,
    peso: peso, temperatura: temperatura, aparienciaGeneral: aparienciaGeneral, aparienciaGeneralNotas: aparienciaGeneralNotas, piel: piel, pielNotas: pielNotas,
    musculosqueleto: musculosqueleto, musculosqueletoNotas: musculosqueletoNotas, circulatorio: circulatorio, circulatorioNotas: circulatorioNotas, digestivo: digestivo,
    digestivoNotas: digestivoNotas, respiratorio: respiratorio, respiratorioNotas: respiratorioNotas, genitourinario: genitourinario, genitourinarioNotas: genitourinarioNotas,
    ojos: ojos, ojosNotas: ojosNotas, oidos: oidos, oidosNotas: oidosNotas, sistemaNervioso: sistemaNervioso, sistemaNerviosoNotas: sistemaNerviosoNotas,
    ganglios: ganglios, gangliosNotas: gangliosNotas, mucosas: mucosas, mucosasNotas: mucosasNotas, listaProblemas: listaProblemas, planesDiagnosticos: planesDiagnosticos,
    planesTerapeuticos: planesTerapeuticos, instruccionesCliente: instruccionesCliente, notasMedicas: notasMedicas, estado: estado, fechaCaptura: fechaCaptura,diagnostico: diagnostico,
    costosExtra: nc_CostosExtraCita }, success: function(res) {
        if (res == "OK") {
            alert("Se ha agregado la cita.");
            limpiarCamposNuevaCita();
        } else {
            alert(res);
        }
    }});
}
//Funciones para los costos extra de la cita
function agregarCostoExtraACita() {
    var costoExtra = { id: $("#selCostosExtra").val(), Razon: $("#selCostosExtra").text(), Costo: $("#tbCostoExtraCosto").val() };
    nc_CostosExtraCita[nc_CostosExtraCita.length] = costoExtra;
    mostrarCostosExtraCita();
    verificarTotales();
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
 
        data: nc_CostosExtraCita,

        deleteConfirm: "¿Desea borrar el costo extra?",

        onItemDeleted: function (args) {
            verificarTotales();
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

function limpiarNuevoCostoExtra() {
    $("#tbNuevoCostoExtraNombre").val('');
    $("#tbNuevoCostoExtraCosto").val('');
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

function agregarNuevoCostoExtra() {
    var nuevoCostoExtraNombre = $("#tbNuevoCostoExtraNombre").val();
    var nuevoCostoExtraCosto = $("#tbNuevoCostoExtraCosto").val();

    if (nuevoCostoExtraNombre.length == 0) {
        alert("No ha escrito el nombre del costo extra.");
        return;
    }

    if (isNaN(nuevoCostoExtraCosto)) {
        alert("No ha escrito el costo correcto.");
        alert();
    }

    $.ajax({url: "php/agregarNuevoCostoExtra.php", async: false, type: "POST", data: { NuevoCostoExtraNombre: nuevoCostoExtraNombre, NuevoCostoExtraCosto: nuevoCostoExtraCosto }, success: function(res) {
        if (res == "OK") {
            obtenerCostosExtra();
            limpiarNuevoCostoExtra();
            $('#modalAgregarNuevoCostoExtra').modal('hide');
        }
    }});
}

function elegirCostoExtra(costo) {
    $("#tbCostoExtraCosto").val(costo);
}
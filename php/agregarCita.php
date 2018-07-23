<?php
    try
    {
        require_once('connection.php');

        $idCliente = $_POST["idCliente"];
        $idMascota = $_POST["idMascota"];
        $tipoCita = $_POST["tipoCita"];
        $diaCita = $_POST["diaCita"];
        $mesCita = $_POST["mesCita"];
        $anoCita = $_POST["anoCita"];
        $total = $_POST["totalCita"];
        $anticipo = $_POST["anticipoCita"];
        $restan = $_POST["restanCita"];
        $corte = $_POST["corte"];
        $bano = $_POST["bano"];
        $notasEstetica = $_POST["notasEstetica"];
        $peso = $_POST["peso"];
        $temperatura = $_POST["temperatura"];
        $aparienciaGeneral = $_POST["aparienciaGeneral"];
        $aparienciaGeneralNotas = $_POST["aparienciaGeneralNotas"];
        $piel = $_POST["piel"];
        $pielNotas = $_POST["pielNotas"];
        $musculosqueleto = $_POST["musculosqueleto"];
        $musculosqueletoNotas = $_POST["musculosqueletoNotas"];
        $circulatorio = $_POST["circulatorio"];
        $circulatorioNotas = $_POST["circulatorioNotas"];
        $digestivo = $_POST["digestivo"];
        $digestivoNotas = $_POST["digestivoNotas"];
        $respiratorio = $_POST["respiratorio"];
        $respiratorioNotas = $_POST["respiratorioNotas"];
        $genitourinario = $_POST["genitourinario"];
        $genitourinarioNotas = $_POST["genitourinarioNotas"];
        $ojos = $_POST["ojos"];
        $ojosNotas = $_POST["ojosNotas"];
        $oidos = $_POST["oidos"];
        $oidosNotas = $_POST["oidosNotas"];
        $sistemaNervioso = $_POST["sistemaNervioso"];
        $sistemaNerviosoNotas = $_POST["sistemaNerviosoNotas"];
        $ganglios = $_POST["ganglios"];
        $gangliosNotas = $_POST["gangliosNotas"];
        $mucosas = $_POST["mucosas"];
        $mucosasNotas = $_POST["mucosasNotas"];
        $listaProblemas = $_POST["listaProblemas"];
        $planesDiagnosticos = $_POST["planesDiagnosticos"];
        $planesTerapeuticos = $_POST["planesTerapeuticos"];
        $instruccionesCliente = $_POST["instruccionesCliente"];
        $notasMedicas = $_POST["notasMedicas"];
        $estado = $_POST["estado"];
        $fechaCaptura = $_POST["fechaCaptura"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];

        if (!$idCliente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO $tabla
                (idcliente, tipo, idmascota, diacita, mescita, anocita, total, anticipo, restan,
                ce_corte, ce_bano, ce_notas,
                cm_peso, cm_temperatura, 
                cm_aparienciageneral, cm_aparicenciageneralnotas, cm_piel, cm_pielnotas, cm_muscoesqueleto, cm_muscoesqueletonotas, cm_circulatorio,
                cm_circulatorionotas, cm_digestivo, cm_digestivonotas, cm_respiratorio, cm_respiratorionotas, cm_genitourinario, cm_genitourinarionotas,
                cm_ojos, cm_ojosnotas, cm_oidos, cm_oidosnotas, cm_sistemanervioso, cm_sistemanerviosonotas, cm_ganglios, cm_gangliosnotas,
                cm_mucosas, cm_mucosasnotas, cm_listaproblemas, cm_planesdiagnosticos, cm_planesterapeuticos, cm_instruccionesclientes,
                cm_notas, estado, fechacaptura)
                VALUES
                ($idCliente, '$tipoCita', $idMascota, '$diaCita', '$mesCita', '$anoCita', '$total', '$anticipo', '$restan',
                '$corte', '$bano', '$notasEstetica',
                '$peso', '$temperatura',
                '$aparienciaGeneral', '$aparienciaGeneralNotas', '$piel', '$pielNotas', '$musculosqueleto', '$musculosqueletoNotas', '$circulatorio',
                '$circulatorioNotas', '$digestivo', '$digestivoNotas', '$respiratorio', '$respiratorioNotas', '$genitourinario', '$genitourinarioNotas',
                '$ojos', '$ojosNotas', '$oidos', '$oidosNotas', '$sistemaNervioso', '$sistemaNerviosoNotas', '$ganglios', '$gangliosNotas',
                '$mucosas', '$mucosasNotas', '$listaProblemas', '$planesDiagnosticos', '$planesTerapeuticos', '$instruccionesCliente',
                '$notasMedicas', '$estado', '$fechaCaptura')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
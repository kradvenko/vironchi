<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
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
        $diagnostico = $_POST["diagnostico"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "UPDATE $tabla
                SET cm_peso = '$peso', cm_temperatura ='$temperatura', 
                cm_aparienciageneral = '$aparienciaGeneral', cm_aparienciageneralnotas = '$aparienciaGeneralNotas', cm_piel = '$piel', cm_pielnotas = '$pielNotas',
                cm_muscoesqueleto = '$musculosqueleto', cm_muscoesqueletonotas = '$musculosqueletoNotas', cm_circulatorio = '$circulatorio',
                cm_circulatorionotas = '$circulatorioNotas', cm_digestivo = '$digestivo', cm_digestivonotas = '$digestivoNotas', cm_respiratorio = '$respiratorio',
                cm_respiratorionotas = '$respiratorioNotas', cm_genitourinario = '$genitourinario', cm_genitourinarionotas = '$genitourinarioNotas',
                cm_ojos = '$ojos', cm_ojosnotas = '$ojosNotas', cm_oidos = '$oidos', cm_oidosnotas = '$oidosNotas', cm_sistemanervioso = '$sistemaNervioso',
                cm_sistemanerviosonotas = '$sistemaNerviosoNotas', cm_ganglios = '$ganglios', cm_gangliosnotas = '$gangliosNotas',
                cm_mucosas = '$mucosas', cm_mucosasnotas = '$mucosasNotas', cm_listaproblemas = '$listaProblemas', cm_planesdiagnosticos = '$planesDiagnosticos',
                cm_planesterapeuticos = '$planesTerapeuticos', cm_instruccionescliente = '$instruccionesCliente', cm_notas = '$notasMedicas', cm_diagnostico = '$diagnostico'
                WHERE idcita = $idCita";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
        $tipoCita = $_POST["tipoCita"];

        $prefijo = $_COOKIE["v_prefijo"];

        $tabla = $prefijo . "citas";

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select *
                From $tabla
                Where idcita = $idCita And tipo Like '$tipoCita'";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {

            $fecha = substr($row["fechacaptura"], 0, 10);
            $f = substr($row["fechacaptura"], 13);

            $hora = date('h:i:s a', strtotime($f));

            $fechacaptura = $fecha . " " . $hora;


            echo "<respuesta>OK</respuesta>\n";
            echo "<idcita>" . $row['idcita'] . "</idcita>\n";
            echo "<idcliente>" . $row['idcliente'] . "</idcliente>\n";
            echo "<tipo>" . $row['tipo'] . "</tipo>\n";
            echo "<idmascota>" . $row['idmascota'] . "</idmascota>\n";
            echo "<diacita>" . $row['diacita'] . "</diacita>\n";
            echo "<mescita>" . $row['mescita'] . "</mescita>\n";
            echo "<anocita>" . $row['anocita'] . "</anocita>\n";
            echo "<total>" . $row['total'] . "</total>\n";
            echo "<costoextra>" . $row['costoextra'] . "</costoextra>\n";
            echo "<anticipo>" . $row['anticipo'] . "</anticipo>\n";
            echo "<restan>" . $row['restan'] . "</restan>\n";
            echo "<ce_corte>" . $row['ce_corte'] . "</ce_corte>\n";
            echo "<ce_bano>" . $row['ce_bano'] . "</ce_bano>\n";
            echo "<ce_notas>" . $row['ce_notas'] . "</ce_notas>\n";
            echo "<cm_peso>" . $row['cm_peso'] . "</cm_peso>\n";
            echo "<cm_temperatura>" . $row['cm_temperatura'] . "</cm_temperatura>\n";
            echo "<cm_aparienciageneral>" . $row['cm_aparienciageneral'] . "</cm_aparienciageneral>\n";
            echo "<cm_aparienciageneralnotas>" . $row['cm_aparienciageneralnotas'] . "</cm_aparienciageneralnotas>\n";
            echo "<cm_piel>" . $row['cm_piel'] . "</cm_piel>\n";
            echo "<cm_pielnotas>" . $row['cm_pielnotas'] . "</cm_pielnotas>\n";
            echo "<cm_muscoesqueleto>" . $row['cm_muscoesqueleto'] . "</cm_muscoesqueleto>\n";
            echo "<cm_muscoesqueletonotas>" . $row['cm_muscoesqueletonotas'] . "</cm_muscoesqueletonotas>\n";
            echo "<cm_circulatorio>" . $row['cm_circulatorio'] . "</cm_circulatorio>\n";
            echo "<cm_circulatorionotas>" . $row['cm_circulatorionotas'] . "</cm_circulatorionotas>\n";
            echo "<cm_digestivo>" . $row['cm_digestivo'] . "</cm_digestivo>\n";
            echo "<cm_digestivonotas>" . $row['cm_digestivonotas'] . "</cm_digestivonotas>\n";
            echo "<cm_respiratorio>" . $row['cm_respiratorio'] . "</cm_respiratorio>\n";
            echo "<cm_respiratorionotas>" . $row['cm_respiratorionotas'] . "</cm_respiratorionotas>\n";
            echo "<cm_genitourinario>" . $row['cm_genitourinario'] . "</cm_genitourinario>\n";
            echo "<cm_genitourinarionotas>" . $row['cm_genitourinarionotas'] . "</cm_genitourinarionotas>\n";
            echo "<cm_ojos>" . $row['cm_ojos'] . "</cm_ojos>\n";
            echo "<cm_ojosnotas>" . $row['cm_ojosnotas'] . "</cm_ojosnotas>\n";
            echo "<cm_oidos>" . $row['cm_oidos'] . "</cm_oidos>\n";
            echo "<cm_oidosnotas>" . $row['cm_oidosnotas'] . "</cm_oidosnotas>\n";
            echo "<cm_sistemanervioso>" . $row['cm_sistemanervioso'] . "</cm_sistemanervioso>\n";
            echo "<cm_sistemanerviosonotas>" . $row['cm_sistemanerviosonotas'] . "</cm_sistemanerviosonotas>\n";
            echo "<cm_ganglios>" . $row['cm_ganglios'] . "</cm_ganglios>\n";
            echo "<cm_gangliosnotas>" . $row['cm_gangliosnotas'] . "</cm_gangliosnotas>\n";
            echo "<cm_mucosas>" . $row['cm_mucosas'] . "</cm_mucosas>\n";
            echo "<cm_mucosasnotas>" . $row['cm_mucosasnotas'] . "</cm_mucosasnotas>\n";
            echo "<cm_listaproblemas>" . $row['cm_listaproblemas'] . "</cm_listaproblemas>\n";
            echo "<cm_planesdiagnosticos>" . $row['cm_planesdiagnosticos'] . "</cm_planesdiagnosticos>\n";
            echo "<cm_planesterapeuticos>" . $row['cm_planesterapeuticos'] . "</cm_planesterapeuticos>\n";
            echo "<cm_instruccionescliente>" . $row['cm_instruccionescliente'] . "</cm_instruccionescliente>\n";
            echo "<cm_notas>" . $row['cm_notas'] . "</cm_notas>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
            echo "<fechacaptura>" . $fechacaptura . "</fechacaptura>\n";
            echo "<cm_diagnostico>" . $row['cm_diagnostico'] . "</cm_diagnostico>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?> 
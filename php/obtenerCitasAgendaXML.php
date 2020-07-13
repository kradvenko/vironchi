<?php
    try
    {
        require_once('connection.php');

        $diaCita = $_POST["diaCita"];
        $mesCita = $_POST["mesCita"];
        $anoCita = $_POST["anoCita"];

        $prefijo = $_COOKIE["v_prefijo"];

        $tabla = $prefijo . "agenda";

        if (!$diaCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT *
                FROM $tabla
                WHERE diacita = '$diaCita' AND mescita = '$mesCita' AND anocita = '$anoCita'
                ORDER BY segmento";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {

            $fecha = substr($row["fechacaptura"], 0, 10);
            $f = substr($row["fechacaptura"], 13);

            $hora = date('h:i:s a', strtotime($f));

            $fechacaptura = $fecha . " " . $hora;
            echo "<cita>\n";
            echo "<diacita>" . $row['diacita'] . "</diacita>\n";
            echo "<mescita>" . $row['mescita'] . "</mescita>\n";
            echo "<anocita>" . $row['anocita'] . "</anocita>\n";

            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
            echo "<observaciones>" . $row['observaciones'] . "</observaciones>\n";
            echo "<segmento>" . $row['segmento'] . "</segmento>\n";

            echo "<asistio>" . $row['asistio'] . "</asistio>\n";
            
            echo "<fechacaptura>" . $fechacaptura . "</fechacaptura>\n";
            echo "</cita>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?> 
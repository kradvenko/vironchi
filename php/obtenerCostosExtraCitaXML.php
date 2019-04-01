<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "extras";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT $tabla.idcostoextra, $tabla.costo, costosextra.razon
                FROM $tabla
                INNER JOIN costosextra
                ON costosextra.idcostoextra = $tabla.idcostoextra
                WHERE idcita = $idCita";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<c>";
            echo "<idcostoextra>" . $row['idcostoextra'] . "</idcostoextra>\n";
            echo "<razon>" . $row['razon'] . "</razon>\n";
            echo "<costo>" . $row['costo'] . "</costo>\n";
            echo "</c>";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?> 
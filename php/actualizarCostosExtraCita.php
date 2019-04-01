<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
        $costoExtra = $_POST["costoExtra"];
        $restan = $_POST["restan"];        

        $prefijo = $_COOKIE["v_prefijo"];

        $costosExtra = (isset($_POST["costosExtra"]) ? $_POST["costosExtra"] : []);

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "UPDATE $tabla
                SET costoextra = $costoExtra, restan = $restan
                WHERE idcita = $idCita";

        $con->query($sql);
        
        $tabla = $prefijo . "extras";

        $sql = "DELETE FROM $tabla
                WHERE idcita = $idCita";
                
        $con->query($sql);

        for ($i = 0; $i < sizeof($costosExtra); $i++) {
            $sql = "INSERT INTO $tabla
                    (idcita, idcostoextra, costo)
                    VALUES
                    ($idCita, " . $costosExtra[$i]["id"] . ", " . $costosExtra[$i]["Costo"] . ")";
            $con->query($sql);
        }
        

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
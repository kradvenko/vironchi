<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
        $cantidad = $_POST["cantidad"];
        $fechaPago = $_POST["fechaPago"];
        $notas = $_POST["notas"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];

        $tablaCitas = $prefijo . "citas";
        $tablaPagos = $prefijo . "pagos";

        $restaCita = 0;

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT *
                FROM $tablaCitas
                WHERE idcita = $idCita";
        
        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $restaCita = $row["restan"];
        }

        $nuevoResta = $restaCita - $cantidad;

        $sql = "INSERT INTO $tablaPagos
                (idcita, fechapago, cantidad, notas, estado)
                VALUES
                ($idCita, '$fechaPago', $cantidad, '$notas', 'PAGADO')";

        $con->query($sql);

        $sql = "UPDATE $tablaCitas
                SET restan = $nuevoResta
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
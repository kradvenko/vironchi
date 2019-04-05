<?php
    try
    {
        require_once('connection.php');

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "citas";
        $tablaPagos = $prefijo . "pagos";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT COUNT(DISTINCT $tablaPagos.idcita) AS Conteo
                FROM $tablaPagos
                INNER JOIN $tabla
                ON $tabla.idcita = $tablaPagos.idcita
                WHERE $tabla.restan > 0
                AND $tabla.estado != 'FINALIZADO'
                AND $tablaPagos.idcita NOT IN
                (
                    SELECT $tablaPagos.idcita
                    FROM $tablaPagos
                    INNER JOIN $tabla
                    ON $tabla.idcita = $tablaPagos.idcita
                    WHERE ( DATE_SUB(curdate(), INTERVAL 3 DAY) <= str_to_date($tablaPagos.fechapago, '%d/%m/%Y') )
                    AND  $tabla.restan > 0
                    AND $tabla.estado != 'FINALIZADO'
                )
                ";

        $result = $con->query($sql);

        $html = "";
        
        while ($row = $result->fetch_array()) {
            echo "Se han encontrado " . $row["Conteo"] . " citas cuyo último pago fue hace más de 3 días.";
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        $html = $html . $t;
    }
?>
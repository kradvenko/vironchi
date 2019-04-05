<?php
    try
    {
        require_once('connection.php');

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select COUNT($tabla.idcita) AS Conteo
                From $tabla
                Inner Join clientes
                On clientes.idcliente = $tabla.idcliente
                Inner Join mascotas
                On mascotas.idmascota = $tabla.idmascota
                Where  restan > 0
                AND $tabla.estado != 'FINALIZADO'
                AND ( DATE_SUB(curdate(), INTERVAL 15 DAY) > str_to_date(CONCAT($tabla.mescita, '/', $tabla.diacita, '/', $tabla.anocita), '%m/%d/%Y') )
                ORDER BY str_to_date(CONCAT($tabla.mescita, '/', $tabla.diacita, '/', $tabla.anocita), '%m/%d/%Y')";

        $result = $con->query($sql);

        $html = "";
        
        while ($row = $result->fetch_array()) {
            echo "Se han encontrado " . $row["Conteo"] . " citas que no han sido pagadas.";
        }

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        $html = $html . $t;
    }
?>
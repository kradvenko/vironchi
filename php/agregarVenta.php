<?php
    try
    {
        require_once('connection.php');
        
        $fecha = $_POST["fecha"];
        $subTotal = $_POST["subTotal"];
        $descuentoPorcentaje = $_POST["descuentoPorcentaje"];
        $descuentoCantidad = $_POST["descuentoCantidad"];
        $total = $_POST["total"];
        $estado = "ACTIVO";
        $tipo = $_POST["tipo"];
        $cambio = $_POST["cambio"];
        $iva = $_POST["iva"];
        $articulos = (isset($_POST["articulos"]) ? $_POST["articulos"] : []);

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$fecha) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $tabla = $prefijo . "ventas";

        $sql = "INSERT INTO $tabla
                (fecha, subtotal, descuentoporcentaje, descuentocantidad, total, estado, tipo, cambio, iva, idusuario)
                VALUES
                ('$fecha', $subTotal, $descuentoPorcentaje, $descuentoCantidad, $total, '$estado', '$tipo', $cambio, $iva, $idUsuario)";

        $con->query($sql);

        //echo $sql;

        $idVenta = $con->insert_id;

        $tabla = $prefijo . "detalleventa";

        for ($i = 0; $i < sizeof($articulos); $i++) {
            $item = $articulos[$i];

            $sql = "INSERT INTO $tabla
                    (idventa, idarticulo, cantidad, descuentoporcentaje, descuentocantidad, preciopublico, subtotal, total)
                    VALUES 
                    ( $idVenta, " . $item["id"] . ", " . $item["cantidad"] . ", " . $item["descuentoporcentaje"] . ", " . $item["descuentocantidad"] . ",
                    " . $item["precio"] . ", " . $item["subtotal"] . ", " . $item["total"] . ")";

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
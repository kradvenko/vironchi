<?php
    try
    {
        require_once('connection.php');

        $fecha = $_POST["fecha"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tablaVentas = $prefijo . "ventas";
        $tablaArticulos = $prefijo . "articulos";
        $tablaDetalleVenta = $prefijo . "detalleventa";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select $tablaVentas.*, $tablaDetalleVenta.*, $tablaArticulos.nombre As articulo
                From $tablaVentas
                Inner Join $tablaDetalleVenta
                On $tablaDetalleVenta.idventa = $tablaVentas.idventa
                Inner Join $tablaArticulos
                On $tablaArticulos.idarticulo = $tablaDetalleVenta.idarticulo
                Where fecha Like '$fecha'";

        $result = $con->query($sql);

        echo "<div class='col-1 divHeaderLista'>";
        echo "Venta";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Fecha";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Artículo";
        echo "</div>";
        echo "<div class='col-1 divHeaderLista'>";
        echo "Cantidad";
        echo "</div>";
        echo "<div class='col-1 divHeaderLista'>";
        echo "Total";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-1'>";
            echo $row["idventa"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["fecha"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["articulo"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo $row["cantidad"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo $row["total"];
            echo "</div>";
            echo "<div class='col-3'>";
            
            echo "</div>";

            echo "<div class='col-12 divMargin'>";
            echo "</div>";
        }            
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
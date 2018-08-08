<?php
    try
    {
        require_once('connection.php');

        $fecha = $_POST["fecha"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tablaCitas = $prefijo . "citas";
        $tablaPagos = $prefijo . "pagos";

        $con = new mysqli($hn, $un, $pw, $db);

        $totalPagos = 0;

        $sql = "Select $tablaCitas.*, mascotas.nombre As mascota, clientes.nombre As cliente, $tablaPagos.cantidad, $tablaPagos.fechapago
                From $tablaCitas
                Inner Join mascotas
                On mascotas.idmascota = $tablaCitas.idmascota
                Inner Join clientes
                On clientes.idcliente = $tablaCitas.idcliente
                Inner Join $tablaPagos
                On $tablaPagos.idcita = $tablaCitas.idcita
                Where $tablaPagos.fechapago Like '$fecha'";

        $result = $con->query($sql);

        echo "<div class='col-1 divHeaderLista'>";
        echo "Cita";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Fecha";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Mascota";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Cliente";
        echo "</div>";
        echo "<div class='col-1 divHeaderLista'>";
        echo "Pago";
        echo "</div>";
        echo "<div class='col-1 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-1'>";
            echo $row["idcita"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["fechapago"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["mascota"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["cliente"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo $row["cantidad"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo "</div>";

            echo "<div class='col-12 divMargin'>";
            echo "</div>";

            $totalPagos = $totalPagos + $row["cantidad"];
        }
        echo "<div class='col-12 divHeaderLista'>";
        echo "</div>";
        echo "<div class='col-3 divTotales'>";
        echo "Total en anticipos";
        echo "</div>";
        echo "<div class='col-1'";
        echo "<label id='lblPagos'>";
        echo $totalPagos;
        echo "</label>";
        echo "</div>";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
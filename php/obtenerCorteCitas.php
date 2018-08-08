<?php
    try
    {
        require_once('connection.php');

        $fecha = $_POST["fecha"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tablaCitas = $prefijo . "citas";
        $tablaPagos = $prefijo . "pagos";

        $con = new mysqli($hn, $un, $pw, $db);

        $totalAnticipos = 0;

        $sql = "Select $tablaCitas.*, mascotas.nombre As mascota, clientes.nombre As cliente
                From $tablaCitas
                Inner Join mascotas
                On mascotas.idmascota = $tablaCitas.idmascota
                Inner Join clientes
                On clientes.idcliente = $tablaCitas.idcliente
                Where concat(diacita, '/', mescita, '/', anocita) Like '$fecha' And anticipo > 0";

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
        echo "Anticipo";
        echo "</div>";
        echo "<div class='col-1 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-1'>";
            echo $row["idcita"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["diacita"] . "/" . $row["mescita"] . "/" . $row["anocita"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["mascota"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["cliente"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo $row["anticipo"];
            echo "</div>";
            echo "<div class='col-1'>";
            echo "</div>";

            echo "<div class='col-12 divMargin'>";
            echo "</div>";

            $totalAnticipos = $totalAnticipos + $row["anticipo"];
        }
        echo "<div class='col-12 divHeaderLista'>";
        echo "</div>";
        echo "<div class='col-3 divTotales'>";
        echo "Total en anticipos";
        echo "</div>";
        echo "<div class='col-1'";
        echo "<label id='lblAnticipos'>";
        echo $totalAnticipos;
        echo "</label>";
        echo "</div>";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
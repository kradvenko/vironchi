<?php
    try
    {
        require_once('connection.php');

        $diaCita = $_POST["diaCita"];
        $mesCita = $_POST["mesCita"];
        $anoCita = $_POST["anoCita"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select $tabla.*, clientes.nombre As cliente, mascotas.nombre As mascota
                From $tabla
                Inner Join clientes
                On clientes.idcliente = $tabla.idcliente
                Inner Join mascotas
                On mascotas.idmascota = $tabla.idmascota
                Where diacita Like '$diaCita' And mescita Like '$mesCita' And  anocita Like '$anoCita' And $tabla.estado = 'ACTIVO'";

        $result = $con->query($sql);

        echo "<div class='col-3 divHeaderLista'>";
        echo "Cliente";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Mascota";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "Tipo de cita";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "Fecha de la cita";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3'>";
            echo $row["cliente"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["mascota"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo $row["tipo"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo $row["diacita"] . "/" . $row["mescita"] . "/" . $row["anocita"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo "<input type='button' class='btn btn-success' value='Detalles' onclick='detallesCita(" . $row["idcita"] . ", \"" . $row["tipo"] . "\")' />";
            echo "</div>";
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
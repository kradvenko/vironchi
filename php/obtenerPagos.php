<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "pagos";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select *
                From $tabla
                Where idcita = $idCita";

        $result = $con->query($sql);

        echo "<div class='col-3 divHeaderLista'>";
        echo "Fecha de pago";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "Cantidad";
        echo "</div>";
        echo "<div class='col-4 divHeaderLista'>";
        echo "Notas";
        echo "</div>";        
        echo "<div class='col-3 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3'>";
            echo $row["fechapago"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo $row["cantidad"];
            echo "</div>";
            echo "<div class='col-4'>";
            echo $row["notas"];
            echo "</div>";
            echo "<div class='col-2'>";
            
            echo "</div>";
            echo "<div class='col-2'>";
            
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
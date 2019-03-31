<?php
    try
    {
        require_once('connection.php');

        $NuevoCostoExtraNombre = $_POST["NuevoCostoExtraNombre"];
        $NuevoCostoExtraCosto = $_POST["NuevoCostoExtraCosto"];

        if (!$NuevoCostoExtraNombre) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "INSERT INTO costosextra
                (razon, costo)
                VALUES
                ('$NuevoCostoExtraNombre', '$NuevoCostoExtraCosto')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
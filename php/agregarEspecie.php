<?php
    try
    {
        require_once('connection.php');

        $especie = $_POST["especie"];

        $idTienda = $_COOKIE["v_idtienda"];

        if (!$especie) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into especies
                (especie)
                Values
                ('$especie')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
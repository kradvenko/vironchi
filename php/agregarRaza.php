<?php
    try
    {
        require_once('connection.php');

        $idEspecie = $_POST["idEspecie"];
        $raza = $_POST["raza"];

        $idTienda = $_COOKIE["v_idtienda"];

        if (!$idEspecie) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into razas
                (idespecie, raza)
                Values
                ($idEspecie, '$raza')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
        $fechaFinalizado = $_POST["fechaFinalizado"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "UPDATE $tabla
                SET estado = 'FINALIZADO', fechafinalizado = '$fechaFinalizado'
                WHERE idcita = $idCita";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
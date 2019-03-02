<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];
        $corte = $_POST["corte"];
        $bano = $_POST["bano"];
        $notasEstetica = $_POST["notasEstetica"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$idCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "UPDATE $tabla
                SET ce_corte = '$corte', ce_bano = '$bano', ce_notas = '$notasEstetica'
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
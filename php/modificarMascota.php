<?php
    try
    {
        require_once('connection.php');

        $idCliente = $_POST["idCliente"];
        $idMascota = $_POST["idMascota"];
        $idEspecie = $_POST["idEspecie"];
        $idRaza = $_POST["idRaza"];
        $nombre = $_POST["nombre"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $edad = $_POST["edad"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $caracteristicas = $_POST["caracteristicas"];
        $estado = $_POST["estado"];

        $idTienda = $_COOKIE["v_idtienda"];

        if (!$idCliente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "UPDATE mascotas
                SET idespecie = $idEspecie, idraza = $idRaza, nombre = '$nombre', fechanacimiento = '$fechaNacimiento', edad = '$edad', caracteristicas = '$caracteristicas'
                WHERE idmascota = $idMascota
                ";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
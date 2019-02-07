<?php
    try
    {
        require_once('connection.php');

        $idCliente = $_POST["idCliente"];
        $idEspecie = $_POST["idEspecie"];
        $idRaza = $_POST["idRaza"];
        $nombre = $_POST["nombre"];
        $fechaNacimiento = $_POST["fechaNacimiento"];
        $edad = $_POST["edad"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $caracteristicas = $_POST["caracteristicas"];
        $estado = $_POST["estado"];
        $genero = $_POST["genero"];

        $idTienda = $_COOKIE["v_idtienda"];

        if (!$idCliente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into mascotas
                (idcliente, idespecie, idraza, idtienda, nombre, fechanacimiento, edad, fechacaptura, caracteristicas, estado, genero)
                Values
                ($idCliente, $idEspecie, $idRaza, $idTienda, '$nombre', '$fechaNacimiento', '$edad', '$fechaCaptura', '$caracteristicas', '$estado', '$genero')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
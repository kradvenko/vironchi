<?php
    try
    {
        require_once('connection.php');

        $nombre = $_POST["nombre"];
        $direccion = $_POST["direccion"];
        $colonia = $_POST["colonia"];
        $telefono1 = $_POST["telefono1"];
        $telefono2 = $_POST["telefono2"];
        $municipio = $_POST["municipio"];
        $correo = $_POST["correo"];
        $fechaCaptura = $_POST["fechaCaptura"];
        $estado = $_POST["estado"];

        $idTienda = $_COOKIE["v_idtienda"];

        if (!$nombre) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Insert Into clientes
                (idtienda, nombre, direccion, colonia, municipio, telefono1, telefono2, correo, fechacaptura, estado)
                Values
                ($idTienda, '$nombre', '$direccion', '$municipio', '$colonia', '$telefono1', '$telefono2', '$correo', '$fechaCaptura', '$estado')";

        $con->query($sql);

        $id = $con->insert_id;

        echo $id;

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
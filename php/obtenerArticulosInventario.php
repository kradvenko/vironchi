<?php
    try
    {
        require_once('connection.php');

        $idCategoria = $_POST["idCategoria"];
        $estado = $_POST["estado"];

        if (!$idCategoria) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        $tabla = $prefijo . "articulos";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT *
                FROM $tabla
                WHERE idcategoria Like '$idCategoria' And estado Like '$estado'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            echo $row["nombre"];
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
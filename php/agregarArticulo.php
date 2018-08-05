<?php
    try
    {
        require_once('connection.php');
        
        $nombre = $_POST["nombre"];
        $idCategoria = $_POST["idCategoria"];
        $clave = $_POST["clave"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $precioPublico = $_POST["precioPublico"];
        $cantidadMinima = $_POST["cantidadMinima"];
        $precioCompra = $_POST["precioCompra"];
        $fechaCaptura = $_POST["fechaCaptura"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$nombre) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $tabla = $prefijo . "articulos";

        $sql = "INSERT INTO $tabla
                (nombre, idcategoria, clave, descripcion, cantidad, preciopublico, cantidadminima, preciocompra, estado, idusuariocaptura, fechacaptura)
                VALUES
                ('$nombre', $idCategoria, '$clave', '$descripcion', $cantidad, $precioPublico, $cantidadMinima, $precioCompra, 'ACTIVO', $idUsuario, '$fechaCaptura')";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
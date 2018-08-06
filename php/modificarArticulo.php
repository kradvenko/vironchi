<?php
    try
    {
        require_once('connection.php');
        
        $idArticulo = $_POST["idArticulo"];
        $nombre = $_POST["nombre"];
        $idCategoria = $_POST["idCategoria"];
        $clave = $_POST["clave"];
        $descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $precioPublico = $_POST["precioPublico"];
        $cantidadMinima = $_POST["cantidadMinima"];
        $precioCompra = $_POST["precioCompra"];

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$nombre) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $tabla = $prefijo . "articulos";

        $sql = "UPDATE $tabla
                SET nombre = '$nombre', idcategoria = $idCategoria, clave = '$clave', descripcion = '$descripcion',
                cantidad = $cantidad, preciopublico = $precioPublico, cantidadminima = $cantidadMinima,
                preciocompra = $precioCompra
                WHERE idarticulo = $idArticulo";

        $con->query($sql);

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
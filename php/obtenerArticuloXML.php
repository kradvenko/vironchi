<?php
    try
    {
        require_once('connection.php');

        $idArticulo = $_POST["idArticulo"];
        $estado = $_POST["estado"];

        if (!$idArticulo) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        $tabla = $prefijo . "articulos";

        $sql = "Select *
                From $tabla
                Inner Join categorias
                On categorias.idcategoria = $tabla.idcategoria
                Where idarticulo = $idArticulo And $tabla.estado Like '$estado'";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<respuesta>OK</respuesta>\n";
            echo "<idarticulo>" . $row['idarticulo'] . "</idarticulo>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
            echo "<idcategoria>" . $row['idcategoria'] . "</idcategoria>\n";
            echo "<categoria>" . $row['categoria'] . "</categoria>\n";
            echo "<clave>" . $row['clave'] . "</clave>\n";
            echo "<descripcion>" . $row['descripcion'] . "</descripcion>\n";
            echo "<cantidad>" . $row['cantidad'] . "</cantidad>\n";
            echo "<preciopublico>" . $row['preciopublico'] . "</preciopublico>\n";
            echo "<cantidadminima>" . $row['cantidadminima'] . "</cantidadminima>\n";
            echo "<preciocompra>" . $row['preciocompra'] . "</preciocompra>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
            echo "<idusuariocaptura>" . $row['idusuariocaptura'] . "</idusuariocaptura>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?> 
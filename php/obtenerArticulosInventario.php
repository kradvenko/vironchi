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

        echo "<div class='col-3 divHeaderLista'>";
        echo "Nombre";
        echo "</div>";
        echo "<div class='col-3 divHeaderLista'>";
        echo "Descripcion";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "Precio público";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "Cantidad";
        echo "</div>";
        echo "<div class='col-2 divHeaderLista'>";
        echo "";
        echo "</div>";

        while ($row = $result->fetch_array()) {
            echo "<div class='col-3 divMargin'>";
            echo $row["nombre"];
            echo "</div>";
            echo "<div class='col-3'>";
            echo $row["descripcion"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo $row["preciopublico"];
            echo "</div>";
            echo "<div class='col-2'>";
            echo $row["cantidad"];
            echo "</div>";
            echo "<div class='col-2 divMargin'>";
            echo "<input type='button' class='btn btn-info' value='Modificar' onclick='obtenerDatosArticulo(" . $row["idarticulo"] . ")' />";
            echo "</div>";
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
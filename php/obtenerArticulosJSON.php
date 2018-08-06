<?php    
    try
    {
        require_once('connection.php');

        header('Content-type: application/json');

        $term = $_GET["term"];

        $con = new mysqli($hn, $un, $pw, $db);

        $data = array();

        $prefijo = $_COOKIE["v_prefijo"];

        if (!$prefijo) {
            return;
        }

        $tabla = $prefijo . "articulos";

        $sql = "Select * 
                From $tabla
                Where $tabla.nombre Like '%$term%' And estado = 'ACTIVO'";

        $result = $con->query($sql);

        while ($row = $result->fetch_array()) {
            $ciudad = array("id" => $row["idarticulo"] , "value" => $row["nombre"], "precio" => $row["preciopublico"]);
            array_push($data, $ciudad);
        }
        
        echo json_encode($data);
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
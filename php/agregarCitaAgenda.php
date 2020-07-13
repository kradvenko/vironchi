<?php
    try
    {
        require_once('connection.php');

        $diaCita = $_POST["diaCita"];
        $mesCita = $_POST["mesCita"];
        $anoCita = $_POST["anoCita"];

        $nombre = $_POST["nombre"];
        $observaciones = $_POST["observaciones"];
        $segmento = $_POST["segmento"];
        
        $fechaCaptura = $_POST["fechaCaptura"];        

        $idTienda = $_COOKIE["v_idtienda"];
        $prefijo = $_COOKIE["v_prefijo"];
        $idUsuario = $_COOKIE["v_idusuario"];

        if (!$diaCita) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $tabla = $prefijo . "agenda";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT * 
                FROM $tabla
                WHERE diacita = '$diaCita' AND mescita = '$mesCita' AND anocita = '$anoCita' AND segmento = '$segmento'";
        
        $result = $con->query($sql);
        $rows = $result->num_rows;

        if ($rows == 0) {
            $sql = "INSERT INTO $tabla
                    (diacita, mescita, anocita,
                    nombre, observaciones, segmento,
                    fechacaptura)
                    VALUES
                    ('$diaCita', '$mesCita', '$anoCita',
                    '$nombre', '$observaciones', '$segmento',
                    '$fechaCaptura')";

            $con->query($sql);
        } else {
            $sql = "UPDATE $tabla
                    SET diacita = '$diaCita', mescita = '$mesCita', anocita = '$anoCita',
                    nombre = '$nombre', observaciones = '$observaciones', segmento = '$segmento'
                    WHERE diacita = '$diaCita' AND mescita = '$mesCita' AND anocita = '$anoCita' AND segmento = '$segmento'";

            $con->query($sql);
        }

        echo "OK";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
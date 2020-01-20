<?php
    try
    {
        require_once('connection.php');

        $idCita = $_POST["idCita"];

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "citas";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select *
                From $tabla
                Where idcitapadre = $idCita";

        $result = $con->query($sql);

        $count = 1;

        while ($row = $result->fetch_array()) {
            if ($count == 1) {
                echo "<div class='row divMargin divCenter'>";
            }

            echo "<div class='col-4'>";
            $m = substr($row["fechacaptura"], 0, 10);
            $f = substr($row["fechacaptura"], 13);
            $fechacaptura = date('h:i:s a', strtotime($f));
            echo "<button type='button' class='btn btn-secondary' onclick='obtenerDatosSeguimiento(" . $row["idcita"] . ")'>" . $m . " " . $fechacaptura . "</button>";            
            echo "</div>";
            $count = $count + 1;

            if ($count == 4) {
                echo "</div>";
                $count = 1;
            }
        }            
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
<?php
    try
    {
        require_once('connection.php');

        $idSelect = $_POST["idSelect"];        

        if (!$idSelect) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select especies.*
                From especies";

        $result = $con->query($sql);

        echo "<select class='form-control' onchange='obtenerRazasSelect()' id='" . $idSelect . "'>";

        while ($row = $result->fetch_array()) {
            echo "<option value='" . $row["idespecie"] . "'>" . $row["especie"] . "</option>";
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
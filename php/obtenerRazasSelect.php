<?php
    try
    {
        require_once('connection.php');

        $idSelect = $_POST["idSelect"];
        $idEspecie = $_POST["idEspecie"];

        if (!$idSelect) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select razas.*
                From razas
                Where idespecie = $idEspecie";

        $result = $con->query($sql);

        echo "<select class='form-control' id='" . $idSelect . "'>";

        while ($row = $result->fetch_array()) {
            echo "<option value='" . $row["idraza"] . "'>" . $row["raza"] . "</option>";
        }
        
        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
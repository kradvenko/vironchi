<?php
    try
    {
        require_once('connection.php');

        $idCliente = $_POST["idCliente"];

        if (!$idCliente) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select *
                From clientes
                Where idcliente = $idCliente";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<respuesta>OK</respuesta>\n";
            echo "<idtienda>" . $row['idtienda'] . "</idtienda>\n";
            echo "<idcliente>" . $row['idcliente'] . "</idcliente>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
            echo "<direccion>" . $row['direccion'] . "</direccion>\n";
            echo "<colonia>" . $row['colonia'] . "</colonia>\n";
            echo "<municipio>" . $row['municipio'] . "</municipio>\n";
            echo "<telefono1>" . $row['telefono1'] . "</telefono1>\n";
            echo "<telefono2>" . $row['telefono2'] . "</telefono2>\n";
            echo "<correo>" . $row['correo'] . "</correo>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";
            echo "<estado>" . $row['estado'] . "</estado>\n";
        }

        echo "</resultado>\n";

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?> 
<?php
    try
    {
        require_once('connection.php');

        $idMascota = $_POST["idMascota"];

        if (!$idMascota) {
            echo "Error. Faltan variables.";
            exit(1);
        }

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "Select mascotas.*, especies.especie, razas.raza
                From mascotas
                Inner Join especies
                On especies.idespecie = mascotas.idespecie
                Inner Join razas
                On razas.idraza = mascotas.idraza
                Where idmascota = $idMascota";

        $result = $con->query($sql);

        header("Content-Type: text/xml");	
	    echo "<resultado>\n";

        while ($row = $result->fetch_array()) {
            echo "<respuesta>OK</respuesta>\n";
            echo "<idcliente>" . $row['idcliente'] . "</idcliente>\n";
            echo "<idmascota>" . $row['idmascota'] . "</idmascota>\n";
            echo "<idespecie>" . $row['idespecie'] . "</idespecie>\n";
            echo "<especie>" . $row['especie'] . "</especie>\n";
            echo "<idraza>" . $row['idraza'] . "</idraza>\n";
            echo "<raza>" . $row['raza'] . "</raza>\n";
            echo "<idtienda>" . $row['idtienda'] . "</idtienda>\n";
            echo "<nombre>" . $row['nombre'] . "</nombre>\n";
            echo "<fechanacimiento>" . $row['fechanacimiento'] . "</fechanacimiento>\n";
            echo "<edad>" . $row['edad'] . "</edad>\n";
            echo "<fechacaptura>" . $row['fechacaptura'] . "</fechacaptura>\n";            
            echo "<caracteristicas>" . $row['caracteristicas'] . "</caracteristicas>\n";
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
<?php
    try
    {
        require_once('connection.php');

        $tipoBusqueda = $_POST["tipoBusqueda"];

        if ($tipoBusqueda == "Fecha") {
            $diaCita = $_POST["diaCita"];
            $mesCita = $_POST["mesCita"];
            $anoCita = $_POST["anoCita"];
            $tipoCita = $_POST["tipoCita"];
            $incluirFinalizadas = $_POST["incluirFinalizadas"];
            $noPagadas = $_POST["noPagadas"];

            $prefijo = $_COOKIE["v_prefijo"];
            $tabla = $prefijo . "citas";

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select $tabla.*, clientes.nombre As cliente, mascotas.nombre As mascota
                    From $tabla
                    Inner Join clientes
                    On clientes.idcliente = $tabla.idcliente
                    Inner Join mascotas
                    On mascotas.idmascota = $tabla.idmascota
                    Where diacita Like '$diaCita' And mescita Like '$mesCita' And anocita Like '$anoCita' And $tabla.tipo Like '$tipoCita' And ($tabla.estado = 'ACTIVO' ";

            if ($incluirFinalizadas == "SI") {
                $sql = $sql . " Or $tabla.estado = 'FINALIZADO') ";
            } else {
                $sql = $sql . ")";
            }
            if ($noPagadas == "SI") {
                $sql = $sql . " And $tabla.restan > 0 ";
            }

            $sql = $sql . "Order By STR_TO_DATE(CONCAT(diacita, '/', mescita, '/', anocita), '%d/%m/%Y') ASC ";

            $result = $con->query($sql);

            echo "<div class='col-1'><a href='#divEnero'>Enero</a></div>";
            echo "<div class='col-1'><a href='#divFebrero'>Febrero</a></div>";
            echo "<div class='col-1'><a href='#divMarzo'>Marzo</a></div>";
            echo "<div class='col-1'><a href='#divAbril'>Abril</a></div>";
            echo "<div class='col-1'><a href='#divMayo'>Mayo</a></div>";
            echo "<div class='col-1'><a href='#divJunio'>Junio</a></div>";
            echo "<div class='col-1'><a href='#divJulio'>Julio</a></div>";
            echo "<div class='col-1'><a href='#divAgosto'>Agosto</a></div>";
            echo "<div class='col-1'><a href='#divSeptiembre'>Sept.</a></div>";
            echo "<div class='col-1'><a href='#divOctubre'>Octubre</a></div>";
            echo "<div class='col-1'><a href='#divNoviembre'>Nov.</a></div>";
            echo "<div class='col-1'><a href='#divDiciembre'>Dic.</a></div>";

            echo "<div class='col-3 divHeaderLista'>";
            echo "Cliente";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Mascota";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Tipo de cita";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Fecha de la cita";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";

            $lastMonth = "0";
            
            while ($row = $result->fetch_array()) {
                switch ($row["mescita"]) {
                    case '01':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divEnero'>ENERO</div>";
                                }
                                break;
                    case '02':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divFebrero'>FEBRERO</div>";
                                }
                                break;
                    case '03':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divMarzo'>MARZO</div>";
                                }
                                break;
                    case '04':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divAbril'>ABRIL</div>";
                                }
                                break;
                    case '05':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divMayo'>MAYO</div>";
                                }
                                break;
                    case '06':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divJunio'>JUNIO</div>";
                                }
                                break;
                    case '07':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divJulio'>JULIO</div>";
                                }
                                break;
                    case '08':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divAgosto'>AGOSTO</div>";
                                }
                                break;
                    case '09':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divSeptiembre'>SEPTIEMBRE</div>";
                                }
                                break;
                    case '10':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divOctubre'>OCTUBRE</div>";
                                }
                                break;
                    case '11':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divNoviembre'>NOVIEMBRE</div>";
                                }
                                break;
                    case '12':  
                                if ($row["mescita"] != $lastMonth) {
                                    $lastMonth = $row["mescita"];
                                    echo "<div class='col-12 divHeaderMes' id='divDiciembre'>DICIEMBRE</div>";
                                }
                                break;
                                
                }
                echo "<div class='col-3 divNombre' onclick='cargarDatosCliente(" . $row["idcliente"] . ")'>";
                echo $row["cliente"];
                echo "</div>";
                echo "<div class='col-2 divNombre' onclick='cargarDatosMascota(" . $row["idmascota"] . ")'>";
                echo $row["mascota"];
                echo "</div>";
                echo "<div class='col-2 divNombre' onclick='detallesCita(" . $row["idcita"] . ", \"" . $row["tipo"] . "\")'>";
                echo $row["tipo"];
                echo "</div>";
                echo "<div class='col-2'>";
                echo $row["diacita"] . "/" . $row["mescita"] . "/" . $row["anocita"];
                echo "</div>";
                echo "<div class='col-1'>";
                echo "<input type='button' class='btn btn-info' value='Pagos' onclick='verPagos(" . $row["idcita"] . ")' />";
                echo "</div>";
                echo "<div class='col-1'>";
                if ($row["estado"] == "ACTIVO") {
                    echo "<input type='button' class='btn btn-success' value='Finalizar' onclick='finalizarCita(" . $row["idcita"] . ")' />";
                }
                echo "</div>";
                echo "<div class='col-12 divMargin'>";
                echo "</div>";
            }            
            mysqli_close($con);
        } else if ($tipoBusqueda == 'Nombre') {
            $nombre = $_POST["nombre"];
            $incluirFinalizadas = $_POST["incluirFinalizadas"];
            $noPagadas = $_POST["noPagadas"];

            $prefijo = $_COOKIE["v_prefijo"];
            $tabla = $prefijo . "citas";

            $con = new mysqli($hn, $un, $pw, $db);

            $sql = "Select $tabla.*, clientes.nombre As cliente, mascotas.nombre As mascota
                    From $tabla
                    Inner Join clientes
                    On clientes.idcliente = $tabla.idcliente
                    Inner Join mascotas
                    On mascotas.idmascota = $tabla.idmascota
                    Where (clientes.nombre Like '%$nombre%' Or mascotas.nombre Like '%$nombre%') And ($tabla.estado = 'ACTIVO'";

            if ($incluirFinalizadas == "SI") {
                $sql = $sql . " Or $tabla.estado = 'FINALIZADO')";
            } else {
                $sql = $sql . ")";
            }
            if ($noPagadas == "SI") {
                $sql = $sql . " And $tabla.restan > 0";
            }

            $result = $con->query($sql);

            echo "<div class='col-3 divHeaderLista'>";
            echo "Cliente";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Mascota";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Tipo de cita";
            echo "</div>";
            echo "<div class='col-2 divHeaderLista'>";
            echo "Fecha de la cita";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";
            echo "<div class='col-1 divHeaderLista'>";
            echo "";
            echo "</div>";

            while ($row = $result->fetch_array()) {
                echo "<div class='col-3 divNombre' onclick='cargarDatosCliente(" . $row["idcliente"] . ")'>";
                echo $row["cliente"];
                echo "</div>";
                echo "<div class='col-2 divNombre' onclick='cargarDatosMascota(" . $row["idmascota"] . ")'>";
                echo $row["mascota"];
                echo "</div>";
                /*
                echo "<div class='col-2'>";
                echo $row["tipo"];
                echo "</div>";
                */
                echo "<div class='col-2 divNombre' onclick='detallesCita(" . $row["idcita"] . ", \"" . $row["tipo"] . "\")'>";
                echo $row["tipo"];
                echo "</div>";
                echo "<div class='col-2'>";
                echo $row["diacita"] . "/" . $row["mescita"] . "/" . $row["anocita"];
                echo "</div>";
                /*
                echo "<div class='col-1'>";
                echo "<input type='button' class='btn btn-info' value='Detalles' onclick='detallesCita(" . $row["idcita"] . ", \"" . $row["tipo"] . "\")' />";
                echo "</div>";
                */
                echo "<div class='col-1'>";
                echo "<input type='button' class='btn btn-info' value='Pagos' onclick='verPagos(" . $row["idcita"] . ")' />";
                echo "</div>";
                echo "<div class='col-1'>";
                if ($row["estado"] == "ACTIVO") {
                    echo "<input type='button' class='btn btn-success' value='Finalizar' onclick='finalizarCita(" . $row["idcita"] . ")' />";
                }
                echo "</div>";
                echo "<div class='col-12 divMargin'>";
                echo "</div>";
            }            
            mysqli_close($con);
        }
    }
    catch (Throwable $t)
    {
        echo $t;
    }
?>
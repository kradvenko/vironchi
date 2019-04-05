<?php
    try
    {
        require_once('connection.php');

        $prefijo = $_COOKIE["v_prefijo"];
        $tabla = $prefijo . "citas";
        $tablaPagos = $prefijo . "pagos";

        $con = new mysqli($hn, $un, $pw, $db);

        $sql = "SELECT $tabla.*, clientes.nombre As cliente, mascotas.nombre As mascota
                FROM $tabla
                INNER JOIN clientes
                ON clientes.idcliente = $tabla.idcliente
                INNER JOIN mascotas
                ON mascotas.idmascota = $tabla.idmascota
                WHERE $tabla.restan > 0
                AND $tabla.estado != 'FINALIZADO'
                AND $tabla.idcita IN
                (
                    SELECT DISTINCT $tablaPagos.idcita
                    FROM $tablaPagos
                    INNER JOIN $tabla
                    ON $tabla.idcita = $tablaPagos.idcita
                    WHERE $tabla.restan > 0
                    AND $tabla.estado != 'FINALIZADO'
                    AND $tablaPagos.idcita NOT IN
                    (
                        SELECT $tablaPagos.idcita
                        FROM $tablaPagos
                        INNER JOIN $tabla
                        ON $tabla.idcita = $tablaPagos.idcita
                        WHERE ( DATE_SUB(curdate(), INTERVAL 3 DAY) <= str_to_date($tablaPagos.fechapago, '%d/%m/%Y') )
                        AND  $tabla.restan > 0
                        AND $tabla.estado != 'FINALIZADO'
                    )
                )
                ";

        $result = $con->query($sql);

        $html = "";
        $htmlHeader = "";

        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divEnero'>Enero</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divFebrero'>Febrero</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divMarzo'>Marzo</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divAbril'>Abril</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divMayo'>Mayo</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divJunio'>Junio</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divJulio'>Julio</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divAgosto'>Agosto</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divSeptiembre'>Sept.</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divOctubre'>Octubre</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divNoviembre'>Nov.</a></div>";
        $htmlHeader = $htmlHeader . "<div class='col-1'><a href='#divDiciembre'>Dic.</a></div>";

        $htmlHeader = $htmlHeader . "<div class='col-3 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "Cliente";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-2 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "Mascota";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-2 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "Tipo de cita";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-2 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "Fecha de la cita";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-1 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-1 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "";
        $htmlHeader = $htmlHeader . "</div>";
        $htmlHeader = $htmlHeader . "<div class='col-1 divHeaderLista'>";
        $htmlHeader = $htmlHeader . "";
        $htmlHeader = $htmlHeader . "</div>";

        $lastMonth = "0";
        $showCounter = "";
        $count = 0;

        while ($row = $result->fetch_array()) {
            $count++;
            switch ($row["mescita"]) {
                case '01':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divEnero'>ENERO</div>";
                            }
                            break;
                case '02':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divFebrero'>FEBRERO</div>";
                            }
                            break;
                case '03':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divMarzo'>MARZO</div>";
                            }
                            break;
                case '04':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divAbril'>ABRIL</div>";
                            }
                            break;
                case '05':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divMayo'>MAYO</div>";
                            }
                            break;
                case '06':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divJunio'>JUNIO</div>";
                            }
                            break;
                case '07':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divJulio'>JULIO</div>";
                            }
                            break;
                case '08':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divAgosto'>AGOSTO</div>";
                            }
                            break;
                case '09':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divSeptiembre'>SEPTIEMBRE</div>";
                            }
                            break;
                case '10':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divOctubre'>OCTUBRE</div>";
                            }
                            break;
                case '11':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divNoviembre'>NOVIEMBRE</div>";
                            }
                            break;
                case '12':  
                            if ($row["mescita"] != $lastMonth) {
                                $lastMonth = $row["mescita"];
                                $html = $html . "<div class='col-12 divHeaderMes' id='divDiciembre'>DICIEMBRE</div>";
                            }
                            break;
                            
            }
            $html = $html . "<div class='col-3 divNombre' onclick='cargarDatosCliente(" . $row["idcliente"] . ")'>";
            $html = $html . $row["cliente"];
            $html = $html . "</div>";
            $html = $html . "<div class='col-2 divNombre' onclick='cargarDatosMascota(" . $row["idmascota"] . ")'>";
            $html = $html . $row["mascota"];
            $html = $html . "</div>";
            $html = $html . "<div class='col-2 divNombre' onclick='detallesCita(" . $row["idcita"] . ", \"" . $row["tipo"] . "\")'>";
            $html = $html . $row["tipo"];
            $html = $html . "</div>";
            $html = $html . "<div class='col-2'>";
            $html = $html . $row["diacita"] . "/" . $row["mescita"] . "/" . $row["anocita"];
            $html = $html . "</div>";
            $html = $html . "<div class='col-1'>";
            $html = $html . "<input type='button' class='btn btn-info' value='Pagos' onclick='verPagos(" . $row["idcita"] . ")' />";
            $html = $html . "</div>";
            $html = $html . "<div class='col-1'>";
            if ($row["estado"] == "ACTIVO") {
                $html = $html . "<input type='button' class='btn btn-success' value='Finalizar' onclick='finalizarCita(" . $row["idcita"] . ")' />";
            }
            $html = $html . "</div>";
            $html = $html . "<div class='col-12 divMargin'>";
            $html = $html . "</div>";
        }
        $showCounter = "<div class='col-12 divHeaderMes'>TOTAL CITAS PENDIENTES DE PAGO (Más de 7 días sin liquidar): " . $count . "</div>";
        echo $showCounter. $htmlHeader . $html;

        mysqli_close($con);
    }
    catch (Throwable $t)
    {
        $html = $html . $t;
    }
?>
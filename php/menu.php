<?php
    
    function menu() {
            $menu = '
            <div class="row divMargin">
                    <div class="col-6">
                        
                    </div>
                    <div class="col-4">
                        Usuario actual :  ' . $_COOKIE["v_nombre"] . ' 
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-primary btn-danger" onclick="cerrarSesion()">Cerrar sesión</button> 
                    </div>
                </div>
            <div class="mainMenu">
                    <div class="dropdown">
                        <a href="menu.php" id="aMenu" class="mainMenuElement">Inicio</a>
                    </div>
                    <div class="dropdown">
                        <a href="" id="aCitas" class="mainMenuElement">Citas</a>
                        <div class="dropdown-content">
                            <a href="nuevacita.php" id="aNuevaCita">Nueva cita</a>
                            <a href="revisarcitas.php" id="aRevisarCitas">Revisar citas</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="" id="aVentas" class="mainMenuElement">Ventas</a>
                        <div class="dropdown-content">
                            <a href="nuevaventa.php" id="aNuevaVenta">Nueva venta</a>
                            <a href="corte.php" id="aCorte">Corte</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="articulos.php" id="aArticulos" class="mainMenuElement">Artículos</a>
                    </div>
                    <!--<div class="dropdown">
                        <a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a>                        
                    </div>-->
            </div>
            ';
        return $menu;
    }
?>
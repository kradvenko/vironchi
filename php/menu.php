<?php
    
    function menu() {
            $menu = '
            <div class="mainMenu">
                    <div class="dropdown">
                        <a href="index.php" id="aIndex" class="mainMenuElement">Inicio</a>
                    </div>
                    <div class="dropdown">
                        <a href="" id="aCitas" class="mainMenuElement">Citas</a>
                        <div class="dropdown-content">
                            <a href="nuevacita.php" id="aNuevaCita">Nueva cita</a>
                            <a href="revisarcitas.php" id="aRevisarCitas">Revisar citas</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a>                        
                    </div>
            </div>
            ';
        return $menu;
    }
?>
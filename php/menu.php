<?php
    
    function menu() {
            $menu = '
                    <ul class="mainMenu">
                        <li><a href="index.php" id="aIndex" class="mainMenuElement">Inicio</a></li>
                        <li><a href="amadonervo.php" id="aAmado" class="mainMenuElement">Amado Nervo</a></li>
                        <li><a href="acervo.php" id="aAcervo" class="mainMenuElement">Acervo</a></li>
                        <li><a href="instituciones.php" id="aInstituciones" class="mainMenuElement">Instituciones</a></li>
                        <li><a href="galerias.php" id="aGalerias"class="mainMenuElement">Galerías</a></li>
                        <li><a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a></li>
                    </ul>
            '; 
            $menu = '
            <div class="mainMenu">
                    <div class="dropdown">
                        <a href="index.php" id="aIndex" class="mainMenuElement">Inicio</a>
                    </div>
                    <div class="dropdown">
                        <a href="amadonervo.php" id="aIndex" class="mainMenuElement">Amado Nervo</a>
                    </div>
                    <div class="dropdown">
                        <a href="acervo.php" id="aAcervo" class="mainMenuElement">Acervo</a>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="instituciones.php" id="aInstituciones" class="mainMenuElement">Instituciones</a>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                    <div class="dropdown">
                        <a href="galerias.php" id="aGalerias"class="mainMenuElement">Galerías</a>                        
                    </div>
                    <div class="dropdown">
                        <a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a>                        
                    </div>
            </div>
            ';
            $menu = '
            <div class="mainMenu">
                    <div class="dropdown">
                        <a href="index.php" id="aIndex" class="mainMenuElement">Inicio</a>
                    </div>
                    <div class="dropdown">
                        <a href="amadonervo.php" id="aIndex" class="mainMenuElement">Amado Nervo</a>
                    </div>
                    <div class="dropdown">
                        <a href="acervo.php" id="aAcervo" class="mainMenuElement">Acervo</a>
                    </div>
                    <div class="dropdown">
                        <a href="instituciones.php" id="aInstituciones" class="mainMenuElement">Instituciones</a>
                    </div>
                    <div class="dropdown">
                        <a href="galerias.php" id="aGalerias"class="mainMenuElement">Galerías</a>                        
                    </div>
                    <div class="dropdown">
                        <a href="contacto.php" id="aContacto" class="mainMenuElement">Contacto</a>                        
                    </div>
            </div>
            ';
        return $menu;
    }
?>
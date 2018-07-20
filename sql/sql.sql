CREATE TABLE `tiendas` (
  `idtienda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `prefijo` varchar(5) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idmatriz` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idtienda` int(11) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--19/07/2018
CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `clientes` 
ADD COLUMN `idtienda` INT NULL AFTER `idcliente`;

ALTER TABLE `clientes` 
ADD COLUMN `fechacaptura` VARCHAR(45) NULL AFTER `estado`;


CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `idtienda` int(11) DEFAULT NULL,
  `nombre` varchar(300) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `municipio` varchar(45) DEFAULT NULL,
  `telefono1` varchar(45) DEFAULT NULL,
  `telefono2` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vir_citas` (
  `idcita` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `idmascota` int(11) DEFAULT NULL,
  `diacita` varchar(5) DEFAULT NULL,
  `mescita` varchar(5) DEFAULT NULL,
  `anocita` varchar(5) DEFAULT NULL,
  `total` float DEFAULT NULL,
  `anticipo` float DEFAULT NULL,
  `restan` float DEFAULT NULL,
  `ce_corte` varchar(45) DEFAULT NULL,
  `ce_bano` varchar(45) DEFAULT NULL,
  `ce_notas` varchar(500) DEFAULT NULL,
  `cm_peso` varchar(45) DEFAULT NULL,
  `cm_temperatura` varchar(45) DEFAULT NULL,
  `cm_aparienciageneral` varchar(45) DEFAULT NULL,
  `cm_aparicenciageneralnotas` varchar(200) DEFAULT NULL,
  `cm_piel` varchar(45) DEFAULT NULL,
  `cm_pielnotas` varchar(200) DEFAULT NULL,
  `cm_muscoesqueleto` varchar(45) DEFAULT NULL,
  `cm_muscoesqueletonotas` varchar(200) DEFAULT NULL,
  `cm_circulatorio` varchar(45) DEFAULT NULL,
  `cm_circulatorionotas` varchar(200) DEFAULT NULL,
  `cm_digestivo` varchar(45) DEFAULT NULL,
  `cm_digestivonotas` varchar(200) DEFAULT NULL,
  `cm_respiratorio` varchar(45) DEFAULT NULL,
  `cm_respiratorionotas` varchar(200) DEFAULT NULL,
  `cm_genitourinario` varchar(45) DEFAULT NULL,
  `cm_genitourinarionotas` varchar(200) DEFAULT NULL,
  `cm_ojos` varchar(45) DEFAULT NULL,
  `cm_ojosnotas` varchar(200) DEFAULT NULL,
  `cm_oidos` varchar(45) DEFAULT NULL,
  `cm_oidosnotas` varchar(200) DEFAULT NULL,
  `cm_sistemanervioso` varchar(45) DEFAULT NULL,
  `cm_sistemanerviosonotas` varchar(200) DEFAULT NULL,
  `cm_ganglios` varchar(45) DEFAULT NULL,
  `cm_gangliosnotas` varchar(200) DEFAULT NULL,
  `cm_mucosas` varchar(45) DEFAULT NULL,
  `cm_mucosasnotas` varchar(200) DEFAULT NULL,
  `cm_listaproblemas` varchar(500) DEFAULT NULL,
  `cm_planesdiagnosticos` varchar(500) DEFAULT NULL,
  `cm_planesterapeuticos` varchar(500) DEFAULT NULL,
  `cm_instruccionesclientes` varchar(500) DEFAULT NULL,
  `cm_notas` varchar(500) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



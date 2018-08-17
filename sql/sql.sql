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
  `cm_aparienciageneralnotas` varchar(200) DEFAULT NULL,
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
  `cm_instruccionescliente` varchar(500) DEFAULT NULL,
  `cm_notas` varchar(500) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `fechafinalizado` varchar(45) DEFAULT NULL,
  `idusuariocaptura` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcita`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--20/07/2018
CREATE TABLE `mascotas` (
  `idmascota` int(11) NOT NULL AUTO_INCREMENT,
  `idcliente` int(11) DEFAULT NULL,
  `idespecie` int(11) DEFAULT NULL,
  `idraza` int(11) DEFAULT NULL,
  `idtienda` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `fechanacimiento` varchar(45) DEFAULT NULL,
  `edad` varchar(45) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `caracteristicas` varchar(400) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idmascota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE `especies` (
  `idespecie` int(11) NOT NULL AUTO_INCREMENT,
  `especie` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`idespecie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `razas` (
  `idraza` int(11) NOT NULL AUTO_INCREMENT,
  `idespecie` int(11) DEFAULT NULL,
  `raza` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  PRIMARY KEY (`idraza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--26/07/2018
CREATE TABLE `vir_pagos` (
  `idpago` int(11) NOT NULL AUTO_INCREMENT,
  `idcita` int(11) DEFAULT NULL,
  `fechapago` varchar(45) DEFAULT NULL,
  `cantidad` float DEFAULT NULL,
  `notas` varchar(200) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idpago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--27/07/2018

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  `idusuariocaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--05/08/2018
CREATE TABLE `vir_articulos` (
  `idarticulo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `preciopublico` float DEFAULT NULL,
  `cantidadminima` int(11) DEFAULT NULL,
  `preciocompra` float DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idusuariocaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idarticulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--07/08/2018
CREATE TABLE `vir_ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(45) DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `descuentoporcentaje` float DEFAULT NULL,
  `descuentocantidad` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `cambio` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `vir_detalleventa` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) DEFAULT NULL,
  `idarticulo` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descuentoporcentaje` float DEFAULT NULL,
  `descuentocantidad` float DEFAULT NULL,
  `preciopublico` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `total` float DEFAULT NULL,
  PRIMARY KEY (`iddetalleventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `#__vehiculo_marcas`;

CREATE TABLE `#__vehiculo_marcas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
  `logo` VARCHAR(900) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__vehiculo_modelos`;

CREATE TABLE `#__vehiculo_modelos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idMarca` INT(11) NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__vehiculo_versiones`;

CREATE TABLE `#__vehiculo_versiones` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idMarca` INT(11) NOT NULL,
  `idModelo` INT(11) NOT NULL,
  `nombre` VARCHAR(25) NOT NULL,
  `idTipo` INT(11) NOT NULL,
  `idCombustible` INT(11) NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `kw` VARCHAR(5) NOT NULL,
  `cv` VARCHAR(5) NOT NULL,
  `cm3` INT(11) NOT NULL,
  `ncilindros` INT(2) NOT NULL,

   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__vehiculo_tipos`;

CREATE TABLE `#__vehiculo_tipos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__vehiculo_tipos` (nombre) VALUES 
('Turismo'), ('Todoterreno'), ('Industrial');

DROP TABLE IF EXISTS `#__vehiculo_combustibles`;

CREATE TABLE `#__vehiculo_combustibles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(25) NOT NULL,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

INSERT INTO `#__vehiculo_combustibles` (nombre) VALUES 
('Gasolina'), 
('Híbrido'), 
('Diésel'), 
('Eléctrico'), 
('Mezcla motor 2 tiempos');

CREATE TABLE `#__vehiculo_cruces_virtuemart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `recambio_id` INT(11) NOT NULL,
  `version_vehiculo_id` INT(11) NOT NULL,
  `virtuemart_product_id` INT(11) NOT NULL,
  `fecha_actualizacion` DATE,
   PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


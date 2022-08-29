/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.24-MariaDB : Database - vjgsyizffsuv_forge
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vjgsyizffsuv_forge` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `vjgsyizffsuv_forge`;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nombre` varchar(80) DEFAULT NULL,
  `cliente_apellido` varchar(80) DEFAULT NULL,
  `cliente_password` varchar(80) DEFAULT NULL,
  `cliente_passwd2` varchar(80) DEFAULT NULL,
  `cliente_direccion` varchar(80) DEFAULT NULL,
  `cliente_apart_casa` varchar(80) DEFAULT NULL,
  `cliente_apartamentro` int(11) DEFAULT NULL,
  `cliente_ciudad` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `cliente_apartamentro` (`cliente_apartamentro`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`cliente_apartamentro`) REFERENCES `departamento` (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

/*Table structure for table `departamento` */

DROP TABLE IF EXISTS `departamento`;

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL AUTO_INCREMENT,
  `departamento_nombre` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `departamento` */

insert  into `departamento`(`idDepartamento`,`departamento_nombre`) values (1,'Bogotá'),(2,'Bolívar'),(3,'Antioquia'),(4,'Atlántico'),(5,'Caldas'),(6,'San Andrés y Providencia');

/*Table structure for table `estilocomida` */

DROP TABLE IF EXISTS `estilocomida`;

CREATE TABLE `estilocomida` (
  `idEstilo` int(11) NOT NULL AUTO_INCREMENT,
  `estilo_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idEstilo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `estilocomida` */

insert  into `estilocomida`(`idEstilo`,`estilo_nombre`) values (1,'Quisquilloso'),(2,'Normal'),(3,'Muy glotón');

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `marca_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `marca` */

insert  into `marca`(`idMarca`,`marca_nombre`) values (1,'Monello'),(2,'Chunky'),(3,'Hills'),(4,'Purina'),(5,'Barf Origenes');

/*Table structure for table `mipet` */

DROP TABLE IF EXISTS `mipet`;

CREATE TABLE `mipet` (
  `idMipet` int(11) NOT NULL AUTO_INCREMENT,
  `mipet_nombreUs` varchar(50) DEFAULT NULL,
  `mipet_ciudadUs` varchar(50) DEFAULT NULL,
  `mipet_phoneUs` varchar(50) DEFAULT NULL,
  `mipet_emailUs` varchar(50) DEFAULT NULL,
  `mipet_celularUs` varchar(50) DEFAULT NULL,
  `mipet_nombre` varchar(50) DEFAULT NULL,
  `mipet_tipe` varchar(50) DEFAULT NULL,
  `mipet_cond` varchar(50) DEFAULT NULL,
  `mipet_esteril` varchar(50) DEFAULT NULL,
  `mipet_raze` int(11) DEFAULT NULL,
  `mipet_nacio` varchar(50) DEFAULT NULL,
  `mipet_peso` varchar(50) DEFAULT NULL,
  `mipet_pesoOp` varchar(50) DEFAULT NULL,
  `mipet_style` int(11) NOT NULL,
  `mipet_concentrado` int(11) NOT NULL,
  `mipet_marca` varchar(50) DEFAULT NULL,
  `mipet_pbBuild` varchar(50) DEFAULT NULL,
  `mipet_pbActivity` varchar(50) DEFAULT NULL,
  `mipet_typeIntolerance` varchar(15) DEFAULT NULL,
  `mipet_tiPollo` varchar(50) DEFAULT NULL,
  `mipet_tiRes` varchar(50) DEFAULT NULL,
  `mipet_tiPes` varchar(50) DEFAULT NULL,
  `mipet_tiPavo` varchar(50) DEFAULT NULL,
  `mipet_tiZanahoria` varchar(50) DEFAULT NULL,
  `mipet_tiRemolacha` varchar(50) DEFAULT NULL,
  `mipet_tiEspinaca` varchar(50) DEFAULT NULL,
  `mipet_tiZuquini` varchar(50) DEFAULT NULL,
  `mipet_tiOtro` blob DEFAULT NULL,
  `mipet_tiText` blob DEFAULT NULL,
  `mipet_mcMedica` blob DEFAULT NULL,
  `mipet_mcDigest` blob DEFAULT NULL,
  `mipet_mcRenal` blob DEFAULT NULL,
  `mipet_mcCancer` blob DEFAULT NULL,
  `mipet_mcProCard` blob DEFAULT NULL,
  `mipet_mcObesidad` blob DEFAULT NULL,
  `mipet_mcProHepat` blob DEFAULT NULL,
  `mipet_mcArticula` blob DEFAULT NULL,
  `mipet_mcProblePiel` blob DEFAULT NULL,
  `mipet_mcEstruv` blob DEFAULT NULL,
  `mipet_mcAlergAliment` blob DEFAULT NULL,
  `mipet_McEstreni` blob DEFAULT NULL,
  `mipet_mcChunt` blob DEFAULT NULL,
  `mipet_mcPancreatis` blob DEFAULT NULL,
  `mipet_mcProArti` blob DEFAULT NULL,
  `mipet_mcOto` blob DEFAULT NULL,
  `mipet_mcText` blob DEFAULT NULL,
  `mipet_asDiarrea` blob DEFAULT NULL,
  `mipet_asVomito` blob DEFAULT NULL,
  `mipet_asGases` blob DEFAULT NULL,
  `mipet_asMalAliento` blob DEFAULT NULL,
  `mipet_asCaidaPelo` blob DEFAULT NULL,
  `mipet_asPicazon` blob DEFAULT NULL,
  `mipet_asPeloOpa` blob DEFAULT NULL,
  `mipet_asConvuls` blob DEFAULT NULL,
  `mipet_asArticu` blob DEFAULT NULL,
  `mipet_asDesanimo` blob DEFAULT NULL,
  `mipet_asAyuno` blob DEFAULT NULL,
  `mipet_asOtro` blob DEFAULT NULL,
  `mipet_asTextArea` blob DEFAULT NULL,
  `mipet_vqCheck` blob DEFAULT NULL,
  `mipet_vqNaeFile` blob DEFAULT NULL,
  `mipet_adCheck` blob DEFAULT NULL,
  `foodIdeal_check` varchar(10) DEFAULT NULL,
  `FoodOtro_plan` varchar(10) DEFAULT NULL,
  `dietCheck` varchar(50) DEFAULT NULL,
  `dietOtroPlan` varchar(50) DEFAULT NULL,
  `mipet_calorias` varchar(50) DEFAULT NULL,
  `mipet_idCliente` int(11) NOT NULL,
  PRIMARY KEY (`idMipet`),
  KEY `mipet_idCliente` (`mipet_idCliente`),
  KEY `mipet_raze` (`mipet_raze`),
  KEY `mipet_style` (`mipet_style`),
  KEY `mipet_concentrado` (`mipet_concentrado`),
  CONSTRAINT `mipet_ibfk_1` FOREIGN KEY (`mipet_idCliente`) REFERENCES `cliente` (`idCliente`),
  CONSTRAINT `mipet_ibfk_2` FOREIGN KEY (`mipet_raze`) REFERENCES `raza` (`idRaza`),
  CONSTRAINT `mipet_ibfk_3` FOREIGN KEY (`mipet_style`) REFERENCES `estilocomida` (`idEstilo`),
  CONSTRAINT `mipet_ibfk_4` FOREIGN KEY (`mipet_concentrado`) REFERENCES `tipocomida` (`idComida`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mipet` */

/*Table structure for table `raza` */

DROP TABLE IF EXISTS `raza`;

CREATE TABLE `raza` (
  `idRaza` int(11) NOT NULL AUTO_INCREMENT,
  `raza_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRaza`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `raza` */

insert  into `raza`(`idRaza`,`raza_nombre`) values (0,'No aplica'),(1,'Akita'),(2,'American Pit Bull Terrier'),(3,'Beagle'),(4,'Boston Terrier'),(5,'Doberman'),(6,'Otra'),(7,'Grand Danes');

/*Table structure for table `tipocomida` */

DROP TABLE IF EXISTS `tipocomida`;

CREATE TABLE `tipocomida` (
  `idComida` int(11) NOT NULL AUTO_INCREMENT,
  `comida_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idComida`)
) ENGINE=InnoDB AUTO_INCREMENT=314 DEFAULT CHARSET=utf8;

/*Data for the table `tipocomida` */

insert  into `tipocomida`(`idComida`,`comida_nombre`) values (1,'Concentrado'),(2,'Barf'),(3,'Natural Horneada'),(4,'Preparada en casa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

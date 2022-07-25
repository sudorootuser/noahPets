/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.22-MariaDB : Database - forge
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`forge` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `forge`;

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
  `cliente_apartamentro` varchar(80) DEFAULT NULL,
  `cliente_ciudad` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8;

/*Data for the table `cliente` */

insert  into `cliente`(`idCliente`,`cliente_nombre`,`cliente_apellido`,`cliente_password`,`cliente_passwd2`,`cliente_direccion`,`cliente_apart_casa`,`cliente_apartamentro`,`cliente_ciudad`) values (133,'Juan','123456789','Administrador','Administrador','Carrera 75L bis 62 H #66 Sur','sadassad','Cundinamarca','Bogotá'),(134,'Juan','Administrador','Administrador','Administrador','Carrera 75L bis 62 H #66 Sur','Cassaaa','Cundinamarca','Bogotá');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `mipet` */

insert  into `mipet`(`idMipet`,`mipet_nombreUs`,`mipet_ciudadUs`,`mipet_phoneUs`,`mipet_emailUs`,`mipet_celularUs`,`mipet_nombre`,`mipet_tipe`,`mipet_cond`,`mipet_esteril`,`mipet_raze`,`mipet_nacio`,`mipet_peso`,`mipet_pesoOp`,`mipet_style`,`mipet_concentrado`,`mipet_marca`,`mipet_pbBuild`,`mipet_pbActivity`,`mipet_typeIntolerance`,`mipet_tiPollo`,`mipet_tiRes`,`mipet_tiPes`,`mipet_tiPavo`,`mipet_tiZanahoria`,`mipet_tiRemolacha`,`mipet_tiEspinaca`,`mipet_tiZuquini`,`mipet_tiOtro`,`mipet_tiText`,`mipet_mcMedica`,`mipet_mcDigest`,`mipet_mcRenal`,`mipet_mcCancer`,`mipet_mcProCard`,`mipet_mcObesidad`,`mipet_mcProHepat`,`mipet_mcArticula`,`mipet_mcProblePiel`,`mipet_mcEstruv`,`mipet_mcAlergAliment`,`mipet_McEstreni`,`mipet_mcChunt`,`mipet_mcPancreatis`,`mipet_mcProArti`,`mipet_mcOto`,`mipet_mcText`,`mipet_asDiarrea`,`mipet_asVomito`,`mipet_asGases`,`mipet_asMalAliento`,`mipet_asCaidaPelo`,`mipet_asPicazon`,`mipet_asPeloOpa`,`mipet_asConvuls`,`mipet_asArticu`,`mipet_asDesanimo`,`mipet_asAyuno`,`mipet_asOtro`,`mipet_asTextArea`,`mipet_vqCheck`,`mipet_vqNaeFile`,`mipet_adCheck`,`foodIdeal_check`,`FoodOtro_plan`,`dietCheck`,`dietOtroPlan`,`mipet_idCliente`) values (7,'Camilo','Bogotá','3227405024','rrejuancho1999@gmail.com','3227405024','Carlitos','Perro','Hembra','No',2,'2022-07-25','34','60',2,2,'3','Ideal','Activa',NULL,'Pollo','Res','Pescado','Pavo','Zanahoría','Remolacha','Espinaca','Zuquíni','Zanahoría','sdsadasdaadasda','1','Problemas Digestivos','','Cáncer','Problemas cardiacos','Obsesidad','Problemas Hepáticos','Problemas Articulares','Problemas de Piel','Calculos Estruvita','Alergía Alimentaría','Estreñimiento','Shunt','Pancreatitis','Problemas Articulares','Otro','aasxasdasd','Diarrea','Vómito','Gases','Mal Aliento','Caída de Pelo','Picazon','Pelo Opaco','Conculsiones','Dolor Articulas','Desánimo','Ayuno Prolongado','Otro','xczxczx','Moderada','37fc27c11cf73b65c3b493b1d3c723f2.pdf','Sí',NULL,NULL,NULL,NULL,133),(8,'Camilo','Bogotá','3227405024','rrejuancho1999@gmail.com','3227405024','Carlitos','Perro','Hembra','No',2,'2022-07-25','34','60',2,2,'3','Ideal','Activa',NULL,'Pollo','Res','Pescado','Pavo','Zanahoría','Remolacha','Espinaca','Zuquíni','Zanahoría','sdsadasdaadasda','1','Problemas Digestivos','','Cáncer','Problemas cardiacos','Obsesidad','Problemas Hepáticos','Problemas Articulares','Problemas de Piel','Calculos Estruvita','Alergía Alimentaría','Estreñimiento','Shunt','Pancreatitis','Problemas Articulares','Otro','aasxasdasd','Diarrea','Vómito','Gases','Mal Aliento','Caída de Pelo','Picazon','Pelo Opaco','Conculsiones','Dolor Articulas','Desánimo','Ayuno Prolongado','Otro','xczxczx','Moderada','37fc27c11cf73b65c3b493b1d3c723f2.pdf','No','CUIDADO DI','PAVO','Ideal Topper Plan','Topper Plan Otro',134);

/*Table structure for table `raza` */

DROP TABLE IF EXISTS `raza`;

CREATE TABLE `raza` (
  `idRaza` int(11) NOT NULL AUTO_INCREMENT,
  `raza_nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idRaza`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `raza` */

insert  into `raza`(`idRaza`,`raza_nombre`) values (1,'Akita'),(2,'American Pit Bull Terrier'),(3,'Beagle'),(4,'Boston Terrier'),(5,'Doberman');

/*Table structure for table `tipocomida` */

DROP TABLE IF EXISTS `tipocomida`;

CREATE TABLE `tipocomida` (
  `idComida` int(11) NOT NULL AUTO_INCREMENT,
  `comida_nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`idComida`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tipocomida` */

insert  into `tipocomida`(`idComida`,`comida_nombre`) values (1,'Concentrado'),(2,'Barf'),(3,'Natural Horneada'),(4,'Preparada en casa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

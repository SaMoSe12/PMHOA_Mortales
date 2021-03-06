-- MySQL dump 10.13  Distrib 5.7.36, for Linux (x86_64)
--
-- Host: localhost    Database: hoaptamta
-- ------------------------------------------------------
-- Server version	5.7.36-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `CatalogoAdministrativos`
--

DROP TABLE IF EXISTS `CatalogoAdministrativos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoAdministrativos` (
  `idAdministrativo` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAdmin` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPAdmin` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoAdmin` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `userAdmin` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `passwordAdmin` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `idFraccionamiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAdministrativo`),
  KEY `CatalogoAdministrativos_FK` (`idFraccionamiento`),
  CONSTRAINT `CatalogoAdministrativos_FK` FOREIGN KEY (`idFraccionamiento`) REFERENCES `CatalogoFraccionamiento` (`idFraccionamiento`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoAdministrativos`
--

LOCK TABLES `CatalogoAdministrativos` WRITE;
/*!40000 ALTER TABLE `CatalogoAdministrativos` DISABLE KEYS */;
INSERT INTO `CatalogoAdministrativos` VALUES (1,'John','Perez','admin@correo.com','adminperez','AP2901',NULL);
/*!40000 ALTER TABLE `CatalogoAdministrativos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoAmenidades`
--

DROP TABLE IF EXISTS `CatalogoAmenidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoAmenidades` (
  `idAmenidad` int(11) NOT NULL AUTO_INCREMENT,
  `nombreAmenidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `idFraccionamiento` int(11) NOT NULL,
  PRIMARY KEY (`idAmenidad`),
  KEY `CatalogoAmenidades_FK` (`idFraccionamiento`),
  CONSTRAINT `CatalogoAmenidades_FK` FOREIGN KEY (`idFraccionamiento`) REFERENCES `CatalogoFraccionamiento` (`idFraccionamiento`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoAmenidades`
--

LOCK TABLES `CatalogoAmenidades` WRITE;
/*!40000 ALTER TABLE `CatalogoAmenidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `CatalogoAmenidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoDocumentos`
--

DROP TABLE IF EXISTS `CatalogoDocumentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoDocumentos` (
  `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoDocumentos`
--

LOCK TABLES `CatalogoDocumentos` WRITE;
/*!40000 ALTER TABLE `CatalogoDocumentos` DISABLE KEYS */;
INSERT INTO `CatalogoDocumentos` VALUES (1,'Servicios'),(2,'Mantenimiento');
/*!40000 ALTER TABLE `CatalogoDocumentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoFraccionamiento`
--

DROP TABLE IF EXISTS `CatalogoFraccionamiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoFraccionamiento` (
  `idFraccionamiento` int(11) NOT NULL AUTO_INCREMENT,
  `nombreFracc` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionFracc` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idFraccionamiento`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoFraccionamiento`
--

LOCK TABLES `CatalogoFraccionamiento` WRITE;
/*!40000 ALTER TABLE `CatalogoFraccionamiento` DISABLE KEYS */;
INSERT INTO `CatalogoFraccionamiento` VALUES (1,'El Encanto','Dise??adas para combinar armoniosamente con el paisaje de Punta Mita, las residencias dentro de la prestigiosa comunidad El Encanto son ??nicas con su car??cter regional distintivo y sus detalles arquitect??nicos. '),(2,'Bahia Signature Estates','Bahia Signature Estates, ofrece una oportunidad ??nica de poseer una impresionante propiedad frente al mar en esta comunidad tur??stica de renombre mundial. Estas propiedades de generosas dimensiones frente a la playa se extienden a lo largo de la costa de la Bah??a de Banderas. El acceso a estas extraordinarias unidades es a trav??s de un camino privado lleno de exuberantes jardines, as?? como tambi??n un agradable paseo por la playa hasta complejo tur??stico adyacente a Ranchos Beach Club. Adicionalmente los propietarios e invitados de estas unidades tendr??n pleno acceso a los servicios del futuro complejo tur??stico.'),(3,'Four Seasons Residences','Compuestas por varios enclaves que se escalonan en la ladera de una colina, las villas ocupan un entorno de exuberante vegetaci??n espec??ficamente seleccionado para aprovechar las vistas casi panor??micas de la pen??nsula y el oc??ano Pac??fico. Su Villa Privada se distingue por sus piscinas privadas de borde infinito, sus cocinas gourmet, sus amplias terrazas y patios cubiertos y sus acogedores dise??os de cuatro y cinco dormitorios; estas villas irradian la calidad y la atenci??n al detalle de Four Seasons.\r\nLos propietarios de las Villas Privadas Four Seasons tienen la oportunidad de elegir entre cuatro planos distintos. Elaboradas por expertos, estas lujosas villas irradian calidad y elegancia residencial amplificada por una acogedora vida interior y exterior, y son la ??nica comunidad residencial dentro del complejo cerrado de Punta Mita que goza de pleno acceso a las comodidades y servicios del galardonado Four Seasons Punta Mita Resort.'),(5,'Hacienda de Mita','Ubicada en un lugar pr??stino, esta extraordinaria comunidad es un Condominio privado distribuido en atractivos edificios de tres y cuatro pisos. Situado junto al hoyo 7 del campo de golf Jack Nicklaus Pacifico Signature, cada edificio cuenta con su propio ascensor y una piscina de borde infinito.\r\nLos propietarios disfrutan de vistas a la Bah??a de Banderas o al campo de golf en algunas de las residencias, acceso directo a la playa y al club de playa privada Hacienda de Mita. El lujo y el ambiente al aire libre de estos c??modos condominios capturan perfectamente el codiciado estilo de vida de Punta Mita.'),(6,'Iyari','La palabra Iyari significa \"coraz??n espiritual\" (coraz??n/alma) en la lengua huichol y habla de la ubicaci??n de esta nueva comunidad, justo al lado de Kupuri Estates... Kupuri es el Alma e Iyari es el Coraz??n.\r\nLa vista de Iyari se extiende hacia la bah??a de Litib?? en la costa norte de Punta Mita, es un nuevo y un exclusivo sitio de s??lo diez residencias frente al mar, con una futura expansi??n de hasta veinte residencias de ??lite en la ladera. Desde un punto de vista provechoso, IYARI ofrece vistas ??nicas y espectaculares del oc??ano, una entrada privada y un acceso exclusivo a Playa IYARI, situada en una playa apartada de arena suave.'),(7,'Kupuri','Con vistas a la bah??a de Litib??, en el lado norte de Punta Mita, esta comunidad ??ntima y aislada ofrece espectaculares Villas situadas a lo largo de impresionantes playas de arena blanca. La privacidad de la comunidad, el club de playa para los residentes y el futuro Spa, han convertido a Kupuri en una de los desarrollos m??s valiosos de la regi??n.\r\nYa est??n disponibles para su compra los terrenos frente a la playa, donde podr?? construir la casa de sus sue??os.'),(8,'Las Marietas','Las Marietas - un sitio de ??lite de 42 residencias que llevan el nombre de las incre??bles vistas de las Islas Marietas - est??n situadas justo al lado de la costa en el azul cristalino del Oc??ano Pac??fico y junto al hoyo 18 del campo de golf Bah??a, de Jack Nicklaus.\r\nEstos condominios ofrecen una sencilla sofisticaci??n tropical con amplios espacios que incluyen opciones de 3 y 4 dormitorios, cerraduras para las instalaciones de los invitados, doble master suites, cautivadoras vistas al oc??ano y piscinas privadas infiniti. Los propietarios de Las Marietas disfrutan de un acceso exclusivo al Sea Breeze Beach Club de The St. Regis Punta Mita Resort, una playa de ensue??o con una impresionante arena blanca que se une suavemente al agua azul. A pocos pasos del oc??ano hay una piscina infinita donde son atendidos por el personal de St. Regis quienes amablemente atienden todos sus deseos.'),(9,'Lagos del Mar','Con hermosas vistas de la Bah??a de Banderas desde una habitaci??n y viendo a trav??s de los fairways del campo de golf Jack Nicklaus, cada una de estas treinta y dos residencias son espectaculares. Situado a lo largo de los hoyos 8 y 9 del campo de golf Pac??fico de Jack Nicklaus, Lagos del Mar es rico en encanto y ambiente.\r\nLagos del Mar cuenta con espacios interiores y exteriores, impresionantes piscinas y las amplias y abiertas ??reas de estar que los compradores exigentes esperan de casas de este calibre. Como todas las casas en Punta Mita, la membres??a al Club Punta Mita es s??lo uno de los muchos beneficios exclusivos de la propiedad.'),(10,'Ranchos Estates','Con una ubicaci??n privilegiada frente a la playa en la Bah??a de Banderas, estas exclusivas propiedades tienen un tama??o promedio de m??s de una hect??rea y destacan por sus vistas a las aguas azules del Pac??fico y a la cordillera de la Sierra Madre que se eleva detr??s del encantador Puerto Vallarta. Muchas de las residencias m??s destacadas de Punta Mita, realizadas por algunos de los principales arquitectos del mundo, se encuentran en este desarrollo de ??lite.\r\nCada una de ellas ofrece m??s de 12,000 pies de espacio interior, m??ltiples dormitorios, cocinas gourmet, grandes espacios abiertos, piscinas infinitas cristalinas y amplias vistas; estas fincas son para el propietario exigente que disfruta del entretenimiento y de compartir el m??ximo estilo de vida de lujo con amigos y seres queridos. Todas las propiedades de Ranchos Estates ofrecen un amplio acceso a la playa, as?? como los servicios y comodidades del Club Punta Mita.'),(11,'Porta Fortuna','Porta Fortuna significa \"poseedor de buena suerte\" y realmente ser??n pocos los afortunados que se conviertan en los privilegiados propietarios de estas 27 espectaculares residencias privadas frente al oc??ano, todas ellas situadas en el hermoso Porta Fortuna Ocean Club con impresionantes vistas a la Bah??a de Banderas.'),(12,'TAU Residences','Con una ubicaci??n envidiable alojada entre el Oc??ano Pac??fico y la Bah??a de Banderas en la punta sur de la pen??nsula de Punta Mita, TAU Residences es un refugio sereno y privado. Reciba el d??a con un brillante amanecer o rel??jese con la puesta de sol en un estallido de tonos brillantes mientras disfruta de las lujosas comodidades de estilo de vida de Punta Mita durante todo el d??a ubicadas a pocos pasos de distancia. Con una ubicaci??n verdaderamente privilegiada, la inspiraci??n para TAU Residences proviene de la lengua ind??gena huichol, \"TAU\" que significa sol.\r\nTAU Residences es su lugar en el sol para una vida excepcional en Punta Mita.'),(13,'Signature Estates','Situadas a lo largo de la m??s serena, amplia y quiz??s m??s pintoresca de las playas de arena blanca de Punta Mita, estas tres propiedades Signature Estates ofrecen una codiciada fachada a la playa del Oc??ano Pac??fico. Con vistas continuas a la famosa \"Cola de la Ballena\" de Punta Mita (hoyo 3B) en el campo de golf Jack Nicklaus Pac??fico - el ??nico green de golf natural en una isla en el mundo - estas excepcionales casas est??n a pocos pasos de la playa y de las aguas azul turquesa del Oc??ano Pac??fico.\r\nM??ltiples suites, espacios interiores y exteriores, piscinas a lo largo de la playa, gimnasios privados, amplias terrazas y cocinas gourmet son s??lo algunas de las caracter??sticas que se encuentran en estas propiedades de lujo.'),(14,'Pacifico Estates','Los ??ltimos terrenos exclusivos para casas que nunca se hab??an puesto a la venta, han salido al mercado con el lanzamiento de los dos ??ltimos Pacifico Estates. ??stas representan las ??ltimas propiedades a la venta en este sitio de ??lite de Punta Mita, con ubicaciones privilegiadas orientadas al oeste que ofrecen unas vistas realmente espectaculares del Oc??ano Pac??fico y de la puesta de sol, junto al hoyo 18 del campo de golf Pac??fico -considerado como uno de los m??s bellos hoyos del oc??ano en el golf y situado junto a The St. Regis Punta Mita Resort.\r\nLos propietarios de Pacifico Estates tienen membres??a permanente en el Club de Playa Sea Breeze y acceso completo y descuentos especiales a las impresionantes piscinas e instalaciones de playa de The St. Regis Punta Mita Resort.\r\nLos propietarios de Pacifico Estates disfrutar??n de un acceso de ??lite a lo mejor del estilo de vida de Punta Mita, a s??lo unos pasos de su puerta.'),(15,'Las Palmas','Rodeadas por las hermosas calles del campo de golf Jack Nicklaus Signature Pacifico, las 27 villas de lujo en Las Palmas ofrecen un dise??o distintivo de alta gama y acceso a una de las comunidades m??s comprometidas en el ??rea de Punta Mita. Todas estas propiedades han sido dise??adas como casas de un solo nivel con 3 dormitorios, 3 ba??os, una piscina privada y jacuzzi en cada una de las villas. Grandes terrazas abiertas y amplios espacios abiertos son caracter??sticos de Villas Las Palmas.\r\nDefinitivamente uno de los mejores desarrollos inmobiliarios de Bah??a de Banderas, un lugar que a??n logra mantener esa sensaci??n de retiro paradis??aco, sin sacrificar la comodidad y el lujo.'),(16,'La Serenata','El ??rea de La Serenata dentro de Punta Mita se compone de seis villas de golf de lujo, orgullosamente ubicadas en lotes espaciosos. Cada villa es diferente, cada una tiene su propia piscina climatizada y jacuzzi e impresionantes interiores modernos. Punta Mita cuenta con uno de los mejores climas en M??xico con veranos refrescados por la brisa del mar e inviernos agradablemente c??lidos con una temperatura promedio de alrededor de 75??.\r\nCada unidad disfruta de aproximadamente 9,000 pies cuadrados, todas las villas tienen 4 dormitorios y 3.5 ba??os y tienen capacidad para 8 hu??spedes, todas las villas cuentan con amplias vistas del oc??ano, cada villa tiene interiores modernos bien equipados con pisos y encimeras de m??rmol y granito, azulejos de arcilla fina, carpinter??a de madera tropical y ba??era de hidromasaje en el ba??o principal.\r\nLos ojos entrenados notar??n r??pidamente esa combinaci??n perfecta y constante de la arquitectura mexicana y las tendencias modernas. Vivir dentro de Punta Mita tiene su encanto, cuenta con cursos exclusivos de Jack Nicklaus, disfrutar de los clubes de playa de Punta Mita, spas, gimnasios y resorts de clase mundial como St. Regis y Four Seasons.'),(17,'SuperAdmin','Este valor es para usos del portal de Administraci??n, si usted mira esto y no es administrador del portal, por favor contacte a soporte');
/*!40000 ALTER TABLE `CatalogoFraccionamiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoResidentes`
--

DROP TABLE IF EXISTS `CatalogoResidentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoResidentes` (
  `idResidente` int(11) NOT NULL AUTO_INCREMENT,
  `nombreResidente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoResidente` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `propiedad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `correoResidente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idFraccionamiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idResidente`),
  KEY `CatalogoResidentes_FK` (`idFraccionamiento`),
  CONSTRAINT `CatalogoResidentes_FK` FOREIGN KEY (`idFraccionamiento`) REFERENCES `CatalogoFraccionamiento` (`idFraccionamiento`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoResidentes`
--

LOCK TABLES `CatalogoResidentes` WRITE;
/*!40000 ALTER TABLE `CatalogoResidentes` DISABLE KEYS */;
INSERT INTO `CatalogoResidentes` VALUES (1,'John','Perez','calle xxx numero xxx','johnperez29','JP2901','correo@correo.com',1);
/*!40000 ALTER TABLE `CatalogoResidentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoServicios`
--

DROP TABLE IF EXISTS `CatalogoServicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoServicios` (
  `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoServicios`
--

LOCK TABLES `CatalogoServicios` WRITE;
/*!40000 ALTER TABLE `CatalogoServicios` DISABLE KEYS */;
/*!40000 ALTER TABLE `CatalogoServicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CatalogoTipoMensaje`
--

DROP TABLE IF EXISTS `CatalogoTipoMensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CatalogoTipoMensaje` (
  `idTipoMensaje` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idTipoMensaje`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CatalogoTipoMensaje`
--

LOCK TABLES `CatalogoTipoMensaje` WRITE;
/*!40000 ALTER TABLE `CatalogoTipoMensaje` DISABLE KEYS */;
INSERT INTO `CatalogoTipoMensaje` VALUES (1,'Advertencia'),(2,'Informativos'),(3,'Peligro');
/*!40000 ALTER TABLE `CatalogoTipoMensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ControlAnuncios`
--

DROP TABLE IF EXISTS `ControlAnuncios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ControlAnuncios` (
  `idAnuncio` int(11) NOT NULL AUTO_INCREMENT,
  `Mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idTipoMensaje` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAnuncio`),
  KEY `ControlAnuncios_FK` (`idTipoMensaje`),
  CONSTRAINT `ControlAnuncios_FK` FOREIGN KEY (`idTipoMensaje`) REFERENCES `CatalogoTipoMensaje` (`idTipoMensaje`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ControlAnuncios`
--

LOCK TABLES `ControlAnuncios` WRITE;
/*!40000 ALTER TABLE `ControlAnuncios` DISABLE KEYS */;
INSERT INTO `ControlAnuncios` VALUES (1,'No olvide contactar a la Unidad Central Operativa en caso de sintomas de COVID-19',1),(2,'Ma??ana habr?? lluvias todo el d??a, tome precauciones',3);
/*!40000 ALTER TABLE `ControlAnuncios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ControlAnunciosFracc`
--

DROP TABLE IF EXISTS `ControlAnunciosFracc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ControlAnunciosFracc` (
  `idFraccionamiento` int(11) NOT NULL,
  `idAnuncio` int(11) NOT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `idControl` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idControl`),
  KEY `ControlAnunciosFracc_FK` (`idFraccionamiento`),
  KEY `ControlAnunciosFracc_FK_1` (`idAnuncio`),
  CONSTRAINT `ControlAnunciosFracc_FK` FOREIGN KEY (`idFraccionamiento`) REFERENCES `CatalogoFraccionamiento` (`idFraccionamiento`) ON UPDATE CASCADE,
  CONSTRAINT `ControlAnunciosFracc_FK_1` FOREIGN KEY (`idAnuncio`) REFERENCES `ControlAnuncios` (`idAnuncio`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ControlAnunciosFracc`
--

LOCK TABLES `ControlAnunciosFracc` WRITE;
/*!40000 ALTER TABLE `ControlAnunciosFracc` DISABLE KEYS */;
INSERT INTO `ControlAnunciosFracc` VALUES (1,2,0,1);
/*!40000 ALTER TABLE `ControlAnunciosFracc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `HistoricoDocumentos`
--

DROP TABLE IF EXISTS `HistoricoDocumentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `HistoricoDocumentos` (
  `idHistorico` int(11) NOT NULL AUTO_INCREMENT,
  `Periodo` date NOT NULL,
  `idResidente` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `nombreDoc` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idHistorico`),
  KEY `HistoricoDocumentos_FK` (`idResidente`),
  KEY `HistoricoDocumentos_FK_1` (`idTipoDocumento`),
  CONSTRAINT `HistoricoDocumentos_FK` FOREIGN KEY (`idResidente`) REFERENCES `CatalogoResidentes` (`idResidente`) ON UPDATE CASCADE,
  CONSTRAINT `HistoricoDocumentos_FK_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `CatalogoDocumentos` (`idTipoDocumento`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `HistoricoDocumentos`
--

LOCK TABLES `HistoricoDocumentos` WRITE;
/*!40000 ALTER TABLE `HistoricoDocumentos` DISABLE KEYS */;
INSERT INTO `HistoricoDocumentos` VALUES (1,'2021-11-01',1,1,'gasyaguanoviembre.pdf');
/*!40000 ALTER TABLE `HistoricoDocumentos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-20 15:08:13

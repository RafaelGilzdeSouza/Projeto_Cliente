-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: db_eletronicsstore
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_carrinho`
--

DROP TABLE IF EXISTS `tb_carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carrinho` (
  `id_venda` int NOT NULL AUTO_INCREMENT,
  `cod_produto` int NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `sequencia` int DEFAULT NULL,
  `qtd_comprada` int NOT NULL,
  `data_compra` date DEFAULT NULL,
  `valor_unitario_prod` float(9,2) NOT NULL,
  `cod_fornecedor` int NOT NULL,
  `valor_total` float(9,2) DEFAULT NULL,
  `status` enum('pendente','realizado') DEFAULT (_utf8mb4'pendente'),
  PRIMARY KEY (`id_venda`),
  KEY `cod_produto` (`cod_produto`),
  CONSTRAINT `tb_carrinho_ibfk_1` FOREIGN KEY (`cod_produto`) REFERENCES `tb_produtos` (`cod_prod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_carrinho`
--

LOCK TABLES `tb_carrinho` WRITE;
/*!40000 ALTER TABLE `tb_carrinho` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_carrinho` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_fornecedor`
--

DROP TABLE IF EXISTS `tb_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_fornecedor` (
  `cod_forn` int NOT NULL AUTO_INCREMENT,
  `razaoSocial` varchar(100) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(20) NOT NULL,
  `cidade` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `estado` varchar(5) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fornecedor`
--

LOCK TABLES `tb_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_fornecedor` VALUES (1,'MIRAO DISTRIBUIDORA ME','12812792000188','(11)9.8423-5555','44999-000','RUA B',51,'CETRO','SÃO PAULO','ATIVO','SP','mirao@outlook.com'),(3,'nosite2','22.222.222/2222-22','(33)3.3333-3333','11111-111','aaa',1111,'AAA','CCCC','0','1','uelintoviana@hotmail.com');
/*!40000 ALTER TABLE `tb_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_privilegios`
--

DROP TABLE IF EXISTS `tb_privilegios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_privilegios` (
  `id_priv` int NOT NULL AUTO_INCREMENT,
  `descrição` enum('admin','comprador(a)') DEFAULT (_utf8mb4'comprador(a)'),
  PRIMARY KEY (`id_priv`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_privilegios`
--

LOCK TABLES `tb_privilegios` WRITE;
/*!40000 ALTER TABLE `tb_privilegios` DISABLE KEYS */;
INSERT INTO `tb_privilegios` VALUES (1,'admin'),(2,'comprador(a)');
/*!40000 ALTER TABLE `tb_privilegios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produtos`
--

DROP TABLE IF EXISTS `tb_produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produtos` (
  `cod_prod` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(200) NOT NULL,
  `codigo_barras` varchar(50) NOT NULL,
  `grupo` varchar(100) DEFAULT NULL,
  `fabricante` varchar(200) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `estoque` int NOT NULL,
  `preco_custo` float(9,2) NOT NULL,
  `margem_lucro` float(9,2) NOT NULL,
  `preco_venda` float(9,2) NOT NULL,
  `promocao` varchar(255) DEFAULT '0',
  `fornecedor` int DEFAULT NULL,
  `data_chegou` varchar(255) DEFAULT NULL,
  `curvaABC` enum('A','B','C') DEFAULT NULL,
  PRIMARY KEY (`cod_prod`),
  KEY `fornecedor` (`fornecedor`),
  CONSTRAINT `tb_produtos_ibfk_1` FOREIGN KEY (`fornecedor`) REFERENCES `tb_fornecedor` (`cod_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produtos`
--

LOCK TABLES `tb_produtos` WRITE;
/*!40000 ALTER TABLE `tb_produtos` DISABLE KEYS */;
INSERT INTO `tb_produtos` VALUES (1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V','78999095257825','TV\'s','LG','https://http2.mlstatic.com/D_NQ_NP_926914-MLA43764091514_102020-O.webp',10,1349.50,100.00,2699.00,'1',1,'2021-09-12','A'),(2,'Smart TV LG AI ThinQ 60UN7310PSA LED 4K 60\" 100V/240V','78900114477885','TV\'s','LG','https://http2.mlstatic.com/D_NQ_NP_673075-MLA43228769453_082020-O.webp',10,1849.50,100.00,3699.00,'1',1,'2021-09-12','B'),(3,'Smart TV LG 24TL520S-PS LED HD 23.6\"','78911225544125','TV\'s','LG','https://http2.mlstatic.com/D_NQ_NP_845838-MLA44205269521_112020-O.webp',10,549.50,100.00,1099.00,'1',1,'2021-09-12','C'),(4,'Smart Tv 4k Sony Led 75 Wi-fi - Xbr-75x805g','78966332255441','TV\'s','Sony','https://http2.mlstatic.com/D_NQ_NP_917601-MLB44128089704_112020-O.webp',10,1895.00,100.00,3790.00,'1',1,'2021-09-12','A'),(5,'Smart Tv Sony Xbr-75x955g Led 4k 75','78966554422112','TV\'s','Sony','https://http2.mlstatic.com/D_NQ_NP_804009-MLB44540794415_012021-O.webp',10,3299.50,100.00,6599.00,'0',1,'2021-09-12','B'),(6,'Smart Tv Sony Bravia Xbr-75x805g Led 4k 75','78988557744112','TV\'s','Sony','https://http2.mlstatic.com/D_NQ_NP_944253-MLB44128112017_112020-O.webp',10,1977.50,100.00,3955.00,'1',1,'2021-09-12','C'),(7,'Smart TV LED 43\" Xiaomi 4S L43M5-5ARU 4k ultra HD Bluetooth Wifi HDR 3 HDMI 3 USB','78999888877412','TV\'s','Xiaomi','https://carrefourbr.vtexassets.com/arquivos/ids/11019089-1200-auto?width=1200&height=auto&aspect=true',10,1299.50,100.00,2599.00,'0',1,'2021-09-12','A'),(8,'Samsung Smart Tv Crystal Uhd Tu8000 4k 55 Alexa Built In','78988666555991','TV\'s','Samsung','https://http2.mlstatic.com/D_NQ_NP_933534-MLB42347166352_062020-O.webp',10,1699.50,100.00,3399.00,'1',1,'2021-09-12','B'),(9,'Smart Tv 50 Samsung 50au7700 Uhd Crystal 4k Alexa Built In','78845612112565','TV\'s','Samsung','https://http2.mlstatic.com/D_NQ_NP_887122-MLB45643721649_042021-O.webp',10,1599.50,100.00,3199.00,'1',1,'2021-09-12','C'),(10,'Smart TV Samsung UN40T5300AGXZD LED Full HD 40\" 100V/240V','78988552233221','TV\'s','Samsung','https://http2.mlstatic.com/D_NQ_NP_615386-MLA43272194755_082020-O.webp',10,1049.50,100.00,2099.00,'1',1,'2021-09-12','A'),(11,'Samsung Galaxy Z Fold2 5G 256 GB mystic black 12 GB RAM','88956254256232','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_627106-MLA44178881967_112020-O.webp',10,6497.00,100.00,12994.00,'1',1,'2021-09-12','C'),(12,'Samsung Galaxy S21 Ultra 5G 256 GB prata 12 GB RAM','88956512125458','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_653921-MLA44850381541_022021-O.webp',10,4073.00,100.00,8146.00,'0',1,'2021-09-12','A'),(13,'Samsung Galaxy Note20 Ultra 256 GB branco-místico 8 GB RAM','88956563232315','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_768710-MLA43651747199_102020-O.webp',10,3694.00,100.00,7388.00,'1',1,'2021-09-12','B'),(14,'Apple iPhone 12 (128 GB) - Branco','88965623232146','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_914966-MLA46082341071_052021-O.webp',10,2311.50,100.00,4623.00,'1',1,'2021-09-12','C'),(15,'Apple iPhone XR 64 GB - Amarelo','88932326565689','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_732153-MLA46545868401_062021-O.webp',10,1573.00,100.00,3146.00,'0',1,'2021-09-12','A'),(16,'Apple iPhone 11 (128 GB) - Preto','88965232326656','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_721876-MLA46114648081_052021-O.webp',10,2799.50,100.00,5599.00,'1',1,'2021-09-12','B'),(17,'Xiaomi Mi 11 Dual SIM 128 GB cloud white 8 GB RAM','88965662323561','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_892926-MLA46928580278_072021-O.webp',10,3299.00,100.00,6598.00,'0',1,'2021-09-12','C'),(18,'Xiaomi Mi 10T Pro 5G Dual SIM 128 GB prata-lunar 8 GB RAM','88911515458741','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_784877-MLA45153261097_032021-O.webp',10,2124.00,100.00,4248.00,'1',1,'2021-09-12','A'),(19,'Xiaomi Pocophone Poco F2 Pro Dual SIM 128 GB cyber gray 6 GB RAM','88912125454878','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_678007-MLA4391604a4203_102020-O.webp',10,2049.50,100.00,4099.00,'1',1,'2021-09-12','B'),(20,'Tablet Xiaomi Mi Pad 4 WiFi Edition 2018 8\" 64GB black com 4GB de memória RAM','44123265659985','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_903995-MLA40857797361_022020-O.webp',10,1215.00,100.00,2430.00,'1',1,'2021-09-12','C'),(21,'Xiaomi Tablet 5 Mi Pro 11 Polegada Envio Internacional','44132326998715','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_764377-MLB47354733275_092021-O.webp',10,1649.50,100.00,3299.00,'0',1,'2021-09-12','A'),(22,'Xiaomi Pad 12gb Ram 640gb Ssd Envio Internacional 20/60 Dias','44121221254548','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_798825-MLB45232750316_032021-O.webp',10,1299.50,100.00,2599.00,'1',1,'2021-09-12','B'),(23,'iPad Apple Pro 4th generation 2020 A2069 12.9\" 256GB cinza-espacial com 6GB RAM','44123232656564','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_875271-MLA45269866328_032021-O.webp',10,10069.50,100.00,20139.00,'0',1,'2021-09-12','C'),(24,'Apple iPad Pro de 12.9\" Wi-Fi 2TB Prata (5ª geração)','44132326599897','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_733347-MLA46557284500_062021-O.webp',10,9495.00,100.00,18990.00,'1',1,'2021-09-12','B'),(25,'iPad Apple Pro 2nd generation 2020 A2230 11\" 256GB cinza-espacial com 6GB RAM','44121212545441','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_756476-MLA46223858250_052021-O.webp',10,6049.50,100.00,12099.00,'0',1,'2021-09-12','A'),(26,'Canon EOS 5D Mark IV 24-70mm IS USM Kit DSLR cor preto','55598989895654','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_973404-MLA41533948127_042020-O.webp',10,18509.00,100.00,37018.00,'1',1,'2021-09-12','A'),(27,'Canon EOS Kit R + lente 24-105mm IS USM mirrorless cor preto','55511212154584','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_734397-MLA41533832178_042020-O.webp',10,10152.00,100.00,20304.00,'1',1,'2021-09-12','B'),(28,'Canon EOS Kit 6D Mark II 24-105mm F/4L IS II USM DSLR cor preto','55595989874521','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_813143-MLA41533948110_042020-O.webp',10,9552.50,100.00,19105.00,'1',1,'2021-09-12','C'),(29,'Sony Alpha 9 mirrorless cor preto','55598983623214','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_656055-MLA41541229843_042020-O.webp',10,12937.50,100.00,25875.00,'1',1,'2021-09-12','A'),(30,'Câmera de vídeo profissional Sony Handheld Camcorders HXR-NX80 4K NTSC/PAL preta','55532121548484','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_848019-MLA43196302277_082020-O.webp',10,9099.50,100.00,18199.00,'0',1,'2021-09-12','B'),(31,'Sony Kit Alpha 7 III + lente 28-70mm OSS mirrorless cor preto','55518181784852','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_768421-MLA41542110898_042020-O.webp',10,8200.00,100.00,16400.00,'1',1,'2021-09-12','C'),(32,'Nikon D5 DSLR cor preto','55518184848452','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_979890-MLA42562126341_072020-O.webp',10,21895.00,100.00,43790.00,'1',1,'2021-09-12','A'),(33,'Nikon Z7 24-70mm Kit mirrorless cor preto','55523231121589','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_868675-MLA42228239571_062020-O.webp',10,15580.00,100.00,31160.00,'1',1,'2021-09-12','C'),(34,'Nikon Z 7II mirrorless cor preto','66695955156515','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_991963-MLA45271477754_032021-O.webp',10,12509.00,100.00,25018.00,'1',1,'2021-09-12','A'),(35,'Computador Gamer Dell Xps-8930-m451m','66615151548484','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_612780-MLB47218137540_082021-O.webp',10,5071.50,100.00,10143.00,'1',1,'2021-09-12','B'),(36,'Computador Desktop Dell Xps Core I7 16gb Ssd+hd Placa Vídeo','55515151545449','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_926752-MLB44008840142_112020-O.webp',10,5100.50,100.00,10201.00,'0',1,'2021-09-12','C'),(37,'Computador Gamer Dell Xps-8930-m45m','55511919191232','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_883838-MLB41273783822_032020-O.webp',10,5116.50,100.00,10233.00,'0',1,'2021-09-12','A'),(38,'Apple MacBook Pro 13\" Chip M1 8GB RAM 256GB SSD - Space Gray','55519148484798','Computadores','Apple','https://m.media-amazon.com/images/I/71an9eiBxpL._AC_SL1500_.jpg',10,4511.50,100.00,9023.00,'1',1,'2021-09-12','B'),(39,'Apple MacBook Air 13.3\" Chip M1 8GB RAM 256GB SSD - Space Gray','55591948484875','Computadores','Apple','https://m.media-amazon.com/images/I/71jG+e7roXL._AC_SL1500_.jpg',10,3749.50,100.00,7499.00,'0',1,'2021-09-12','C'),(40,'Computador Completo Hp I5 8gb Ssd480gb Monitor 19 Elitedesk','55512232326659','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_739899-MLB46403924178_062021-O.webp',10,2649.50,100.00,5299.00,'1',1,'2021-09-12','A'),(41,'Pc Completo Hp Elitedesk 800 G2 Sff Core I7 6ºger 8gb Hd 1tb','55512121929235','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_889541-MLB45479435584_042021-O.webp',10,2699.50,100.00,5399.00,'1',1,'2021-09-12','A'),(42,'Pc Completo Hp Elitedesk 800g2 I7 6ºger 8gb Ssd 480gb','55519484849565','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_733369-MLB45483285044_042021-O.webp',10,2799.50,100.00,5599.00,'1',1,'2021-09-12','A');
/*!40000 ALTER TABLE `tb_produtos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `cod_interno` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `cep` varchar(255) NOT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero_rua` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `id_priv` int NOT NULL,
  PRIMARY KEY (`cod_interno`),
  KEY `id_priv` (`id_priv`),
  CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`id_priv`) REFERENCES `tb_privilegios` (`id_priv`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,'Carlos Alberto de Nóbrega','carlos','400.705.708-30','44900-000','Rua A','69','(49)9.9999-9999','email@email.com','root',1),(2,'Ueliton de Brito Viana','teste','408.765.718-36','44900-000','Rua A','69','(49)9.9999-9999','email@email.com','root',2),(3,'aaaaa','a','444.444.444-44','44444-444','aaaaaa','33333','(33)3.3333-3333','uelintoviana@hotmail.com','123',1),(4,'aaaaa','a','444.444.444-44','44444-444','aaaaaa','33333','(33)3.3333-3333','uelintoviana@hotmail.com','123',1),(5,'no site','uellwar','444.444.444-44','44444-444','aaaaaa','33333','(33)3.3333-3333','uelintoviana@hotmail.com','202cb962ac59075b964b07152d234b70',1),(6,'no site2','uellwar2','444.444.444-44','44444-444','aaaaaa','33333','(33)3.3333-3333','uelintoviana@hotmail.com','202cb962ac59075b964b07152d234b70',1);
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-30 14:17:17

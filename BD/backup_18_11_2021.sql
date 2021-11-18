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
-- Table structure for table `tb_acompanhamentos`
--

DROP TABLE IF EXISTS `tb_acompanhamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_acompanhamentos` (
  `id_table` int NOT NULL AUTO_INCREMENT,
  `id_pedido` int DEFAULT NULL,
  `id_produto` int DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor_unitario` decimal(9,2) DEFAULT NULL,
  `qtd_comprada` int DEFAULT NULL,
  `valor_total_produto` decimal(9,2) DEFAULT NULL,
  `valor_total_venda` decimal(9,2) DEFAULT NULL,
  `status_compra` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_table`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_acompanhamentos`
--

LOCK TABLES `tb_acompanhamentos` WRITE;
/*!40000 ALTER TABLE `tb_acompanhamentos` DISABLE KEYS */;
INSERT INTO `tb_acompanhamentos` VALUES (1,1,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,1,2699.00,11287.00,'AGUARDANDO ENTREGA'),(2,1,2,'Smart TV LG AI ThinQ 60UN7310PSA LED 4K 60\" 100V/240V',3699.00,1,3699.00,11287.00,'AGUARDANDO ENTREGA'),(3,1,3,'Smart TV LG 24TL520S-PS LED HD 23.6\"',1099.00,1,1099.00,11287.00,'AGUARDANDO ENTREGA'),(4,1,4,'Smart Tv 4k Sony Led 75 Wi-fi - Xbr-75x805g',3790.00,1,3790.00,11287.00,'AGUARDANDO ENTREGA'),(5,2,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,1,2699.00,11287.00,'ENTREGUE'),(6,2,2,'Smart TV LG AI ThinQ 60UN7310PSA LED 4K 60\" 100V/240V',3699.00,1,3699.00,11287.00,'ENTREGUE'),(7,2,3,'Smart TV LG 24TL520S-PS LED HD 23.6\"',1099.00,1,1099.00,11287.00,'ENTREGUE'),(8,2,4,'Smart Tv 4k Sony Led 75 Wi-fi - Xbr-75x805g',3790.00,1,3790.00,11287.00,'ENTREGUE'),(9,3,10,'Smart TV Samsung UN40T5300AGXZD LED Full HD 40\" 100V/240V',2099.00,1,2099.00,15093.00,'ENTREGUE'),(10,3,11,'Samsung Galaxy Z Fold2 5G 256 GB mystic black 12 GB RAM',12994.00,1,12994.00,15093.00,'ENTREGUE'),(64,13,3,'Smart TV LG 24TL520S-PS LED HD 23.6\"',1099.00,1,1099.00,1099.00,'AGUARDANDO ENTREGA'),(65,14,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,1,2699.00,2699.00,'AGUARDANDO ENTREGA'),(66,15,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,5,13495.00,13495.00,'AGUARDANDO ENTREGA'),(67,16,28,'Canon EOS Kit 6D Mark II 24-105mm F/4L IS II USM DSLR cor preto',19105.00,1,19105.00,19105.00,'AGUARDANDO ENTREGA'),(68,17,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,1,2699.00,2699.00,'AGUARDANDO ENTREGA'),(69,18,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,2,5398.00,25702.00,'AGUARDANDO ENTREGA'),(70,18,27,'Canon EOS Kit R + lente 24-105mm IS USM mirrorless cor preto',20304.00,1,20304.00,25702.00,'AGUARDANDO ENTREGA'),(71,19,1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V',2699.00,2,5398.00,121075.00,'AGUARDANDO ENTREGA'),(72,19,14,'Apple iPhone 12 (128 GB) - Branco',4623.00,1,4623.00,121075.00,'AGUARDANDO ENTREGA'),(73,19,26,'Canon EOS 5D Mark IV 24-70mm IS USM Kit DSLR cor preto',37018.00,3,111054.00,121075.00,'AGUARDANDO ENTREGA');
/*!40000 ALTER TABLE `tb_acompanhamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_carrinho`
--

DROP TABLE IF EXISTS `tb_carrinho`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_carrinho` (
  `id_venda` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) DEFAULT NULL,
  `qtd_comprada` int DEFAULT NULL,
  `data_compra` varchar(255) DEFAULT NULL,
  `valor_unitario_prod` float(9,2) DEFAULT NULL,
  `cod_fornecedor` int DEFAULT NULL,
  `valor_total` float(9,2) DEFAULT NULL,
  `operacao` enum('pendente','realizado') DEFAULT 'pendente',
  `cod_produto` int DEFAULT NULL,
  PRIMARY KEY (`id_venda`)
) ENGINE=InnoDB AUTO_INCREMENT=237 DEFAULT CHARSET=utf8mb3;
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
  `razaoSocial` varchar(100) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `rua` varchar(200) DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `bairro` varchar(20) DEFAULT NULL,
  `cidade` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `estado` varchar(5) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_fornecedor`
--

LOCK TABLES `tb_fornecedor` WRITE;
/*!40000 ALTER TABLE `tb_fornecedor` DISABLE KEYS */;
INSERT INTO `tb_fornecedor` VALUES (1,'MIRÃO DISTRIBUIDORA ME','12812792000188','(11)9.8423-5555','44999-000','RUA B',51,'CETRO','SÃO PAULO','ATIVO','SP','mirao@outlook.com'),(3,'nosite2','22.222.222/2222-22','(33)3.3333-3333','11111-111','aaa',1111,'AAA','CCCC','0','1','uelintoviana@hotmail.com');
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
  `descricao` varchar(200) DEFAULT NULL,
  `codigo_barras` varchar(50) DEFAULT NULL,
  `grupo` varchar(100) DEFAULT NULL,
  `fabricante` varchar(200) DEFAULT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `estoque` int DEFAULT NULL,
  `preco_custo` float(9,2) DEFAULT NULL,
  `margem_lucro` float(9,2) DEFAULT NULL,
  `preco_venda` float(9,2) DEFAULT NULL,
  `promocao` varchar(255) DEFAULT '0',
  `fornecedor` int DEFAULT NULL,
  `data_chegou` varchar(255) DEFAULT NULL,
  `curvaABC` enum('A','B','C') DEFAULT NULL,
  PRIMARY KEY (`cod_prod`),
  KEY `fornecedor` (`fornecedor`),
  CONSTRAINT `tb_produtos_ibfk_1` FOREIGN KEY (`fornecedor`) REFERENCES `tb_fornecedor` (`cod_forn`)
) ENGINE=InnoDB AUTO_INCREMENT=192 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produtos`
--

LOCK TABLES `tb_produtos` WRITE;
/*!40000 ALTER TABLE `tb_produtos` DISABLE KEYS */;
INSERT INTO `tb_produtos` VALUES (1,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V','78999095257825','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_926914-MLA43764091514_102020-O.webp',10,1349.50,100.00,2699.00,'1',1,'2021-09-12','A'),(2,'Smart TV LG AI ThinQ 60UN7310PSA LED 4K 60\" 100V/240V','78900114477885','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_673075-MLA43228769453_082020-O.webp',10,1849.50,100.00,3699.00,'0',1,'2021-09-12','B'),(3,'Smart TV LG 24TL520S-PS LED HD 23.6\"','78911225544125','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_845838-MLA44205269521_112020-O.webp',10,549.50,100.00,1099.00,'1',1,'2021-09-12','C'),(4,'Smart Tv 4k Sony Led 75 Wi-fi - Xbr-75x805g','78966332255441','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_917601-MLB44128089704_112020-O.webp',10,1895.00,100.00,3790.00,'1',1,'2021-09-12','A'),(5,'Smart Tv Sony Xbr-75x955g Led 4k 75','78966554422112','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_804009-MLB44540794415_012021-O.webp',10,3299.50,100.00,6599.00,'0',1,'2021-09-12','B'),(6,'Smart Tv Sony Bravia Xbr-75x805g Led 4k 75','78988557744112','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_944253-MLB44128112017_112020-O.webp',10,1977.50,100.00,3955.00,'1',1,'2021-09-12','C'),(7,'Smart TV LED 43\" Xiaomi 4S L43M5-5ARU 4k ultra HD Bluetooth Wifi HDR 3 HDMI 3 USB','78999888877412','Tvs','Xiaomi','https://carrefourbr.vtexassets.com/arquivos/ids/11019089-1200-auto?width=1200&height=auto&aspect=true',10,1299.50,100.00,2599.00,'0',1,'2021-09-12','A'),(8,'Samsung Smart Tv Crystal Uhd Tu8000 4k 55 Alexa Built In','78988666555991','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_933534-MLB42347166352_062020-O.webp',10,1699.50,100.00,3399.00,'1',1,'2021-09-12','B'),(9,'Smart Tv 50 Samsung 50au7700 Uhd Crystal 4k Alexa Built In','78845612112565','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_887122-MLB45643721649_042021-O.webp',10,1599.50,100.00,3199.00,'0',1,'2021-09-12','C'),(10,'Smart TV Samsung UN40T5300AGXZD LED Full HD 40\" 100V/240V','78988552233221','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_615386-MLA43272194755_082020-O.webp',10,1049.50,100.00,2099.00,'1',1,'2021-09-12','A'),(11,'Samsung Galaxy Z Fold2 5G 256 GB mystic black 12 GB RAM','88956254256232','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_627106-MLA44178881967_112020-O.webp',10,6497.00,100.00,12994.00,'1',1,'2021-09-12','C'),(12,'Samsung Galaxy S21 Ultra 5G 256 GB prata 12 GB RAM','88956512125458','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_653921-MLA44850381541_022021-O.webp',10,4073.00,100.00,8146.00,'0',1,'2021-09-12','A'),(13,'Samsung Galaxy Note20 Ultra 256 GB branco-místico 8 GB RAM','88956563232315','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_768710-MLA43651747199_102020-O.webp',10,3694.00,100.00,7388.00,'1',1,'2021-09-12','B'),(14,'Apple iPhone 12 (128 GB) - Branco','88965623232146','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_914966-MLA46082341071_052021-O.webp',10,2311.50,100.00,4623.00,'1',1,'2021-09-12','C'),(15,'Apple iPhone XR 64 GB - Amarelo','88932326565689','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_732153-MLA46545868401_062021-O.webp',10,1573.00,100.00,3146.00,'0',1,'2021-09-12','A'),(16,'Apple iPhone 11 (128 GB) - Preto','88965232326656','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_721876-MLA46114648081_052021-O.webp',10,2799.50,100.00,5599.00,'1',1,'2021-09-12','B'),(17,'Xiaomi Mi 11 Dual SIM 128 GB cloud white 8 GB RAM','88965662323561','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_892926-MLA46928580278_072021-O.webp',10,3299.00,100.00,6598.00,'0',1,'2021-09-12','C'),(18,'Xiaomi Mi 10T Pro 5G Dual SIM 128 GB prata-lunar 8 GB RAM','88911515458741','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_784877-MLA45153261097_032021-O.webp',10,2124.00,100.00,4248.00,'1',1,'2021-09-12','A'),(20,'Tablet Xiaomi Mi Pad 4 WiFi Edition 2018 8\" 64GB black com 4GB de memória RAM','44123265659985','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_903995-MLA40857797361_022020-O.webp',10,1215.00,100.00,2430.00,'0',1,'2021-09-12','C'),(21,'Xiaomi Tablet 5 Mi Pro 11 Polegada Envio Internacional','44132326998715','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_764377-MLB47354733275_092021-O.webp',10,1649.50,100.00,3299.00,'0',1,'2021-09-12','A'),(22,'Xiaomi Pad 12gb Ram 640gb Ssd Envio Internacional 20/60 Dias','44121221254548','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_798825-MLB45232750316_032021-O.webp',10,1299.50,100.00,2599.00,'1',1,'2021-09-12','B'),(23,'iPad Apple Pro 4th generation 2020 A2069 12.9\" 256GB cinza-espacial com 6GB RAM','44123232656564','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_875271-MLA45269866328_032021-O.webp',10,10069.50,100.00,20139.00,'0',1,'2021-09-12','C'),(24,'Apple iPad Pro de 12.9\" Wi-Fi 2TB Prata (5ª geração)','44132326599897','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_733347-MLA46557284500_062021-O.webp',10,9495.00,100.00,18990.00,'1',1,'2021-09-12','B'),(25,'iPad Apple Pro 2nd generation 2020 A2230 11\" 256GB cinza-espacial com 6GB RAM','44121212545441','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_756476-MLA46223858250_052021-O.webp',10,6049.50,100.00,12099.00,'0',1,'2021-09-12','A'),(26,'Canon EOS 5D Mark IV 24-70mm IS USM Kit DSLR cor preto','55598989895654','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_973404-MLA41533948127_042020-O.webp',10,18509.00,100.00,37018.00,'1',1,'2021-09-12','A'),(27,'Canon EOS Kit R + lente 24-105mm IS USM mirrorless cor preto','55511212154584','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_734397-MLA41533832178_042020-O.webp',10,10152.00,100.00,20304.00,'0',1,'2021-09-12','B'),(28,'Canon EOS Kit 6D Mark II 24-105mm F/4L IS II USM DSLR cor preto','55595989874521','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_813143-MLA41533948110_042020-O.webp',10,9552.50,100.00,19105.00,'0',1,'2021-09-12','C'),(29,'Sony Alpha 9 mirrorless cor preto','55598983623214','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_656055-MLA41541229843_042020-O.webp',10,12937.50,100.00,25875.00,'0',1,'2021-09-12','A'),(30,'Câmera de vídeo profissional Sony Handheld Camcorders HXR-NX80 4K NTSC/PAL preta','55532121548484','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_848019-MLA43196302277_082020-O.webp',10,9099.50,100.00,18199.00,'0',1,'2021-09-12','B'),(31,'Sony Kit Alpha 7 III + lente 28-70mm OSS mirrorless cor preto','55518181784852','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_768421-MLA41542110898_042020-O.webp',10,8200.00,100.00,16400.00,'1',1,'2021-09-12','C'),(32,'Nikon D5 DSLR cor preto','55518184848452','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_979890-MLA42562126341_072020-O.webp',10,21895.00,100.00,43790.00,'0',1,'2021-09-12','A'),(33,'Nikon Z7 24-70mm Kit mirrorless cor preto','55523231121589','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_868675-MLA42228239571_062020-O.webp',10,15580.00,100.00,31160.00,'0',1,'2021-09-12','C'),(34,'Nikon Z 7II mirrorless cor preto','66695955156515','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_991963-MLA45271477754_032021-O.webp',10,12509.00,100.00,25018.00,'0',1,'2021-09-12','A'),(35,'Computador Gamer Dell Xps-8930-m451m','66615151548484','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_612780-MLB47218137540_082021-O.webp',10,5071.50,100.00,10143.00,'1',1,'2021-09-12','B'),(36,'Computador Desktop Dell Xps Core I7 16gb Ssd+hd Placa Vídeo','55515151545449','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_926752-MLB44008840142_112020-O.webp',10,5100.50,100.00,10201.00,'0',1,'2021-09-12','C'),(37,'Computador Gamer Dell Xps-8930-m45m','55511919191232','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_883838-MLB41273783822_032020-O.webp',10,5116.50,100.00,10233.00,'0',1,'2021-09-12','A'),(38,'Apple MacBook Pro 13\" Chip M1 8GB RAM 256GB SSD - Space Gray','55519148484798','Computadores','Apple','https://m.media-amazon.com/images/I/71an9eiBxpL._AC_SL1500_.jpg',10,4511.50,100.00,9023.00,'1',1,'2021-09-12','B'),(39,'Apple MacBook Air 13.3\" Chip M1 8GB RAM 256GB SSD - Space Gray','55591948484875','Computadores','Apple','https://m.media-amazon.com/images/I/71jG+e7roXL._AC_SL1500_.jpg',10,3749.50,100.00,7499.00,'0',1,'2021-09-12','C'),(40,'Computador Completo Hp I5 8gb Ssd480gb Monitor 19 Elitedesk','55512232326659','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_739899-MLB46403924178_062021-O.webp',10,2649.50,100.00,5299.00,'1',1,'2021-09-12','A'),(41,'Pc Completo Hp Elitedesk 800 G2 Sff Core I7 6ºger 8gb Hd 1tb','55512121929235','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_889541-MLB45479435584_042021-O.webp',10,2699.50,100.00,5399.00,'0',1,'2021-09-12','A'),(42,'Pc Completo Hp Elitedesk 800g2 I7 6ºger 8gb Ssd 480gb','55519484849565','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_733369-MLB45483285044_042021-O.webp',10,2799.50,100.00,5599.00,'0',1,'2021-09-12','A'),(119,'Samsung Galaxy A12 Dual SIM 64 GB white 4 GB RAM','78825802012580','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_647199-MLA46081532404_052021-O.webp',10,1200.00,100.00,2400.00,'1',1,'2021-11-05','A'),(120,'Samsung Galaxy S20 Ultra Dual SIM 128 GB cosmic gray 12 GB RAM','55512232326659','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_769557-MLA43680524223_102020-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(121,'Samsung Galaxy A10s 32 GB azul 2 GB RAM','42566592416833','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_892530-MLA44312104263_122020-O.webp',10,1200.00,100.00,2400.00,'1',1,'2021-11-05','A'),(122,'Samsung Galaxy A31 Dual SIM 128 GB prism crush blue 4 GB RAM','60559006659924','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_698268-MLA44517686063_012021-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(123,'Samsung Galaxy S10+ Dual SIM 128 GB azul-prisma 8 GB RAM','86659787415518','Celulares','Samsung','https://http2.mlstatic.com/D_NQ_NP_653850-MLA44218060125_122020-O.webp',10,2000.00,100.00,4000.00,'1',1,'2021-11-05','A'),(124,'Apple iPhone 13 Pro Max (256 GB) - Azul-Sierra','61773986659114','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_613954-MLA47781264223_102021-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(125,'Celular Apple iPhone 8 Plus 64 GB cinza-espacial','32554665919167','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_962351-MLA43711683079_102020-O.webp',10,1200.00,100.00,2400.00,'0',1,'2021-11-05','A'),(126,'Celular Apple iPhone 11 (256 GB) - Preto','88113665976311','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_701810-MLA46114648176_052021-O.webp',10,2000.00,100.00,4000.00,'1',1,'2021-11-05','A'),(127,'Apple iPhone 12 Pro Max (128 GB) - Azul-pacifico','48779665943062','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_672659-MLA46093155237_052021-O.webp',10,1200.00,100.00,2400.00,'0',1,'2021-11-05','A'),(128,'iPhone 11 Pro Max 256 GB cinza-espacial','86665912660397','Celulares','Apple','https://http2.mlstatic.com/D_NQ_NP_686482-MLA44294712030_122020-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(129,'Xiaomi Pocophone Poco M3 Dual SIM 64 GB poco yellow 4 GB RAM','66665973170755','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_620695-MLA47498126329_092021-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(130,'Xiaomi Redmi Note 8 Dual SIM 64 GB neptune blue 4 GB RAM','76825946659438','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_685606-MLA44528370861_012021-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(131,'Xiaomi Redmi Note 10S Dual SIM 128 GB cinza 6 GB RAM','69366592605670','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_600383-MLA46924758490_072021-O.webp',10,1200.00,100.00,2400.00,'0',1,'2021-11-05','A'),(132,'Xiaomi Redmi Note 9S Dual SIM 128 GB cinza 4 GB RAM','81066590289640','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_992381-MLA44517393070_012021-O.webp',10,2000.00,100.00,4000.00,'0',1,'2021-11-05','A'),(133,'Xiaomi Redmi Note 10S Dual SIM 64 GB azul 6 GB RAM','87294686659496','Celulares','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_756734-MLA46924758488_072021-O.webp',10,1200.00,100.00,2400.00,'0',1,'2021-11-05','A'),(134,'Smart TV LG AI ThinQ 32LM621CBSB LED 32\" 100V/240V','30298766598020','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_799093-MLA40767806651_022020-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(135,'Smart TV LG AI ThinQ 55UN731C0SC LED 4K 55\" 100V/240V','53136802075919','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_955129-MLA43892197842_102020-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(136,'Smart TV LG 43UN731C0SC LED 4K 43\" 110V/220V','52288020772391','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_761536-MLA43622465374_092020-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(137,'Smart TV LG 50UN731C LED 4K 50\" 110V/220V','76768020642617','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_925903-MLA43764091517_102020-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(138,'Smart TV LG AI ThinQ OLED48C1PSA 4K 48\" 100V/240V','50298020094053','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_903122-MLA46540625277_062021-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(139,'Smart Tv LG 60 4k Uhd Thinqmagic Google Alexa Wifi Bluetooth','31488020745398','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_858095-MLB46708800292_072021-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(140,'Smart Tv Led 43 Full Hd LG 43lm Pro 3 Hdmi 2 Usb Thinq Al','75480203864570','Tvs','LG','https://http2.mlstatic.com/D_NQ_NP_927906-MLB45308664831_032021-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(141,'TV SONY 75\" Pulgadas 189 cm XBR-75X907H 4K-UHD LED Plano Smart TV','57488020253500','Tvs','Sony','https://www.alkosto.com/medias/4548736112872-001-750Wx750H?context=bWFzdGVyfGltYWdlc3wxODM5MTF8aW1hZ2UvanBlZ3xpbWFnZXMvaDFjL2gwNi8xMDAwNDQ3NjI5NzI0Ni5qcGd8M2JjMGFkMGZkNGFkZDA5YmZkNzE1ZTEyNTZlMTdlMDhlZTFhYjVhNzlhNjc5ODdlMDNhNjJlYmM3MGU0YzQ3NA',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(142,'Smart TV LED 65” Sony KD-65X755F, 4K UHD, 4 HDMI, 3 USB, Wi-Fi Integrado','60598802002331','Tvs','Sony','https://a-static.mlcdn.com.br/180x200/smart-tv-led-65-sony-kd-65x755f-4k-uhd-4-hdmi-3-usb-wi-fi-integrado/lojastaqi/210083/1bada2b1779ae980cef1aa954985db19.jpg',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(143,'Smart TV Sony 55” - LED, Ultra HD, 4K, HDR, WiFi Integrado, HDMI - Preta','40981080200698','Tvs','Sony','https://a-static.mlcdn.com.br/180x200/smart-tv-sony-55-led-ultra-hd-4k-hdr-wifi-integrado-hdmi-preta-kd55x705f/marciusmagazine/0045270013/14c9a6bc21eda72ceb19b3ae7bdb4b30.jpg',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(144,'Smart TV LED 32” Sony KDL-32W655D Full HD - Wi-FI Conversor Digital 2 HDMI 2 USB','55378448020652','Tvs','Sony','https://a-static.mlcdn.com.br/180x200/smart-tv-led-32-sony-kdl-32w655d-full-hd-wi-fi-conversor-digital-2-hdmi-2-usb/magazineluiza/193393900/fa801229c10cbb7755450cc9da62b88c.jpg',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(145,'Tv Sony 46 Full Hd','77225628020415','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_969095-MLB47855911972_102021-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(146,'Smart TV LED 30” Sony KDL-32W655D Full HD - Wi-FI Conversor Digital 2 HDMI 2 USB','86493974802002','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_969095-MLB47855911972_102021-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(147,'Smart TV Sony 55” - LED, Ultra HD, 4K, HDR, WiFi Integrado, HDMI - Preta','52571099280207','Tvs','Sony','https://http2.mlstatic.com/D_NQ_NP_969095-MLB47855911972_102021-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(148,'Smart TV Samsung Series Business LH65BETHVGGXZD LED 4K 65\" 100V/240V','88020301056293','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_845257-MLA44182891012_112020-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(149,'Smart TV Samsung 4K 55\" 100V/240V','33802004091619','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_648263-MLA42941778333_072020-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(150,'Smart TV Samsung BET-M LH43BETMLGGXZD LED Full HD 43\" 110V/220V','41380209622506','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_691369-MLA43124074759_082020-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(151,'Smart TV Samsung UN32T4300AGXZD LED HD 32\"','77138020227090','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_746102-MLA44219635862_122020-O.webp',10,4000.00,100.00,8000.00,'0',1,'2021-11-05','A'),(152,'Smart TV Samsung QN50Q60AAGXZD QLED 4K 50\" 100V/240V','45565802008452','Tvs','Samsung','https://http2.mlstatic.com/D_NQ_NP_813352-MLA46478991381_062021-O.webp',10,3000.00,100.00,6000.00,'0',1,'2021-11-05','A'),(153,'Tablet Xiaomi Pad 5 11\" 128GB pearl white com 6GB de memória RAM','75006428020610','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_723670-MLA47921030039_102021-O.webp',10,800.00,100.00,1600.00,'0',1,'2021-11-05','A'),(154,'Tablet Xiaomi Pad 5 11\" 256GB cosmic gray com 6GB de memória RAM','77339068020569','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_997519-MLA47920796684_102021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(155,'Tablet Xiaomi Pad 5 128gb Pearl White Com 6gb De Memória Ram','74509428020599','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_763325-MLB48064456752_102021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(156,'Xiaomi Pad 5 Pearl White 6gb Ram 256gb Rom Com Nota Fiscal','73120189802021','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_773940-MLB47751983303_102021-O.webp',10,800.00,100.00,1600.00,'0',1,'2021-11-05','A'),(157,'Mi Pad 5 6gb 128 Gb Global','36118496802031','Tablets','Xiaomi','https://http2.mlstatic.com/D_NQ_NP_966712-MLB48056764308_102021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(158,'Apple iPad mini (6ª geração) 8.3\" Wi-Fi 64GB A15 Bionic - Estelar','70636029980205','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_976286-MLA47764459089_102021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(159,'Apple iPad Mini de 7.9\" WI-FI 64GB Cinza-espacial (5ª geração)','49851896788020','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_704271-MLA46399727194_062021-O.webp',10,800.00,100.00,1600.00,'0',1,'2021-11-05','A'),(160,'Apple iPad Pro de 12.9\" Wi-Fi 256GB Prata','82944802044070','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_850559-MLA46399727195_062021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(161,'Apple iPad (9ª geração) 10.2\" Wi-Fi 256GB A13 Bionic - Prateado','49968020208665','Tablets','Apple','https://http2.mlstatic.com/D_NQ_NP_865587-MLA47916486250_102021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(162,'Tablet Samsung Galaxy Tab A 2019 SM-T290 8\" 32GB preto com 2GB de memória RAM','40880205479318','Tablets','Samsung','https://http2.mlstatic.com/D_NQ_NP_664147-MLA42902942087_072020-O.webp',10,800.00,100.00,1600.00,'0',1,'2021-11-05','A'),(163,'Tablet Samsung Galaxy Tab A7 SM-T505 10.4\" 64GB dark gray com 3GB de memória RAM','50802026086685','Tablets','Samsung','https://http2.mlstatic.com/D_NQ_NP_643719-MLA45258035892_032021-O.webp',10,900.00,100.00,1800.00,'0',1,'2021-11-05','A'),(164,'Tablet Samsung Galaxy Tab A7 Lite SM-T220 8.7\" 64GB cinza com 4GB de memória RAM','68020399155237','Tablets','Samsung','https://http2.mlstatic.com/D_NQ_NP_711424-MLA47146849080_082021-O.webp',10,800.00,100.00,1600.00,'0',1,'2021-11-05','A'),(165,'Cpu Dell Optiplex 7010 Core I3 3220 3th 4gb 1tb','42528020684959','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_775449-MLB47777158620_102021-O.webp',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(166,'Cpu Monitor Dell Optiplex 3040 Core I5 6ger 8gb 500gb Novo','37027280209304','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_694293-MLB41540960747_042020-O.webp',10,7000.00,100.00,14000.00,'0',1,'2021-11-05','A'),(167,'Computador Dell I5 2ª Geração 4gb Hd 500gb','10504680203599','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_874344-MLB47756870708_102021-O.webp',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(168,'Cpu e Monitor Dell 3040mt Core I3 6ger 4gb 240gb Ssd','16683768020393','Computadores','Dell','https://http2.mlstatic.com/D_NQ_NP_987278-MLB46552207302_062021-O.webp',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(169,'Computador Cpu Desktop Hp Elite 8200 I5 8gb 1tb Hd','13684568020409','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_726223-MLB47169750609_082021-O.webp',10,7000.00,100.00,14000.00,'0',1,'2021-11-05','A'),(170,'Computador Hp 280g5 Sff Completo Core I5 10ª Geração Ssd 256','11266711802070','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_633024-MLB47382515417_092021-O.webp',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(171,'Pc Computador Cpu Intel Dual Core 4gb Ssd 120gb','17850854802092','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_768846-MLB46259644940_062021-O.webp',10,7000.00,100.00,14000.00,'0',1,'2021-11-05','A'),(172,'Pc Hp Compaq 6200 Core I3 2ª 4gb Ssd 120gb Win 10 Slim','13880286180204','Computadores','HP','https://http2.mlstatic.com/D_NQ_NP_945616-MLB47949941852_102021-O.webp',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(173,'iMac com Intel® Core™ i3, 8GB, 256GB, Tela de 21,5\", Prateado','15725249880206','Computadores','Apple','https://www.fastshop.com.br//wcsstore/FastShopCAS/imagens/_AE_Apple/AEMHK23BZAPTA/AEMHK23BZAPTA_PRD_447_1.jpg',10,7000.00,100.00,14000.00,'0',1,'2021-11-05','A'),(174,'iMac Apple 21,5\", Intel Core i5 dois núcleos 2,3GHz, 8GB','18199993980202','Computadores','Apple','https://www.iplace.com.br/ccstore/v1/images/?source=/file/v4304443978177317059/products/214990.00-imac-apple-21-mhk03bz-a.jpg&height=1000&width=1000&quality=0.9',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(175,'IMac All in One Inspiron 24 5000','17660108020504','Computadores','Apple','https://www.casasbahia-imagens.com.br/Control/ArquivoExibir.aspx?IdArquivo=1437797181',10,5000.00,100.00,10000.00,'0',1,'2021-11-05','A'),(176,'iMac 27\" Tela Retina 5K Intel Core i7 (8GB 512GB SSD)','14505980206364','Computadores','Apple','https://images-shoptime.b2w.io/produtos/01/00/img/1919098/8/1919098883_1SZ.jpg',10,7000.00,100.00,14000.00,'0',1,'2021-11-05','A'),(177,'Canon Eos Rebel Kit T100 + Lente 18-55mm + Lente Canon Ef 50','18020443767905','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_841677-MLB47516126213_092021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(178,'Canon EOS Rebel T100 18-55mm IS II Kit DSLR cor preto','18020448869457','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_935608-MLA44437868514_122020-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(179,'Camera Digiral Profissional Canon Eos Rebel T2i 18-55mm','14802012544190','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_954902-MLB46954173964_082021-O.webp',10,2300.00,100.00,4600.00,'1',1,'2021-11-05','A'),(180,'Camrea Profissional Canon Eos Rebel Kit T1i 18-55mm','12802000787470','Câmeras','Canon','https://http2.mlstatic.com/D_NQ_NP_859543-MLB46954145159_082021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(181,'Nikon Coolpix P950 compacta cor preto','13480200742698','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_877926-MLA43417207466_092020-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(182,'Camera Nikon Coolpix W300 compacta cor preto','15228020712580','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_612958-MLA33037564260_112019-O.webp',10,2300.00,100.00,4600.00,'1',1,'2021-11-05','A'),(183,'Camera Nikon Kit D7500 + lente 18-140mm ED VR DSLR cor preto','15318020278869','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_659429-MLA40044532769_122019-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(184,'Nikon D5600 18-55mm Vr Ii','16901802075416','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_752264-MLB44586880352_012021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(185,'Nikon D5600 18-55mm Vr Ii Kit Dslr Cor Preto','18742802014967','Câmeras','Nikon','https://http2.mlstatic.com/D_NQ_NP_784923-MLB44586882301_012021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(186,'Sony DSC-W800 compacta cor preto','15401080206955','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_961656-MLA40148576716_122019-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(187,'Sony WX500 compacta cor preto','18237380200394','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_764231-MLA41542110401_042020-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(188,'Sony Handheld Camcorders HXR-NX80 4K NTSC/PAL preta','15195218020305','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_848019-MLA43196302277_082020-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(189,'Sony ZV-1 compacta cor preto','10333638020586','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_603504-MLA45687263330_042021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A'),(190,'Sony HDR-CX455 HD NTSC/PAL preta','19987848020747','Câmeras','Sony','https://http2.mlstatic.com/D_NQ_NP_953733-MLA45720795966_042021-O.webp',10,2300.00,100.00,4600.00,'0',1,'2021-11-05','A');
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
  `nome` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) DEFAULT NULL,
  `cep` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero_rua` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `id_priv` int DEFAULT NULL,
  PRIMARY KEY (`cod_interno`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (21,'UELITON DE BRITO VIANA','ueliton1','408.765.718-36','88503-001','Av Luiz de Camões','1081','74999703023','ueliton_viana@outlook.com','63a9f0ea7bb98050796b649e85481845',1),(22,'UELITON DE BRITO VIANA','ueliton2','408.765.718-36','88503-001','Av Luiz de Camões','1081','49984233608','ueliton_viana@outlook.com','63a9f0ea7bb98050796b649e85481845',2);
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

-- Dump completed on 2021-11-18  8:39:01

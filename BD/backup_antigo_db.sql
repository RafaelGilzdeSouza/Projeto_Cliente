create database db_eletronicsstore;

use db_eletronicsstore;

 ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY '';

create table tb_privilegios (
id_priv int(2) not null auto_increment primary key,
descrição enum('admin', 'comprador(a)') default('comprador(a)') ) default charset = utf8;

insert into tb_privilegios values
(1,'admin'),
(2,'comprador(a)');

create table tb_usuario (
cod_interno int(9) not null auto_increment,
nome varchar(255) not null,
login varchar(255) not null,
cpf varchar(255) not null,
cep varchar(255) not null,
rua varchar(255),
numero_rua varchar(255),
telefone varchar(255),
email varchar(255),
senha varchar(255) not null,
id_priv int(2) not null,
primary key(cod_interno),
foreign key (id_priv) references tb_privilegios(id_priv))
default charset = utf8;

insert into tb_usuario values
(1,'rafael', 'rafael','400.705.708-30','44900-000','Rua A','69','(49)9.9999-9999','email@email.com','root',1),
(2,'ueliton', 'teste','408.765.718-36','44900-000','Rua A','69','(49)9.9999-9999','email@email.com','root',2);

select * from tb_usuario;

create table tb_fornecedor (
cod_forn int(9) not null auto_increment primary key,
razaoSocial varchar(100) not null,
cnpj varchar(18) not null,
telefone varchar(20) not null,
cep varchar(9) not null,
rua varchar(200),
numero int(6) not null,
bairro varchar(20) not null,
cidade varchar(20) not null,
status varchar(20) not null,
estado varchar(5) not null,
email varchar (100) ) default charset = utf8;

insert into tb_fornecedor values
(1,'MIRAO DISTRIBUIDORA ME', '12812792000188','(11)9.8423-5555', '44999-000','RUA B', '51', 'CETRO', 'SÃO PAULO', 'ATIVO', 'SP','mirao@outlook.com');

select * from tb_produtos;
-- drop table tb_produtos;

create table tb_produtos (
cod_prod int(9) not null auto_increment primary key,
descricao varchar (200) not null,
codigo_barras varchar(50) not null,
grupo varchar(100),
fabricante varchar(200) not null,
foto varchar(250) not null,
estoque int(5) not null,
preco_custo float(9,2) not null,
margem_lucro float(9,2) not null,
preco_venda float(9,2) not null,
promocao bit,
fornecedor int,
data_chegou date,
curvaABC enum('A' , 'B' , 'C'),
foreign key(fornecedor) references tb_fornecedor(cod_forn)) default charset = utf8;

insert into tb_produtos (descricao, codigo_barras, grupo, fabricante, foto, estoque, preco_custo, margem_lucro, preco_venda,fornecedor, data_chegou, curvaABC,promocao) values 
('Smart TV LG 50UN731C LED 4K 50" 110V/220V', '78999095257825', "TV's", 'LG', 'https://http2.mlstatic.com/D_NQ_NP_926914-MLA43764091514_102020-O.webp',10, 1349.5, 100, 2699,1, '2021-09-12', 'A',1),
('Smart TV LG AI ThinQ 60UN7310PSA LED 4K 60" 100V/240V', '78900114477885', "TV's", 'LG', 'https://http2.mlstatic.com/D_NQ_NP_673075-MLA43228769453_082020-O.webp',10, 1849.5, 100, 3699,1, '2021-09-12', 'B',1),
('Smart TV LG 24TL520S-PS LED HD 23.6"', '78911225544125', "TV's", 'LG', 'https://http2.mlstatic.com/D_NQ_NP_845838-MLA44205269521_112020-O.webp',10, 549.5, 100, 1099,1, '2021-09-12', 'C',1),
('Smart Tv 4k Sony Led 75 Wi-fi - Xbr-75x805g', '78966332255441', "TV's", 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_917601-MLB44128089704_112020-O.webp',10, 1895, 100, 3790,1, '2021-09-12', 'A',1),
('Smart Tv Sony Xbr-75x955g Led 4k 75', '78966554422112', "TV's", 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_804009-MLB44540794415_012021-O.webp',10, 3299.5, 100, 6599,1, '2021-09-12', 'B',0),
('Smart Tv Sony Bravia Xbr-75x805g Led 4k 75', '78988557744112', "TV's", 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_944253-MLB44128112017_112020-O.webp',10, 1977.5, 100, 3955,1, '2021-09-12', 'C',1),
('Smart TV LED 43" Xiaomi 4S L43M5-5ARU 4k ultra HD Bluetooth Wifi HDR 3 HDMI 3 USB', '78999888877412', "TV's", 'Xiaomi', 'https://carrefourbr.vtexassets.com/arquivos/ids/11019089-1200-auto?width=1200&height=auto&aspect=true',10, 1299.5, 100, 2599,1, '2021-09-12', 'A',0),
('Samsung Smart Tv Crystal Uhd Tu8000 4k 55 Alexa Built In', '78988666555991', "TV's", 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_933534-MLB42347166352_062020-O.webp',10, 1699.5, 100, 3399,1, '2021-09-12', 'B',1),
('Smart Tv 50 Samsung 50au7700 Uhd Crystal 4k Alexa Built In', '78845612112565', "TV's", 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_887122-MLB45643721649_042021-O.webp',10, 1599.5, 100, 3199,1, '2021-09-12', 'C',1),
('Smart TV Samsung UN40T5300AGXZD LED Full HD 40" 100V/240V', '78988552233221', "TV's", 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_615386-MLA43272194755_082020-O.webp',10, 1049.5, 100, 2099,1, '2021-09-12', 'A',1),
('Samsung Galaxy Z Fold2 5G 256 GB mystic black 12 GB RAM', '88956254256232', 'Celulares', 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_627106-MLA44178881967_112020-O.webp',10, 6497, 100, 12994,1, '2021-09-12', 'C',1),
('Samsung Galaxy S21 Ultra 5G 256 GB prata 12 GB RAM', '88956512125458', 'Celulares', 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_653921-MLA44850381541_022021-O.webp',10, 4073, 100, 8146,1, '2021-09-12', 'A',0),
('Samsung Galaxy Note20 Ultra 256 GB branco-místico 8 GB RAM', '88956563232315', 'Celulares', 'Samsung', 'https://http2.mlstatic.com/D_NQ_NP_768710-MLA43651747199_102020-O.webp',10, 3694, 100, 7388,1, '2021-09-12', 'B',1),
('Apple iPhone 12 (128 GB) - Branco', '88965623232146', 'Celulares', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_914966-MLA46082341071_052021-O.webp',10, 2311.5, 100, 4623,1, '2021-09-12', 'C',1),
('Apple iPhone XR 64 GB - Amarelo', '88932326565689', 'Celulares', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_732153-MLA46545868401_062021-O.webp',10, 1573, 100, 3146,1, '2021-09-12', 'A',0),
('Apple iPhone 11 (128 GB) - Preto', '88965232326656', 'Celulares', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_721876-MLA46114648081_052021-O.webp',10, 2799.5, 100, 5599,1, '2021-09-12', 'B',1),
('Xiaomi Mi 11 Dual SIM 128 GB cloud white 8 GB RAM', '88965662323561', 'Celulares', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_892926-MLA46928580278_072021-O.webp',10, 3299, 100, 6598,1, '2021-09-12', 'C',0),
('Xiaomi Mi 10T Pro 5G Dual SIM 128 GB prata-lunar 8 GB RAM', '88911515458741', 'Celulares', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_784877-MLA45153261097_032021-O.webp',10, 2124, 100, 4248,1, '2021-09-12', 'A',1),
('Xiaomi Pocophone Poco F2 Pro Dual SIM 128 GB cyber gray 6 GB RAM', '88912125454878', 'Celulares', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_678007-MLA4391604a4203_102020-O.webp',10, 2049.5, 100, 4099,1, '2021-09-12', 'B',1),
('Tablet Xiaomi Mi Pad 4 WiFi Edition 2018 8" 64GB black com 4GB de memória RAM', '44123265659985', 'Tablets', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_903995-MLA40857797361_022020-O.webp',10, 1215, 100, 2430,1, '2021-09-12', 'C',1),
('Xiaomi Tablet 5 Mi Pro 11 Polegada Envio Internacional', '44132326998715', 'Tablets', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_764377-MLB47354733275_092021-O.webp',10, 1649.5, 100, 3299,1, '2021-09-12', 'A',0),
('Xiaomi Pad 12gb Ram 640gb Ssd Envio Internacional 20/60 Dias', '44121221254548', 'Tablets', 'Xiaomi', 'https://http2.mlstatic.com/D_NQ_NP_798825-MLB45232750316_032021-O.webp',10, 1299.5, 100, 2599,1, '2021-09-12', 'B',1),
('iPad Apple Pro 4th generation 2020 A2069 12.9" 256GB cinza-espacial com 6GB RAM', '44123232656564', 'Tablets', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_875271-MLA45269866328_032021-O.webp',10, 10069.5, 100, 20139,1, '2021-09-12', 'C',0),
('Apple iPad Pro de 12.9" Wi-Fi 2TB Prata (5ª geração)', '44132326599897', 'Tablets', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_733347-MLA46557284500_062021-O.webp',10, 9495, 100, 18990,1, '2021-09-12', 'B',1),
('iPad Apple Pro 2nd generation 2020 A2230 11" 256GB cinza-espacial com 6GB RAM', '44121212545441', 'Tablets', 'Apple', 'https://http2.mlstatic.com/D_NQ_NP_756476-MLA46223858250_052021-O.webp',10, 6049.5, 100, 12099,1, '2021-09-12', 'A',0),
('Canon EOS 5D Mark IV 24-70mm IS USM Kit DSLR cor preto', '55598989895654', 'Câmeras', 'Canon', 'https://http2.mlstatic.com/D_NQ_NP_973404-MLA41533948127_042020-O.webp',10, 18509, 100, 37018,1, '2021-09-12', 'A',1),
('Canon EOS Kit R + lente 24-105mm IS USM mirrorless cor preto', '55511212154584', 'Câmeras', 'Canon', 'https://http2.mlstatic.com/D_NQ_NP_734397-MLA41533832178_042020-O.webp',10, 10152, 100, 20304,1, '2021-09-12', 'B',1),
('Canon EOS Kit 6D Mark II 24-105mm F/4L IS II USM DSLR cor preto', '55595989874521', 'Câmeras', 'Canon', 'https://http2.mlstatic.com/D_NQ_NP_813143-MLA41533948110_042020-O.webp',10, 9552.5, 100, 19105,1, '2021-09-12', 'C',1),
('Sony Alpha 9 mirrorless cor preto', '55598983623214', 'Câmeras', 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_656055-MLA41541229843_042020-O.webp',10, 12937.5, 100, 25875,1, '2021-09-12', 'A',1),
('Câmera de vídeo profissional Sony Handheld Camcorders HXR-NX80 4K NTSC/PAL preta', '55532121548484', 'Câmeras', 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_848019-MLA43196302277_082020-O.webp',10, 9099.5, 100, 18199,1, '2021-09-12', 'B',0),
('Sony Kit Alpha 7 III + lente 28-70mm OSS mirrorless cor preto', '55518181784852', 'Câmeras', 'Sony', 'https://http2.mlstatic.com/D_NQ_NP_768421-MLA41542110898_042020-O.webp',10, 8200, 100, 16400,1, '2021-09-12', 'C',1),
('Nikon D5 DSLR cor preto', '55518184848452', 'Câmeras', 'Nikon', 'https://http2.mlstatic.com/D_NQ_NP_979890-MLA42562126341_072020-O.webp',10, 21895, 100, 43790,1, '2021-09-12', 'A',1),
('Nikon Z7 24-70mm Kit mirrorless cor preto', '55523231121589', 'Câmeras', 'Nikon', 'https://http2.mlstatic.com/D_NQ_NP_868675-MLA42228239571_062020-O.webp',10, 15580, 100, 31160,1, '2021-09-12', 'C',1),
('Nikon Z 7II mirrorless cor preto', '66695955156515', 'Câmeras', 'Nikon', 'https://http2.mlstatic.com/D_NQ_NP_991963-MLA45271477754_032021-O.webp',10, 12509, 100, 25018,1, '2021-09-12', 'A',1),
('Computador Gamer Dell Xps-8930-m451m', '66615151548484', 'Computadores', 'Dell', 'https://http2.mlstatic.com/D_NQ_NP_612780-MLB47218137540_082021-O.webp',10, 5071.5, 100, 10143,1, '2021-09-12', 'B',1),
('Computador Desktop Dell Xps Core I7 16gb Ssd+hd Placa Vídeo', '55515151545449', 'Computadores', 'Dell', 'https://http2.mlstatic.com/D_NQ_NP_926752-MLB44008840142_112020-O.webp',10, 5100.5, 100, 10201,1, '2021-09-12', 'C',0),
('Computador Gamer Dell Xps-8930-m45m', '55511919191232', 'Computadores', 'Dell', 'https://http2.mlstatic.com/D_NQ_NP_883838-MLB41273783822_032020-O.webp',10, 5116.5, 100, 10233,1, '2021-09-12', 'A',0),
('Apple MacBook Pro 13" Chip M1 8GB RAM 256GB SSD - Space Gray', '55519148484798', 'Computadores', 'Apple', 'https://m.media-amazon.com/images/I/71an9eiBxpL._AC_SL1500_.jpg', 10, 4511.5, 100, 9023,1, '2021-09-12', 'B',1),
('Apple MacBook Air 13.3" Chip M1 8GB RAM 256GB SSD - Space Gray', '55591948484875', 'Computadores', 'Apple', 'https://m.media-amazon.com/images/I/71jG+e7roXL._AC_SL1500_.jpg', 10, 3749.5, 100, 7499,1, '2021-09-12', 'C',0),
('Computador Completo Hp I5 8gb Ssd480gb Monitor 19 Elitedesk', '55512232326659', 'Computadores', 'HP', 'https://http2.mlstatic.com/D_NQ_NP_739899-MLB46403924178_062021-O.webp',10, 2649.5, 100, 5299,1, '2021-09-12', 'A',1),
('Pc Completo Hp Elitedesk 800 G2 Sff Core I7 6ºger 8gb Hd 1tb', '55512121929235', 'Computadores', 'HP', 'https://http2.mlstatic.com/D_NQ_NP_889541-MLB45479435584_042021-O.webp',10, 2699.5, 100, 5399,1, '2021-09-12', 'A',1),
('Pc Completo Hp Elitedesk 800g2 I7 6ºger 8gb Ssd 480gb', '55519484849565', 'Computadores', 'HP', 'https://http2.mlstatic.com/D_NQ_NP_733369-MLB45483285044_042021-O.webp',10, 2799.5, 100, 5599,1, '2021-09-12', 'A',1);

-- drop table tb_carrinho;

create table tb_carrinho (
id_venda int(9) not null auto_increment primary key,
cod_produto int(9) not null,
descricao varchar (150) not null,
sequencia int,
qtd_comprada int(4) not null,
data_compra date,
valor_unitario_prod float(9,2) not null,
cod_fornecedor int not null,
valor_total float(9,2),
status enum('pendente' , 'realizado') default('pendente'),
foreign key (cod_produto) references tb_produtos(cod_prod)
) default charset = utf8;


INSERT INTO `brands` (id, brand, created_at, updated_at) VALUES 
    (1,'Tu Case','2018-03-21 22:37:39','2018-04-18 06:00:24');

INSERT INTO `categories` (id, category, created_at, updated_at) VALUES 
    (1,'Fundas','2018-03-21 22:37:38','2018-03-21 22:37:38');

INSERT INTO `colors`(id, color, created_at, updated_at) VALUES 
    (1,'Plateado','2018-03-21 22:37:35','2018-03-21 22:37:35'),
    (2,'Gris','2018-03-21 22:37:36','2018-03-21 22:37:36'),
    (3,'Dorado','2018-03-21 22:37:36','2018-03-21 22:37:36'),
    (4,'Negro','2018-03-21 22:37:36','2018-03-21 22:37:36'),
    (5,'Rosa','2018-03-21 22:37:37','2018-03-21 22:37:37'),
    (6,'Rojo','2018-03-21 22:37:37','2018-03-21 22:37:37');

INSERT INTO `products` (id, product, description, price, category_id, brand_id, created_at, updated_at) VALUES 
    (1,'Funda 360 full cover + mica para iPhone 7','<ul>\r\n	<li>Resistente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n	<li>Protege todo tu equipo</li>\r\n</ul>',299,1,1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (2,'Funda 360 full cover + mica para iPhone 8','<ul>\r\n	<li>Resistente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n	<li>Protege todo tu equipo</li>\r\n</ul>',299,1,1,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (3,'Funda 360 full cover + mica para iPhone 8 plus','<ul>\r\n	<li>Resistente&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n	<li>Protege todo tu equipo</li>\r\n</ul>',299,1,1,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (4,'Funda 3 en 1 para iPhone X','<p>Protecci&oacute;n TOTAL para tu iPhone contra impactos y rayones.<br />\r\nGracias a su dise&ntilde;o se trata de un case que protege en su totalidad a tu iPhone de una forma s&uacute;per eficiente.</p>\r\n\r\n<ul>\r\n	<li>Protecci&oacute;n total para tu iPhone, parte trasera y la totalidad de los bordes.</li>\r\n	<li>Material altamente resistente PC tratado, suave al tacto.</li>\r\n	<li>Cubierta protectora libre de pantalla.</li>\r\n	<li>Acceso total a c&aacute;mara y puertos.</li>\r\n	<li>Se amolda perfectamente al cuerpo de tu IPhone d&aacute;ndole un toque de suma elegancia .</li>\r\n	<li>Mica de cristal templado para la protecci&oacute;n total de tu pantalla.</li>\r\n</ul>',299,1,1,'2018-03-27 02:34:21','2018-03-27 02:34:21');

INSERT INTO `photos` VALUES 
    (1,'photos/8rwHVOc3vmqW355vN9HPDHNohNNx8sKTRbsVU1M7.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (2,'photos/8uKdgVg3iUk0innmThSQ4ohKoSo5ZDv8MNQ9lVys.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (3,'photos/HStDdbBWZWae27NjjTkMPf1twQRzqvKWbPTWCHgJ.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (4,'photos/4I22RxyTHQPnnuJLezaLXWYYECdEeo92JQimJtEK.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (5,'photos/gcprgp0wgy5LouiyATFyC6QdN7S8WUktpF7QWWD9.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (6,'photos/bsC79pgQehK5SNBkVWhC4J9L6pEjnAS1sm2QqnjQ.png',1,'2018-03-27 02:30:33','2018-03-27 02:30:33'),
    (7,'photos/r88HETZv7JRm5PG8c4kCYJ0zl75UJ1SiEQC5VyEf.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (8,'photos/ewbWjRcWdT6ZVy0v75SyBuvkrVflYAfPmBwMHWWd.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (9,'photos/8uk7EDEYA4lW30LtUpiIbGCBSVAjIyLQBmywQTe4.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (10,'photos/QJ2UqUeRnU2qhRMttmRIMhwdAFcSKTjfMQZKoevZ.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (11,'photos/Pg8Hb4FSpdgqJ65stm3ieMQB8O1PrOFFkBp8Ex1q.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (12,'photos/lPqLUPqGfFF9LCj9iLNG9KdVsTB7Sz7t5c9pVcAQ.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (13,'photos/2OwAehtgEgfP6lhf8vLFejRDzp5jP4Bqj8fdGrmc.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (14,'photos/8jDyuXRX2157aV96g43yfl3MDtqaHab93t6TKtEU.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (15,'photos/zavULc3eEaDi3GbQFDHFCUuKsi5NJyAxLYawWsZg.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (16,'photos/9lcPcIbT5FgPynfpagm0VWLFrCfdreM9xWX3XP3y.png',2,'2018-03-27 02:32:04','2018-03-27 02:32:04'),
    (17,'photos/o8HYmJE4HfBp06enZMEj1KTiA3x5tAqEnBHmDkdz.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (18,'photos/X8DIT6MxrD4Pk8pRjRIs0mXAjWFK43FrUVLLBurK.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (19,'photos/mRIb00iwEEmZ4oLTiDReaXoRoDKOZXahWIx8eLSc.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (20,'photos/e94x41wmr6zK625oHFAN28SvX5rt7F7ljSZOIem8.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (21,'photos/q5GNbqseKE745tNSBFKXADt0MlkUq2Qw1CryT4Ol.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (22,'photos/j6ye85lB1ssK869hMo81MLGfzTavElWvNSJEO02D.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (23,'photos/b3zawDSZ2ivmQOWA1yqX68qz2pgDeQmqYpjlmVIY.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (24,'photos/vIDyrclhcZKRe3rv6sAGfZJhNECQBBIr82EVyGqg.png',3,'2018-03-27 02:33:08','2018-03-27 02:33:08'),
    (25,'photos/HNlhluJtzyLwldvk9DCyBDwqCQA64NraQG9KQvTg.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (26,'photos/yd6fNU8s2tTweQtoFuX0Wv2rxNiqRS2zj2Ij9NTu.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (27,'photos/7Va6TMJv0MMqQmiS6wPkXY7IFyKHw4qOk9fbHCrl.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (28,'photos/bmJQeEFdmdJODi5r3hY697kgOrZYsBhuGk1LEXh3.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (29,'photos/BumigJsrUxZX5VUufoqsEYgAoDtTVqDvujGXDJVI.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (30,'photos/FR1rGLprcO5eFN6NbPDPbSFbEhlj80SRYVZ3ePX8.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (31,'photos/1bxrJv1DSOmyz1kTFNA8VEAeQrqcLTK49mEUpq57.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (32,'photos/iDaB4Bko5x6u9HRtSJejuCO06ZaIJOXyCE0wBuNz.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (33,'photos/Ib6UjIOAfzz5VyPuAlvCM5IYb2XaGBtprQ88DMt1.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21'),
    (34,'photos/LtMYkFX0yqIr2R8m5gh82t5nssoPGsQq9Fa9MZzR.png',4,'2018-03-27 02:34:21','2018-03-27 02:34:21');
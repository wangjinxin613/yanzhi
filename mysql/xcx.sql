# Host: localhost:3307  (Version: 5.5.53)
# Date: 2018-01-08 21:58:51
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `admin_tel` varchar(255) DEFAULT NULL COMMENT '电话号',
  `createTime` varchar(255) DEFAULT NULL COMMENT '创建时间',
  `admin_status` int(11) DEFAULT '1',
  `admin_truename` varchar(255) DEFAULT NULL,
  `areaName` varchar(255) DEFAULT NULL COMMENT '区域名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=gbk;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES (1,'admin','e10adc3949ba59abbe56e057f20f883e','18841692393','2017/05/06',1,'白先生','辽宁省');

#
# Structure for table "list"
#

CREATE TABLE `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `beizhu` varchar(255) DEFAULT NULL,
  `nickName` varchar(255) DEFAULT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `tuijian` int(11) DEFAULT '0',
  `tuijian_time` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8;

#
# Data for table "list"
#

INSERT INTO `list` VALUES (1031,'10004306','我的结婚照～来看看吧','文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:17',0,'2018/01/07 16:18'),(1034,'10004306','纪念','文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:37',1,'2018/01/08 17:25'),(1038,'10004306','长腿电眼～姐妹花女枪卡特，希望大家喜欢。','文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 23:12',0,'2018/01/07 23:13'),(1039,'10004308','一套超级漂亮的小姐姐的写真~送给你们！','千寻','https://wx.qlogo.cn/mmopen/vi_32/vjHibdFtXRlt0tnfIb3uOu3XqP2Aib1Xs8ticGMgZic0Lecn5ayMT7XgJ94GicM7Ih7523rxCS69G6sWVef4iaQQXjjQ/0','2018/01/07 23:19',0,'2018/01/07 23:19'),(1040,'10004309','时间越久 你越香醇','Ellen','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTI0ukbewynobVpzKtedd1rG5ScNbcCOpDWV76GmaarLIjnDEO5xat7u54h2uh3p2BCa6WpG7a4ljg/0','2018/01/07 23:29',1,'2018/01/08 00:41');

#
# Structure for table "list_img"
#

CREATE TABLE `list_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  `l_id` varchar(255) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

#
# Data for table "list_img"
#

INSERT INTO `list_img` VALUES (1,'10000418','https://uolol.com/upload/2018010614144170651.jpeg','1001'),(2,'10000418','https://uolol.com/upload/2018010614144225421.jpeg','1001'),(3,'10000418','https://uolol.com/upload/2018010614144288721.jpeg','1001'),(4,'10000418','https://uolol.com/upload/2018010614144219421.jpeg','1001'),(5,'10000418','https://uolol.com/upload/2018010614144220141.jpeg','1001'),(6,'10000418','https://uolol.com/upload/2018010614144340561.jpeg','1001'),(7,'10000416','https://uolol.com/upload/2018010614145394801.jpeg','1002'),(8,'10000416','https://uolol.com/upload/2018010614145430681.jpeg','1002'),(9,'10000416','https://uolol.com/upload/2018010614145443371.jpeg','1002'),(10,'10000418','https://uolol.com/upload/2018010614150732291.jpeg','1003'),(11,'10000418','https://uolol.com/upload/2018010614150889651.jpeg','1003'),(12,'10000418','https://uolol.com/upload/2018010614150821891.jpeg','1003'),(13,'10000418','https://uolol.com/upload/2018010614150857321.jpeg','1003'),(14,'10000418','https://uolol.com/upload/2018010614150864081.jpeg','1003'),(15,'10000418','https://uolol.com/upload/2018010614152975631.jpeg','1004'),(16,'10000418','https://uolol.com/upload/2018010614152962881.jpeg','1004'),(17,'10000418','https://uolol.com/upload/2018010614152920221.jpeg','1004'),(18,'10000418','https://uolol.com/upload/2018010614152929711.jpeg','1004'),(19,'10000418','https://uolol.com/upload/2018010614153045591.jpeg','1004'),(20,'10000418','https://uolol.com/upload/2018010614153033391.jpeg','1004'),(21,'10000416','https://uolol.com/upload/2018010618242985831.jpeg','1005'),(22,'10000416','https://uolol.com/upload/2018010618243012051.jpeg','1005'),(23,'10000416','https://uolol.com/upload/2018010618243082221.jpeg','1005'),(24,'10000416','https://uolol.com/upload/2018010618253476131.jpeg','1006'),(25,'10000416','https://uolol.com/upload/2018010618253629161.jpeg','1006'),(26,'10000416','https://uolol.com/upload/2018010618253684671.jpeg','1006'),(27,'10000426','https://uolol.com/upload/2018010618272831601.jpeg','1007'),(28,'10000426','https://uolol.com/upload/2018010618272953821.jpeg','1007'),(29,'10000426','https://uolol.com/upload/2018010618272913101.jpeg','1007'),(30,'10000426','https://uolol.com/upload/2018010621244817281.jpeg','1008'),(31,'10000426','https://uolol.com/upload/2018010621244976841.jpeg','1008'),(32,'10000426','https://uolol.com/upload/2018010713045512581.jpeg','1009'),(33,'10000426','https://uolol.com/upload/2018010713045683961.jpeg','1009'),(34,'10000426','https://uolol.com/upload/2018010713045785541.jpeg','1009'),(35,'10000426','https://uolol.com/upload/2018010713050435261.jpeg','1009'),(36,'10000418','https://uolol.com/upload/2018010714100531961.jpeg','1010'),(37,'10000418','https://uolol.com/upload/2018010714100554221.jpeg','1010'),(38,'10000418','https://uolol.com/upload/2018010714100680941.jpeg','1010'),(39,'10000418','https://uolol.com/upload/2018010714113241221.jpeg','1011'),(40,'10000418','https://uolol.com/upload/2018010714113287681.jpeg','1011'),(41,'10000418','https://uolol.com/upload/2018010714113294271.jpeg','1011'),(42,'10000418','https://uolol.com/upload/2018010714113423541.jpeg','1011'),(43,'10000418','https://uolol.com/upload/2018010714204929621.jpeg','1012'),(44,'10000418','https://uolol.com/upload/2018010714204943081.jpeg','1012'),(45,'10000418','https://uolol.com/upload/2018010714205044681.jpeg','1012'),(46,'10000418','https://uolol.com/upload/2018010714205156461.jpeg','1012'),(47,'10000418','https://uolol.com/upload/2018010714205138831.jpeg','1012'),(48,'10000416','https://uolol.com/upload/2018010714221261261.jpeg','1013'),(49,'10000416','https://uolol.com/upload/2018010714221262421.jpeg','1013'),(50,'10000416','https://uolol.com/upload/2018010714221457261.jpeg','1013'),(51,'10000418','https://uolol.com/upload/2018010714255411391.jpeg','1014'),(52,'10000418','https://uolol.com/upload/2018010714255511661.jpeg','1014'),(53,'10000418','https://uolol.com/upload/2018010714255685511.jpeg','1014'),(54,'10000418','https://uolol.com/upload/2018010714255739491.jpeg','1014'),(55,'10000416','https://uolol.com/upload/2018010714262827491.jpeg','1015'),(56,'10000416','https://uolol.com/upload/2018010714262859251.jpeg','1015'),(57,'10000418','https://uolol.com/upload/2018010714272457291.jpeg','1016'),(58,'10000418','https://uolol.com/upload/2018010714272415491.jpeg','1016'),(59,'10000418','https://uolol.com/upload/2018010714272568811.jpeg','1016'),(60,'10000418','https://uolol.com/upload/2018010714272589601.jpeg','1016'),(61,'10004302','https://uolol.com/upload/2018010714285696541.jpeg','1017'),(62,'10004302','https://uolol.com/upload/2018010714285695101.jpeg','1017'),(63,'10004302','https://uolol.com/upload/2018010714285783431.jpeg','1017'),(64,'10004302','https://uolol.com/upload/2018010714285725081.jpeg','1017'),(65,'10000416','https://uolol.com/upload/2018010714324483731.jpeg','1018'),(66,'10000416','https://uolol.com/upload/2018010714324532981.jpeg','1018'),(67,'10000418','https://uolol.com/upload/2018010714341341261.jpeg','1019'),(68,'10000418','https://uolol.com/upload/2018010714341320301.jpeg','1019'),(69,'10000418','https://uolol.com/upload/2018010714341427141.jpeg','1019'),(70,'10000418','https://uolol.com/upload/2018010714345952951.jpeg','1020'),(71,'10000418','https://uolol.com/upload/2018010714350213271.jpeg','1020'),(72,'10000418','https://uolol.com/upload/2018010714350387421.jpeg','1020'),(73,'10000418','https://uolol.com/upload/2018010714350771681.jpeg','1020'),(74,'10000418','https://uolol.com/upload/2018010714401247701.jpeg','1021'),(75,'10000418','https://uolol.com/upload/2018010714401281481.jpeg','1021'),(76,'10000418','https://uolol.com/upload/2018010714401284951.jpeg','1021'),(77,'10000418','https://uolol.com/upload/2018010714401265191.jpeg','1021'),(78,'10004302','https://uolol.com/upload/2018010714484734951.jpeg','1022'),(79,'10004302','https://uolol.com/upload/2018010714484865371.jpeg','1022'),(80,'10004302','https://uolol.com/upload/2018010714484884131.jpeg','1022'),(81,'10004302','https://uolol.com/upload/2018010714484833911.jpeg','1022'),(82,'10004302','https://uolol.com/upload/2018010714484937241.jpeg','1022'),(83,'10004302','https://uolol.com/upload/2018010714534431301.jpeg','1023'),(84,'10004302','https://uolol.com/upload/2018010714534531511.jpeg','1023'),(85,'10004302','https://uolol.com/upload/2018010714534594641.jpeg','1023'),(86,'10004302','https://uolol.com/upload/2018010714534698851.jpeg','1023'),(87,'10004302','https://uolol.com/upload/2018010714550512571.jpeg','1024'),(88,'10004302','https://uolol.com/upload/2018010714550515661.jpeg','1024'),(89,'10004302','https://uolol.com/upload/2018010714550671201.jpeg','1024'),(90,'10004302','https://uolol.com/upload/2018010714550638961.jpeg','1024'),(91,'10000418','https://uolol.com/upload/2018010715011943681.jpeg','1025'),(92,'10000418','https://uolol.com/upload/2018010715011926011.jpeg','1025'),(93,'10000418','https://uolol.com/upload/2018010715011981231.jpeg','1025'),(94,'10000418','https://uolol.com/upload/2018010715011946261.jpeg','1025'),(95,'10000418','https://uolol.com/upload/2018010715011954721.jpeg','1025'),(96,'10000418','https://uolol.com/upload/2018010715011916811.jpeg','1025'),(97,'10000418','https://uolol.com/upload/2018010715011938681.jpeg','1025'),(98,'10000418','https://uolol.com/upload/2018010715012051911.jpeg','1025'),(99,'10000418','https://uolol.com/upload/2018010715012051001.jpeg','1025'),(100,'10000418','https://uolol.com/upload/2018010715014256771.jpeg','1026'),(101,'10000418','https://uolol.com/upload/2018010715014277391.jpeg','1026'),(102,'10000418','https://uolol.com/upload/2018010715014275531.jpeg','1026'),(103,'10000418','https://uolol.com/upload/2018010715014360521.jpeg','1026'),(104,'10000418','https://uolol.com/upload/2018010715070462691.jpeg','1027'),(105,'10000418','https://uolol.com/upload/2018010715070562831.jpeg','1027'),(106,'10000418','https://uolol.com/upload/2018010715070515171.jpeg','1027'),(107,'10000418','https://uolol.com/upload/2018010715104265851.jpeg','1028'),(108,'10000418','https://uolol.com/upload/2018010715104237781.jpeg','1028'),(109,'10000418','https://uolol.com/upload/2018010715104374051.jpeg','1028'),(110,'10004304','https://uolol.com/upload/2018010715323349461.jpeg','1029'),(111,'10004304','https://uolol.com/upload/2018010715323327731.jpeg','1029'),(112,'10004306','https://uolol.com/upload/2018010716114669081.jpeg','1030'),(113,'10004306','https://uolol.com/upload/2018010716114658561.jpeg','1030'),(114,'10004306','https://uolol.com/upload/2018010716114713601.jpeg','1030'),(115,'10004306','https://uolol.com/upload/2018010716180093941.jpeg','1031'),(116,'10004306','https://uolol.com/upload/2018010716180033811.jpeg','1031'),(117,'10004306','https://uolol.com/upload/2018010716180077811.jpeg','1031'),(118,'10004306','https://uolol.com/upload/2018010716180172131.jpeg','1031'),(119,'10004306','https://uolol.com/upload/2018010716180163761.jpeg','1031'),(120,'10004306','https://uolol.com/upload/2018010716232549221.jpeg','1032'),(121,'10004306','https://uolol.com/upload/2018010716232564471.jpeg','1032'),(122,'10004306','https://uolol.com/upload/2018010716232650871.jpeg','1032'),(123,'10004304','https://uolol.com/upload/2018010716252591041.jpeg','1033'),(124,'10004304','https://uolol.com/upload/2018010716252637461.jpeg','1033'),(125,'10004306','https://uolol.com/upload/2018010716372232101.jpeg','1034'),(126,'10004306','https://uolol.com/upload/2018010716372220591.jpeg','1034'),(127,'10004306','https://uolol.com/upload/2018010716372327491.jpeg','1034'),(128,'10004306','https://uolol.com/upload/2018010716372487951.jpeg','1034'),(129,'10004306','https://uolol.com/upload/2018010716372540171.jpeg','1034'),(130,'10004306','https://uolol.com/upload/2018010716372623311.jpeg','1034'),(131,'10004306','https://uolol.com/upload/2018010716381372581.jpeg','1035'),(132,'10004306','https://uolol.com/upload/2018010716381415871.jpeg','1035'),(133,'10004306','https://uolol.com/upload/2018010716381583061.jpeg','1035'),(134,'10004306','https://uolol.com/upload/2018010716411832291.jpeg','1036'),(135,'10004306','https://uolol.com/upload/2018010716411857631.jpeg','1036'),(136,'10004306','https://uolol.com/upload/2018010716411989881.jpeg','1036'),(137,'10004304','https://uolol.com/upload/2018010716414882701.jpeg','1037'),(138,'10004304','https://uolol.com/upload/2018010716414857031.jpeg','1037'),(139,'10004304','https://uolol.com/upload/2018010716414951811.jpeg','1037'),(140,'10004306','https://uolol.com/upload/2018010723123783781.jpeg','1038'),(141,'10004306','https://uolol.com/upload/2018010723123793391.jpeg','1038'),(142,'10004306','https://uolol.com/upload/2018010723123855081.jpeg','1038'),(143,'10004306','https://uolol.com/upload/2018010723123880161.jpeg','1038'),(144,'10004306','https://uolol.com/upload/2018010723123931651.jpeg','1038'),(145,'10004306','https://uolol.com/upload/2018010723123960401.jpeg','1038'),(146,'10004306','https://uolol.com/upload/2018010723124049361.jpeg','1038'),(147,'10004306','https://uolol.com/upload/2018010723124179701.jpeg','1038'),(148,'10004306','https://uolol.com/upload/2018010723124244601.jpeg','1038'),(149,'10004308','https://uolol.com/upload/2018010723191897681.jpeg','1039'),(150,'10004308','https://uolol.com/upload/2018010723191896781.jpeg','1039'),(151,'10004308','https://uolol.com/upload/2018010723191880271.jpeg','1039'),(152,'10004308','https://uolol.com/upload/2018010723191876381.jpeg','1039'),(153,'10004308','https://uolol.com/upload/2018010723191979341.jpeg','1039'),(154,'10004308','https://uolol.com/upload/2018010723191942831.jpeg','1039'),(155,'10004308','https://uolol.com/upload/2018010723191981791.jpeg','1039'),(156,'10004308','https://uolol.com/upload/2018010723191952081.jpeg','1039'),(157,'10004309','https://uolol.com/upload/2018010723290674321.jpeg','1040'),(158,'10004309','https://uolol.com/upload/2018010723290698511.jpeg','1040');

#
# Structure for table "lunbo"
#

CREATE TABLE `lunbo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) DEFAULT NULL,
  `shunxu` varchar(255) DEFAULT NULL,
  `web_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

#
# Data for table "lunbo"
#

INSERT INTO `lunbo` VALUES (7,'http://uolol.com/upload/WechatIMG250.jpeg','2','/pages/reward/index?lid=1034');

#
# Structure for table "reward_order"
#

CREATE TABLE `reward_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL COMMENT '打赏金额',
  `lid` varchar(255) DEFAULT NULL COMMENT 'liebiaoid',
  `status` int(11) DEFAULT '0',
  `nickName` varchar(255) DEFAULT NULL COMMENT '打赏人昵称',
  `avatarUrl` varchar(255) DEFAULT NULL COMMENT '打赏人头像',
  `time` varchar(255) DEFAULT NULL COMMENT '赞赏时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

#
# Data for table "reward_order"
#

INSERT INTO `reward_order` VALUES (1,'10000416','1.88','2',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 14:15'),(3,'10000416','5.20','1004',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 17:04'),(4,'10000416','88.88','1004',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 17:04'),(5,'10000416','20.13','1004',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 17:04'),(6,'10000416','1.88','1001',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 17:04'),(7,'10000426','1.88','1001',1,'一路向暖','https://wx.qlogo.cn/mmopen/vi_32/fTa3mldwf7MEU63naBykQmhNiacHtqcak9BB7CknZzdIeVrJvcqVP8t2qqzlesGxTEZVR88TLoxbCJlZR610QGw/0','2018/01/06 18:10'),(8,'10000416','5.20','1001',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 18:18'),(100,'10000416','1.88','1007',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 18:28'),(101,'10000416','1.88','1003',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 21:03'),(102,'10000416','1.88','1004',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 17:04'),(111,'10000416','1.88','1008',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/06 22:33'),(112,'10000426','1.88','1003',1,'一路向暖','https://wx.qlogo.cn/mmopen/vi_32/fTa3mldwf7MEU63naBykQmhNiacHtqcak9BB7CknZzdIeVrJvcqVP8t2qqzlesGxTEZVR88TLoxbCJlZR610QGw/0','2018/01/07 13:13'),(113,'10000426','1.88','1002',1,'一路向暖','https://wx.qlogo.cn/mmopen/vi_32/fTa3mldwf7MEU63naBykQmhNiacHtqcak9BB7CknZzdIeVrJvcqVP8t2qqzlesGxTEZVR88TLoxbCJlZR610QGw/0','2018/01/07 13:14'),(114,'10000426','1.88','1004',1,'一路向暖','https://wx.qlogo.cn/mmopen/vi_32/fTa3mldwf7MEU63naBykQmhNiacHtqcak9BB7CknZzdIeVrJvcqVP8t2qqzlesGxTEZVR88TLoxbCJlZR610QGw/0','2018/01/07 13:15'),(115,'10000416','1.88','1009',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0','2018/01/07 13:17'),(116,'10004301','13.14','1003',0,'rdgztest_OTWXZU','','2018/01/07 13:21'),(117,'10000418','1.88','1009',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 13:56'),(118,'10000418','1.88','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:03'),(119,'10000418','5.20','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:03'),(120,'10000418','13.14','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:03'),(121,'10000418','20.13','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:03'),(122,'10000418','52.00','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:03'),(123,'10000418','88.88','1008',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:04'),(124,'10000418','1.88','1007',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:08'),(125,'10000418','1.88','1011',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:12'),(126,'10000418','1.88','1010',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0','2018/01/07 14:12'),(127,'10004302','1.88','1021',0,'千寻','https://wx.qlogo.cn/mmopen/vi_32/Y2icoqHESf05mYZicaCCoA20BTDgMt2TlOj7HX09EFW0IibPwJtF4rWudquj8IvhzfxFWRA495Fg84XAZWYHoicpXQ/0','2018/01/07 14:40'),(128,'10004303','20.13','1003',0,'rdgztest_RTEPAP','','2018/01/07 15:17'),(129,'10004305','1.88','1003',0,'rdgztest_COATUR','','2018/01/07 15:36'),(130,'10004304','1.88','1017',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/07 15:47'),(131,'10004304','1.88','1009',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/07 15:48'),(132,'10004304','5.20','1017',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/07 15:50'),(133,'10004306','1.88','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(134,'10004306','5.20','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(135,'10004306','13.14','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(136,'10004306','20.13','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(137,'10004306','52.00','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(138,'10004306','88.88','1017',0,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 16:11'),(139,'10004304','1.88','1031',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/07 16:43'),(140,'10004307','1.88','1031',0,'rdgztest_RTEPAP','','2018/01/07 16:44'),(141,'10004309','1.88','1034',1,'Ellen','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTI0ukbewynobVpzKtedd1rG5ScNbcCOpDWV76GmaarLIjnDEO5xat7u54h2uh3p2BCa6WpG7a4ljg/0','2018/01/07 23:25'),(142,'10004306','5.20','1040',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 23:29'),(143,'10004306','1.88','1039',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/07 23:32'),(144,'10004304','1.88','1039',1,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/08 00:33'),(145,'10004306','1.88','1034',1,'文小田_J','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0','2018/01/08 00:34'),(146,'undefined','1.88','1039',0,'undefined','undefined','2018/01/08 00:37'),(147,'10004304','88.88','1038',0,'记得要微笑','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0','2018/01/08 00:38'),(148,'10004308','1.88','1034',1,'千寻','https://wx.qlogo.cn/mmopen/vi_32/vjHibdFtXRlt0tnfIb3uOu3XqP2Aib1Xs8ticGMgZic0Lecn5ayMT7XgJ94GicM7Ih7523rxCS69G6sWVef4iaQQXjjQ/0','2018/01/08 19:33'),(149,'undefined','1.88','1034',0,'undefined','undefined','2018/01/08 19:35'),(150,'undefined','1.88','1040',0,'undefined','undefined','2018/01/08 19:35'),(151,'10004310','1.88','1034',0,'rdgztest_HTBLOX','','2018/01/08 20:20');

#
# Structure for table "tixian"
#

CREATE TABLE `tixian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(255) DEFAULT NULL,
  `money` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `dao_money` double(12,2) DEFAULT NULL COMMENT '到账金额',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "tixian"
#

INSERT INTO `tixian` VALUES (1,'10000416','10','2018/01/06 14:51',1,9.90),(2,'10000416','11','2018/01/06 14:52',1,10.89);

#
# Structure for table "user"
#

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `openId` varchar(255) DEFAULT NULL,
  `nickName` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL COMMENT '性别',
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `avatarUrl` varchar(255) DEFAULT NULL,
  `money` double(18,2) DEFAULT '0.00' COMMENT '余额',
  `lj_money` double(18,2) DEFAULT '0.00' COMMENT '累计收到赞赏',
  `lj_ci` int(11) DEFAULT '0' COMMENT '累计收到赞赏次数',
  `status` varchar(255) DEFAULT '1',
  `notice` int(11) DEFAULT '1' COMMENT '推送通知',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

INSERT INTO `user` VALUES (10000415,'oeZMF0aZH68m6LM3qT0_whG3qqv8','Day Day up','1','','Dubai','United Arab Emirates','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJicRRdXREk3WDm52UCdYKHH2n4EZnkRYIyGwxV0B5mK2iayQMSmeb7P2o9nh5CRNicQKR76TC0UgOAQ/0',1.00,1.00,1,'1',1),(10000416,'oeZMF0X79qvpMXxeEWKFBjFITfAs','记得要微笑','1','Chaoyang','Liaoning','China','https://wx.qlogo.cn/mmopen/vi_32/a3rp94O4LCbUaR6Qv9IVN19pkur1CeqjY1WUl4D9BH7lwNPJDjFQKGDib0GL9IicAR0d6lssLlKavMYEQJuCMVWQ/0',641.85,15.64,13,'1',1),(10000417,'oeZMF0fllztxMFDKLkib2cT-vD_0','Dream  chaser','1','','Blenheim','NZ','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIbWFEIJj8IpICibfM7ibGyrFfX4kwXcqVVAib1g7sxWTTXkGfmsOhuYibYmNEK9olvqUdfaWkVcFpTVw/0',0.00,0.00,0,'1',1),(10000418,'oeZMF0VtrkxLo-AhTbTmXO4c0MJc','文小田_J','1','Xuhui','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/xDyyjnvP7DUk6Ifsx6QcfSaLYUnlJicvw0ykFuSg7vnYhMvALfP6h5dXPZb4ZqFichy0kWxlgu4J72jibQhibAzg3Q/0',22.12,22.12,10,'1',1),(10000419,'oeZMF0SlzUTqbolM0i6JFHiARG4k','面朝大海，春暖花开。','0','','','','https://wx.qlogo.cn/mmopen/vi_32/TZnemTAzOLiazTqia3tDrU4FOAMmYaWbFeiaZgibhY3qicICY8gXiaGIzPV6GSbfEpXM71uIowd7kb04WYtgzfiatSTnQ/0',3.76,3.76,2,'1',1),(10000420,'oeZMF0fmZdg4D3Ccd8uzigk7_8ck','joshua','1','','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTLGask1rNBZACZB8EPQEQs1Jh6QxAF9l1sMsCesWQ3cC1MrMQ5GYvicdZQ7RdywJK48iasrVMJfAfSg/0',10.76,10.76,2,'1',1),(10000421,'oeZMF0YbB-u6Nbo8aKB6INl8gV3M','今夜我不关心人类','1','','','Oman','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKU9KPia4VHDovRHpLU7mmMudXWODE41Y3D6rjk9oHicHETFYLicYI8UibO5sApzY4shhohaxXQyVxWibQ/0',0.00,0.00,0,'1',1),(10000422,'oeZMF0SQG1Y6NVhP1ST81Hs0HRE0','rdgztest_VIWCBN','0','','','','',0.00,0.00,0,'1',1),(10000423,'oeZMF0WlSyMeMzKC1W1SVe2oW1n8','Ben.Xi','2','Guangzhou','Guangdong','China','https://wx.qlogo.cn/mmopen/vi_32/dgVUbdKdtvKQibgo16Im6nHLsYsWJ9k1tqhfwZTXicnWzUicm9dEmvIFyoKj9a5uIzDWY9B2GJQS8cDACoe3gNOwA/0',0.00,0.00,0,'1',1),(10000424,'oeZMF0bosiWF6WfqmTGgwmA9CQw0','清风','1','Dezhou','Shandong','China','https://wx.qlogo.cn/mmopen/vi_32/CztHribbzmYQR9bJiaPvCrxKvohfwJhGx5b1leibg0iaRgmmv9rDhqCNxvRW117jp0tSgWucJ0zoDZmZxoA2icmwp4w/0',0.00,0.00,0,'1',1),(10000425,'oeZMF0Yb3oPICt9XAm47Z_2DemaM','军方【小程序定制】','1','Shangrao','Jiangxi','China','https://wx.qlogo.cn/mmopen/vi_32/Cj7piaicBIIuSoT9gZgAtuEvSriaJYwwLe6VknfDyvLjX1YXSlaibCnDibh3tBibHEChxJoLbI5oWKptMzIFPQLnYARQ/0',0.00,0.00,0,'1',1),(10000426,'oeZMF0ZENOReFvcU6FBoLU_NHEbo','一路向暖','0','','','','https://wx.qlogo.cn/mmopen/vi_32/fTa3mldwf7MEU63naBykQmhNiacHtqcak9BB7CknZzdIeVrJvcqVP8t2qqzlesGxTEZVR88TLoxbCJlZR610QGw/0',24.44,24.44,13,'1',1),(10000427,'oeZMF0d_3GnX3KVw4ju4IRzqfJ4I','Spring','1','Nanjing','Jiangsu','China','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTKsRcbZYAGPIOLMBEo4Oq4IFRsm9LEUYcBM2HMyzByBjEknmUSwJRtXAVlu5xibzTm8gFlicpchyVfQ/0',0.00,0.00,0,'1',1),(10000428,'oeZMF0TN8_vqzkRnhXAjETI6RSKk','丢，不休！','1','Chifeng','Inner Mongolia','China','https://wx.qlogo.cn/mmopen/vi_32/XFBcMkia5h7yXG1vTj5lD7jE6Okp0kYkopVwsulwXlzEcWAibsjLeKSOduJBAfZxrMcC7MhIeaUPHq6JazdiagZEA/0',0.00,0.00,0,'1',1),(10000429,'oeZMF0XA8MgqrCVeoGdwPKN1Riso','rdgztest_SOCYHR','0','','','','',0.00,0.00,0,'1',1),(10000430,'oeZMF0QjSL6sf4BwLM9_z8sBTZjw','Ellen','2','Jiading','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTJczicIeIo1anNvDpRhxMCk1oeVzkjL1fj33s9UoAODpQibia5IyQiczTnRicG37vFk27984h2P0aOJPXg/0',0.00,0.00,0,'1',1),(10000431,'oeZMF0dBXTu54DLx370JpNB4QJQ4','围裙妈妈','0','','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTIictSFicIyfyWmuOmawvEhHZsdxkNcbe9m7nD1U3Azz9vHgULLZfmMS1MHGKzCca9dvBAlapLGxSNw/0',0.00,0.00,0,'1',1),(10004301,'oeZMF0ZtOU91W0BEORhlfo-huYAc','rdgztest_OTWXZU','0','','','','',0.00,0.00,0,'1',1),(10004302,'oeZMF0fo-LwkZWKrWA4MUijGzSJo','千寻','2','','','Andorra','https://wx.qlogo.cn/mmopen/vi_32/Y2icoqHESf05mYZicaCCoA20BTDgMt2TlOj7HX09EFW0IibPwJtF4rWudquj8IvhzfxFWRA495Fg84XAZWYHoicpXQ/0',0.00,0.00,0,'1',1),(10004303,'oeZMF0fx1PHxdLWxW-QHONAQ0Da0','rdgztest_RTEPAP','0','','','','',0.00,0.00,0,'1',2),(10004304,'ozBcj0aKbKac8k0Uy_q94EyS8ZRk','记得要微笑','1','Chaoyang','Liaoning','China','https://wx.qlogo.cn/mmopen/vi_32/sfQvykljx4aUo6obWaV5AyIcXnXVRLKpLssFIicj1QUeHdCDOZqXxHzUI0bJJ5LAqhezXdUUBsqHbdq77kJAEmA/0',0.00,0.00,0,'1',1),(10004305,'ozBcj0Zu5TerbwIQZJ6sNzaJhEYU','rdgztest_COATUR','0','','','','',0.00,0.00,0,'1',2),(10004306,'ozBcj0eP08mOIawJadbiCj9aNveo','文小田_J','1','Xuhui','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/MzoEFpic4kAV1SGicDbj0dFskFPLANXvQ4aVg6BITQ0DvMJtY996FGBx9ichdDO8Dl7CD6icfVOUQRvBoKRhjbIO8Q/0',5.64,5.64,3,'1',1),(10004307,'ozBcj0UPHauXyHHJ3oGh8UPKL6Pg','rdgztest_RTEPAP','0','','','','',0.00,0.00,0,'1',2),(10004308,'ozBcj0QnmW5vjLa1opRwLg17PnMs','千寻','2','','','Andorra','https://wx.qlogo.cn/mmopen/vi_32/vjHibdFtXRlt0tnfIb3uOu3XqP2Aib1Xs8ticGMgZic0Lecn5ayMT7XgJ94GicM7Ih7523rxCS69G6sWVef4iaQQXjjQ/0',3.76,3.76,2,'1',1),(10004309,'ozBcj0X3SgslnCTn2boiSM3kK89o','Ellen','2','Jiading','Shanghai','China','https://wx.qlogo.cn/mmopen/vi_32/Q0j4TwGTfTI0ukbewynobVpzKtedd1rG5ScNbcCOpDWV76GmaarLIjnDEO5xat7u54h2uh3p2BCa6WpG7a4ljg/0',5.20,5.20,1,'1',1),(10004310,'ozBcj0RPLWTNOJUQTGz5hW2Lios8','rdgztest_HTBLOX','0','','','','',0.00,0.00,0,'1',1);

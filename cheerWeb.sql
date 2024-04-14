-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: cheerWeb
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Banner`
--

DROP TABLE IF EXISTS `Banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Banner` (
  `banner_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `time` date NOT NULL,
  `instruction` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='首页推送';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Banner`
--

LOCK TABLES `Banner` WRITE;
/*!40000 ALTER TABLE `Banner` DISABLE KEYS */;
INSERT INTO `Banner` VALUES (1,'2023-2024学年 秋季学期工作室第一次全体学术研讨会','2024-04-03','舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗…… 在古代，水上航运是常用的交通方式。 时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。'),(2,'实验室组织参加 第18届国际建筑性能模拟大会（BS2023）','2024-04-05','舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗…… 在古代，水上航运是常用的交通方式。 时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。'),(3,'实验室23级研究生 正式开学报道','2024-04-08','舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗…… 在古代，水上航运是常用的交通方式。 时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。'),(4,'胡啸 通过博士学位论文答辩','2024-04-10','舳舻千里，旌旗蔽空，酾酒临江，横槊赋诗…… 在古代，水上航运是常用的交通方式。 时光划过千百年，打通“黄金水道”复兴水上交通，成为时代的新命题。');
/*!40000 ALTER TABLE `Banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Members`
--

DROP TABLE IF EXISTS `Members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Members` (
  `member_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `title` json DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `wechat` varchar(100) DEFAULT NULL,
  `weibo` varchar(100) DEFAULT NULL,
  `bilibili` varchar(100) DEFAULT NULL,
  `name_english` varchar(50) NOT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='实验室成员';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Members`
--

LOCK TABLES `Members` WRITE;
/*!40000 ALTER TABLE `Members` DISABLE KEYS */;
INSERT INTO `Members` VALUES (1,'测试','硕士研究生','[\"上海交通大学副教授\", \"其他的头衔\"]','sainner @sjtu.edu.cn','lu314944454','无','无','Test One'),(2,'测试2','硕士研究生','[\"上海交通大学副教授\", \"其他的头衔\"]','sainner @sjtu.edu.cn','lu314944454','无','无','Test Two'),(3,'测试3','硕士研究生','[\"上海交通大学副教授\", \"其他的头衔\"]','sainner @sjtu.edu.cn','lu314944454','无','无','Test Three'),(4,'测试4','硕士研究生','[\"上海交通大学副教授\"]','sainner @sjtu.edu.cn','lu314944454','无','无','Test Four'),(5,'测试5','硕士研究生',NULL,'sainner @sjtu.edu.cn','lu314944454','无','无','Test Five');
/*!40000 ALTER TABLE `Members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `News` (
  `news_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `time` date DEFAULT NULL,
  `content` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='实验室新闻';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `News`
--

LOCK TABLES `News` WRITE;
/*!40000 ALTER TABLE `News` DISABLE KEYS */;
INSERT INTO `News` VALUES (1,'Breakthrough in Nanomaterial Research at the GreenTech Lab','2024-04-12','The GreenTech Laboratory at the University of Science announced a significant breakthrough in nanomaterials today. Researchers have developed a new type of composite material that dramatically increases the efficiency of solar panels. This advancement could reduce the cost of solar energy, making it more accessible worldwide. The new material, which harnesses sunlight more effectively than traditional models, has been tested under various environmental conditions and shows promising results in terms of durability and efficiency. Dr. Emily Hart, the lead researcher, stated, \"This development represents a major step forward in our quest for sustainable energy solutions.\" The lab plans to publish the full study in the forthcoming issue of the \"Journal of Applied Physics\" and will continue to explore further applications of this innovative material.'),(2,'Congratulations to Dr. Joshua Goings','2024-04-11','Congratulations to Dr. Joshua Goings on winning the UW Data Science Postdoctoral Fellowship from the University of Washington eScience Institute!'),(3,'Discovery of New Antibiotic Compound at BioHealth Labs','2024-04-09','BioHealth Laboratories has announced the discovery of a novel antibiotic compound that shows high efficacy against antibiotic-resistant bacteria. The discovery was made by a team of researchers led by Dr. Jonathan Smith, who have been investigating natural sources for potential antibiotic agents. The new compound, named BacteRid, has been tested in both in vitro and in vivo environments and shows promise in combating a wide range of multi-resistant bacterial strains without significant side effects. Dr. Smith commented, \"This discovery could be a significant milestone in the fight against global antibiotic resistance.\" The research findings are scheduled for publication in the \"International Journal of Antimicrobial Agents\" next month. BioHealth Labs is currently seeking partnerships for clinical trials to further assess the compound’s effectiveness and safety.');
/*!40000 ALTER TABLE `News` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Outputs`
--

DROP TABLE IF EXISTS `Outputs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Outputs` (
  `output_id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `journal` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `time` year NOT NULL,
  `volumn&pages` varchar(100) DEFAULT NULL,
  `abstract` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kind` int NOT NULL COMMENT '论文成果为0；实践成果为1',
  `other_authors` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL COMMENT '使用英语逗号和空格分隔',
  PRIMARY KEY (`output_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='学术成果';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Outputs`
--

LOCK TABLES `Outputs` WRITE;
/*!40000 ALTER TABLE `Outputs` DISABLE KEYS */;
INSERT INTO `Outputs` VALUES (1,'Research on the application of quantum computing in the discovery of new materials','The Journal of Physical Chemistry A',2024,'383, 6687,1118-1122','This research was co-authored by an interdisciplinary team from the Future Lab to explore the potential of quantum computing technologies in the field of novel materials discovery. With the rapid development of quantum computing technology, it has shown revolutionary application prospects in many scientific research fields, especially in the design and discovery of new materials, quantum computing provides an unprecedented computing power and efficiency.By constructing an efficient quantum algorithm, this study successfully simulates the quantum behavior of complex materials, which provides a new way to understand the intrinsic properties of materials and accelerate the design of new materials. The research team has focused on overcoming the key technical problems of quantum computing in dealing with large-scale material database search, material property prediction, and exploration of the synthesis path of new materials, which has significantly improved the efficiency and accuracy of ',0,'Can Liao'),(2,'The Impact of Renewable Energy Integration on Urban Sustainability','Journal of Sustainable Development',2024,'15, 3, 204-220','This paper explores the significant effects of integrating renewable energy sources into urban infrastructures, highlighting the subsequent improvements in environmental quality, reduction in carbon emissions, and increased economic efficiency. The study uses a multi-city comparative analysis to evaluate the performance and sustainability outcomes associated with varying levels of renewable energy adoption. Key findings suggest that cities with aggressive renewable energy policies have seen substantial improvements in air quality and a reduction in energy costs. The implications of these results are discussed with regard to urban planning and policy making, providing a framework for cities aiming to enhance their sustainability metrics through renewable energy solutions.',1,NULL),(3,'Advanced Algorithms for Data Retrieval and Their Applications in Machine Learning','Journal of Computational Science and Technology',2024,'35, 2, 150-178','The focus of this paper is on advanced algorithms for data retrieval, emphasizing their role in enhancing machine learning models. After reviewing the limitations of existing methodologies, we introduce a novel hybrid model that merges probabilistic approaches with deterministic algorithms to improve accuracy and efficiency. Extensive testing was performed across diverse databases in healthcare, finance, and e-commerce sectors. Results show significant improvements in data processing speeds and prediction accuracy, highlighting the potential of these methodologies in real-world applications.',0,'Chad E. Hoyer, Rahoul Banerjee Ghosh'),(4,'数据挖掘中的新算法及其在生物统计中的应用','计算机科学与应用研究',2024,'40, 3, 310-333','本文深入探讨了数据挖掘中的先进算法及其在生物统计学中的应用。我们在分析现有方法的基础上，提出了一种结合概率和确定性算法的新型混合模型。该模型已在医疗、金融和电子商务等多个数据库上进行了广泛测试。测试结果显示，该方法在数据处理速度和预测准确性上均有显著提升，展示了其在实际应用中的广泛潜力。',0,NULL),(5,'全球变暖对农业生产的影响研究','全球环境与农业发展',2020,'18, 1, 134-156','本研究全面分析了全球变暖对农业生产的影响，特别是对作物生长周期、产量和品质的具体影响。研究采用了卫星影像和实地数据，深入分析了气候变化对不同作物类型的具体影响，并进行了未来趋势的预测。此外，文章还探讨了多种保护和恢复生态的策略，如改良作物种植技术和优化水资源管理，提出了一系列针对性的策略建议，以应对气候变化带来的挑战。',0,NULL),(6,'智能物流系统在现代仓储管理中的应用研究',NULL,2024,NULL,'本研究聚焦于智能物流系统在现代仓储管理中的实际应用，并探讨了其对提高仓库运营效率的影响。通过引入基于人工智能的库存管理和自动化货物跟踪系统，我们对比了传统方法和智能系统在订单处理速度、错误率和成本效率方面的表现。研究表明，智能物流系统显著提升了仓库管理的自动化水平，减少了人工错误，提高了物流效率。最终，本研究提出了几种策略，以帮助物流公司有效地实施和优化智能物流系统，以适应快速变化的市场需求。',1,NULL),(7,'Impact of Climate Change on Coral Reefs: A Global Analysis','Environmental Studies and Sustainability Research',2024,'12, 4, 202-229','This research provides a detailed examination of how climate change is detrimentally affecting coral reefs globally. The analysis includes a decade-long study of coral degradation, focusing on parameters such as water temperature, acidification, and pollution levels. Strategies for mitigation are discussed, including artificial reef construction and genetic modification of coral species to enhance resilience. The study\'s predictions for the next fifty years underscore the urgent need for comprehensive international policies to preserve these vital ecosystems.',0,'Andrew J. Jenkins');
/*!40000 ALTER TABLE `Outputs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Pictures`
--

DROP TABLE IF EXISTS `Pictures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Pictures` (
  `picture_id` int NOT NULL AUTO_INCREMENT,
  `alter_text` varchar(100) DEFAULT NULL,
  `name_suffix` varchar(100) NOT NULL COMMENT '文件名称+后缀；文件要置于pictures文件夹下！',
  `outputs_id` int DEFAULT NULL,
  `news_id` int DEFAULT NULL,
  `banner_id` int DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  PRIMARY KEY (`picture_id`),
  KEY `Pictures_Outputs_FK` (`outputs_id`),
  KEY `Pictures_News_FK` (`news_id`),
  KEY `Pictures_Members_FK` (`member_id`),
  KEY `Pictures_Banner_FK` (`banner_id`),
  CONSTRAINT `Pictures_Banner_FK` FOREIGN KEY (`banner_id`) REFERENCES `Banner` (`banner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Pictures_Members_FK` FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Pictures_News_FK` FOREIGN KEY (`news_id`) REFERENCES `News` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `Pictures_Outputs_FK` FOREIGN KEY (`outputs_id`) REFERENCES `Outputs` (`output_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='网站图片（banner、成果、新闻、头像）';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Pictures`
--

LOCK TABLES `Pictures` WRITE;
/*!40000 ALTER TABLE `Pictures` DISABLE KEYS */;
INSERT INTO `Pictures` VALUES (1,'textpictures1','banner_1.jpg',NULL,NULL,1,NULL),(2,'testpictures2','banner_2.jpg',NULL,NULL,2,NULL),(3,'test','banner_3.jpg',NULL,NULL,3,NULL),(4,'test4','banner_4.jpg',NULL,NULL,4,NULL),(5,'testpictures5','test_figure_1.png',1,NULL,NULL,NULL),(6,'t','test_figure_2.png',2,NULL,NULL,NULL),(7,'testss','test_figure_3.png',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Pictures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `outputsWithAuthorsAndSuffixes`
--

DROP TABLE IF EXISTS `outputsWithAuthorsAndSuffixes`;
/*!50001 DROP VIEW IF EXISTS `outputsWithAuthorsAndSuffixes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `outputsWithAuthorsAndSuffixes` AS SELECT 
 1 AS `output_id`,
 1 AS `title`,
 1 AS `journal`,
 1 AS `time`,
 1 AS `volumn&pages`,
 1 AS `abstract`,
 1 AS `kind`,
 1 AS `author_names`,
 1 AS `name_suffix`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `outputs_members`
--

DROP TABLE IF EXISTS `outputs_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `outputs_members` (
  `output_id` int NOT NULL,
  `member_id` int NOT NULL,
  PRIMARY KEY (`output_id`,`member_id`),
  KEY `outputs_members_Members_FK` (`member_id`),
  CONSTRAINT `outputs_members_Members_FK` FOREIGN KEY (`member_id`) REFERENCES `Members` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `outputs_members_Outputs_FK` FOREIGN KEY (`output_id`) REFERENCES `Outputs` (`output_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='联接表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outputs_members`
--

LOCK TABLES `outputs_members` WRITE;
/*!40000 ALTER TABLE `outputs_members` DISABLE KEYS */;
INSERT INTO `outputs_members` VALUES (1,1),(2,1),(1,2);
/*!40000 ALTER TABLE `outputs_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `outputsWithAuthorsAndSuffixes`
--

/*!50001 DROP VIEW IF EXISTS `outputsWithAuthorsAndSuffixes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `outputsWithAuthorsAndSuffixes` AS select `o`.`output_id` AS `output_id`,`o`.`title` AS `title`,`o`.`journal` AS `journal`,`o`.`time` AS `time`,`o`.`volumn&pages` AS `volumn&pages`,`o`.`abstract` AS `abstract`,`o`.`kind` AS `kind`,group_concat(distinct `m`.`name_english` order by `m`.`name_english` ASC separator ', ') AS `author_names`,group_concat(distinct `p`.`name_suffix` order by `p`.`name_suffix` ASC separator ', ') AS `name_suffix` from (((`Outputs` `o` left join `outputs_members` `om` on((`o`.`output_id` = `om`.`output_id`))) left join `Members` `m` on((`om`.`member_id` = `m`.`member_id`))) left join `Pictures` `p` on((`p`.`outputs_id` = `o`.`output_id`))) group by `o`.`output_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-14 20:53:43

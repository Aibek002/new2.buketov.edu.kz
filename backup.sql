DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `ref_article_id` int DEFAULT NULL,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `content_ru` mediumtext,
  `content_en` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  PRIMARY KEY (`id`),
  KEY `idx-article-ref_article_id` (`ref_article_id`),
  CONSTRAINT `fk-article-ref_article_id` FOREIGN KEY (`ref_article_id`) REFERENCES `ref_article` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `article` WRITE;

/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departament`
--

DROP TABLE IF EXISTS `departament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departament` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_kz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `information_kz` text,
  `information_ru` text,
  `information_en` text,
  `welcome_kz` text,
  `welcome_ru` text,
  `welcome_en` text,
  `faculty_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-departament-faculty_id` (`faculty_id`),
  CONSTRAINT `fk-departament-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departament`
--

LOCK TABLES `departament` WRITE;
/*!40000 ALTER TABLE `departament` DISABLE KEYS */;

/*!40000 ALTER TABLE `departament` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` text,
  `content_ru` text,
  `content_en` text,
  `year` int DEFAULT NULL,
  `month` int DEFAULT NULL,
  `day` int DEFAULT NULL,
  `date_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,NULL,NULL,'Event #1',NULL,NULL,'This is event content for event #1',2025,6,21,'2025-06-21 09:11:13'),(2,NULL,NULL,'Event #2',NULL,NULL,'This is event content for event #2',2025,6,20,'2025-06-20 09:11:13'),(3,NULL,NULL,'Event #3',NULL,NULL,'This is event content for event #3',2025,6,23,'2025-06-23 09:11:13'),(4,NULL,NULL,'Event #4',NULL,NULL,'This is event content for event #4',2025,6,24,'2025-06-24 09:11:13'),(5,NULL,NULL,'Event #5',NULL,NULL,'This is event content for event #5',2025,6,25,'2025-06-25 09:11:13'),(6,NULL,NULL,'Event #6',NULL,NULL,'This is event content for event #6',2025,6,26,'2025-06-26 09:11:13'),(7,NULL,NULL,'Event #7',NULL,NULL,'This is event content for event #7',2025,6,27,'2025-06-27 09:11:13'),(8,NULL,NULL,'Event #8',NULL,NULL,'This is event content for event #8',2025,6,28,'2025-06-28 09:11:13'),(9,NULL,NULL,'Event #9',NULL,NULL,'This is event content for event #9',2025,6,29,'2025-06-29 09:11:13'),(10,NULL,NULL,'Event #10',NULL,NULL,'This is event content for event #10',2025,6,30,'2025-06-30 09:11:13');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_kz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `information_kz` text,
  `information_ru` text,
  `information_en` text,
  `welcome_kz` text,
  `welcome_ru` text,
  `welcome_en` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faculty`
--

LOCK TABLES `faculty` WRITE;
/*!40000 ALTER TABLE `faculty` DISABLE KEYS */;

/*!40000 ALTER TABLE `faculty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `history_departament`
--

DROP TABLE IF EXISTS `history_departament`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_departament` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` text,
  `content_ru` text,
  `content_en` text,
  `departament_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-history_departament-departament_id` (`departament_id`),
  CONSTRAINT `fk-history_departament-departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history_departament`

-- Table structure for table `history_faculty`
--

DROP TABLE IF EXISTS `history_faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `history_faculty` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `content_ru` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `content_en` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `faculty_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-history_faculty-faculty_id` (`faculty_id`),
  CONSTRAINT `fk-history_faculty-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client 

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1749106846),('m250527_102126_create_ref_article_table',1749106847),('m250527_102141_create_ref_staff_table',1749106847),('m250527_102152_create_ref_social_table',1749106848),('m250527_102201_create_ref_photo_table',1749106848),('m250527_103307_create_faculty_table',1749106848),('m250527_113031_add_column_faculty_id_to_staff_table',1749106848),('m250528_044307_create_departament_table',1749106848),('m250528_044358_create_staff_table',1749106848),('m250528_052207_add_column_to_staff_table',1749106848),('m250528_060345_add_column_to_staff_table',1749106848),('m250529_112118_create_article_table',1749106849),('m250611_052500_create_history_faculty_table',1749620877),('m250612_043345_create_subject_table',1749704621),('m250612_043515_create_profession_table',1749704621),('m250612_044450_create_subject_to_profesion_table',1749704621),('m250612_094423_create_skill_level_table',1749721901),('m250612_094510_create_ref_type_profession_table',1749721901),('m250612_094924_create_profession_table',1749721901),('m250612_095850_create_subject_to_profession_table',1749722362),('m250613_073147_create_history_departament_table',1749800260),('m250616_060527_create_profession_college_table',1750054099),('m250621_063847_create_news_table',1750489266),('m250621_064522_create_events_table',1750489266),('m250621_085351_add_date_to_news_table',1750496087),('m250621_085605_add_date_to_news_table',1750496452),('m250622_083954_add_year_column_to_events_table',1750581792),('m250622_084605_add_date_created_column_to_events_table',1750582119);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` mediumtext,
  `content_ru` mediumtext,
  `content_en` mediumtext,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (2,'Buketov University QS WUR 2026 рейтингінде 901 + позициясын сақтап қалды','Buketov University сохранил свою позицию 901+ в рейтинге QS WUR 2026','Buketov University retains its 901+ position in the QS WUR 2026 ranking','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','2025-06-21 09:00:52'),(3,'ҚАЗАҚСТАН РЕСПУБЛИКАСЫ МЕМЛЕКЕТТІК РӘМІЗДЕР КҮНІ PHD ДОКТОРЛАРЫНА ДИПЛОМ ТАПСЫРЫЛДЫ','ВРУЧЕНИЕ ДИПЛОМОВ ДОКТОРАМ PHD В ДЕНЬ ГОСУДАРСТВЕННЫХ СИМВОЛОВ КАЗАХСТАНА','PRESENTATION OF DIPLOMAS TO DOCTORS OF PHD ON THE DAY OF STATE SYMBOLS OF KAZAKHSTAN','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','2025-06-21 09:00:52'),(4,'Болашақ педагогтерге арналған Upgrade-курс','Upgrade-курс для будущих педагогов','Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186 студентов выпускных курсов педагогических направлений. Цель программы – формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях. \nАктуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей – обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.\nЦель курса – подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).\n Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.\n','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','<p>Факультет дополнительного образования совместно с педагогическим факультетом Карагандинского университета имени академика Е.А.Букетова впервые организовали&nbsp;Upgrade-курс повышения квалификации на тему \"Инклюзивное образование: современные практики для педагогов\". В период 19-24 мая 2025 года обучилось 186&nbsp;студентов выпускных курсов педагогических направлений. Цель программы &ndash; формирование профессиональных компетенций, необходимых для реализации принципов инклюзивного образования в школах, лицеях, колледжах и других образовательных организациях.</p>\n<p>Актуальность курса обусловлена современными требованиями государственных образовательных стандартов, а также социальной задачей &ndash; обеспечить доступную образовательную среду для детей с особыми образовательными потребностями, включая обучающихся с инвалидностью. Сегодня педагог должен быть не только предметником, но и проводником принципов равенства и инклюзии в классе.</p>\n<p>Цель курса &ndash; подготовить будущих учителей предметных дисциплин к реализации инклюзивного образования в соответствии с профессиональным стандартом \"Педагог\" (приказ и.о. Министра просвещения РК от 15.12.2022 №500).</p>\n<p>Отзывы участников подтверждают, что курс стал важным шагом в профессиональном становлении, расширил представление о роли учителя в современном инклюзивном обществе и дал практические инструменты для работы с каждым учеником. Слушателям курса будут выданы сертификаты.</p>','2025-06-21 09:00:52');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profession`
--

DROP TABLE IF EXISTS `profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profession` (
  `special_code` text NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `name_kz` text,
  `name_ru` text,
  `name_en` text,
  `semi_passing_points` int DEFAULT NULL,
  `passing_points` int DEFAULT NULL,
  `skill_level_id` int DEFAULT NULL,
  `ref_type_profession_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-profession-skill_level_id` (`skill_level_id`),
  KEY `idx-profession-ref_type_profession_id` (`ref_type_profession_id`),
  CONSTRAINT `fk-profession-ref_type_profession_id` FOREIGN KEY (`ref_type_profession_id`) REFERENCES `ref_type_profession` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-profession-skill_level_id` FOREIGN KEY (`skill_level_id`) REFERENCES `skill_level` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profession`
--

LOCK TABLES `profession` WRITE;
/*!40000 ALTER TABLE `profession` DISABLE KEYS */;
INSERT INTO `profession` VALUES ('В005',1,'Дене шынықтыру мұғалімдерін даярлау','Подготовка учителей физической культуры','Physical Education Teacher Training',120,65,1,1),('В030',2,'Бейнелеу өнері','Изобразительное искусство ','Fine Arts',114,65,1,1),('В031',3,'Мода, дизайн','Мода, дизайн','Fashion and Design',122,65,1,1),('В033',4,'Дінтану және теология','Религия и теология','Religion and Theology',117,65,1,1),('В042',5,'Журналистика және репортерлік іс','Журналистика и репортерское дело','Journalism and Reporting',117,65,1,1),('В092',7,'Демалыс және бос уақытты ұйымдастыру','Досуг','Leisure Studies',116,65,1,1),('В001',8,'Педагогика және психология','Педагогика и психология','Pedagogy and psychology',78,65,1,1),('В002',9,'Мектепке дейінгі оқыту және тәрбиелеу','Дошкольное образование и воспитание','Preschool education and upbringing',77,65,1,1),('В003',10,'Бастауыш оқытудың педагогикасы мен әдістемесі','Педагогика и методика начального образования','Pedagogy and methodology of primary education',89,65,1,1),('B019',11,'Әлеуметтік педагогтарды даярлау','Подготовка социальных педагогов','Social Pedagogy',88,65,1,1),('В020',13,'Арнайы педагогика','Специальная педагогика','Special Pedagogy',84,65,1,1),('В041',14,'Психология','Психология','Psychology',102,65,1,1),('B051',15,'Қоршаған орта','Окружающая среда','Environmental Studies',73,65,1,1),('В090',16,'Әлеуметтік жұмыс','Социальная работа','Social work',74,65,1,1),('B091',17,'Туризм','Туризм','Tourism',106,65,1,1),('В093',18,'Мейрамхана және қонақ үй бизнесі','Ресторанное дело и гостиничный бизнес','Restaurant and Hotel Business',102,65,1,1),('B018',19,'Шетел тілі мұғалімдерін даярлау','Подготовка учителей иностранного языка','Foreign Language Teacher Training',113,65,1,1),('B036',20,'Аударма ісі','Переводческое дело','Translation studies',119,65,1,1),('В040',23,'Саясаттану және азаматтану','Политология и граждановедение','Political Science and Civics',115,65,1,1),('B140',24,'Халықаралық қатынастар және дипломатия','Международные отношения и дипломатия','International Relations and Diplomacy',132,65,1,1),('B014',25,'География мұғалімдерін даярлау','Подготовка учителей географии','Geography Teacher Training',97,65,1,1),('B015',27,'Гуманитарлық пәндер мұғалімдерін даярлау','Подготовка учителей по гуманитарным предметам','Humanities Teacher Training',104,65,1,1),('B008',28,'Құқық және экономика негіздері мұғалімдерін даярлау','Подготовка учителей основы права и экономики','Law and Economics Basics Teacher Training',110,65,1,1),('B032',29,'Философия және этика','Философия и этика','Philosophy and Ethics',89,65,1,1),('B134',30,'Археология және этнология','Археология и этнология','Archaeology and Ethnology',93,65,1,1),('B034',31,'Тарих','История','History',105,65,1,1),('B049',32,'Құқық','Право','Law',125,65,1,1),('B038',33,'Социология','Социология','Sociology',104,65,1,1),('B044',34,'Менеджмент және басқару','Менеджмент и управление','Management and Administration',119,65,1,1),('B045',35,'Аудит және салық салу','Аудит и налогообложение','Audit and Taxation',113,65,1,1),('В046',36,'Қаржы, экономика, банк және сақтандыру ісі','Финансы, экономика, банковское и страховое дело','Finance, Economics, Banking and Insurance',113,65,1,1),('B047',37,'Маркетинг және жарнама','Маркетинг и реклама','Marketing and Advertising',115,65,1,1),('В052',38,'Жер туралы ғылымдар','Наука о земле','Earth Sciences',71,65,1,1),('В095',39,'Көлік қызметтері','Транспортные услуги','Transport Services',109,65,1,1),('В009',40,'Математика мұғалімдерін даярлау','Подготовка учителей математики','Mathematics Teacher Training',107,65,1,1),('В010',41,'Физика мұғалімдерін даярлау','Подготовка учителей физики','Physics Teacher Training',101,65,1,1),('В054',42,'Физика','Физика','Physics',69,65,1,1),('В055',43,'Математика және статистика','Математика и статистика','Mathematics and Statistics',99,65,1,1),('В056',44,'Механика','Механика','Mechanics',56,65,1,1),('В059',45,'Коммуникациялар және байланыс технологиялары','Коммуникации и коммуникационные технологии','Communications and Communication Technologies',69,65,1,1),('В062',46,'Электротехника және энергетика','Электротехника и энергетика','Electrical Engineering and Energy',60,65,1,1),('В063',47,'Электротехника және автоматтандыру','Электротехника и автоматизация','Electrical Engineering and Automation',62,65,1,1),('В064',48,'Механика және металдарды өңдеу','Механика и металлообработка','Mechanics and Metalworking',55,65,1,1),('В065',49,'Көлік техникасы және технологиялары','Транспортная техника и технологии','Transport Engineering and Technologies',55,65,1,1),('В094',50,'Санитариялық-эпидемиологиялық қауіпсіздік','Санитарно-профилактические мероприятия','Sanitary and Epidemiological Safety',67,65,1,1),('В011',51,'Информатика мұғалімдерін даярлау','Подготовка учителей информатики','Informatics Teacher Training',77,65,1,1),('В057',52,'Ақпараттық технологиялар','Информационные технологии','Information Technology',97,65,1,1),('В012',53,'Химия мұғалімдерін даярлау','Подготовка учителей химии','Chemistry Teacher Training',87,65,1,1),('В013',54,'Биология мұғалімдерін даярлау','Подготовка учителей биологии','Biology Teacher Training',88,65,1,1),('В050',55,'Биологиялық және аралас ғылымдар','Биологические и смежные науки','Biological and Related Sciences',80,65,1,1),('В053',56,'Химия','Химия','Chemistry',68,65,1,1),('В072',57,'Фармацевтикалық өндіріс технологиясы','Технология фармацевтического производства','Pharmaceutical Production Technology',69,65,1,1),('В016',58,'Қазақ тілі мен әдебиеті мұғалімдерін даярлау','Подготовка учителей казахского языка и литературы','Kazakh Language and Literature Teacher Training',111,65,1,1),('В037',59,'Филология','Филология','Philology',118,65,1,1),('В017',60,'Орыс тілі мен әдебиеті мұғалімдерін даярлау','Подготовка учителей русского языка и литературы','Russian Language and Literature Teacher Training',81,65,1,1),('В060',61,'Химиялық инженерия және процестер','Химическая инженерия и процессы','Chemical Engineering and Processes',76,65,1,1);
/*!40000 ALTER TABLE `profession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profession_college`
--

DROP TABLE IF EXISTS `profession_college`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profession_college` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_kz` text,
  `name_ru` text,
  `name_en` text,
  `profession_id` int DEFAULT NULL,
  `special_code` text,
  PRIMARY KEY (`id`),
  KEY `idx-profession_college-profession_id` (`profession_id`),
  CONSTRAINT `fk-profession_college-profession_id` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2552 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profession_college`
--

LOCK TABLES `profession_college` WRITE;
/*!40000 ALTER TABLE `profession_college` DISABLE KEYS */;

/*!40000 ALTER TABLE `profession_college` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_article`
--

DROP TABLE IF EXISTS `ref_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_article`
--

LOCK TABLES `ref_article` WRITE;
/*!40000 ALTER TABLE `ref_article` DISABLE KEYS */;
INSERT INTO `ref_article` VALUES (1,'history-of-the-university'),(2,'mission-of-the-university'),(3,'university-in-the-ranking'),(4,'information-about-the-student-house'),(5,'development-program'),(6,'scientific-research-centers');
/*!40000 ALTER TABLE `ref_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_photo`
--

DROP TABLE IF EXISTS `ref_photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_photo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_photo`
--

LOCK TABLES `ref_photo` WRITE;
/*!40000 ALTER TABLE `ref_photo` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_social`
--

DROP TABLE IF EXISTS `ref_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_social` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_social`
--

LOCK TABLES `ref_social` WRITE;
/*!40000 ALTER TABLE `ref_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_staff`
--

DROP TABLE IF EXISTS `ref_staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_staff`
--

LOCK TABLES `ref_staff` WRITE;
/*!40000 ALTER TABLE `ref_staff` DISABLE KEYS */;
INSERT INTO `ref_staff` VALUES (1,'Rector'),(2,'Vice-Rector'),(3,'Dean'),(4,'Deputy-Dean'),(5,'Head-Of-Department'),(6,'Administrative-Services'),(7,'Board-Of-Directors'),(8,'Corporate-Secretary'),(9,'Internal-Audit-Service'),(10,'Anti-corruption-CS'),(11,'Board-Committee'),(12,'teacher');
/*!40000 ALTER TABLE `ref_staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ref_type_profession`
--

DROP TABLE IF EXISTS `ref_type_profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ref_type_profession` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_type_profession`
--

LOCK TABLES `ref_type_profession` WRITE;
/*!40000 ALTER TABLE `ref_type_profession` DISABLE KEYS */;
INSERT INTO `ref_type_profession` VALUES (1,'Full');
/*!40000 ALTER TABLE `ref_type_profession` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill_level`
--

DROP TABLE IF EXISTS `skill_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skill_level` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill_level`
--

LOCK TABLES `skill_level` WRITE;
/*!40000 ALTER TABLE `skill_level` DISABLE KEYS */;
INSERT INTO `skill_level` VALUES (1,'Bachelor');
/*!40000 ALTER TABLE `skill_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `staff` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ref_staff_id` int NOT NULL,
  `surname_kz` varchar(255) DEFAULT NULL,
  `surname_ru` varchar(255) DEFAULT NULL,
  `surname_en` varchar(255) DEFAULT NULL,
  `name_kz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  `patronymic_kz` varchar(255) DEFAULT NULL,
  `patronymic_ru` varchar(255) DEFAULT NULL,
  `patronymic_en` varchar(255) DEFAULT NULL,
  `information_kz` text,
  `information_ru` text,
  `information_en` text,
  `email` text,
  `phone` text,
  `faculty_id` int DEFAULT NULL,
  `departament_id` int DEFAULT NULL,
  `welcome_kz` text,
  `welcome_ru` text,
  `welcome_en` text,
  `job_title_kz` text,
  `job_title_ru` text,
  `job_title_en` text,
  PRIMARY KEY (`id`),
  KEY `idx-staff-ref_staff_id` (`ref_staff_id`),
  KEY `idx-staff-faculty_id` (`faculty_id`),
  KEY `idx-staff-departament_id` (`departament_id`),
  CONSTRAINT `fk-staff-departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-staff-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-staff-ref_staff_id` FOREIGN KEY (`ref_staff_id`) REFERENCES `ref_staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_kz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject`
--

LOCK TABLES `subject` WRITE;
/*!40000 ALTER TABLE `subject` DISABLE KEYS */;
INSERT INTO `subject` VALUES (1,'Шығармашылық','Творческий','Creative'),(2,'География','География','Geography'),(3,'Иностранный язык','Иностранный язык','Foreign Language'),(4,'Всемирная история','Всемирная история','World History'),(5,'Основы права','Основы права','Fundamentals of Law'),(6,'Математика','Математика','Mathematics'),(7,'Физика','Физика','Physics'),(8,'Биология','Биология','Biology'),(9,'Информатика','Информатика','Informatics'),(10,'Химия','Химия','Chemistry'),(11,'Қазақ тілі','Казахский язык','Kazakh language'),(12,'Қазақ Әдебиеті','Казахская литература','Kazakh literature'),(13,'Орыс Әдебиеті','Русская  литература','Russian literature'),(14,'Орыс тілі','Русская язык','Russian language');
/*!40000 ALTER TABLE `subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_to_profession`
--

DROP TABLE IF EXISTS `subject_to_profession`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_to_profession` (
  `id` int NOT NULL AUTO_INCREMENT,
  `subject_id` int DEFAULT NULL,
  `profession_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx-subject_to_profession-subject_id` (`subject_id`),
  KEY `idx-subject_to_profession-profession_id` (`profession_id`),
  CONSTRAINT `fk-subject_to_profession-profession_id` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-subject_to_profession-subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_to_profession`
--

LOCK TABLES `subject_to_profession` WRITE;
/*!40000 ALTER TABLE `subject_to_profession` DISABLE KEYS */;
INSERT INTO `subject_to_profession` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(7,1,7),(8,2,8),(9,8,8),(10,2,9),(11,8,9),(12,2,10),(14,2,11),(15,8,11),(18,2,13),(19,8,13),(20,2,14),(21,8,14),(22,2,15),(23,8,15),(24,2,16),(25,8,16),(26,2,17),(27,3,17),(28,2,18),(29,3,18),(30,3,19),(31,4,19),(32,4,20),(33,3,20),(38,3,23),(39,4,23),(40,3,24),(41,4,24),(42,2,25),(43,4,25),(46,2,27),(47,4,27),(48,2,28),(49,4,28),(50,2,29),(51,4,29),(52,2,30),(53,4,30),(54,2,31),(55,4,31),(56,5,32),(57,4,32),(58,5,33),(59,4,33),(60,5,34),(61,4,34),(62,5,35),(63,4,35),(64,2,36),(65,6,36),(66,2,37),(67,6,37),(68,2,38),(69,6,38),(70,2,39),(71,6,39),(72,2,40),(73,6,40),(74,2,41),(75,6,41),(76,2,42),(77,6,42),(78,2,43),(79,6,43),(80,2,44),(81,6,44),(82,2,45),(83,6,45),(84,2,46),(85,6,46),(86,2,47),(87,6,47),(88,2,48),(89,6,48),(90,2,49),(91,6,49),(92,7,50),(93,6,50),(94,7,51),(95,6,51),(96,7,52),(97,6,52),(98,7,53),(99,6,53),(100,7,54),(101,6,54),(102,7,55),(103,6,55),(104,7,56),(105,6,56),(106,7,57),(107,6,57),(108,7,58),(109,6,58),(110,7,59),(111,6,59),(112,7,60),(113,6,60),(114,7,61),(115,6,61);
/*!40000 ALTER TABLE `subject_to_profession` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-26 13:54:03

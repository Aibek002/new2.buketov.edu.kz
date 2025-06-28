-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Июн 18 2025 г., 13:05
-- Версия сервера: 8.0.42
-- Версия PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_buketov_edu_kz`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

-- --------------------------------------------------------

--
-- Структура таблицы `history_departament`
--

CREATE TABLE `history_departament` (
  `id` int NOT NULL,
  `title_kz` text,
  `title_ru` text,
  `title_en` text,
  `content_kz` text,
  `content_ru` text,
  `content_en` text,
  `departament_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `history_departament`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1749106846),
('m250527_102126_create_ref_article_table', 1749106847),
('m250527_102141_create_ref_staff_table', 1749106847),
('m250527_102152_create_ref_social_table', 1749106848),
('m250527_102201_create_ref_photo_table', 1749106848),
('m250527_103307_create_faculty_table', 1749106848),
('m250527_113031_add_column_faculty_id_to_staff_table', 1749106848),
('m250528_044307_create_departament_table', 1749106848),
('m250528_044358_create_staff_table', 1749106848),
('m250528_052207_add_column_to_staff_table', 1749106848),
('m250528_060345_add_column_to_staff_table', 1749106848),
('m250529_112118_create_article_table', 1749106849),
('m250611_052500_create_history_faculty_table', 1749620877),
('m250612_043345_create_subject_table', 1749704621),
('m250612_043515_create_profession_table', 1749704621),
('m250612_044450_create_subject_to_profesion_table', 1749704621),
('m250612_094423_create_skill_level_table', 1749721901),
('m250612_094510_create_ref_type_profession_table', 1749721901),
('m250612_094924_create_profession_table', 1749721901),
('m250612_095850_create_subject_to_profession_table', 1749722362),
('m250613_073147_create_history_departament_table', 1749800260),
('m250616_060527_create_profession_college_table', 1750054099);

-- --------------------------------------------------------

--
-- Структура таблицы `profession`
--

CREATE TABLE `profession` (
  `special_code` text NOT NULL,
  `id` int NOT NULL,
  `name_kz` text,
  `name_ru` text,
  `name_en` text,
  `semi_passing_points` int DEFAULT NULL,
  `passing_points` int DEFAULT NULL,
  `skill_level_id` int DEFAULT NULL,
  `ref_type_profession_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `profession`
--

INSERT INTO `profession` (`special_code`, `id`, `name_kz`, `name_ru`, `name_en`, `semi_passing_points`, `passing_points`, `skill_level_id`, `ref_type_profession_id`) VALUES
('В005', 1, 'Дене шынықтыру мұғалімдерін даярлау', 'Подготовка учителей физической культуры', 'Physical Education Teacher Training', 120, 65, 1, 1),
('В030', 2, 'Бейнелеу өнері', 'Изобразительное искусство ', 'Fine Arts', 114, 65, 1, 1),
('В031', 3, 'Мода, дизайн', 'Мода, дизайн', 'Fashion and Design', 122, 65, 1, 1),
('В033', 4, 'Дінтану және теология', 'Религия и теология', 'Religion and Theology', 117, 65, 1, 1),
('В042', 5, 'Журналистика және репортерлік іс', 'Журналистика и репортерское дело', 'Journalism and Reporting', 117, 65, 1, 1),
('В092', 7, 'Демалыс және бос уақытты ұйымдастыру', 'Досуг', 'Leisure Studies', 116, 65, 1, 1),
('В001', 8, 'Педагогика және психология', 'Педагогика и психология', 'Pedagogy and psychology', 78, 65, 1, 1),
('В002', 9, 'Мектепке дейінгі оқыту және тәрбиелеу', 'Дошкольное образование и воспитание', 'Preschool education and upbringing', 77, 65, 1, 1),
('В003', 10, 'Бастауыш оқытудың педагогикасы мен әдістемесі', 'Педагогика и методика начального образования', 'Pedagogy and methodology of primary education', 89, 65, 1, 1),
('B019', 11, 'Әлеуметтік педагогтарды даярлау', 'Подготовка социальных педагогов', 'Social Pedagogy', 88, 65, 1, 1),
('В020', 13, 'Арнайы педагогика', 'Специальная педагогика', 'Special Pedagogy', 84, 65, 1, 1),
('В041', 14, 'Психология', 'Психология', 'Psychology', 102, 65, 1, 1),
('B051', 15, 'Қоршаған орта', 'Окружающая среда', 'Environmental Studies', 73, 65, 1, 1),
('В090', 16, 'Әлеуметтік жұмыс', 'Социальная работа', 'Social work', 74, 65, 1, 1),
('B091', 17, 'Туризм', 'Туризм', 'Tourism', 106, 65, 1, 1),
('В093', 18, 'Мейрамхана және қонақ үй бизнесі', 'Ресторанное дело и гостиничный бизнес', 'Restaurant and Hotel Business', 102, 65, 1, 1),
('B018', 19, 'Шетел тілі мұғалімдерін даярлау', 'Подготовка учителей иностранного языка', 'Foreign Language Teacher Training', 113, 65, 1, 1),
('B036', 20, 'Аударма ісі', 'Переводческое дело', 'Translation studies', 119, 65, 1, 1),
('В040', 23, 'Саясаттану және азаматтану', 'Политология и граждановедение', 'Political Science and Civics', 115, 65, 1, 1),
('B140', 24, 'Халықаралық қатынастар және дипломатия', 'Международные отношения и дипломатия', 'International Relations and Diplomacy', 132, 65, 1, 1),
('B014', 25, 'География мұғалімдерін даярлау', 'Подготовка учителей географии', 'Geography Teacher Training', 97, 65, 1, 1),
('B015', 27, 'Гуманитарлық пәндер мұғалімдерін даярлау', 'Подготовка учителей по гуманитарным предметам', 'Humanities Teacher Training', 104, 65, 1, 1),
('B008', 28, 'Құқық және экономика негіздері мұғалімдерін даярлау', 'Подготовка учителей основы права и экономики', 'Law and Economics Basics Teacher Training', 110, 65, 1, 1),
('B032', 29, 'Философия және этика', 'Философия и этика', 'Philosophy and Ethics', 89, 65, 1, 1),
('B134', 30, 'Археология және этнология', 'Археология и этнология', 'Archaeology and Ethnology', 93, 65, 1, 1),
('B034', 31, 'Тарих', 'История', 'History', 105, 65, 1, 1),
('B049', 32, 'Құқық', 'Право', 'Law', 125, 65, 1, 1),
('B038', 33, 'Социология', 'Социология', 'Sociology', 104, 65, 1, 1),
('B044', 34, 'Менеджмент және басқару', 'Менеджмент и управление', 'Management and Administration', 119, 65, 1, 1),
('B045', 35, 'Аудит және салық салу', 'Аудит и налогообложение', 'Audit and Taxation', 113, 65, 1, 1),
('В046', 36, 'Қаржы, экономика, банк және сақтандыру ісі', 'Финансы, экономика, банковское и страховое дело', 'Finance, Economics, Banking and Insurance', 113, 65, 1, 1),
('B047', 37, 'Маркетинг және жарнама', 'Маркетинг и реклама', 'Marketing and Advertising', 115, 65, 1, 1),
('В052', 38, 'Жер туралы ғылымдар', 'Наука о земле', 'Earth Sciences', 71, 65, 1, 1),
('В095', 39, 'Көлік қызметтері', 'Транспортные услуги', 'Transport Services', 109, 65, 1, 1),
('В009', 40, 'Математика мұғалімдерін даярлау', 'Подготовка учителей математики', 'Mathematics Teacher Training', 107, 65, 1, 1),
('В010', 41, 'Физика мұғалімдерін даярлау', 'Подготовка учителей физики', 'Physics Teacher Training', 101, 65, 1, 1),
('В054', 42, 'Физика', 'Физика', 'Physics', 69, 65, 1, 1),
('В055', 43, 'Математика және статистика', 'Математика и статистика', 'Mathematics and Statistics', 99, 65, 1, 1),
('В056', 44, 'Механика', 'Механика', 'Mechanics', 56, 65, 1, 1),
('В059', 45, 'Коммуникациялар және байланыс технологиялары', 'Коммуникации и коммуникационные технологии', 'Communications and Communication Technologies', 69, 65, 1, 1),
('В062', 46, 'Электротехника және энергетика', 'Электротехника и энергетика', 'Electrical Engineering and Energy', 60, 65, 1, 1),
('В063', 47, 'Электротехника және автоматтандыру', 'Электротехника и автоматизация', 'Electrical Engineering and Automation', 62, 65, 1, 1),
('В064', 48, 'Механика және металдарды өңдеу', 'Механика и металлообработка', 'Mechanics and Metalworking', 55, 65, 1, 1),
('В065', 49, 'Көлік техникасы және технологиялары', 'Транспортная техника и технологии', 'Transport Engineering and Technologies', 55, 65, 1, 1),
('В094', 50, 'Санитариялық-эпидемиологиялық қауіпсіздік', 'Санитарно-профилактические мероприятия', 'Sanitary and Epidemiological Safety', 67, 65, 1, 1),
('В011', 51, 'Информатика мұғалімдерін даярлау', 'Подготовка учителей информатики', 'Informatics Teacher Training', 77, 65, 1, 1),
('В057', 52, 'Ақпараттық технологиялар', 'Информационные технологии', 'Information Technology', 97, 65, 1, 1),
('В012', 53, 'Химия мұғалімдерін даярлау', 'Подготовка учителей химии', 'Chemistry Teacher Training', 87, 65, 1, 1),
('В013', 54, 'Биология мұғалімдерін даярлау', 'Подготовка учителей биологии', 'Biology Teacher Training', 88, 65, 1, 1),
('В050', 55, 'Биологиялық және аралас ғылымдар', 'Биологические и смежные науки', 'Biological and Related Sciences', 80, 65, 1, 1),
('В053', 56, 'Химия', 'Химия', 'Chemistry', 68, 65, 1, 1),
('В072', 57, 'Фармацевтикалық өндіріс технологиясы', 'Технология фармацевтического производства', 'Pharmaceutical Production Technology', 69, 65, 1, 1),
('В016', 58, 'Қазақ тілі мен әдебиеті мұғалімдерін даярлау', 'Подготовка учителей казахского языка и литературы', 'Kazakh Language and Literature Teacher Training', 111, 65, 1, 1),
('В037', 59, 'Филология', 'Филология', 'Philology', 118, 65, 1, 1),
('В017', 60, 'Орыс тілі мен әдебиеті мұғалімдерін даярлау', 'Подготовка учителей русского языка и литературы', 'Russian Language and Literature Teacher Training', 81, 65, 1, 1),
('В060', 61, 'Химиялық инженерия және процестер', 'Химическая инженерия и процессы', 'Chemical Engineering and Processes', 76, 65, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `profession_college`
--

CREATE TABLE `profession_college` (
  `id` int NOT NULL,
  `name_kz` text,
  `name_ru` text,
  `name_en` text,
  `profession_id` int DEFAULT NULL,
  `special_code` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `profession_college`
--

INSERT INTO `profession_college` (`id`, `name_kz`, `name_ru`, `name_en`, `profession_id`, `special_code`) VALUES
(306, 'Мектепке дейінгі тәрбие мен оқытудың қолданбалы бакалавры', 'Прикладной бакалавр дошкольного воспитания и обучения', 'Applied Bachelor of Preschool Education and Training', 1, '5AB01120101'),
(307, 'Қолданбалы логопедия бакалавры', 'Прикладной бакалавр логопедии', 'Applied Bachelor of Speech Therapy', 1, '5AB01130101'),
(308, 'Мектепке дейінгі ұйымдардағы Логопед', 'Логопед в дошкольных организациях', 'Speech therapist in preschool organizations', 1, '010107 3'),
(309, 'Мектепке дейінгі ұйымдардағы логопед қолданбалы бакалавры', 'Прикладной бакалавр логопед в дошкольных организациях', 'Applied Bachelor\Эs degree in Speech therapy in preschool organizations', 1, '010108 4'),
(310, 'Арнайы (түзету) интернат ұйымының тәрбиешісі', 'Воспитатель специальной (коррекционной) интернатной организации', 'Educator of a special (correctional) boarding school', 1, '4S01130101'),
(311, 'Білім беру ұйымының тәрбиешісі', 'Воспитатель организации образования', 'Educator of the educational organization', 1, '4S01130102'),
(312, 'Тәрбиеші ана (патронат тәрбиеші)', 'Мать-воспитательница (патронатный воспитатель)', 'Foster mother (foster carer)', 1, '4S01130103'),
(313, 'Қосымша білім беру педагогы', 'Педагог дополнительного образования', 'Teacher of additional education', 1, '010201 3'),
(314, 'Педагог-ұйымдастырушы', 'Педагог-организатор', 'Teacher-organizer', 1, '010202 3'),
(315, 'Білім беру ұйымының тәрбиешісі', 'Воспитатель организации образования', 'Educator of the educational organization', 1, '010203 3');


-- Структура таблицы `ref_article`
--

CREATE TABLE `ref_article` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ref_article`
--

INSERT INTO `ref_article` (`id`, `type`) VALUES
(1, 'history-of-the-university'),
(2, 'mission-of-the-university'),
(3, 'university-in-the-ranking'),
(4, 'information-about-the-student-house'),
(5, 'development-program'),
(6, 'scientific-research-centers');

-- --------------------------------------------------------

--
-- Структура таблицы `ref_photo`
--

CREATE TABLE `ref_photo` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ref_social`
--

CREATE TABLE `ref_social` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ref_staff`
--

CREATE TABLE `ref_staff` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ref_staff`
--

INSERT INTO `ref_staff` (`id`, `type`) VALUES
(1, 'Rector'),
(2, 'Vice-Rector'),
(3, 'Dean'),
(4, 'Deputy-Dean'),
(5, 'Head-Of-Department'),
(6, 'Administrative-Services'),
(7, 'Board-Of-Directors'),
(8, 'Corporate-Secretary'),
(9, 'Internal-Audit-Service'),
(10, 'Anti-corruption-CS'),
(11, 'Board-Committee');

-- --------------------------------------------------------

--
-- Структура таблицы `ref_type_profession`
--

CREATE TABLE `ref_type_profession` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `ref_type_profession`
--

INSERT INTO `ref_type_profession` (`id`, `type`) VALUES
(1, 'Full');

-- --------------------------------------------------------

--
-- Структура таблицы `skill_level`
--

CREATE TABLE `skill_level` (
  `id` int NOT NULL,
  `type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `skill_level`
--

INSERT INTO `skill_level` (`id`, `type`) VALUES
(1, 'Bachelor');

-- --------------------------------------------------------

--
-- Структура таблицы `staff`
--

CREATE TABLE `staff` (
  `id` int NOT NULL,
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
  `job_title_en` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `staff`
--

INSERT INTO `staff` (`id`, `ref_staff_id`, `surname_kz`, `surname_ru`, `surname_en`, `name_kz`, `name_ru`, `name_en`, `patronymic_kz`, `patronymic_ru`, `patronymic_en`, `information_kz`, `information_ru`, `information_en`, `email`, `phone`, `faculty_id`, `departament_id`, `welcome_kz`, `welcome_ru`, `welcome_en`, `job_title_kz`, `job_title_ru`, `job_title_en`) VALUES
(1, 7, 'МАМЫТБЕКОВ', 'МАМЫТБЕКОВ', 'MAMYTBEKOV', 'ЕДІЛ', 'ЕДІЛ', 'EDIL', 'ҚҰЛАМҚАДЫРҰЛЫ', 'ҚҰЛАМҚАДЫРҰЛЫ', 'KULAMKADYRULY', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; background: white;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Ленинградский государственный университет им. А.А. Жданова (1987)<br>Факультет прикладной математики - процессов управления, квалификация &ndash; математик</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; font-family: Calibri, sans-serif;\">Учёная степень и звания:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Кандидат физико-математических наук, доцент, академик Национальной инженерной академии РК, академик Международной академии информатизации, член-корреспондент Казахстанской национальной академии естественных наук и Международной инженерной академии.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; font-family: Calibri, sans-serif;\">Награды:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Орден &laquo;Құрмет&raquo;, Почётная грамота РК, 28 медалей, лауреат премии имени академика Е.А. Букетова.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; font-family: Calibri, sans-serif;\">Профессиональный опыт:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Опыт преподавания в КазНУ им. аль-Фараби (1991&ndash;1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Руководящие должности в Администрации Президента РК (1997&ndash;2008)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Вице-министр индустрии и торговли РК (2008&ndash;2009)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Заместитель ответственного секретаря Комиссии Таможенного союза (2009&ndash;2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Руководство в структурах Министерства обороны РК (2013&ndash;2014)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Руководитель аппарата акима г. Астаны (2014&ndash;2015)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Руководящие должности в партии &laquo;Нур Отан&raquo; (2015&ndash;2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Депутат Сената Парламента РК (с 2017 г.), член Комитета по экономической политике, член Совета Сенаторов</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; font-family: Calibri, sans-serif;\">Дополнительно:</span></strong><span style=\"font-size: 12.0pt; line-height: 150%;\"><br>Представитель Правительства РК в совете директоров ряда национальных компаний и холдингов (2008&ndash;2009)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif; background: white;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif; background: white;\">А.А. Жданов Ленинград мемлекеттік университеті (1987)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif; background: white;\">Қолданбалы математика факультеті - басқару процестері, біліктілігі-математик</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Ғылыми дәрежесі мен атағы:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Физика-математика ғылымдарының кандидаты, доцент, ҚР Ұлттық инженерлік академиясының академигі, Халықаралық информатизация академиясының академигі, ҚР Ұлттық табиғи ғылымдар академиясының корреспондент-мүшесі және Халықаралық инженерлік академияның корреспондент-мүшесі.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Марапаттары:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">&laquo;Құрмет&raquo; ордені, ҚР Құрмет грамотасы, 28 медаль, академик Е.А.Бөкетов атындағы премия лауреаты.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Еңбек тәжірибесі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Әл-Фараби атындағы ҚазҰУ-да оқытушылық қызмет (1991&ndash;1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚР Президенті Әкімшілігінде жетекші лауазымдар (1997&ndash;2008)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚР Өнеркәсіп және сауда вице-министрі (2008&ndash;2009)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Кеден одағы комиссиясының жауапты хатшысының орынбасары (2009&ndash;2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚР Қорғаныс министрлігінің әскери-стратегиялық зерттеулер орталығының басшылығы (2013&ndash;2014)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Астана қаласының әкімінің аппараты жетекшісі (2014&ndash;2015)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">&laquo;Нұр Отан&raquo; партиясының Астана филиалындағы жетекші қызметтер (2015&ndash;2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚР Парламенті Сенаты депутаты, экономикалық саясат комитетінің мүшесі (2017 жылдан бері)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Қосымша:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚР Үкіметінің атынан ұлттық компаниялар мен холдингтердің директорлар кеңесінің мүшесі (2008&ndash;2009)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Leningrad State University named after A.A. Zhdanov (1987)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Faculty of Applied Mathematics - Management Processes, qualification &ndash; mathematician</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Academic degree and titles:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Candidate of Physico-Mathematical Sciences, Associate Professor, Academician of the National Engineering Academy of the Republic of Kazakhstan, Academician of the International Academy of Informatization, corresponding member of the Kazakhstan National Academy of Natural Sciences and the International Engineering Academy.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Awards:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">The Order of \"Kurmet\", the Certificate of Honor of the Republic of Kazakhstan, 28 medals, the laureate of the academician E.A. Buketov Prize.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Professional experience:</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Teaching experience at Al-Farabi Kazakh National University (1991-1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Senior positions in the Presidential Administration of the Republic of Kazakhstan (1997-2008)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Vice Minister of Industry and Trade of the Republic of Kazakhstan (2008-2009)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Deputy Executive Secretary of the Customs Union Commission (2009-2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Leadership in the structures of the Ministry of Defense of the Republic of Kazakhstan (2013-2014)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Chief of Staff of the Mayor of Astana (2014-2015)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Senior positions in the Nur Otan Party (2015-2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Deputy of the Senate of the Parliament of the Republic of Kazakhstan (since 2017), member of the Committee on Economic Policy, member of the Council Senators</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Additionally:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Representative of the Government of the Republic of Kazakhstan on the Board of Directors of a number of national companies and holdings (2008-2009)</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Председатель Совета директоров', 'Директорлар кеңесінің төрағасы', 'Chairman of the Board of Directors'),
(2, 7, 'ТОҚТЫБАЕВ', 'ТОКТЫБАЕВ', 'TOKTYBAEV', 'ЕРНАР', 'ЕРНАР', 'ERNAR', 'ДҮЙСЕНБЕКҰЛЫ', 'ДУЙСЕНБЕКОВИЧ', 'DUISSENBEKOVICH', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">ҚазҰЭУ (2004&ndash;2008) &ndash; қаржы мамандығы;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Тараз мемлекеттік университеті (2017&ndash;2019) &ndash; экономика магистрі;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Торайғыров университеті (2019&ndash;2021) &ndash; заң бакалавры.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">2008 жылдан бастап қаржы саласында түрлі лауазымдарда жұмыс істеді, қазіргі қызметі &mdash; ҚР Ғылым және жоғары білім министрлігінің Мемлекеттік сатып алу және активтер департаментінің директоры (2022 жылдан).</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Казахский университет экономики, финансов и международной торговли (2004&ndash;2008), финансист;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Таразский университет (2017&ndash;2019), магистр экономики;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Университет Торайгырова (2019&ndash;2021), бакалавр юриспруденции.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">С 2008 года работал в финансовой сфере, в настоящее время &mdash; директор Департамента государственных закупок и активов Министерства науки и высшего образования РК (с 2022 года).</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Kazakh University of Economics, Finance and International Trade (2004-2008), Financier;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Taraz University (2017-2019), Master of Economics;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">University of Toraigyrov (2019-2021), Bachelor of Law.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Since 2008, he has been working in the financial sector, currently Director of the Department of Public Procurement and Assets of the Ministry of Science and Higher Education of the Republic of Kazakhstan (since 2022).</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Жалғыз акционердің өкілі', 'Представитель Единственного акционера', 'Representative of the Sole Shareholder'),
(3, 7, 'ЖАЙЖУМАНОВА', 'ЖАЙЖУМАНОВА', 'ZHAIZHUMANOVA', 'ӘСЕМГҮЛ', 'АСЕМГУЛЬ', 'ASEMGUL', 'АБАЙҚЫЗЫ', 'АБАЕВНА', 'ABAYEVA', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Сәкен Сейфуллин атындағы Агротехникалық университеті (2000), экономика және АӨК менеджменті мамандығы бойынша экономист-менеджер.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">2000 жылдан бастап мемлекеттік және ұлттық компаниялар саласында әртүрлі лауазымдарда жұмыс істеді, қазіргі қызметі &mdash; ҚР Қаржы министрлігі Мемлекеттік мүлік және приватизация комитетінің мемлекеттік қатысумен жұмыс істейтін заңды тұлғалар басқармасының басшысы (2021 жылдан).</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Аграрный университет имени Сакена Сейфуллина (2000), экономист-менеджер по экономике и управлению в АПК.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">С 2000 года работал в органах, связанных с государственными и национальными компаниями, в настоящее время руководит Управлением по работе с негосударственными юридическими лицами с государственным участием Комитета государственного имущества и приватизации Министерства финансов РК (с 2021 года).</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Saken Seifullin Agrarian University (2000), economist and Manager of Economics and Management in agriculture.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Since 2000, he has worked in bodies related to state and national companies. Currently, he heads the Department for Work with Non-Governmental Legal Entities with State Participation of the State Property and Privatization Committee of the Ministry of Finance of the Republic of Kazakhstan (since 2021).</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Директорлар кеңесінің мүшесі', 'Член Совета директоров', 'Member of the Board of Directors'),
(4, 7, 'КҮМІСБЕКОВ', 'КУМЫСБЕКОВ', 'KUMYSBEKOV', 'АЙБЕК ', 'АЙБЕК', 'AYBEK', 'КҮМІСБЕКҰЛЫ', 'КУМЫСБЕКОВИЧ', 'KUMYSBEKOVICH', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қарағанды мемлекеттік университеті им. Е.А. Бөкетова &ndash; тарих және саясаттану бакалавры мен магистрі, Қарағанды экономикалық университеті &ndash; қаржы бакалавры.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Еңбек</span></strong><strong><span style=\"font-size: 12.0pt; line-height: 150%;\"> </span></strong><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">өтілі</span></strong><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">2008 жылдан бастап қоғамдық ұйымдар мен мемлекеттік басқару саласында әртүрлі лауазымдарда жұмыс істеді. Қазіргі</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> </span><span style=\"font-size: 12.0pt; line-height: 150%;\">уақытта</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> &ndash; </span><span style=\"font-size: 12.0pt; line-height: 150%;\">ТОО</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> &laquo;</span><span style=\"font-size: 12.0pt; line-height: 150%;\">В</span><span style=\"font-size: 12.0pt; line-height: 150%;\">2</span><span style=\"font-size: 12.0pt; line-height: 150%;\">С</span><span style=\"font-size: 12.0pt; line-height: 150%;\">&raquo; </span><span style=\"font-size: 12.0pt; line-height: 150%;\">директоры</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> </span><span style=\"font-size: 12.0pt; line-height: 150%;\">және</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> </span><span style=\"font-size: 12.0pt; line-height: 150%;\">негізін</span><span style=\"font-size: 12.0pt; line-height: 150%;\"> </span><span style=\"font-size: 12.0pt; line-height: 150%;\">қалаушы</span><span style=\"font-size: 12.0pt; line-height: 150%;\">.</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Карагандинский государственный университет им. Е.А. Букетова &mdash; бакалавр истории, магистр политических наук; Карагандинский экономический университет &mdash; бакалавр финансов.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">С 2008 года работал в общественных и государственных структурах. В настоящее время является директором и соучредителем ТОО &laquo;В2С&raquo;.</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Education LLP:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">E.A. Buketov Karaganda State University &mdash; Bachelor of History, Master of Political Sciences; Karaganda University of Economics &mdash; Bachelor of Finance.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Since 2008, he has worked in public and government structures. Currently, he is the director and co-founder of B2C LLP.</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Тәуелсіз директор', 'Независимый директор', 'Independent Director'),
(5, 7, 'ДИСЮПОВ', 'ДИСЮПОВ', 'DISYUPOV', 'БЕЙБІТ', 'БЕЙБІТ', 'BEIBIT', 'АМАНҰЛЫ', 'АМАНҰЛЫ', 'AMANULY', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">2005-2010 жж. Түркиядағы Мармара университеті &ndash; ағылшын тілі мұғалімі (бакалавр);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">2010-2012 жж. Алматыдағы Халықаралық бизнес университеті &ndash; ғылыми-педагогикалық менеджмент магистрі.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">2010 жылдан бастап Назарбаев Зияткерлік мектептерінде және білім беру саласында әртүрлі лауазымдарда жұмыс істеді. Соңғы жылдары Өзбекстандағы халықаралық мектептің орта мектебінің директоры болды.</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">2005-2010 гг. Университет Мармара, Турция &ndash; бакалавр по специальности учитель английского языка;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">2010-2012 гг. Университет международного бизнеса, Алматы &ndash; магистр менеджмента научно-педагогического направления.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">С 2010 года работал в Назарбаев Интеллектуальных школах и в сфере образования. В последние годы был директором средней школы международной школы в Ташкенте.</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; background: white;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%; background: white;\">2005-2010 Marmara University, Turkey &ndash; Bachelor`s degree in English Teacher;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%; background: white;\">2010-2012 University of International Business, Almaty &ndash; Master of Management in scientific and pedagogical field.</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%; font-family: Calibri, sans-serif;\">Work Experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Since 2010, worked in Nazarbayev Intellectual Schools and education sector. Recently served as Director of a secondary school at an international school in Tashkent, Uzbekistan.</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Тәуелсіз директор', 'Независимый директор', 'Independent Director'),
(6, 7, 'ДУЛАТБЕКОВ', 'ДУЛАТБЕКОВ', 'DULATBEKOV', 'НҰРЛАН', 'НУРЛАН', 'NURLAN', 'ОРЫНБАСАРҰЛЫ', 'ОРЫНБАСАРОВИЧ', 'ORYNBASAROVICH', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі</span></strong><strong><span style=\"font-family: Calibri, sans-serif;\">:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қарағанды мемлекеттік университеті (1984)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Аспирантура, Ахмет Байтұрсынов стипендиясы (1989-1992)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Құқық ғылымдарының кандидаты (1993), докторы (2003)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Профессор (2004)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Халықаралық кадрлар және әлеуметтік ғылымдар академияларының корреспондент-мүшесі</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қазақстан Ұлттық ғылым академиясының корреспондент-мүшесі (2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қарағанды мемлекеттік университетінде оқытушы, кафедра меңгерушісі (1986-1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">&laquo;Болашақ&raquo; университетінің ректоры (1996-2013)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қарағанды университетінің ректоры (2020 жылдан бастап)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Сайланған лауазымдар:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қарағанды облыстық маслихаты депутаты, комиссия төрағасы, маслихат хатшысы (2007-2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Мәжіліс депутаты, заңнама комитетінің мүшесі (2016-2020)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Карагандинский университет (1984)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Аспирантура, стипендия Ахмета Байтурсынова (1989-1992)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Кандидат (1993) и доктор юридических наук (2003)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Профессор (2004)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Член-корреспондент международных и национальных академий (с 2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Преподаватель и заведующий кафедрой Карагандинского университета (1986-1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Ректор университета &laquo;Болашак&raquo; (1996-2013)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Ректор Карагандинского университета им. Е.А.Букетова (с 2020)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Выборные должности:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Депутат маслихата, председатель комиссии, секретарь (2007-2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Депутат Мажилиса, член комитета (2016-2020)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Karaganda University (1984)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Postgraduate studies, Akhmet Baitursynov Scholarship (1989-1992)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">PhD (1993) and Doctor of Law (2003)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Professor (2004)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Corresponding member of international and national academies (since 2012)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Lecturer and Head of the Department of Karaganda University (1986-1996)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Rector of Bolashak University (1996-2013)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Rector of E.A.Buketov Karaganda University (since 2020)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Elected positions:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Deputy of the Maslikhat, Chairman of the commission, Secretary (2007-2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Deputy of the Mazhilis, member of the Committee (2016-2020)</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Директорлар кеңесінің мүшесі', 'Член Совета директоров', 'Member of the Board of Directors');
INSERT INTO `staff` (`id`, `ref_staff_id`, `surname_kz`, `surname_ru`, `surname_en`, `name_kz`, `name_ru`, `name_en`, `patronymic_kz`, `patronymic_ru`, `patronymic_en`, `information_kz`, `information_ru`, `information_en`, `email`, `phone`, `faculty_id`, `departament_id`, `welcome_kz`, `welcome_ru`, `welcome_en`, `job_title_kz`, `job_title_ru`, `job_title_en`) VALUES
(7, 8, 'КИЗДАРБЕКОВА', 'КИЗДАРБЕКОВА', 'KIZDARBEKOVA', 'АНТОНИНА', 'АНТОНИНА', 'ANTONINA', 'СЕРИКОВНА', 'СЕРИКОВНА', 'SERIKOVNA', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А. Бөкетов атындағы Қарағанды ​​мемлекеттік университеті, үздік дипломмен (1997 ж.);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Мамандығы: &laquo;Халықаралық құқық&raquo;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">ҚазГЗУ жеке құқық ғылыми-зерттеу институты (Алматы), өтініш (2003-2006);<br>&nbsp;Заң ғылымдарының кандидаты (12.00.03)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А. Бөкетов атындағы Қарағанды ​​мемлекеттік университеті, үздік дипломмен (2020)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Экономика және бизнес бакалавры &laquo;Мемлекеттік аудит&raquo; ҚБ</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Кәсіби медиатор (2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Сертификатталған корпоративтік хатшы (2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А.Бөкетов атындағы ҚМУ Азаматтық құқық кафедрасының оқытушысы&raquo; (1997-2002);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А.Бөкетов атындағы ҚМУ азаматтық құқық кафедрасының аға оқытушысы &raquo;(2002-2006);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А.Бөкетов атындағы ҚМУ азаматтық құқық кафедрасының доценті (2006-2008);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А.Бөкетов атындағы ҚМУ Азаматтық құқық кафедрасының меңгерушісі (2008-2019);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Е.А. Бөкетов атындағы ҚарМУ заң факультетінің деканы&raquo; (2019-2020);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Корпоративтік хатшы (08.2020 ж. бастап)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Карагандинский государственный университет им.Е.А.Букетова, с отличием (1997)Специальность: &laquo;Международное право&raquo;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">НИИ частного права КазГЮУ (г.Алматы), соискательство (2003-2006)Кандидат юридических наук (12.00.03);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Карагандинский государственный университет им.Е.А.Букетова, с отличием (2020)Бакалавр экономики и бизнеса по ОП &laquo;Государственный аудит&raquo;</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Профессиональный медиатор (2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Сертифицированный корпоративный секретарь (2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">преподаватель кафедры гражданского права КарГУим.Е.А.Букетова&raquo; (1997-2002);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">старший преподаватель кафедры гражданского права КарГУим.Е.А.Букетова&raquo; (2002-2006);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">доцент кафедры гражданского права КарГУим.Е.А.Букетова&raquo; (2006-2008);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">заведующая кафедрой гражданского права КарГУим.Е.А.Букетова&raquo; (2008-2019);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">декан юридического факультета КарГУим.Е.А.Букетова&raquo; (2019-2020)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Корпоративный секретарь (с 08.2020)</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Karaganda State University named after E.A.Buketov, with honors (1997)Specialty: \"International Law\"</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">KazGUU Research Institute of Private Law (Almaty), candidate (2003-2006)Candidate of Law (12.00.03);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Karaganda State University named after E.A.Buketov, with honors (2020)Bachelor of Economics and Business Degree in State Audit</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Professional Mediator (2016)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Certified Corporate Secretary (2017)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 150%;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">lecturer of the Department of Civil Law KarGUim.E.A.Buketova\" (1997-2002);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Senior lecturer of the Department of Civil Law of KarGUim.E.A.Buketova (2002-2006);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Associate Professor of the Department of Civil Law of KarGUim.E.A.Buketova (2006-2008);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Head of the Department of Civil Law of KarGUim E.A.Buketova (2008-2019);</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Dean of the Faculty of Law of KarGUim E.A.Buketova (2019-2020)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 150%;\">Corporate Secretary (from 08.2020)</span></p>', 'kizdarbekovaa@mail.ru, kizdarbekovaas@ksu.kz', '+77022758762, +77212 312244', NULL, NULL, NULL, NULL, NULL, 'Корпоративтік хатшы', 'Корпоративный секретарь', 'Corporate Secretary'),
(8, 10, 'ОЛЕЙНИК', 'ОЛЕЙНИК', 'OLEINIK ', 'ВАСИЛИЙ', 'ВАСИЛИЙ', 'VASILY', 'ИВАНОВИЧ', 'ИВАНОВИЧ', 'IVANOVICH', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Харьков құқық институты, заңгер (1980)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қосымша курстар: жобаларды басқару, корпоративтік басқару және ішкі бақылау (2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қазіргі уақытта Қарағанды университетінде Антикоррупциялық комплаенс қызметі мен Құқық бөлімін басқарады</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Қазақстан Парламенті Мәжілісінің депутаты (2016-2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Прокуратурада түрлі лауазымдарда 1980 жылдан бастап жұмыс істеген</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Харьковский юридический институт, юрист (1980)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Дополнительное обучение по управлению проектами, корпоративному управлению и внутреннему контролю (2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Руководитель Антикоррупционной комплаенс-службы и Юридического управления Карагандинского университета (с 2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Депутат Мажилиса Парламента РК (2016-2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Работа в прокуратуре и следственных органах с 1980 года</span></p>', '<p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Kharkiv Law Institute, Lawyer (1980)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Additional training in project management, corporate governance and internal control (2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><strong><span style=\"font-family: Calibri, sans-serif;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Head of the Anti-Corruption Compliance Service and Legal Department of Karaganda University (since 2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">Deputy of the Mazhilis of the Parliament of the Republic of Kazakhstan (2016-2021)</span></p>\r\n    <p style=\"margin: 0cm 0cm 3pt; text-indent: 35.45pt; line-height: 150%; font-size: 12pt; font-family: Calibri, serif;\"><span style=\"font-family: Calibri, sans-serif;\">He has worked in the Prosecutor`s Office and investigative bodies since 1980</span></p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Сыбайлас жемқорлыққа қарсы комплаенс-қызметінің басшысы', 'Руководитель Антикоррупционной комплаенс-службы', 'Head of the Anti-Corruption Compliance Service'),
(15, 11, 'Күмісбеков', 'Кумысбеков', 'Kumysbekov', 'Айбек', 'Айбек', 'Aybek', 'Күмісбекұлы', 'Кумысбекович', 'Kumysbekovich', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Комитет төрағасы, тәуелсіз директор', 'Председатель комитета, независимый директор', 'Chairman of the Committee, Independent Director'),
(16, 11, 'Дисюпов', 'Дисюпов', 'Disyupov', 'Бейбіт', 'Бейбут', 'Beibut', 'Аманұлы', 'Аманович', 'Amanovich', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Комитет мүшесі, тәуелсіз директор', 'Член комитета, независимый директор', 'Member of the Committee, Independent Director'),
(17, 11, 'Дулатбеков', 'Дулатбеков', 'Dulatbekov', 'Нұрлан', 'Нурлан', 'Nurlan', 'Орынбасарұлы', 'Орынбасарович', 'Orynbasarovich', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Комитет мүшесі, Директорлар кеңесінің мүшесі, Басқарма Төрағасы-Ректор', 'Член комитета, член Совета директоров, Председатель Правления-Ректор', 'Member of the Committee, Member of the Board of Directors, Chairman of the Management Board-Rector'),
(18, 9, 'Перов', 'Перов', 'Perov', 'Александр', 'Александр', 'Alexander', 'Михайлович', 'Михайлович', 'Mikhailovich', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Білімі</span></strong><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">1979&ndash;1984 </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">жж</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">. </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">ҚарМУ</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">, </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">экономикалық</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\"> </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">факультет</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">, &laquo;</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Қаржы</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\"> </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">және</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\"> </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">несие</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">&raquo; </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">мамандығы</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2000&ndash;2003 жж. ҚарМУ, заң факультеті, &laquo;Заңтану&raquo; мамандығы</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2011&ndash;2012 жж. Инновациялық Еуразия Университеті, бизнес әкімшілігі магистрі</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">1978 жылдан бастап еңбек тәжірибесі бар. Әртүрлі лауазымдарда жұмыс істеді: инженер, экономист, бас маман, қаржы директоры. 2006 жылдан бері ТОО &laquo;ПАРТНЕР&raquo; аудиторлық топтың қаржы директоры.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Қосымша ақпарат:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2</span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">000 </span><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">жылдан бастап кәсіпкерлік пен қаржы саласындағы сараптамалық кеңестер мен қоғамдық ұйымдардың мүшесі, аймақтық деңгейде жетекшілік және консультативтік қызметтер атқарды.</span></p>', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">1979&ndash;1984 гг. КарГУ, экономический факультет, специальность &laquo;Финансы и кредит&raquo;</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2000&ndash;2003 гг. КарГУ, юридический факультет, специальность &laquo;Юриспруденция&raquo;</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2011&ndash;2012 гг. Инновационный Евразийский Университет, магистр делового администрирования</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Трудовой стаж:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Опыт работы с 1978 года. Занимал должности инженера, экономиста, главного специалиста, финансового директора. С 2006 года &mdash; финансовый директор ТОО &laquo;Аудиторская группа &laquo;ПАРТНЕР&raquo;.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Дополнительная информация:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">С 2000 года член экспертных советов и общественных организаций в сфере предпринимательства и финансов, занимал руководящие и консультативные позиции на региональном уровне.</span></p>', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">1979-1984 KarSU, Faculty of Economics, specialty \"Finance and Credit\"</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2000-2003 KarSU, Faculty of Law, specialty \"Jurisprudence\"</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">2011-2012 Innovative Eurasian University, Master of Business Administration</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Work experience since 1978. He held the positions of engineer, economist, chief specialist, and finance director. Since 2006, he has been the Financial Director of PARTNER Audit Group LLP.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Additional information:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%; font-family: Calibri, sans-serif; color: #212529; background: white;\">Since 2000, he has been a member of expert councils and public organizations in the field of entrepreneurship and finance, and has held leadership and advisory positions at the regional level.</span></p>', 'perov_kar@mail.ru', '+7 701 723 10 55', NULL, NULL, NULL, NULL, NULL, 'КЕАҚ «Е.А.Бөкетов атындағы Қарағанды университеті» Ішкі аудит қызметінің басшысы.', 'Руководитель Службы внутреннего аудита НАО «Карагандинский университет имени академика Е.А.Букетова» ', 'Head of the Internal Audit Service NAO \"Karaganda University named after Academician E.A.Buketov\".'),
(19, 9, 'Сатеева', 'Сатеева', 'Sateeva', 'Галина ', 'Галина ', 'Galina', 'Геннадьевна', 'Геннадьевна', 'Gennadievna', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Білімі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"210\" data-start=\"109\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1978&ndash;1983 жж. Қарағанды политехникалық институты, инженер-механик (сварка жабдығы мен технологиясы)</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"275\" data-start=\"213\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1996&ndash;1998 жж. ҚарМУ, бухгалтерлік есеп және аудит, экономист</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"472\" data-start=\"277\"><strong data-end=\"293\" data-start=\"277\"><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Еңбек өтілі:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1983 жылдан бастап әртүрлі инженерлік және бухгалтерлік лауазымдарда жұмыс істеді. 2006 жылдан бері ТОО &laquo;Аудиторлық топ &laquo;Партнер&raquo; компаниясында қаржы директорының орынбасары.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"645\" data-start=\"474\"><strong data-end=\"486\" data-start=\"474\"><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Қосымша:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">Кәсіби бухгалтерлік және салықтық консультант сертификаттары бар, ішкі аудит бойынша дипломдар иегері, жыл сайын біліктілікті жетілдіру курстарына қатысады.</span></p>', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Образование:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"821\" data-start=\"697\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1978&ndash;1983 гг. Карагандинский политехнический институт, инженер-механик (оборудование и технология сварочного производства)</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"884\" data-start=\"824\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1996&ndash;1998 гг. КарГУ, бухгалтерский учет и аудит, экономист</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"1047\" data-start=\"886\"><strong data-end=\"902\" data-start=\"886\"><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Опыт работы:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">С 1983 года занимал инженерные и бухгалтерские должности. С 2006 года &mdash; заместитель финансового директора ТОО &laquo;Аудиторская группа &laquo;Партнер&raquo;.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\" data-end=\"1223\" data-start=\"1049\"><strong data-end=\"1067\" data-start=\"1049\"><span style=\"font-size: 12pt; line-height: 120%; font-family: Calibri, sans-serif;\">Дополнительно:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">Имеет квалификационные сертификаты профессионального бухгалтера и налогового консультанта, дипломы по внутреннему аудиту, ежегодно повышает квалификацию.</span></p>', '<p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%;\">Education:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1978-1983. Karaganda Polytechnic Institute, mechanical engineer (welding equipment and technology)</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">1996-1998. KarSU, accounting and auditing, economist</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%;\">Work experience:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">Since 1983, he has held engineering and accounting positions. Since 2006, he has been Deputy Financial Director of Partner Audit Group LLP.</span></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><strong><span style=\"font-size: 12.0pt; line-height: 120%;\">Additionally:</span></strong></p>\r\n    <p style=\"margin: 0cm 0cm 14.4pt; text-indent: 35.45pt; line-height: 120%; font-size: 11pt; font-family: Calibri, sans-serif;\"><span style=\"font-size: 12.0pt; line-height: 120%;\">He has qualified certificates of professional accountant and tax consultant, diplomas in internal audit, annually improves his qualifications.</span></p>', 'audit-2030@mail.ru', '+7 701 490 12 88', NULL, NULL, NULL, NULL, NULL, 'Ішкі аудит қызметінің маманы', 'Специалист Службы внутреннего аудита', 'Specialist of the Internal Audit Service'),
(20, 1, 'Дулатбеков', 'Дулатбеков', 'Dulatbekov', 'Нұрлан', 'Нурлан', 'Nurlan', ' Орынбасарұлы', 'Орынбасарович', 'Orynbasarovich', 'ҚР ҰҒА корреспондент-мүшесі, заң ғылымдарының докторы, профессор. Қазақстанның жоғары білім жүйесінде танымал әрі беделді қайраткер.', 'Член-корреспондент НАН РК, доктор юридических наук, профессор. Известный и авторитетный деятель в системе высшего образования Казахстана.', 'Corresponding Member of the National Academy of Sciences of the Republic of Kazakhstan, Doctor of Law, Professor. A well-known and respected figure in Kazakhstan’s higher education system.', 'rector@buketov.edu.kz', '+7 (707)- 777- 77-77', NULL, NULL, 'Құрметті студенттер, профессорлық-оқытушылық құрам және университетіміздің достары!\nСіздерді біздің оқу орнымыздың ресми сайтына шақырамын. Біз білім мен ғылымның үздік дәстүрлерін ұстана отырып, сіздерге сапалы білім беруге және жарқын болашаққа жол ашуға дайынбыз. Бірге үлкен жетістіктерге жетеміз!', 'Уважаемые студенты, преподаватели и друзья нашего университета!\nДобро пожаловать на официальный сайт нашего учебного заведения. Мы стремимся сохранять лучшие традиции образования и науки, чтобы обеспечить вам качественное обучение и открыть двери в светлое будущее. Вместе мы достигнем больших успехов!', 'Dear students, faculty members, and friends of our university!\nWelcome to the official website of our institution. We are committed to upholding the finest traditions of education and science, providing you with quality learning and opening the path to a bright future. Together, we will achieve great success!', 'Ректор', 'Ректор', 'Rector'),
(21, 2, 'Сармурзин', 'Сармурзин', 'Sarmurzin', 'Ербол', 'Ербол', 'Yerbol', 'Жаңбырбайұлы', 'Жаңбырбайұлы', 'Zhanbyrbayuly', '<p><br><strong>Білімі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Қарағанды мемлекеттік университеті, бакалавр (қазақ тілі мен әдебиеті)</p>\r\n  </li>\r\n  <li>\r\n    <p>Қарағанды мемлекеттік университеті, магистр (филология)</p>\r\n  </li>\r\n  <li>\r\n    <p>Манчестер университеті, магистр (білім беру лидерлігі, &laquo;Болашақ&raquo; бағдарламасы)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Еңбек өтілі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Әртүрлі оқу орындары мен білім саласында жетекшілік лауазымдар (2012 жылдан)</p>\r\n  </li>\r\n  <li>\r\n    <p>Соңғы қызметі &mdash; стратегиялық даму жөніндегі проректор (2023 жылдан)</p>\r\n  </li>\r\n    </ul>', '<p><br><strong>Образование:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Карагандинский государственный университет, бакалавр (казахский язык и литература)</p>\r\n  </li>\r\n  <li>\r\n    <p>Карагандинский государственный университет, магистр (филология)</p>\r\n  </li>\r\n  <li>\r\n    <p>Манчестерский университет, магистр (лидерство в образовании, программа &laquo;Болашак&raquo;)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Опыт работы:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Руководящие и преподавательские должности в образовательных учреждениях с 2012 года</p>\r\n  </li>\r\n  <li>\r\n    <p>С 2023 года &mdash; проректор по стратегическому развитию</p>\r\n  </li>\r\n    </ul>', '<p><br><strong>Education:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Karaganda State University, Bachelor (Kazakh Language and Literature)</p>\r\n  </li>\r\n  <li>\r\n    <p>Karaganda State University, Master (Philology)</p>\r\n  </li>\r\n  <li>\r\n    <p>University of Manchester, Master (Educational Leadership, Bolashak program)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Work Experience:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Leadership and teaching roles in education since 2012</p>\r\n  </li>\r\n  <li>\r\n    <p>Since 2023 &mdash; Vice-Rector for Strategic Development</p>\r\n  </li>\r\n    ', 'prorector-strateg-razvit@buketov.kz', '8(7212)486-56-27', NULL, NULL, 'Стратегиялық даму – университеттің болашағының негізі. Біз прогреске, халықаралық ынтымақтастыққа және озық технологияларды енгізуге ұмтыламыз. Университеттегі жолыңыз үлкен мүмкіндіктерге, инновациялық жобаларға және әлемдік деңгейдегі жетістіктерге бастау болсын!  ', 'Стратегическое развитие — основа будущего университета. Мы стремимся к прогрессу, международному сотрудничеству и внедрению передовых технологий. Пусть ваш путь в университете станет стартом к большим возможностям, инновационным проектам и достижениям на мировом уровне!  ', 'Strategic development is the foundation of the university\"s future. We aim for progress, international collaboration, and the implementation of advanced technologies. May your journey at the university be a launchpad for great opportunities, innovative projects, and global achievements!  ', 'Басқарма мүшесі, стратегиялық даму жөніндегі проректор', 'Член Правления, проректор по стратегическому развитию ', 'Board Member, Vice-Rector for Strategic Development'),
(22, 2, 'Умуркулова', 'Умуркулова', 'Umurkulova', 'Мадина', 'Мадина', 'Madina', 'Максимовна', 'Максимовна', 'Maksimovna', '<p data-end=\"38\" data-start=\"25\"><strong data-end=\"36\" data-start=\"25\">Білімі:</strong></p>\r\n    <ul data-end=\"388\" data-start=\"39\">\r\n  <li data-end=\"125\" data-start=\"39\">\r\n    <p data-end=\"125\" data-start=\"41\">1990&ndash;1994 жж. &ndash; Қарағанды мемлекеттік медицина университеті, &laquo;Емдеу ісі&raquo; мамандығы</p>\r\n  </li>\r\n  <li data-end=\"205\" data-start=\"126\">\r\n    <p data-end=\"205\" data-start=\"128\">1994&ndash;1997 жж. &ndash; Е.А. Бөкетов атындағы ҚарМУ, &laquo;Психология&raquo;, психолог-практик</p>\r\n  </li>\r\n  <li data-end=\"296\" data-start=\"206\">\r\n    <p data-end=\"296\" data-start=\"208\">2016&ndash;2018 жж. &ndash; Е.А. Бөкетов атындағы ҚарУ, &laquo;Психология&raquo;, әлеуметтік ғылымдар магистрі</p>\r\n  </li>\r\n  <li data-end=\"388\" data-start=\"297\">\r\n    <p data-end=\"388\" data-start=\"299\">2019&ndash;2022 жж. &ndash; Е.А. Бөкетов атындағы ҚарУ, PhD докторантура, &laquo;Білім беру психологиясы&raquo;</p>\r\n  </li>\r\n    </ul>\r\n    <p data-end=\"408\" data-start=\"390\"><strong data-end=\"406\" data-start=\"390\">Еңбек өтілі:</strong></p>\r\n    <ul data-is-only-node=\"\" data-is-last-node=\"\" data-end=\"833\" data-start=\"409\">\r\n  <li data-end=\"462\" data-start=\"409\">\r\n    <p data-end=\"462\" data-start=\"411\">2004&ndash;2005 жж. &ndash; психология кафедрасының оқытушысы</p>\r\n  </li>\r\n  <li data-end=\"494\" data-start=\"463\">\r\n    <p data-end=\"494\" data-start=\"465\">2005&ndash;2022 жж. &ndash; аға оқытушы</p>\r\n  </li>\r\n  <li data-end=\"559\" data-start=\"495\">\r\n    <p data-end=\"559\" data-start=\"497\">2023 ж. &ndash; қазіргі уақытқа дейін &ndash; қауымдастырылған профессор</p>\r\n  </li>\r\n  <li data-end=\"616\" data-start=\"560\">\r\n    <p data-end=\"616\" data-start=\"562\">2023 ж. &ndash; деканның ғылыми жұмыс жөніндегі орынбасары</p>\r\n  </li>\r\n  <li data-end=\"682\" data-start=\"617\">\r\n    <p data-end=\"682\" data-start=\"619\">2023 ж. &ndash; философия және психология факультеті деканының м.а.</p>\r\n  </li>\r\n  <li data-end=\"762\" data-start=\"683\">\r\n    <p data-end=\"762\" data-start=\"685\">2023 ж. &ndash; қазіргі уақытқа дейін &ndash; әлеуметтік-психологиялық зертхана басшысы</p>\r\n  </li>\r\n  <li data-is-last-node=\"\" data-end=\"833\" data-start=\"763\">\r\n    <p data-is-last-node=\"\" data-end=\"833\" data-start=\"765\">2024 ж. &ndash; оқу ісі жөніндегі кеңес мүшесі &ndash; проректор (25.09.2024 ж.)</p>\r\n  </li>\r\n    </ul>', '<p>Образование:</p>\r\n    <ul>\r\n  <li>1990-1994 гг. - Карагандинский государственный медицинский университет, специальность&raquo; Лечебное дело\"</li>\r\n  <li>1994-1997 гг. - КарГУ им. Е. А. Букетова, \"Психология\", психолог-практик</li>\r\n  <li>2016-2018 гг. - Оружие им. Е. А. Букетова,&raquo; Психология\", магистр социальных наук</li>\r\n  <li>2019-2022 гг. - Оружие им. Е. А. Букетова, докторантура PhD,&raquo;Психология образования\"</li>\r\n    </ul>\r\n    <p>Стаж работы:</p>\r\n    <ul>\r\n  <li>2004-2005 гг. - преподаватель кафедры психологии</li>\r\n  <li>2005-2022 гг. - старший преподаватель</li>\r\n  <li>2023 &ndash; настоящее время-ассоциированный профессор</li>\r\n  <li>2023 г.-заместитель декана по научной работе</li>\r\n  <li>2023-и. о. декана факультета философии и психологии.</li>\r\n  <li>2023 г. &ndash; по настоящее время-руководитель социально-психологической лаборатории</li>\r\n  <li>2024 г. &ndash; член-проректор совета по учебной работе (25.09.2024 г.)</li>\r\n    </ul>', '<p>Education:</p>\r\n    <ul>\r\n  <li>1990-1994. - Karaganda State Medical University, specialty\" medical science\"</li>\r\n  <li>1994-1997. &ndash; Karsu named after E. A. Buketov, \"Psychology\", Psychologist-practitioner</li>\r\n  <li>2016-2018 - Weapon named after E. A. Buketov,\" psychology\", master of Social Sciences</li>\r\n  <li>2019-2022 - Weapon named after E. A. Buketov, PhD,\"psychology of Education\"</li>\r\n    </ul>\r\n    <p>Work experience:</p>\r\n    <ul>\r\n  <li>2004-2005. &ndash; teacher of the Department of psychology</li>\r\n  <li>2005-2022 - senior lecturer</li>\r\n  <li>2023-present-associate professor</li>\r\n  <li>2023-deputy dean for scientific work</li>\r\n  <li>2023-acting dean of the Faculty of philosophy and psychology</li>\r\n  <li>2023-present-head of the socio-psychological laboratory</li>\r\n  <li>2024 &ndash; member of the council for academic affairs-Vice-Rector (25.09.2024)</li>\r\n    </ul>', 'prorector@buketov.kz', '8(7212)789-45-63', NULL, NULL, 'Білім – бұл білімге, жаңалықтарға және кәсіби өсуге жол. Біз оқу процесінің жоғары стандарттарға және қазіргі заманғы талаптарға сай болуын қамтамасыз етуге бар күшімізді саламыз. Білім жолыңыз қызықты әрі жемісті болсын, ал университет болашақ жетістіктеріңіздің берік негізі болсын!', 'Образование — это путь к знаниям, открытиям и профессиональному росту. Мы прилагаем все усилия, чтобы учебный процесс соответствовал высоким стандартам и современным требованиям. Пусть ваш путь к знаниям будет увлекательным и плодотворным, а университет станет надежной основой для будущих успехов!', 'Education is a journey toward knowledge, discovery, and professional growth. We make every effort to ensure that the learning process meets high standards and modern requirements. May your educational journey be exciting and fruitful, and may the university be a strong foundation for your future success!', 'Академиялық мәселелер бойынша Басқарма мүшесі - проректор', 'Член Правления по академическим вопросам – проректор ', 'Member of the Board of Academic Affairs – Vice Rector');
INSERT INTO `staff` (`id`, `ref_staff_id`, `surname_kz`, `surname_ru`, `surname_en`, `name_kz`, `name_ru`, `name_en`, `patronymic_kz`, `patronymic_ru`, `patronymic_en`, `information_kz`, `information_ru`, `information_en`, `email`, `phone`, `faculty_id`, `departament_id`, `welcome_kz`, `welcome_ru`, `welcome_en`, `job_title_kz`, `job_title_ru`, `job_title_en`) VALUES
(23, 2, 'Тажбаев', 'Тажбаев', 'Tazhbayev', 'Еркеблан', 'Еркеблан', 'Yerkeblan', 'Муратович', 'Муратович', 'Muratovich', '<p><strong>Білімі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Е.А. Бөкетов атындағы Қарағанды университеті (1996)</p>\r\n  </li>\r\n  <li>\r\n    <p>Аспирантура (1996&ndash;1999), докторантура (2003&ndash;2006)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Еңбек өтілі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>1996 ж. бастап &ndash; оқытушы, аға оқытушы, доцент, профессор</p>\r\n  </li>\r\n  <li>\r\n    <p>2000&ndash;2001 &ndash; химия факультеті деканының орынбасары</p>\r\n  </li>\r\n  <li>\r\n    <p>2002 &ndash; ғылыми жұмыс жөніндегі кешен директорының орынбасары</p>\r\n  </li>\r\n  <li>\r\n    <p>2006&ndash;2019 &ndash; химия факультетінің деканы</p>\r\n  </li>\r\n  <li>\r\n    <p>2019&ndash;2020 &ndash; ғылым жөніндегі проректор, ректордың м.а.</p>\r\n  </li>\r\n  <li>\r\n    <p>2020 жылдан бері &ndash; ғылыми жұмыс жөніндегі проректор</p>\r\n  </li>\r\n    </ul>', '<p><strong>Образование:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Карагандинский государственный университет им. Е.А. Букетова (1996)</p>\r\n  </li>\r\n  <li>\r\n    <p>Аспирантура (1996&ndash;1999), докторантура (2003&ndash;2006)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Трудовой стаж:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>С 1996 г. &mdash; преподаватель, старший преподаватель, доцент, профессор</p>\r\n  </li>\r\n  <li>\r\n    <p>2000&ndash;2001 &mdash; заместитель декана химического факультета</p>\r\n  </li>\r\n  <li>\r\n    <p>2002 &mdash; заместитель директора научно-образовательного комплекса</p>\r\n  </li>\r\n  <li>\r\n    <p>2006&ndash;2019 &mdash; декан химического факультета</p>\r\n  </li>\r\n  <li>\r\n    <p>2019&ndash;2020 &mdash; проректор по науке, и.о. ректора</p>\r\n  </li>\r\n  <li>\r\n    <p>С 2020 г. &mdash; проректор по научной работе</p>\r\n  </li>\r\n    </ul>', '<p><strong>Education:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Karaganda State University named after E.A. Buketov (1996)</p>\r\n  </li>\r\n  <li>\r\n    <p>Postgraduate studies (1996&ndash;1999), Doctoral studies (2003&ndash;2006)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Work Experience:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Since 1996 &ndash; Lecturer, Senior Lecturer, Associate Professor, Professor</p>\r\n  </li>\r\n  <li>\r\n    <p>2000&ndash;2001 &ndash; Deputy Dean of the Faculty of Chemistry</p>\r\n  </li>\r\n  <li>\r\n    <p>2002 &ndash; Deputy Director of the Scientific-Educational Complex</p>\r\n  </li>\r\n  <li>\r\n    <p>2006&ndash;2019 &ndash; Dean of the Faculty of Chemistry</p>\r\n  </li>\r\n  <li>\r\n    <p>2019&ndash;2020 &ndash; Vice-Rector for Science, Acting Rector</p>\r\n  </li>\r\n  <li>\r\n    <p>Since 2020 &ndash; Vice-Rector for Research</p>\r\n  </li>\r\n    </ul>', 'prorector-nauch-rab@buketov.kz', '8(7212)852-96-74', NULL, NULL, 'Ғылым – бұл ақиқатты іздеу, жаңалық ашуға және алға ұмтылуға деген ұмтылыс. Біздің университетте ғылыми қызметті дамытуға, ғылыми идеялар мен жобаларды жүзеге асыруға барлық жағдай жасалған. Білімге деген қызығушылық пен жаңалық ашуға деген ұмтылыс сіздерді үлкен жетістіктерге жеткізсін!  ', 'Наука — это поиск истины, стремление к открытиям и движению вперед. В нашем университете созданы все условия для развития исследовательской деятельности, реализации научных идей и проектов. Пусть ваш интерес к знаниям и стремление к открытию нового приведут к важным достижениям!  ', 'Science is a quest for truth, a drive for discovery, and forward progress. Our university provides all the conditions necessary for developing research activities and implementing scientific ideas and projects. May your curiosity and pursuit of new knowledge lead you to great achievements!  ', 'Басқарма мүшесі – Ғылыми жұмыс жөніндегі проректор', 'Член Правления, проректор по научной работе ', 'Member of the Board – Vice-rector for research'),
(24, 2, 'Жетпісбаев', 'Жетпісбаев', 'Zhetpisbayev', 'Нұржан', 'Нұржан', 'Nurzhan', 'Арғынұлы', 'Арғынұлы', 'Argynuly', '<p><strong>Білімі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Қарағанды мемлекеттік техникалық университеті, құрылыс мамандығы бакалавры (2012), магистрі (2014)</p>\r\n  </li>\r\n  <li>\r\n    <p>Қазақ инженерлік-технологиялық академиясы, экономика және бизнес бакалавры (2015)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Еңбек өтілі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Саясат саласында 15 жыл жұмыс тәжірибесі</p>\r\n  </li>\r\n  <li>\r\n    <p>Әртүрлі жастар ұйымдарында жетекші лауазымдар (2008-2023)</p>\r\n  </li>\r\n  <li>\r\n    <p>Теміртау қаласының әлеуметтік мәселелер жөніндегі орынбасары (2020-2021)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Марапаттары:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>&laquo;Дарын&raquo; мемлекеттік жастар сыйлығының лауреаты (2018)</p>\r\n  </li>\r\n  <li>\r\n    <p>&laquo;Еңбек Даңқы&raquo; мемлекеттік наградасы (2022)</p>\r\n  </li>\r\n    </ul>', '[value-13]', '[value-14]', 'prorector-cult@buketov.kz', '8(7212)987-12-36', NULL, NULL, 'Білім – тек білім емес, сонымен қатар тұлғаның дамуы. Біз студенттер өз қабілеттерін жүзеге асыра алатын жайлы және шабыт беретін орта құруға тырысамыз. Университеттегі уақытыңыз жаңа мүмкіндіктерге, қызықты кездесулерге және маңызды жаңалықтарға толы болсын!  ', 'Образование — это не только знания, но и развитие личности. Мы стремимся создать комфортную и вдохновляющую среду для студентов, в которой каждый сможет реализовать свои способности. Пусть ваше время в университете будет наполнено новыми возможностями, интересными встречами и важными открытиями!  ', 'Education is not just knowledge, but also personal development. We strive to create a comfortable and inspiring environment for students where everyone can realize their potential. May your time at the university be filled with new opportunities, interesting encounters, and meaningful discoveries!  ', 'Әлеуметтік-мәдени даму жөніндегі М.А проректор', 'И.О проректора по социально-культурному развитию  ', 'Acting Vice-rector for social and cultural development'),
(25, 2, 'Молдабаев', 'Молдабаев', 'Moldabayev', 'Асылбек', 'Асылбек', 'Asylbek', 'Серікұлы', 'Серікұлы', 'Serikuly', '<p><strong>Білімі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Қарағанды мемлекеттік университеті (2008)</p>\r\n  </li>\r\n  <li>\r\n    <p>Қарағанды экономикалық университеті (2011)</p>\r\n  </li>\r\n  <li>\r\n    <p>Қазақ агротехникалық университеті (2016)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Еңбек өтілі:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Кеңес әскерінде қызмет (1988&ndash;1989)</p>\r\n  </li>\r\n  <li>\r\n    <p>Ауыл шаруашылығында және әкімшілік лауазымдарда жұмыс (1993&ndash;2018)</p>\r\n  </li>\r\n  <li>\r\n    <p>Кәсіпкерлік және басқару тәжірибесі: &laquo;Qaz Carbon&raquo; директоры, МЖК директоры (2018&ndash;2022)</p>\r\n  </li>\r\n  <li>\r\n    <p>Қазіргі уақытта Қарағанды университетінде проректор (2022 жылдан)</p>\r\n  </li>\r\n    </ul>', '<p><br><strong>Образование:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Карагандинский государственный университет (2008)</p>\r\n  </li>\r\n  <li>\r\n    <p>Карагандинский экономический университет (2011)</p>\r\n  </li>\r\n  <li>\r\n    <p>Казахский агротехнический университет (2016)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Опыт работы:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Служба в Советской армии (1988&ndash;1989)</p>\r\n  </li>\r\n  <li>\r\n    <p>Работа в сельском хозяйстве и административных должностях (1993&ndash;2018)</p>\r\n  </li>\r\n  <li>\r\n    <p>Руководитель ТОО &laquo;Qaz Carbon&raquo;, директор МЖК (2018&ndash;2022)</p>\r\n  </li>\r\n  <li>\r\n    <p>Проректор Карагандинского университета с 2022 года</p>\r\n  </li>\r\n    </ul>', '<p><strong>Education:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Karaganda State University (2008)</p>\r\n  </li>\r\n  <li>\r\n    <p>Karaganda Economic University (2011)</p>\r\n  </li>\r\n  <li>\r\n    <p>Kazakh Agro-Technical University (2016)</p>\r\n  </li>\r\n    </ul>\r\n    <p><strong>Work Experience:</strong></p>\r\n    <ul>\r\n  <li>\r\n    <p>Service in the Soviet Army (1988&ndash;1989)</p>\r\n  </li>\r\n  <li>\r\n    <p>Roles in agriculture and administration (1993&ndash;2018)</p>\r\n  </li>\r\n  <li>\r\n    <p>Director of Qaz Carbon LLP and Housing Construction Company (2018&ndash;2022)</p>\r\n  </li>\r\n  <li>\r\n    <p>Vice-Rector at Karaganda University since 2022</p>\r\n  </li>\r\n    </ul>', 'prorector-admin@buketov.kz', '8(7212)159-46-10', NULL, NULL, 'Қазіргі заманғы университет – бұл тек білім емес, сонымен қатар инфрақұрылым, жайлылық және өсу мүмкіндіктері. Біз әр студент пен оқытушы қолайлы, қауіпсіз және инновациялық ортада білім алып, дамуы үшін жұмыс істейміз. Сіздерге жемісті жұмыс пен табысты оқу тілеймін!  ', 'Современный университет — это не только образование, но и инфраструктура, комфорт и условия для роста. Мы работаем над тем, чтобы каждый студент и преподаватель мог обучаться и развиваться в удобной, безопасной и инновационной среде. Желаю вам плодотворной работы и успехов в учебе!  ', 'A modern university is not just about education but also infrastructure, comfort, and opportunities for growth. We work to ensure that every student and faculty member can learn and develop in a convenient, safe, and innovative environment. I wish you productive work and success in your studies!  ', 'Басқарма мүшесі, әкімшілік-шаруашылық қызмет жөніндегі проректор', 'Член Правления, проректор по административно-хозяйственной деятельности ', 'Member of the Management Board, Vice-Rector for Administrative and Economic Activities');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

CREATE TABLE `subject` (
  `id` int NOT NULL,
  `name_kz` varchar(255) DEFAULT NULL,
  `name_ru` varchar(255) DEFAULT NULL,
  `name_en` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `name_kz`, `name_ru`, `name_en`) VALUES
(1, 'Шығармашылық', 'Творческий', 'Creative'),
(2, 'География', 'География', 'Geography'),
(3, 'Иностранный язык', 'Иностранный язык', 'Foreign Language'),
(4, 'Всемирная история', 'Всемирная история', 'World History'),
(5, 'Основы права', 'Основы права', 'Fundamentals of Law'),
(6, 'Математика', 'Математика', 'Mathematics'),
(7, 'Физика', 'Физика', 'Physics'),
(8, 'Биология', 'Биология', 'Biology'),
(9, 'Информатика', 'Информатика', 'Informatics'),
(10, 'Химия', 'Химия', 'Chemistry'),
(11, 'Қазақ тілі', 'Казахский язык', 'Kazakh language'),
(12, 'Қазақ Әдебиеті', 'Казахская литература', 'Kazakh literature'),
(13, 'Орыс Әдебиеті', 'Русская  литература', 'Russian literature'),
(14, 'Орыс тілі', 'Русская язык', 'Russian language');

-- --------------------------------------------------------

--
-- Структура таблицы `subject_to_profession`
--

CREATE TABLE `subject_to_profession` (
  `id` int NOT NULL,
  `subject_id` int DEFAULT NULL,
  `profession_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `subject_to_profession`
--

INSERT INTO `subject_to_profession` (`id`, `subject_id`, `profession_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(7, 1, 7),
(8, 2, 8),
(9, 8, 8),
(10, 2, 9),
(11, 8, 9),
(12, 2, 10),
(14, 2, 11),
(15, 8, 11),
(18, 2, 13),
(19, 8, 13),
(20, 2, 14),
(21, 8, 14),
(22, 2, 15),
(23, 8, 15),
(24, 2, 16),
(25, 8, 16),
(26, 2, 17),
(27, 3, 17),
(28, 2, 18),
(29, 3, 18),
(30, 3, 19),
(31, 4, 19),
(32, 4, 20),
(33, 3, 20),
(38, 3, 23),
(39, 4, 23),
(40, 3, 24),
(41, 4, 24),
(42, 2, 25),
(43, 4, 25),
(46, 2, 27),
(47, 4, 27),
(48, 2, 28),
(49, 4, 28),
(50, 2, 29),
(51, 4, 29),
(52, 2, 30),
(53, 4, 30),
(54, 2, 31),
(55, 4, 31),
(56, 5, 32),
(57, 4, 32),
(58, 5, 33),
(59, 4, 33),
(60, 5, 34),
(61, 4, 34),
(62, 5, 35),
(63, 4, 35),
(64, 2, 36),
(65, 6, 36),
(66, 2, 37),
(67, 6, 37),
(68, 2, 38),
(69, 6, 38),
(70, 2, 39),
(71, 6, 39),
(72, 2, 40),
(73, 6, 40),
(74, 2, 41),
(75, 6, 41),
(76, 2, 42),
(77, 6, 42),
(78, 2, 43),
(79, 6, 43),
(80, 2, 44),
(81, 6, 44),
(82, 2, 45),
(83, 6, 45),
(84, 2, 46),
(85, 6, 46),
(86, 2, 47),
(87, 6, 47),
(88, 2, 48),
(89, 6, 48),
(90, 2, 49),
(91, 6, 49),
(92, 7, 50),
(93, 6, 50),
(94, 7, 51),
(95, 6, 51),
(96, 7, 52),
(97, 6, 52),
(98, 7, 53),
(99, 6, 53),
(100, 7, 54),
(101, 6, 54),
(102, 7, 55),
(103, 6, 55),
(104, 7, 56),
(105, 6, 56),
(106, 7, 57),
(107, 6, 57),
(108, 7, 58),
(109, 6, 58),
(110, 7, 59),
(111, 6, 59),
(112, 7, 60),
(113, 6, 60),
(114, 7, 61),
(115, 6, 61);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-article-ref_article_id` (`ref_article_id`);

--
-- Индексы таблицы `departament`
--
ALTER TABLE `departament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-departament-faculty_id` (`faculty_id`);

--
-- Индексы таблицы `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `history_departament`
--
ALTER TABLE `history_departament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-history_departament-departament_id` (`departament_id`);

--
-- Индексы таблицы `history_faculty`
--
ALTER TABLE `history_faculty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-history_faculty-faculty_id` (`faculty_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `profession`
--
ALTER TABLE `profession`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-profession-skill_level_id` (`skill_level_id`),
  ADD KEY `idx-profession-ref_type_profession_id` (`ref_type_profession_id`);

--
-- Индексы таблицы `profession_college`
--
ALTER TABLE `profession_college`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-profession_college-profession_id` (`profession_id`);

--
-- Индексы таблицы `ref_article`
--
ALTER TABLE `ref_article`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ref_photo`
--
ALTER TABLE `ref_photo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ref_social`
--
ALTER TABLE `ref_social`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ref_staff`
--
ALTER TABLE `ref_staff`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ref_type_profession`
--
ALTER TABLE `ref_type_profession`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skill_level`
--
ALTER TABLE `skill_level`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-staff-ref_staff_id` (`ref_staff_id`),
  ADD KEY `idx-staff-faculty_id` (`faculty_id`),
  ADD KEY `idx-staff-departament_id` (`departament_id`);

--
-- Индексы таблицы `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subject_to_profession`
--
ALTER TABLE `subject_to_profession`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-subject_to_profession-subject_id` (`subject_id`),
  ADD KEY `idx-subject_to_profession-profession_id` (`profession_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `departament`
--
ALTER TABLE `departament`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `history_departament`
--
ALTER TABLE `history_departament`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `history_faculty`
--
ALTER TABLE `history_faculty`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `profession`
--
ALTER TABLE `profession`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT для таблицы `profession_college`
--
ALTER TABLE `profession_college`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=316;

--
-- AUTO_INCREMENT для таблицы `ref_article`
--
ALTER TABLE `ref_article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `ref_photo`
--
ALTER TABLE `ref_photo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ref_social`
--
ALTER TABLE `ref_social`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ref_staff`
--
ALTER TABLE `ref_staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `ref_type_profession`
--
ALTER TABLE `ref_type_profession`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `skill_level`
--
ALTER TABLE `skill_level`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `subject_to_profession`
--
ALTER TABLE `subject_to_profession`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk-article-ref_article_id` FOREIGN KEY (`ref_article_id`) REFERENCES `ref_article` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `departament`
--
ALTER TABLE `departament`
  ADD CONSTRAINT `fk-departament-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `history_departament`
--
ALTER TABLE `history_departament`
  ADD CONSTRAINT `fk-history_departament-departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `history_faculty`
--
ALTER TABLE `history_faculty`
  ADD CONSTRAINT `fk-history_faculty-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profession`
--
ALTER TABLE `profession`
  ADD CONSTRAINT `fk-profession-ref_type_profession_id` FOREIGN KEY (`ref_type_profession_id`) REFERENCES `ref_type_profession` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-profession-skill_level_id` FOREIGN KEY (`skill_level_id`) REFERENCES `skill_level` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `profession_college`
--
ALTER TABLE `profession_college`
  ADD CONSTRAINT `fk-profession_college-profession_id` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `fk-staff-departament_id` FOREIGN KEY (`departament_id`) REFERENCES `departament` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-staff-faculty_id` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-staff-ref_staff_id` FOREIGN KEY (`ref_staff_id`) REFERENCES `ref_staff` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subject_to_profession`
--
ALTER TABLE `subject_to_profession`
  ADD CONSTRAINT `fk-subject_to_profession-profession_id` FOREIGN KEY (`profession_id`) REFERENCES `profession` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-subject_to_profession-subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

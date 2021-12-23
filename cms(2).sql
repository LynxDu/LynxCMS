-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 23 2021 г., 13:55
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `pathImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `date`, `pathImage`) VALUES
(4, 'Работает!!', 'Почти', '2021-12-04 18:43:27', NULL),
(6, 'Рыба-текст', ' А также интерактивные прототипы обнародованы.', '2021-12-05 07:32:09', NULL),
(13, 'Только чистосердечное признание облегчает ', '<p>Учитывая ключевые сценарии поведения.</p>', '2021-12-15 11:11:15', NULL),
(14, 'Оказывается5', '<p style=\"text-align: center;\">Кстати, реплицированные с зарубежных источников, современные исследования лишь добавляют ', '2021-12-20 10:04:50', NULL),
(15, 'Солнечных дней всё меньше1', '<p><sub><span style=\"color: rgb(65, 168, 95);\">Учитывая&nbsp;</span></sub><span style=\"color: rgb(65, 168, 95);\"><sup>ключевые&nbsp;</sup><s>сценарии&nbsp;</s><strong>поведения</strong>, </p><ol><li>123</li><li>213</li><li>45</li></ol><p style=\"text-align: center;\"><a class=\"fr-strong fr-green\" href=\"http://ya.ru\" target=\"_self\">#########</a></p>', '2021-12-22 08:39:43', NULL),
(16, 'Нашу победу сопровождал старческий скрип Амстердама', '<p>Высокий уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: курс на социально-ориентированный национальный проект играет определяющее значение для прогресса профессионального сообщества.</p>', '2021-12-23 09:45:35', NULL),
(17, 'фвфц', '<p>фцвцвфцв</p>', '2021-12-23 10:10:41', NULL),
(18, '213', '<p>3213</p>', '2021-12-23 10:37:22', NULL),
(19, '12', '<p>32</p>', '2021-12-23 11:37:56', NULL),
(20, 'Подтверждено: спикеры палаты госдумы негодуют', '<p><strong>Господа</strong>, сплочённость команды профессионалов требует определения и уточнения своевременного выполнения <u>сверхзадачи</u>.</p>', '2021-12-23 12:06:01', NULL),
(21, 'Да, преступность никогда не была такой неорганизованной', '<p>Как уже неоднократно упомянуто, тщательные исследования конкурентов, вне зависимости от их уровня, должны быть представлены в исключительно положительном свете.</p><hr><p>Идейные соображения высшего порядка, а также постоянное информационно-пропагандистское обеспечение нашей деятельности позволяет оценить значение инновационных методов управления процессами.<br id=\"isPasted\"><br></p>', '2021-12-23 12:11:42', NULL),
(22, 'wqe', '<p>asd</p>', '2021-12-23 12:14:12', NULL),
(23, 'qwe', '<p>wqe</p>', '2021-12-23 12:14:47', NULL),
(24, '1', '<p>1</p>', '2021-12-23 12:16:56', NULL),
(25, '3', '<p>32</p>', '2021-12-23 12:27:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `plagin`
--

CREATE TABLE `plagin` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL COMMENT 'путь к файлу на сервере',
  `active` enum('included','disabled','not found') NOT NULL DEFAULT 'included',
  `description` text NOT NULL COMMENT 'описание'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `key_field` varchar(100) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `setting`
--

INSERT INTO `setting` (`id`, `name`, `key_field`, `value`) VALUES
(2, 'Name_site', 'Name_site', 'LynxCMS'),
(3, 'Description', 'description', 'Example description'),
(4, 'Admin_email', 'admin_email', 'admin@admin.com'),
(5, 'Language', 'language', 'english');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('admin','moderator','user') NOT NULL,
  `hash` varchar(32) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `role`, `hash`, `date_reg`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '03b49b528b0a9b2316da95ab4d61d215', '2021-11-29 00:00:39'),
(2, 'user@admin.com', 'b59c67bf196a4758191e42f76670ceba', 'user', 'new', '2021-11-29 19:26:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `plagin`
--
ALTER TABLE `plagin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `plagin`
--
ALTER TABLE `plagin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

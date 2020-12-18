-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2020 г., 09:23
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `praktika`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `new_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `comment_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `new_id`, `comment`, `comment_time`) VALUES
(24, 1, 14, 'agdfgsdfgsdfgsdfgsdfg', '2020-03-14 01:03:27'),
(25, 1, 14, '&lt;script&gt;alert(\'yes\')&lt;/script&gt;', '2020-03-14 01:03:30'),
(26, 3, 15, 'comment', '2020-03-14 01:03:01'),
(27, 3, 15, '\'DROP DATABASE users\'', '2020-03-14 01:03:06');

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `author_id`, `date`, `text`, `email`) VALUES
(1, 1, '2020-03-14 02:03:17', 'asdasdasd', 'user1@mail.ru'),
(2, 1, '2020-03-14 02:03:17', 'asdasdasd', 'user1@mail.ru'),
(3, 1, '2020-03-14 02:03:17', 'asdasdasd', 'user1@mail.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `photo_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `creator_id`, `create_time`, `photo_url`) VALUES
(14, 'The Adventures of Tom Sawyer                                    ', 'asdsdfsdf', 2, '2020-03-14 02:03:30', NULL),
(15, 'The Adventures of Gackleberry Finn                  ', 'fdsfdfgdfg', 3, '2020-03-14 01:03:26', NULL),
(16, 'qwe', 'asdasdasdasdsdfsfgadfgadsfgadfg', 1, '2020-03-10 11:17:20', NULL),
(18, 'Test1', 'afsdfdsdf', 1, '2020-03-14 01:03:06', NULL),
(20, 'qwe123qwe', 'qweqwe123123we', 1, '2020-03-14 01:03:21', NULL),
(21, 'Test1wfwef', 'i\'m', 1, '2020-03-14 01:03:29', NULL),
(22, 'werwer', '\"adsad\"asd', 1, '2020-03-14 01:03:40', NULL),
(23, 'asdasd\'asdasd\"Asd\"ASd', 'asdasD\"Asdasd\'asdsa\'sdaS\"Dasd', 1, '2020-03-14 01:03:39', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8_bin DEFAULT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `creator_id` int(11) NOT NULL,
  `start_year` text COLLATE utf8_bin NULL,
  `end_year` timestamp NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `portfolio`
--

INSERT INTO `portfolio` (`id`, `url`, `description`, `creator_id`, `start_year`, `end_year`) VALUES
(1, 'http://localhost/', 'Этот сайт для практики', 1, '2020-03-05 11:26:51', NULL),
(2, 'http://defystudio.ru/', 'сайт моей студии', 1, '2020-03-05 11:26:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `password` text COLLATE utf8_bin DEFAULT NULL,
  `email` text COLLATE utf8_bin DEFAULT NULL,
  `role` text COLLATE utf8_bin DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@mail.ru', 'admin'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@mail.com', 'user'),
(3, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user1@mail.ru', 'user'),
(23, 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user2@mail.ru', 'user'),
(24, 'user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user3@mail.ru', 'user'),
(25, 'user4', '3f02ebe3d7929b091e3d8ccfde2f3bc6', 'user1@mail.ru', 'user'),
(26, 'user6', 'affec3b64cf90492377a8114c86fc093', 'user1@mail.ru', 'user'),
(28, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe@123.ru', 'user');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `new_id` (`new_id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator_id` (`creator_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`new_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_ibfk_1` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

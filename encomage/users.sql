-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 09 2021 г., 23:01
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_encomage_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `create_date`, `update_date`) VALUES
(1, 'Judy', 'Gonzales', 'gonzales@mail.com', '2021-08-04 18:17:57', '2021-08-04 18:17:57'),
(2, 'Irene', 'Vaughn', 'vaughn@mail.com', '2021-08-04 18:18:29', '2021-08-04 18:18:29'),
(3, 'Julie', 'Edwards', 'edwards@mail.com', '2021-08-04 18:18:51', '2021-08-04 18:18:51'),
(4, 'Bessie', 'Cooper', 'сooper@mail.com', '2021-08-06 11:42:09', '2021-08-06 11:42:09'),
(7, 'Mary', 'Allen', 'allen@mail.com', '2021-08-07 13:19:26', '2021-08-07 15:39:39'),
(9, 'William', 'Owens', 'owens@mail.com', '2021-08-07 14:45:56', '2021-08-07 15:39:30'),
(11, 'Lucy', 'Carpenter', 'carpenter@mail.com', '2021-08-09 12:34:25', '2021-08-09 12:34:25');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

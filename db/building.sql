-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Мар 01 2023 г., 09:10
-- Версия сервера: 8.0.32-0ubuntu0.20.04.2
-- Версия PHP: 7.4.3-4ubuntu2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `building`
--
CREATE DATABASE IF NOT EXISTS `building` DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci;
USE `building`;

-- --------------------------------------------------------

--
-- Структура таблицы `booked_rooms`
--

DROP TABLE IF EXISTS `booked_rooms`;
CREATE TABLE `booked_rooms` (
  `id` int NOT NULL,
  `room_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `booked_datetime_start` int NOT NULL,
  `booked_datetime_end` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `booked_rooms`
--

INSERT INTO `booked_rooms` (`id`, `room_id`, `employee_id`, `booked_datetime_start`, `booked_datetime_end`) VALUES
(1, 1, 2, 1677661200, 1677664800),
(2, 1, 2, 1677657600, 1677661200);

-- --------------------------------------------------------

--
-- Структура таблицы `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int NOT NULL,
  `fullname` varchar(124) NOT NULL,
  `email` varchar(124) NOT NULL,
  `phone` varchar(124) NOT NULL,
  `position` varchar(124) NOT NULL,
  `department` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `employees`
--

INSERT INTO `employees` (`id`, `fullname`, `email`, `phone`, `position`, `department`) VALUES
(1, 'Ivanov Ivan', 'ivan@test.tj', '+99200000000', 'Junior Front Dev', 'Frontend'),
(2, 'Anna Avaramova', 'anna@test.tj', '+992111111111', 'Middle Backend Dev', 'Backend');

-- --------------------------------------------------------

--
-- Структура таблицы `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE `rooms` (
  `id` int NOT NULL,
  `number` smallint NOT NULL,
  `name` varchar(100) NOT NULL,
  `floor` smallint NOT NULL,
  `square` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `rooms`
--

INSERT INTO `rooms` (`id`, `number`, `name`, `floor`, `square`) VALUES
(1, 222, 'Godzilla Room', 2, 2.5),
(2, 367, 'Transformer Room', 3, 15.6);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `booked_rooms`
--
ALTER TABLE `booked_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `booked_rooms`
--
ALTER TABLE `booked_rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

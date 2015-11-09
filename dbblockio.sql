-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 09 2015 г., 02:07
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dbblockio`
--

-- --------------------------------------------------------

--
-- Структура таблицы `coins`
--

CREATE TABLE IF NOT EXISTS `coins` (
  `_id` int(11) NOT NULL,
  `LitecoinTESTNET` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `BitcoinTESTNET` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `DogecoinTESTNET` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Litecoin` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Bitcoin` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Dogecoin` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `coins`
--

INSERT INTO `coins` (`_id`, `LitecoinTESTNET`, `BitcoinTESTNET`, `DogecoinTESTNET`, `Litecoin`, `Bitcoin`, `Dogecoin`) VALUES
(1, '061e-39da-70cf-cb72', 'afce-cc08-9113-a701', 'fc63-1173-0442-2ad5', '7599-b53c-1727-8a43', '2ad1-0807-331f-e58f', 'a1bf-407a-960b-20d3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `_id` int(11) NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Pin` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`_id`, `Email`, `Password`, `Pin`) VALUES
(1, 'rjabkovvladimir@gmail.com', '53543770Samsung', '011090Logitech');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coins`
--
ALTER TABLE `coins`
  ADD PRIMARY KEY (`_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_id` (`_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coins`
--
ALTER TABLE `coins`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `coins`
--
ALTER TABLE `coins`
  ADD CONSTRAINT `coins_ibfk_1` FOREIGN KEY (`_id`) REFERENCES `users` (`_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

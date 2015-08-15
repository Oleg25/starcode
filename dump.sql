-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Авг 15 2015 г., 12:44
-- Версия сервера: 5.6.25
-- Версия PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cards`
--

-- --------------------------------------------------------

--
-- Структура таблицы `card`
--

CREATE TABLE IF NOT EXISTS `card` (
  `serial` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `number` int(11) NOT NULL,
  `expires_date` datetime NOT NULL,
  `release_date` datetime NOT NULL,
  `using_date` datetime NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cash` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `card`
--

INSERT INTO `card` (`serial`, `number`, `expires_date`, `release_date`, `using_date`, `status`, `cash`) VALUES
('111NN', 8, '2015-08-13 10:30:36', '2015-08-14 13:30:36', '2015-08-14 11:35:36', 'Активна', 1000);

--
-- Триггеры `card`
--
DELIMITER $$
CREATE TRIGGER `draft` AFTER UPDATE ON `card`
 FOR EACH ROW BEGIN

 DECLARE dk DOUBLE;

   IF NEW.cash <> OLD.cash THEN 
   
   SET @dk=(NEW.cash - OLD.cash);
   
            INSERT INTO operations (serial_number, using_date,debit_kredit)         VALUES(CONCAT(NEW.serial, NEW.number), NOW(), @dk);
        END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `operations`
--

CREATE TABLE IF NOT EXISTS `operations` (
  `id` int(11) NOT NULL,
  `serial_number` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `using_date` datetime NOT NULL,
  `debit_kredit` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `serial_number` (`serial`,`number`);

--
-- Индексы таблицы `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `card`
--
ALTER TABLE `card`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

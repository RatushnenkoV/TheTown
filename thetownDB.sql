-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 08 2017 г., 12:38
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `thetown`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `earning` int(10) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `discPrice` int(10) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `buildings`
--

INSERT INTO `buildings` (`id`, `earning`, `name`, `description`, `price`, `discPrice`, `type`) VALUES
(0, 0, 'empty', '', 0, 0, 'empty'),
(1, 1, 'Дерево', 'Плодоносное дерево приносит 1 единицу еды в минуту', 5, 0, 'tree'),
(2, 2, 'Хибара', 'В хибаре проживет 1 человек, который отдаёт налог ', 10, 0, 'house'),
(5, 20, 'Замок', 'Очень дорогой и очень крутой замок', 1000, 1000, 'custle');

-- --------------------------------------------------------

--
-- Структура таблицы `discovering`
--

CREATE TABLE IF NOT EXISTS `discovering` (
  `user` int(10) NOT NULL,
  `building` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `discovering`
--

INSERT INTO `discovering` (`user`, `building`) VALUES
(1, 1),
(1, 2),
(1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user` int(10) NOT NULL,
  `mailText` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT 'UserName',
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `money` int(10) NOT NULL DEFAULT '0',
  `avatar` varchar(20) NOT NULL,
  `field` varchar(500) NOT NULL DEFAULT ' <field> 	<c00> 0 </c00> 	<c01> 0 </c01> 	<c02> 0 </c02> 	<c03> 0 </c03> 	<c04> 0 </c04> 	<c10> 0 </c10> 	<c11> 0 </c11> 	<c12> 0 </c12> 	<c13> 0 </c13> 	<c14> 0 </c14> 	<c20> 0 </c20> 	<c21> 0 </c21> 	<c22> 0 </c22> 	<c23> 0 </c23> 	<c24> 0 </c24> 	<c30> 0 </c30> 	<c31> 0 </c31> 	<c32> 0 </c32> 	<c33> 0 </c33> 	<c34> 0 </c34> 	<c40> 0 </c40> 	<c41> 0 </c41> 	<c42> 0 </c42> 	<c43> 0 </c43> 	<c44> 0 </c44> </field>',
  `level` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `money`, `avatar`, `field`, `level`) VALUES
(1, 'VirusVv', 'VirusVv', 'mjncnth', 460, '0', '{"c00":"1","c01":"2","c02":"1","c03":"2","c04":"1","c10":"0","c11":"0","c12":"2","c13":"2","c14":"2","c20":"0","c21":"0","c22":"2","c23":"2","c24":0,"c30":"1","c31":"0","c32":"0","c33":"1","c34":"2","c40":"2","c41":0,"c42":"1","c43":"2","c44":"0","cellId":"1"}', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

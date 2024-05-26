-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 26 2024 г., 10:40
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sova`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `userId` int(100) NOT NULL,
  `goodsId` int(100) NOT NULL,
  `size` float DEFAULT NULL,
  `count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `decorders`
--

CREATE TABLE `decorders` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `budget` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `favourites`
--

CREATE TABLE `favourites` (
  `userId` int(11) NOT NULL,
  `goodsId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `material` varchar(100) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `inserts` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `image`, `material`, `weight`, `inserts`, `gender`, `brand`) VALUES
(1, 'Браслет из серебра', 5000, 'img/for-man/1.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(2, 'Браслет из серебра с агатами', 3000, 'img/for-man/2.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(3, 'Браслет из серебра', 7000, 'img/for-man/3.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(5, 'Кольцо из серебра с фианитами', 4000, 'img/for-man/5.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(6, 'Кольцо из черного серебра', 3600, 'img/for-man/6.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(7, 'Цепь из серебра, плетение двойной ромб', 5200, 'img/for-man/7.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(8, 'Цепь из серебра, плетение Якорное', 5200, 'img/for-man/8.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(9, 'Цепь мужская из серебра, плетение Бисмарк', 5200, 'img/for-man/9.png', 'Серебро', NULL, NULL, 'Для мужчин', 'SOVA'),
(14, 'Браслет из серебра', 5000, 'img/for-woman/1.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(15, 'Браслет из белого золота с бриллиантами', 15000, 'img/for-woman/2.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(16, 'Браслет из белого золота с бриллиантами', 7000, 'img/for-woman/3.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(17, 'Кольцо из белого золота с бриллиантом', 6690, 'img/for-woman/4.png', 'Белое зотоло', NULL, NULL, 'Для женщин', 'SOVA'),
(18, 'Кольцо из золота с бриллиантом', 9900, 'img/for-woman/5.png', 'Золото', NULL, NULL, 'Для женщин', 'SOVA'),
(19, 'Кольцо из серебра', 2320, 'img/for-woman/6.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(20, 'Колье из серебра с жемчугом', 8800, 'img/for-woman/7.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(21, 'Колье из серебра с фианитами', 3560, 'img/for-woman/8.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(22, 'Колье из белого золота с бриллиантами', 17000, 'img/for-woman/9.png', 'Белое зотоло', NULL, NULL, 'Для женщин', 'SOVA'),
(23, 'Серьги из белого золота с бриллиантами', 36000, 'img/brilliant-page/1.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(24, 'Серьги из белого золота с бриллиантами', 38000, 'img/brilliant-page/2.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(25, 'Кольцо из белого золота с бриллиантами', 6990, 'img/brilliant-page/3.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(26, 'Серьги из белого золота с бриллиантами', 47200, 'img/brilliant-page/4.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(27, 'Кольцо из белого золота с бриллиантами', 80000, 'img/brilliant-page/5.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(28, 'Браслет из белого золота с бриллиантами', 90000, 'img/brilliant-page/6.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(29, 'Браслет из белого золота с бриллиантом', 16000, 'img/brilliant-page/7.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(30, 'Серьги из белого золота с бриллиантами', 28000, 'img/brilliant-page/8.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(31, 'Серьги из золота с бесцветными и чёрными бриллиантами', 52000, 'img/brilliant-page/9.png', 'Бриллиант', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(32, 'Колье из золота с бриллиантами и танзанитом', 30000, 'img/brilliant-page/10.png', 'Золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(33, 'Серьги из золота с бриллиантами и изумрудами', 70000, 'img/brilliant-page/11.png', 'Золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(34, 'Кольцо из белого золота с бриллиантами и танзанитом', 50000, 'img/brilliant-page/12.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SOVA'),
(35, 'Браслет из серебра с миксом камней', 7200, 'img/amethyst-page/1.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(36, 'Брошь из серебра с аметистами и фианитами', 5200, 'img/amethyst-page/2.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(37, 'Кольцо из золота с аметистом и фианитами', 18500, 'img/amethyst-page/3.png', 'Золото', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(38, 'Серьги из золота с аметистами и фианитами', 19000, 'img/amethyst-page/4.png', 'Золото', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(39, 'Брошь из серебра с аметистами и фианитами', 6400, 'img/amethyst-page/5.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(40, 'Кольцо из серебра с аметистом', 1760, 'img/amethyst-page/6.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(41, 'Кольцо из золота с аметистом', 11000, 'img/amethyst-page/7.png', 'Золото', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(42, 'Колье из золота с аметистами', 18000, 'img/amethyst-page/8.png', 'Золото', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(43, 'Браслет из золота с аметистами', 22000, 'img/amethyst-page/9.png', 'Золото', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(44, 'Серьги-пусеты из серебра с аметистами', 2800, 'img/amethyst-page/10.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(45, 'Серьги из серебра с аметистами', 5000, 'img/amethyst-page/11.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(46, 'Серьги из серебра с аметистами', 2800, 'img/amethyst-page/12.png', 'Серебро', NULL, 'Аметист', 'Для женщин', 'SOVA'),
(47, 'Кольцо из серебра с бриллиантами и рубином', 50000, 'img/ruby-page/1.png', 'Серебро', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(48, 'Кольцо из золота с бриллиантами и рубинами', 38000, 'img/ruby-page/2.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(49, 'Подвеска из золота с рубином', 4400, 'img/ruby-page/3.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(50, 'Кольцо из белого золота с бриллиантами и рубином', 70200, 'img/ruby-page/4.png', 'Белое золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(51, 'Браслет из золота с рубином', 14500, 'img/ruby-page/5.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(52, 'Браслет из золота с бриллиантами и рубином', 16000, 'img/ruby-page/6.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(53, 'Серьги из белого золота с бриллиантами и рубинами', 20000, 'img/ruby-page/7.png', 'Белое золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(54, 'Колье из золота с бриллиантами и рубинами', 60000, 'img/ruby-page/8.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(55, 'Кольцо из белого золота с бриллиантами и рубином', 41000, 'img/ruby-page/9.png', 'Белое золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(56, 'Подвеска из золота с миксом камней', 73000, 'img/ruby-page/10.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(57, 'Колье из золота с рубином', 55000, 'img/ruby-page/11.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(58, 'Брошь из золота с рубинами', 23000, 'img/ruby-page/12.png', 'Золото', NULL, 'Рубин', 'Для женщин', 'SOVA'),
(59, 'Браслет из белого золота с бриллиантами и сапфиром', 39200, 'img/sapphire-page/1.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(60, 'Кольцо из белого золота с бриллиантами и сапфирами', 48000, 'img/sapphire-page/2.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(61, 'Серьги из белого золота с бриллиантами и сапфирами', 192000, 'img/sapphire-page/3.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(62, 'Кольцо из белого золота с сапфирами', 51400, 'img/sapphire-page/4.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(63, 'Кольцо из белого золота с бриллиантами и сапфирами', 80000, 'img/sapphire-page/5.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(64, 'Браслет из белого золота с бриллиантами и сапфиром', 25200, 'img/sapphire-page/6.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(65, 'Крест из белого золота с сапфирами', 24000, 'img/sapphire-page/7.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(66, 'Браслет из белого золота с бриллиантами и сапфирами', 50000, 'img/sapphire-page/8.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(67, 'Колье из белого золота с бриллиантами и сапфиром', 36000, 'img/sapphire-page/9.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(68, 'Серьги из белого золота с сапфирами', 26000, 'img/sapphire-page/10.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(69, 'Подвеска из белого золота с сапфирами и бриллиантами', 66000, 'img/sapphire-page/12.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(70, 'Кольцо из белого золота с бриллиантами и сапфиром', 60000, 'img/sapphire-page/11.png', 'Белое золото', NULL, 'Сапфир', 'Для женщин', 'SOVA'),
(71, 'Кольцо из золота с бриллиантами', 13990, 'img/red-gold-page/1.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(72, 'Кольцо из золота с фианитом', 6990, 'img/red-gold-page/2.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(73, 'Серьги из золота с бриллиантами', 27990, 'img/red-gold-page/3.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(74, 'Кольцо из золота с бриллиантами и сапфиром', 26000, 'img/red-gold-page/4.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(75, 'Серьги из золота с жемчугом и фианитами', 44800, 'img/red-gold-page/5.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(76, 'Серьги из золота с фианитами', 4900, 'img/red-gold-page/6.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(77, 'Браслет из золота с бриллиантами', 35000, 'img/red-gold-page/7.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(78, 'Серьги из золота с бриллиантами', 12000, 'img/red-gold-page/8.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(79, 'Серьги из золота с бесцветными и чёрными бриллиантами', 52000, 'img/red-gold-page/9.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(80, 'Браслет из золота с фианитами', 5000, 'img/red-gold-page/10.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(81, 'Подвеска из золота', 3500, 'img/red-gold-page/12.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(82, 'Кольцо из золота с фианитами', 28000, 'img/red-gold-page/11.png', 'Красное золото', NULL, NULL, 'Для женщин', 'SOVA'),
(83, 'Кольцо из белого золота с бриллиантом', 8990, 'img/white-gold-page/1.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(84, 'Браслет из белого золота с бриллиантами и сапфирами', 354000, 'img/white-gold-page/2.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(85, 'Браслет из белого золота с бриллиантами', 52000, 'img/white-gold-page/3.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(86, 'Колье из белого золота с бриллиантами', 68000, 'img/white-gold-page/4.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(87, 'Подвеска из белого золота с бриллиантами', 42000, 'img/white-gold-page/5.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(88, 'Серьги из белого золота с бриллиантами', 42000, 'img/white-gold-page/6.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(89, 'Серьги из белого золота с бриллиантами', 28000, 'img/white-gold-page/7.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(90, 'Браслет из белого золота с бриллиантами', 33200, 'img/white-gold-page/8.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(91, 'Кольцо из белого золота с бриллиантом', 61500, 'img/white-gold-page/9.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(92, 'Серьги из белого золота с бриллиантами', 46000, 'img/white-gold-page/10.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(93, 'Серьги из белого золота с бриллиантами', 48000, 'img/white-gold-page/11.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(94, 'Колье из белого золота с бриллиантами и сапфиром', 60000, 'img/white-gold-page/12.png', 'Белое золото', NULL, NULL, 'Для женщин', 'SOVA'),
(95, 'Серьги из белого золота с бриллиантами', 36000, 'img/steel-page/1.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(96, 'Серьги из белого золота с бриллиантами', 38000, 'img/steel-page/2.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(97, 'Кольцо из белого золота с бриллиантами', 6990, 'img/steel-page/3.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(98, 'Серьги из белого золота с бриллиантами', 47200, 'img/steel-page/4.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(99, 'Кольцо из белого золота\\ с бриллиантами', 80000, 'img/steel-page/5.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(100, 'Браслет из белого золота с бриллиантами', 90000, 'img/steel-page/6.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(101, 'Браслет из белого золота с бриллиантом', 16000, 'img/steel-page/7.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(102, 'Серьги из белого золота с бриллиантами', 28000, 'img/steel-page/8.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(103, 'Серьги из золота с бесцветными и чёрными бриллиантами', 52000, 'img/steel-page/9.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(104, 'Колье из золота с бриллиантами и танзанитом', 30000, 'img/steel-page/10.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(105, 'Серьги из золота с бриллиантами и изумрудами', 70000, 'img/steel-page/11.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(106, 'Кольцо из белого золота с бриллиантами и танзанитом', 50000, 'img/steel-page/12.png', 'Сталь', NULL, NULL, 'Для женщин', 'SOVA'),
(107, 'Серьги из белого золота с бриллиантами', 36000, 'img/silver-page/1.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(108, 'Серьги из белого золота с бриллиантами', 38000, 'img/silver-page/2.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(109, 'Кольцо из белого золота с бриллиантами', 6990, 'img/silver-page/3.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(110, 'Серьги из белого золота с бриллиантами', 47200, 'img/silver-page/4.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(111, 'Кольцо из белого золота\\ с бриллиантами', 80000, 'img/silver-page/5.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(112, 'Браслет из белого золота с бриллиантами', 90000, 'img/silver-page/6.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(113, 'Браслет из белого золота с бриллиантом', 16000, 'img/silver-page/7.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(114, 'Серьги из белого золота с бриллиантами', 28000, 'img/silver-page/8.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(115, 'Серьги из золота с бесцветными и чёрными бриллиантами', 52000, 'img/silver-page/9.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(116, 'Колье из золота с бриллиантами и танзанитом', 30000, 'img/silver-page/10.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(117, 'Серьги из золота с бриллиантами и изумрудами', 70000, 'img/silver-page/11.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(118, 'Кольцо из белого золота с бриллиантами и танзанитом', 50000, 'img/silver-page/12.png', 'Серебро', NULL, NULL, 'Для женщин', 'SOVA'),
(119, 'Мужские стальные часы', 11200, 'img/cosmos-page/1.png', 'Сталь', NULL, NULL, 'Для мужчин', 'Cosmos'),
(120, 'Мужские стальные часы', 11200, 'img/cosmos-page/2.png', 'Сталь', NULL, NULL, 'Для мужчин', 'Cosmos'),
(121, 'Мужские часы из золота и стали', 30200, 'img/cosmos-page/3.png', 'Сталь', NULL, 'Золото', 'Для мужчин', 'Cosmos'),
(122, 'Женские стальные часы', 15200, 'img/cosmos-page/4.png', 'Сталь', NULL, NULL, 'Для женщин', 'Cosmos'),
(123, 'Женские серебряные часы', 10200, 'img/cosmos-page/5.png', 'Серебро', NULL, NULL, 'Для женщин', 'Cosmos'),
(124, 'Женские стальные часы', 9800, 'img/cosmos-page/6.png', 'Сталь', NULL, NULL, 'Для женщин', 'Cosmos'),
(125, 'Мужские стальные часы', 11200, 'img/cosmos-page/8.png', 'Сталь', NULL, NULL, 'Для мужчин', 'Cosmos'),
(126, 'Женские стальные часы', 15200, 'img/cosmos-page/9.png', 'Сталь', NULL, NULL, 'Для женщин', 'Cosmos'),
(127, 'Женские стальные часы', 9800, 'img/cosmos-page/7.png', 'Сталь', NULL, NULL, 'Для женщин', 'Cosmos'),
(128, 'Серьги из белого золота с бриллиантами', 144000, 'img/premium-page/1.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(129, 'Кольцо из белого золота с бриллиантами', 120000, 'img/premium-page/2.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(130, 'Колье из белого золота с бриллиантами', 400000, 'img/premium-page/3.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(131, 'Кольцо из золота с турмалином', 99000, 'img/premium-page/4.png', 'Золото', NULL, 'Турмалин', 'Для женщин', 'Premium'),
(132, 'Серьги из белого золота с бриллиантами', 510000, 'img/premium-page/5.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(133, 'Серьги из золота с бриллиантами', 310000, 'img/premium-page/6.png', 'Золото', NULL, 'Бриллиатны', 'Для женщин', 'Premium'),
(134, 'Кольцо из белого золота с бриллиантами', 338000, 'img/premium-page/7.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(135, 'Колье из белого золота с бриллиантом', 212000, 'img/premium-page/8.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(136, 'Колье из золота с бриллиантом', 312000, 'img/premium-page/9.png', 'Золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(137, 'Браслет из белого золота с бриллиантами', 620000, 'img/premium-page/10.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(138, 'Браслет из белого золота с бриллиантами', 620000, 'img/premium-page/11.png', 'Белое золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(139, 'Серьги из золота с бриллиантами', 720000, 'img/premium-page/12.png', 'Золото', NULL, 'Бриллианты', 'Для женщин', 'Premium'),
(152, 'Кольцо из серебра', 1200, 'img/collections/slider/rosse/2.png', 'Серебро', NULL, NULL, 'Для женщин', 'ROSSE'),
(153, 'Колье из серебра с фианитом', 3600, 'img/collections/slider/rosse/5.png', 'Серебро', NULL, 'Фианит', 'Для женщин', 'ROSSE'),
(154, 'Серьги из серебра', 3996, 'img/collections/slider/rosse/1.png', 'Серебро', NULL, NULL, 'Для женщин', 'ROSSE'),
(155, 'Брошь \"Сойка\"', 6000, 'img/collections/slider/svoboda/1.png', 'Серебро', NULL, 'Бриллиант', 'Для женщин', 'SVOBODA'),
(156, 'Браслет из белого золота с бриллиантами и танзанитом', 82000, 'img/collections/slider/svoboda/2.png', 'Белое золото', NULL, 'Бриллианты и танзанит', 'Для женщин', 'SVOBODA'),
(157, 'Колье из белого золота с бриллиантами', 112000, 'img/collections/slider/svoboda/5.png', 'Белое золото', NULL, 'Бриллиант', 'Для женщин', 'SVOBODA'),
(158, 'Брошь из золота \"Скоробей\" с бриллиантами', 40000, 'img/collections/slider/pearl/1.png', 'Золото', NULL, 'Бриллиант', 'Для женщин', 'PEARL'),
(159, 'Брошь из золота с жемчугом и фианитами', 72000, 'img/collections/slider/pearl/2.png', 'Золото', NULL, 'Жемчуг и фианит', 'Для женщин', 'PEARL'),
(160, 'Кольцо из золота с жемчугом', 29200, 'img/collections/slider/pearl/5.png', 'Золото', NULL, 'Жемчуг', 'Для женщин', 'PEARL');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userPhone` varchar(16) NOT NULL,
  `goodImage` varchar(100) NOT NULL,
  `goodName` varchar(50) NOT NULL,
  `goodPrice` varchar(6) NOT NULL,
  `goodCount` varchar(100) NOT NULL,
  `goodSize` varchar(100) NOT NULL,
  `consideration` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `dateOfBirth` varchar(10) DEFAULT NULL,
  `phone` varchar(16) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `isAdmin` varchar(5) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `dateOfBirth`, `phone`, `gender`, `isAdmin`) VALUES
(3, 'Артём', 'Соловьев', '16.10.2003', '+7(977)868-34-61', 'man', 'true'),
(4, 'Иван', 'Алейников', '15.10.2001', '+7(915)555-12-00', 'man', 'true'),
(5, 'Василий', 'Пупкин', '16.00.0000', '+7(999)999-99-99', 'man', 'false'),
(7, 'Владимир', 'Жириновский', '11.00.2211', '+7(999)999-99-99', 'man', 'false');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD KEY `userId` (`userId`,`goodsId`),
  ADD KEY `goodsId` (`goodsId`);

--
-- Индексы таблицы `decorders`
--
ALTER TABLE `decorders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD KEY `userId` (`userId`,`goodsId`),
  ADD KEY `goodsId` (`goodsId`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `decorders`
--
ALTER TABLE `decorders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`goodsId`) REFERENCES `goods` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`goodsId`) REFERENCES `goods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

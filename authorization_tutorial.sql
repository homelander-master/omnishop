-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2023 г., 19:52
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `authorization_tutorial`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_status` varchar(55) NOT NULL DEFAULT '0',
  `id_user` varchar(55) NOT NULL,
  `order_data` date NOT NULL,
  `total_price` varchar(55) NOT NULL,
  `address` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `cart_status`, `id_user`, `order_data`, `total_price`, `address`) VALUES
(3, '10', '4', '2023-05-20', '5999', 'Гагарина 17'),
(4, '10', '4', '2023-05-20', '5999', 'Гагарина 17'),
(5, '10', '4', '2023-05-20', '10597', 'Омск'),
(6, '-1', '4', '2023-05-20', '9598', ''),
(7, '10', '4', '2023-05-20', '5999', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `path` varchar(55) NOT NULL,
  `title` varchar(55) NOT NULL,
  `price` varchar(55) NOT NULL,
  `type_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `path`, `title`, `price`, `type_id`) VALUES
(1, '2.jpg', 'Клавиатура Logitech', '5999', '1'),
(2, '3.jpg', 'Клавиатура Logitech X', '5999', '1'),
(3, '2.jpg', 'Клавиатура Logitech', '5999', '1'),
(4, '2.jpg', 'Клавиатура Logitech', '5999', '1'),
(5, '2.jpg', 'Клавиатура Logitech', '5999', '1'),
(6, 'mouse.jpg', 'Мышка Logitech', '3599', '2'),
(7, 'wp.png', 'Коврик для мыши', '999', '3');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(2, 'admin@admin.ru', '202cb962ac59075b964b07152d234b70', 0),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 1),
(5, 'admin2', '202cb962ac59075b964b07152d234b70', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

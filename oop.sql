-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2017 г., 22:57
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `oop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `dir` varchar(32) DEFAULT NULL,
  `photoList` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `author` varchar(32) DEFAULT NULL,
  `text` varchar(3200) DEFAULT NULL,
  `tags` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `name`, `date`, `author`, `text`, `tags`) VALUES
(1, '45', '2017-05-05', 'Иван', 'ред', '222'),
(2, 'new_2', '2017-05-05', 'Иван', 'dfbhkbs hkdbhksd fbljsd', 'sthsh12123'),
(3, 'new_2', '2017-05-05', 'Иван', 'dfbhkbs hkdbhksd fbljsd', 'sthsh12123'),
(29, 'titleAdmin', '2017-04-03', 'Иван', 'textAdmin', 'tagsAdmin'),
(32, '1111wetjhjfhfx.nbkjx', '2017-04-10', 'Никита', '22', 'dtfhstdhs'),
(33, 'newsTitle1+-------------', '2017-05-05', 'Иван', 'newsText1+', 'newsTags1+'),
(34, 'News', '2017-05-05', 'Иван', 'jlkja lajflka oiemnve nvlien;aj', 'afaf'),
(35, 'Новость', '2017-05-19', 'qwe', 'много текста', 'текст'),
(36, '12', '2017-05-19', 'qwe', '13', '14');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id_user` int(3) UNSIGNED NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `login` varchar(32) NOT NULL,
  `pass` char(32) NOT NULL,
  `mode` varchar(32) DEFAULT NULL,
  `user_session` varchar(32) DEFAULT NULL,
  `user_token` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `login`, `pass`, `mode`, `user_session`, `user_token`) VALUES
(1, 'Иван', 'Иванов', 'login', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', '9b87d9m45m32niakhs8nomgd76', 'igehhthaisy12fzl5dab5o504z71hbq9'),
(4, 'qwe', 'qwe', 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'user', 'r6a9p4eobe60qplh1nmrkshpa5', 'mdowhxcfzefqlw5o8z8jfqw84tu2r9bw'),
(5, 'asd', 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', 'user', '', ''),
(6, 'zxc', 'zxc', 'zxc', '5fa72358f0b4fb4f2c5d7de8c9a41846', 'user', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

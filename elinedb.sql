-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 07 2022 г., 18:16
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `elinedb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 NOT NULL DEFAULT 'Описание не присутствует',
  `avatar` varchar(255) NOT NULL DEFAULT 'img/artist/no_avatar.png',
  `source_vk` varchar(255) DEFAULT NULL,
  `source_tg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artist`
--

INSERT INTO `artist` (`id`, `nickname`, `description`, `avatar`, `source_vk`, `source_tg`) VALUES
(1, 'Incredibox', 'Бот, который так или иначе умеет создавать музло', 'pages/img/artist/1.jpg', NULL, NULL),
(2, 'OG LOC GANG BEATS', 'Оу джи лоук гэнг, бро!', 'pages/img/artist/2.jpg', 'https://vk.com/oglocgangbeats', 'https://t.me/oglocgangbeatstg'),
(3, 'Lavrov', '80% успеха релиза это звучание БИТА', 'pages/img/artist/3.jpg', 'https://vk.com/lavrovproduction', NULL),
(5, 'Tv4r', 'Делаю музло с кайфом.', 'pages/img/artist/5.jpg', NULL, NULL),
(6, 'Sunny', 'Для души', 'pages/img/artist/6.jpg', NULL, NULL),
(7, 'NexusGeneration', 'Описание не присутствует', 'pages/img/artist/no_avatar.png', NULL, NULL),
(8, 'KillerOK', 'Описание не присутствует', 'pages/img/artist/8.jpg', NULL, NULL),
(9, 'Nevezu4i', 'Стёрт с лица земли', 'pages/img/artist/9.jpg', NULL, NULL),
(10, 'Durasel', 'Попросили - я сделал. \r\nЕсли чО, то я занимаюсь программированием, ссылка на группу под авой &#128572', 'pages/img/artist/10.jpg', 'https://vk.com/rust_graph', NULL),
(11, 'EKZI BEATS', 'Описание под растрелом....', 'pages/img/artist/11.png', NULL, NULL),
(12, 'samuryao', 'Lofi, релакс и это всё я:)', 'pages/img/artist/12.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name_genre` varchar(255) NOT NULL,
  `genre_img` varchar(255) NOT NULL DEFAULT '/pages/img/genre/no_genre.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`genre_id`, `name_genre`, `genre_img`) VALUES
(1, 'Хайперпоп', '/pages/img/genre/hyperpop.jpg'),
(2, 'Рок', '/pages/img/genre/rock.jpg'),
(3, 'Поп', '/pages/img/genre/pop.jpg'),
(4, 'Классика', '/pages/img/genre/classic.jpg'),
(5, 'Релакс', '/pages/img/genre/chill.jpg'),
(6, 'Трэп', '/pages/img/genre/trap.jpg'),
(7, 'Хип-хоп', '/pages/img/genre/hip-hop.jpg'),
(8, 'Дрилл', '/pages/img/genre/drill.jpg'),
(9, 'Джаз', '/pages/img/genre/jazz.jpg'),
(11, 'EDM', '/pages/img/genre/edm.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `music_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`user_id`, `music_id`) VALUES
(3, 1),
(3, 2),
(3, 5),
(3, 9),
(4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `music`
--

CREATE TABLE `music` (
  `id_music` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  `name_song` varchar(100) NOT NULL DEFAULT 'Undefined',
  `avatar_song` varchar(255) NOT NULL DEFAULT '/pages/img/poster/Undefined.jpg',
  `source` varchar(255) DEFAULT '/pages/audio/0.mp3',
  `relise` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `music`
--

INSERT INTO `music` (`id_music`, `artist_id`, `name_song`, `avatar_song`, `source`, `relise`, `genre`) VALUES
(1, 2, 'МОИ ДЕМОНЫ', '/pages/img/poster/1.jpg', '/pages/audio/1.mp3', '2022-03-24 08:17:21', 2),
(2, 2, 'SAVE ME', '/pages/img/poster/2.jpg', '/pages/audio/2.mp3', '2022-03-24 08:20:14', 7),
(3, 1, 'Voting Men', '/pages/img/poster/3.jpg', '/pages/audio/3.mp3', '2022-03-28 13:37:34', 5),
(4, 2, 'ФОНК МАТЬ ЕГО', '/pages/img/poster/4.jpg', '/pages/audio/4.mp3', '2022-03-28 13:38:32', 7),
(5, 3, 'Hyperstone', '/pages/img/poster/5.jpg', '/pages/audio/5.mp3', '2022-03-28 13:38:52', 1),
(6, 3, 'RAGEBOY', '/pages/img/poster/6.jpg', '/pages/audio/6.mp3', '2022-03-28 13:39:10', 6),
(7, 3, 'EARTHWALK Pt. 1', '/pages/img/poster/7.jpg', '/pages/audio/7.mp3', '2022-03-28 13:39:25', 7),
(8, 3, 'SauceGOD', '/pages/img/poster/8.jpg', '/pages/audio/8.mp3', '2022-03-28 13:42:17', 1),
(9, 12, 'Big voice', '/pages/img/poster/9.jpg', '/pages/audio/9.mp3', '2022-03-28 13:42:44', 6),
(10, 5, 'Laid-back', '/pages/img/poster/Undefined.jpg', '/pages/audio/10.mp3', '2022-03-28 13:44:31', 5),
(11, 5, 'Hook', '/pages/img/poster/Undefined.jpg', '/pages/audio/11.mp3', '2022-03-28 13:44:44', 6),
(12, 3, 'Unlimited World', '/pages/img/poster/12.jpg', '/pages/audio/12.mp3', '2022-03-29 14:25:30', 8),
(13, 8, 'Zagvozdk4', '/pages/img/poster/13.jpg', '/pages/audio/13.mp3', '2022-03-31 11:48:13', 7),
(14, 5, 'Sky Beats', '/pages/img/poster/Undefined.jpg', '/pages/audio/14.mp3', '2022-03-31 12:08:17', 7),
(15, 5, 'Space', '/pages/img/poster/Undefined.jpg', '/pages/audio/15.mp3', '2022-03-31 12:09:29', 6),
(16, 1, 'GOD DAY(no)', '/pages/img/poster/16.jpg', '/pages/audio/16.mp3', '2022-04-08 14:12:35', 5),
(17, 10, 'Ahenogo', '/pages/img/poster/17.jpg', '/pages/audio/17.mp3', '2022-05-20 11:18:09', 11),
(18, 10, 'BASIC Dubstep', '/pages/img/poster/18.jpg', '/pages/audio/18.mp3', '2022-05-20 11:18:09', 11),
(19, 6, 'Bold chopper', '/pages/img/poster/19.jpg', '/pages/audio/19.mp3', '2022-05-20 11:20:27', 2),
(20, 11, 'Bronco Boys', '/pages/img/poster/20.jpg', '/pages/audio/20.mp3', '2022-05-20 11:20:27', 6),
(21, 10, 'Cheat Codes Make it Too Easy (8bit)', '/pages/img/poster/21.jpg', '/pages/audio/21.mp3', '2022-05-20 11:22:20', 11),
(22, 10, 'Click', '/pages/img/poster/22.jpg', '/pages/audio/22.mp3', '2022-05-20 11:22:20', 11),
(23, 6, 'Cove Choirboy', '/pages/img/poster/23.jpg', '/pages/audio/23.mp3', '2022-05-20 11:25:00', 2),
(24, 10, 'Dance of the moth', '/pages/img/poster/24.jpg', '/pages/audio/24.mp3', '2022-05-20 11:25:00', 11),
(25, 10, 'Dancing furiously', '/pages/img/poster/25.jpg', '/pages/audio/25.mp3', '2022-05-20 11:26:28', 11),
(26, 12, 'Dancing in orbit with a rocke', '/pages/img/poster/26.jpg', '/pages/audio/26.mp3', '2022-05-20 11:26:28', 5),
(27, 5, 'Do it faster', '/pages/img/poster/27.jpg', '/pages/audio/27.mp3', '2022-05-20 11:27:52', 7),
(28, 9, 'Don\'t think, I\'m right here', '/pages/img/poster/28.jpg', '/pages/audio/28.mp3', '2022-05-20 11:27:52', 3),
(29, 6, 'drive around town', '/pages/img/poster/29.jpg', '/pages/audio/29.mp3', '2022-05-20 11:28:51', 2),
(30, 6, 'Easy road on the way', '/pages/img/poster/30.jpg', '/pages/audio/30.mp3', '2022-05-20 11:28:51', 2),
(31, 10, 'Enjoying the world', '/pages/img/poster/31.jpg', '/pages/audio/31.mp3', '2022-05-20 11:31:27', 11),
(32, 12, 'Exes Who Are Friends', '/pages/img/poster/32.jpg', '/pages/audio/32.mp3', '2022-05-20 11:31:27', 9),
(33, 9, 'Forest Dance', '/pages/img/poster/33.jpg', '/pages/audio/33.mp3', '2022-05-20 11:32:53', 3),
(34, 5, 'Good ol faithful', '/pages/img/poster/34.jpg', '/pages/audio/34.mp3', '2022-05-20 11:32:53', 7),
(35, 5, 'Got Shot', '/pages/img/poster/35.jpg', '/pages/audio/35.mp3', '2022-05-20 11:33:38', 7),
(36, 10, 'Hand up', '/pages/img/poster/36.jpg', '/pages/audio/36.mp3', '2022-05-20 11:33:38', 11),
(37, 9, 'Heaven or Atlantic City', '/pages/img/poster/37.jpg', '/pages/audio/37.mp3', '2022-05-20 11:34:39', 2),
(38, 11, 'Im the Master', '/pages/img/poster/38.jpg', '/pages/audio/38.mp3', '2022-05-20 11:34:39', 6),
(39, 12, 'Japanese relaxation', '/pages/img/poster/39.jpg', '/pages/audio/39.mp3', '2022-05-20 11:35:27', 5),
(40, 12, 'Japan\'s evening sunset', '/pages/img/poster/40.jpg', '/pages/audio/40.mp3', '2022-05-20 11:35:27', 5),
(41, 9, 'Joyful style', '/pages/img/poster/41.jpg', '/pages/audio/41.mp3', '2022-05-20 11:37:43', 9),
(42, 12, 'Just relax', '/pages/img/poster/42.jpg', '/pages/audio/42.mp3', '2022-05-20 11:37:43', 5),
(43, 5, 'Melodious Bells', '/pages/img/poster/43.jpg', '/pages/audio/43.mp3', '2022-05-20 11:39:08', 6),
(44, 11, 'Memories', '/pages/img/poster/44.jpg', '/pages/audio/44.mp3', '2022-05-20 11:39:08', 7),
(45, 10, 'my mind', '/pages/img/poster/45.jpg', '/pages/audio/45.mp3', '2022-05-20 11:40:20', 11),
(46, 6, 'Old Synth', '/pages/img/poster/46.jpg', '/pages/audio/46.mp3', '2022-05-20 11:40:20', 7),
(47, 6, 'On the way', '/pages/img/poster/47.jpg', '/pages/audio/47.mp3', '2022-05-20 11:41:50', 2),
(48, 5, 'Quiet Whispers', '/pages/img/poster/48.jpg', '/pages/audio/48.mp3', '2022-05-20 11:41:50', 6),
(49, 10, 'Riddim', '/pages/img/poster/49.jpg', '/pages/audio/49.mp3', '2022-05-20 11:42:32', 11),
(50, 10, 'Robot dance', '/pages/img/poster/50.jpg', '/pages/audio/50.mp3', '2022-05-20 11:42:32', 11),
(51, 12, 'Sakura blossoms', '/pages/img/poster/51.jpg', '/pages/audio/51.mp3', '2022-05-20 11:46:52', 5),
(52, 5, 'Shion', '/pages/img/poster/52.jpg', '/pages/audio/52.mp3', '2022-05-20 11:46:52', 6),
(53, 12, 'Space abstraction', '/pages/img/poster/53.jpg', '/pages/audio/53.mp3', '2022-05-20 11:47:12', 5),
(54, 6, 'The Fine Print', '/pages/img/poster/54.jpg', '/pages/audio/54.mp3', '2022-05-20 11:49:11', 4),
(55, 2, 'МЫ ПАНКИ, БРАТ', '/pages/img/poster/55.jpg', '/pages/audio/55.mp3', '2022-05-20 12:05:49', 2),
(56, 6, 'The Princes Returns', '/pages/img/poster/56.jpg', '/pages/audio/56.mp3', '2022-05-20 12:05:49', 4),
(57, 9, 'Think about your surroundings', '/pages/img/poster/57.jpg', '/pages/audio/57.mp3', '2022-05-20 12:07:24', 3),
(58, 2, 'НЕ ПЛАЧЬ, БЭЙ', '/pages/img/poster/58.jpg', '/pages/audio/58.mp3', '2022-05-20 12:07:24', 7),
(59, 2, 'ТАНЕЦ ПОД ДОЖДЕМ', '/pages/img/poster/59.jpg', '/pages/audio/59.mp3', '2022-05-20 12:08:22', 5),
(60, 10, 'Think fast', '/pages/img/poster/60.jpg', '/pages/audio/60.mp3', '2022-05-20 12:08:22', 11),
(61, 10, 'Wave', '/pages/img/poster/61.jpg', '/pages/audio/61.mp3', '2022-05-20 12:09:46', 11),
(62, 5, 'Welcome to ESports', '/pages/img/poster/62.jpg', '/pages/audio/62.mp3', '2022-05-20 12:09:46', 7),
(63, 2, 'СВЕТ ВО ТЬМЕ', '/pages/img/poster/63.jpg', '/pages/audio/63.mp3', '2022-05-20 12:10:53', 7),
(64, 2, 'ЗЛЫЕ УЛИЦЫ', '/pages/img/poster/64.jpg', '/pages/audio/64.mp3', '2022-05-20 12:10:53', 6),
(65, 10, 'World Conqueror', '/pages/img/poster/65.jpg', '/pages/audio/65.mp3', '2022-05-20 12:11:17', 11);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '/pages/img/usersAvatar/no_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`, `avatar`) VALUES
(3, 'EKZImo', '$2y$10$k/KWHHuG/4zA0tUHmo2sJuQg/l4q51656GG.fL0cpSLqsuQvixG/W', 'EKZImo', 'pages/img/uploads/usersAvatar/59f4230b870b8bcdf25780aec1d099f6.png'),
(4, 'EKZImoking', '$2y$10$qO2lQlv1SsrUfrEoQ9.dX./YDdJv4xr19aYwW1IKiiYSUMUCoGqxK', 'EKZImoking', '/pages/img/usersAvatar/no_avatar.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `name_genre` (`name_genre`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD KEY `music_id` (`music_id`),
  ADD KEY `likes_ibfk_1` (`user_id`);

--
-- Индексы таблицы `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id_music`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `genre` (`genre`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `music`
--
ALTER TABLE `music`
  MODIFY `id_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`music_id`) REFERENCES `music` (`id_music`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `music`
--
ALTER TABLE `music`
  ADD CONSTRAINT `music_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`),
  ADD CONSTRAINT `music_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genre` (`genre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

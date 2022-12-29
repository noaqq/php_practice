SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- TABLE `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- DUMP `book`
--

INSERT INTO `book` (`id`, `name`, `author`) VALUES
(1, '451° по Фаренгейту', 'Рэй Брэдбери'),
(2, '1984', 'Джордж Оруэлл'),
(3, 'Мастер и Маргарита', 'Михаил Булгаков'),
(4, 'Шантарам', 'Грегори Дэвид Робертс'),
(5, 'Три товарища', 'Эрих Мария Ремарк');

-- --------------------------------------------------------

--
-- TABLE `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- DUMP `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `name`) VALUES
(1, 'admin', '{SHA}0DPiKuNIrrVmD8IUCuw1hQxNqZc=', 'admin');

-- --------------------------------------------------------

--
-- TABLE `library`
--

CREATE TABLE `library` (
  `id` int NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- DUMP `library`
--

INSERT INTO `library` (`id`, `name`, `address`) VALUES
(1, 'Library №1', 'Some Street, 1'),
(2, 'Library №2', 'Another Street, 2'),
(3, 'Library №3', 'OneMo Street, 3');

--
-- INDECES
--

--
-- INDEX `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- INDEX `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- INDEX `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT 
--

--
-- AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT `library`
--
ALTER TABLE `library`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


--
-- TABLE
--
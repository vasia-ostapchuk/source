-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.16 - MySQL Community Server (GPL)
-- ОС Сервера:                   Win32
-- HeidiSQL Версия:              8.3.0.4792
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- Дамп данных таблицы gomusic.style: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `style` DISABLE KEYS */;
INSERT INTO `style` (`id`, `name`, `parent_id`) VALUES
	(1, 'Рок', 0),
	(2, 'Реп', 0),
	(3, 'Поп', 0),
	(4, 'інді-рок', 1),
	(5, 'Індастріал-метал', 1),
	(6, 'Пост-рок', 1),
	(7, 'R&B', 2),
	(8, 'Евроденс', 3),
	(9, 'Данс-поп', 3);
/*!40000 ALTER TABLE `style` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

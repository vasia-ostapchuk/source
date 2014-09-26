
/*!40000 ALTER TABLE `location` DISABLE KEYS */;
INSERT INTO `location` (`id`, `name`, `parent_id`) VALUES
	(1, 'Украіна', 0),
	(2, 'Львів', 1),
	(3, 'Київ', 1),
	(4, 'Польша', 0),
	(5, 'Варшава', 4),
	(6, 'Люблін', 4),
	(7, 'Хелм', 4),
	(8, 'USA', 0);
/*!40000 ALTER TABLE `location` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

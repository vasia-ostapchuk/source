
INSERT INTO `role` (`id`, `name`, `alias`, `permission_list`) VALUES
	(1, 'Admin', 'Admin', ',1'),
	(2, 'User', 'Normal user', '2,3,4,5,6,7,8,9,10,11,12,13,14,15'),
	(4, 'Guest', 'guest', ',3,2,4,5,6,7,8,9,10,11,13,14'),
	(5, 'Moderator', 'Moderator for artist', NULL),
	(8, 'Transliter', 'Transliter', NULL),
	(10, 'Artist', 'artist or band', NULL);